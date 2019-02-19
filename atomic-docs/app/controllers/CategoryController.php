<?php

/**
 * @class CategoryController
 *
 * @property int componentId
 */

class CategoryController extends Controller {

	/**
	 * @param \Base $f3
	 * @param $params
	 */
	function indexAction($f3, $params) {
		//Get Component DB
		$components = new ComponentModel();

		//Get Category DB
		$category = new CategoryModel();

		$category->loadById($params['catId']);
		$f3->set('category', $category);

		//Get category name
		$catSlug = $f3->get('category')->name;
		//Get category description
		$catDescription = $f3->get('category')->description;
		//Get category ID
		$catID = $f3->get('category')->categoryId;
		//Get category slug
		$slug = $f3->get('category')->slug;

		//Set current category name
		$f3->set('catName', $catSlug);
		//Set current category ID
		$f3->set('catID', $catID);
		//Set current cat slug
		$f3->set('slug', $slug);
		//Set current cat description
		$f3->set('catDescription', $catDescription);
		//Set title tag
		$f3->set('title', 'Atomic | ' . $catSlug);

		$f3->set('category', $category);
		$f3->set('dirPath', $catSlug);

		$filter = ['categoryId= ?', $params['catId']];
		$catComps = $components->find($filter, ['order' => 'sort']);
		$compViews = [];

		foreach ($catComps as $comp) {
			$compViews[] = new Component($comp);
		}

		//Set components array stuff
		$f3->set('catComponents', $compViews);

		$this->preparePageBarLinks($f3, $catID);

		echo \Template::instance()->render('category/index.htm');
	}

	function preparePageBarLinks($f3, $catID) {
		//Edit category link
		$editLink = baseAlias('editCategory', $catID);
		$f3->set('editLink', $editLink);

		//Add sub-category link
		$addSubCatLink = baseAlias('addCategory', ['catId' => $catID]);

		$f3->set('addSubCatLink', $addSubCatLink);

		//Add component link
		$addCompLink = baseAlias('addComponent', $catID);
		$f3->set('addCompLink', $addCompLink);

		//Delete category link
		$deleteCatLink = baseAlias('deleteCategory', $catID);
		$f3->set('deleteCategory', $deleteCatLink);
	}

	function addAction($f3, $params) {
		$passThrough = [];

		if (isFormRequest()) {
			$catName = $f3->get('GET.atomic-cat-name');
			$catDescription = $f3->get('GET.atomic-cat-description');

			$catSlug = slugify($catName);

			$category = new CategoryModel();
			$category->name = filter_var($catName, FILTER_SANITIZE_STRING);
			$category->slug = filter_var($catSlug, FILTER_SANITIZE_STRING);
			$category->description = filter_var($catDescription, FILTER_SANITIZE_STRING);
			$category->parentCatId = $params['catId'] ?? null;
			$category->sort = 1;

			$category->save();

			if (!$category->dry()) {
				$catId = $category->categoryId;

				$FileSystemService = new FileSystemService();

				$FileSystemService->createCategory($category);

				$catLink = baseAlias('category', ['catId' => $catId]);
				$this->renderJSON(['redirect' => $catLink]);
			}
			else {
				$this->renderJSON(['silly' => 'fat mark']);
			}
		}

		$this->render('category/add.php', $passThrough);
	}

	function editAction($f3, $params) {
		$passThrough = [];
		$category = new CategoryModel($this->db);
		$category->load(['categoryId = :category', ':category' => $params['catId']]);

		$oldCatName = $category->slug;
		$category->oldSlug = $category->slug;
		$category->oldPath = getCategoryPath($category);
		$catId = $category->categoryId;

		if (isFormRequest('POST')) {
			$oldPath = getCategoryPath($category);
			$catName = $f3->get('POST.atomic-cat-name');
			$catDescription = $f3->get('POST.atomic-cat-description');
			$catSlug = slugify($catName);

			$category->name = filter_var($catName, FILTER_SANITIZE_STRING);
			$category->slug = filter_var($catSlug, FILTER_SANITIZE_STRING);
			$category->description = filter_var($catDescription, FILTER_SANITIZE_STRING);
			$category->save();

			if (!$category->dry()) {
				$fileService = new FileService();

				$fileService->editCategoryName($category, $oldPath);

				$passThrough['status'] = true;
				$passThrough['message'] = 'Yayy!!!';

				$navItems = new ItemsService();
				$navItems->prepareItems();

				$f3->set('currentId', $catId);
				$f3->set('dirPath', $catName);
				$this->preparePageBarLinks($f3, $catId);

				ob_start();
				echo \Template::instance()->render('common/pageBar.htm');
				$pageBar = ob_get_clean();

				ob_start();
				echo \Template::instance()->render('common/nav.htm');
				$navbar = ob_get_clean();

				$passThrough['html'] = [
					[
						'html' => $pageBar,
						'target' => '.atomic-pageBarWrap',
						'placement' => 'replace',
					],
					[
						'html' => $navbar,
						'target' => '.atomic-fileSystem',
						'placement' => 'replace',
					],

				];

				return $this->renderJSON($passThrough);
			}
			else {
				$passThrough['status'] = false;
				$passThrough['message'] = 'shit didn\'t work';
			}
		}

		$f3->set('category', $category);

		$this->render('category/edit.php', $passThrough);
	}

	function deleteAction($f3, $params) {
		$passThrough = [];

		$category = new CategoryModel();
		$filter = ['categoryId= ?', $params['catId']];
		$category->load($filter);
		$parentCatId = $category->parentCatId;

		if (!$category->dry()) {
			$is = new ItemsService();
			$items = $is->getCategoriesAsItems();
			$hierarchy = $is->buildHierarchy(array_reverse($items), $category->categoryId);

			// removes all the children categories and components of the directory
			$is->traverseHierarchy($hierarchy, function ($item) {
				/** @var Item $item */

				// delete all of the components
				foreach ($item->comps as $c) {
					/** @var Item $c */
					$comp = new ComponentModel();
					$comp->loadById($c->getId());
					if (!$comp->dry()) {
						$comp->erase();
					}
				}
				// delete the category
				$cat = new CategoryModel();
				$cat->loadById($item->id);
				$cat->erase();
			});

			$tcc = new ComponentModel();
			/** @var ComponentModel[] $tcm */
			$tcm = $tcc->find(['categoryId = ?', $category->categoryId]);

			// delete the components
			foreach ($tcm ?: [] as $comp) {
				if (!$comp->dry()) {
					$comp->erase();
				}
			}

			FileServiceStyle::deleteCategory($category);
			FileSystemService::rrmdir(FRONT . '/' . OptionService::getOption('markupDir') . '/' . getCategoryPath($category));
			FileSystemService::rrmdir(FRONT . '/' . OptionService::getOption('stylesDir') . '/' . getCategoryPath($category));

			// delete the category
			$category->erase();

			$passThrough['status'] = true;
			$passThrough['message'] = 'Yayy!!!';

			$passThrough['redirect'] = baseAlias('category', ['catId' => $parentCatId]);

			return $this->renderJSON($passThrough);
		}
		else {
			$passThrough['status'] = false;
			$passThrough['message'] = 'shit didn\'t work';
		}
	}

}
