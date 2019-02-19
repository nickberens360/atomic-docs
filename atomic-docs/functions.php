<?php

$f3 = \Base::instance();

define('BASE_PATH', __DIR__);

define('FRONT', BASE_PATH . '/..');

/*define( 'STYLES-DIR', 'scss' );

define( 'STYLES-EXT', '.scss' );

define( 'MARKUP-DIR', 'components' );

define( 'MARKUP-EXT', '.php' );

define( 'SCRIPTS-DIR', 'js' );

define( 'SCRIPTS-EXT', '.js' );*/

/**
 * Path to Atomic docs
 */
define('ATOMIC', BASE_PATH . '/components/');
/**
 * Path to Atomic organism directory
 */
define('ATOMIC_ORGANISM', ATOMIC . 'organisms');
/**
 * Path to Atomic molecule directory
 */
define('ATOMIC_MOLECULES', ATOMIC . 'molecules');
/**
 * Path to Atomic atom directory
 */
define('ATOMIC_ATOM', ATOMIC . 'atoms');

/**
 * Path to Atomic misc directory
 */
define('ATOMIC_MISC', ATOMIC . 'misc');

define('ATOMIC_FORMS', ATOMIC . 'siteForms');

function isAJAXRequest() {
	return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

function isFormRequest($type = null) {
	$request = false;
	if (!empty($_REQUEST)) {
		// request is defined
		if (count($_REQUEST) > 1) {
			// request has more than one entry - this is a form request
			switch ($type) {
				case 'POST':
					$request = count($_POST) > 0 ? true : false;
					break;
				case 'GET':
					$request = count($_GET) > 0 ? true : false;
					break;
				default:
					$request = true;
			}
		}
		else {
			// only one entry might be IIS added parameter
			foreach ($_REQUEST as $key => $value) {
				if (!empty($value)) {
					$request = true;
				}
			}
		}
	}
	if (!$request && !empty($_FILES)) {
		$request = true;
	}
	return $request;
}

function send_json($data, $statusCode = 200) {
	header('Content-Type: application/json');
	http_response_code($statusCode);

	echo json_encode($data);

	die();
}

function baseAlias($route, $params = null) {
	return Base::instance()->get('BASE') . Base::instance()->alias($route, $params);
}

/**
 * @TODO rework so we can display an error message without that message saving to the file
 * @param $path
 */
function incFilter($path) {
	if (file_exists($path)) {
		include $path;
	}
	//	else {
	//		echo 'File not found: ' . $path;
	//	}
}

/**
 * @TODO rework so we can display an error message without that message saving to the file
 * @param string $path
 * @return false|string
 */
function fileContents($path) {
	if (file_exists($path)) {
		return file_get_contents($path);
	}
	//	else {
	//		echo 'File not found: ' . $path;
	//	}
}

function iFramePath() {
	return \Template::instance()->render('component/iframe.htm');
}

function slugify($text) {
	// replace non letter or digits by -
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	// trim
	$text = trim($text, '-');

	// remove duplicate -
	$text = preg_replace('~-+~', '-', $text);

	// lowercase
	$text = strtolower($text);

	if (empty($text)) {
		return 'n-a';
	}

	return $text;
}

/**
 * Pretty version of @see var_dump()
 */
function v() {
	if (function_exists('xdebug_get_code_coverage')) {
		foreach (func_get_args() as $arg) {
			var_dump($arg);
		}
	}
	else {
		foreach (func_get_args() as $arg) {
			echo '<pre>';
			var_dump($arg);
			echo '</pre>';
		}
	}
}

/**
 * Output debug (or any) info to the page
 */
function d() {
	foreach (func_get_args() as $arg) {
		echo '<pre>';
		echo $arg;
		echo '</pre>' . "\n";
	}
}

/**
 * Pretty version of @see print_r()
 */
function p() {
	foreach (func_get_args() as $arg) {
		if (is_array($arg)) {
			echo '<pre style="text-align: left;">';
			print_r($arg);
			echo '</pre>';
		}
		else {
			v($arg);
		}
	}
}

function replace_substr($search, $replace, $str) {
	$text = substr($str, 0, strlen($str));
	$text = strtolower($text);
	$text = str_replace($search, $replace, $text);
	return $text;
}

//$str = 'one/a/i/two/b/ii';
//$one = replace_substr('one/a', 'one/ab', $str);
//$two = replace_substr('i/two', 'i/twos', $str);
//$three = replace_substr('i/', 'ii/', $str);
//$four = replace_substr($string, $replacement, $str);
//$five = replace_substr($string, $replacement, $str);
//
//d($one, $two, $three, $four, $five);
//die();

function navWalker($items, $level = 0) {
	if (empty($items)) {
		return;
	}
	foreach ($items as $item) {
		?>
		<ul class="<?= $item->type === 'category' && $item->parent ? 'atomic-sub' : ''; ?> atomic-droppable"
		    data-cat="<?= $item->slug; ?>">
			<li class="<?= ($item->active || $item->activeChild) ? 'atomic-active' : ''; ?>" data-type="cat" data-slug="<?= $item->slug; ?>">
				<i class="js-atomic-catContent-trigger fa fa-folder" aria-hidden="true"></i>
				<a href="<?= $item->link; ?>"><?= $item->name; ?></a>
				<?php
				if ($item->children) {
					navWalker($item->children, $level++);
				}
				?>
				<ul class="atomic-components atomic-dropable" data-cat="<?= $item->slug; ?>">
					<?php
					foreach ($item->comps as $comp) {
						?>
						<li data-type="comp" data-slug="<?= $comp->slug; ?>">
							<i class="fa fa-file-o"></i>
							<a href="<?= $comp->categoryLink; ?>#<?= $comp->slug; ?>"><?= $comp->name; ?></a>
						</li>
						<?php
					}
					?>
				</ul>
			</li>
		</ul>
		<?php
	}
}

/**
 * Recursively search an associative array by key and value
 *
 * @param $array
 * @param $key
 * @param $value
 * @return array
 */
function array_search_associative($array, $key, $value) {
	$results = [];

	if (is_array($array) || is_object($array)) {
		$array = (array)$array;
		if (isset($array[$key]) && $array[$key] == $value) {
			$results[] = $array;
		}

		foreach ($array as $subarray) {
			$results = array_merge($results, array_search_associative($subarray, $key, $value));
		}
	}

	return $results;
}

function buildParentChildDirRecursive(CategoryModel $category) {
	/** @var CategoryModel[] parent categories $pc */
	$categories = $category->find(null, ['order' => 'sort ASC, parentCatId ASC']);
	//			$topLevel = $category->find(['parentCatId IS NULL'], ['order' => 'sort ASC']);

	$items = [];
	// rebuild the array to mainly get rid of all of the F3 fluff
	foreach ($categories as $cat) {
		$items[] = (object)[
			'id' => $cat->categoryId,
			'parent' => $cat->parentCatId,
			'name' => $cat->name,
			'link' => baseAlias('category', ['catId' => $cat->categoryId]),
			'slug' => $cat->slug,
			'type' => 'category',
			'activeChild' => 0,
		];
	}
	p($items);

	return $items;
	v($category->parentCatId);

	$parents = array_search_associative($items, 'id', $category->parentCatId);

	return $parents;
}

/**
 * Build a directory path fromm a hierarchy
 *
 * @param $hierarchy
 * @param bool $old
 * @return string
 */
function buildDirPath($hierarchy, $old = false) {
	global $dir;
	$service = new ItemsService();
	$dir = '';
	$service->traverseHierarchy($hierarchy, function ($item) use ($old) {
		global $dir;
		$dir .= ($old ? $item->oldSlug : $item->slug) . '/';
	});

	return $dir;
}

/**
 * Get the path to a category
 * @param ComponentModel $component
 * @return string
 */
function getComponentPath(ComponentModel $component) {
	$service = new ItemsService();
	$items = $service->getCategoriesAsItems(null, true);
	$parents = $service->findParents(array_reverse($items), $component->categoryId);
	$hierarchy = $service->buildHierarchy(array_reverse($parents), 0, 0, null, false);

	return buildDirPath($hierarchy);
}

/**
 * Get the path to a category
 * @param CategoryModel $category
 * @param bool $inclusive
 * @return string
 */
function getCategoryPath(CategoryModel $category, $inclusive = true, $old = false) {
	$service = new ItemsService();
	$items = $service->getCategoriesAsItems();
	$start = $inclusive ? $category->categoryId : $category->parentCatId;
	$parents = $service->findParents(array_reverse($items), $start);
	$hierarchy = $service->buildHierarchy(array_reverse($parents), 0, 0, null, false);

	return buildDirPath($hierarchy, $old);
}

/**
 * Get the path to a category
 * @param CategoryModel $category
 * @param bool $inclusive
 * @return string
 */
function getOldCategoryPath(CategoryModel $category, $inclusive = true) {
	return getCategoryPath($category, $inclusive, true);
}
