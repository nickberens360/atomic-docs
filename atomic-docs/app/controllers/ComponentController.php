<?php

class ComponentController extends Controller {

	function viewAction($f3, $params) {
		$model = new ComponentModel(\Base::instance()->get('db'));
		$filter = ['componentId = :component', ':component' => $params['component']];
		$model->load($filter);

		$view = new Component($model);

		$f3->set('component', $view);

		echo \Template::instance()->render('component/iframe.htm');
	}

	function addAction($f3, $params) {
		$passThrough = [];
		$component = new ComponentModel();
		$category = new CategoryModel();
		$category->load(['categoryId = :category', ':category' => $params['catId']]);

		//Get Parent Category Name
		$categoryParent = new CategoryModel();
		$filter = ['categoryId= ?', $category->parentCatId];
		$categoryParent->load($filter);

		if (isFormRequest('POST')) {
			$compName = $f3->get('POST.atomic-comp-name');

			$component->hasJs = $f3->get('POST.atomic-comp-js');
			$component->name = filter_var($compName, FILTER_SANITIZE_STRING);
			$component->slug = slugify($compName);
			$component->description = filter_var($f3->get('POST.atomic-comp-description'), FILTER_SANITIZE_STRING);
			$component->categoryId = $category->categoryId;
			$component->sort = 1;
			$component->backgroundColor = $f3->get('POST.atomic-bgColor');

			$component->save();

			if ($component->hasJs === 'on') {
				$this->addJsAction($f3, ['component' => $component->componentId]);
				$component->hasJs = 1;
			}

			$FileService = new FileService();
			$FileService->createComponent($component);

			if ($component->componentId !== null) {
				$passThrough['status'] = true;
				$passThrough['message'] = 'Yayy!!!';

				$view = new Component($component);

				$f3->set('comp', $view);

				ob_start();
				echo \Template::instance()->render('component/view.htm');
				$content = ob_get_clean();

				$navItems = new ItemsService();
				$navItems->prepareItems();

				$f3->set('currentSubId', $category->categoryId);
				$f3->set('currentId', $category->categoryId);

				ob_start();
				echo \Template::instance()->render('common/nav.htm');
				$navbar = ob_get_clean();

				$passThrough['html'] = [
					[
						'html' => $content,
						'target' => '.add-comp-form',
						'placement' => 'replace',
					],
					[
						'html' => $navbar,
						'target' => '.atomic-fileSystem',
						'placement' => 'replace',
					],

				];

				$passThrough['compId'] = $component->componentId;
				$passThrough['hasJs'] = $component->hasJs;

				return $this->renderJSON($passThrough);
			}
			else {
				$passThrough['status'] = false;
				$passThrough['message'] = 'shit didn\'t work';
			}
		}

		$this->render('component/add.php', $passThrough);
	}

	//	function addSubAction( $f3, $params ) {
	//
	//
	//		$passThrough = [];
	//
	//
	//		$component = new ComponentModel( $this->db );
	//		$category  = new CategoryModel( $this->db );
	//
	//
	//		$category->load( [ 'categoryId = :category', ':category' => $params['catId'] ] );
	//
	//
	//		$compCatName     = $category->slug;
	//		$compCatID       = $category->categoryId;
	//		$compCatParentId = $category->parentCatId;
	//
	//		//Get Parent Category Name
	//		$categoryParent = new CategoryModel( $this->db );
	//
	//		$filter = [ 'categoryId= ?', $compCatParentId ];
	//
	//		$categoryParent->load( $filter );
	//
	//		$parentName = $categoryParent->slug;
	//
	//
	//
	//		if ( isFormRequest( 'POST' ) ) {
	//
	//
	//			$compName        = $f3->get( 'POST.atomic-comp-name' );
	//			$compDescription = $f3->get( 'POST.atomic-comp-description' );
	//			$compSlug        = slugify( $compName );
	//			$compBgColor     = $f3->get( 'POST.atomic-bgColor' );
	//			$compJs          = $f3->get( 'POST.atomic-comp-js' );
	//
	//			$component->name            = filter_var( $compName, FILTER_SANITIZE_STRING );
	//			$component->slug            = filter_var( $compSlug, FILTER_SANITIZE_STRING );
	//			$component->description     = filter_var( $compDescription, FILTER_SANITIZE_STRING );
	//			$component->categoryId      = $compCatID;
	//			$component->sort            = 1;
	//			$component->backgroundColor = $compBgColor;
	//
	//
	//			$component->save();
	//
	//			$compId = $component->componentId;
	//
	//			$compName = $compSlug;
	//
	//
	//			if ( $compJs === 'on' ) {
	//
	//				$this->addJsAction( $f3, [ "component" => $component->componentId ] );
	//				$hasJs            = 1;
	//				$component->hasJs = 1;
	//
	//			}
	//
	//
	//			$stylesDir = OptionService::getOption( 'stylesDir' );
	//			$stylesExt = OptionService::getOption( 'stylesExt' );
	//			$markupDir = OptionService::getOption( 'markupDir' );
	//			$markupExt = OptionService::getOption( 'markupExt' );
	//
	//
	//			$FileService = new FileService();
	//
	//			$FileService->createComponent($component);
	//
	//
	//			if ( $component->componentId !== null ) {
	//				$passThrough['status']  = true;
	//				$passThrough['message'] = 'Yayy!!!';
	//
	//				$view = new Component( $component );
	//
	//
	//				$f3->set( 'comp', $view );
	//
	//				ob_start();
	//				echo \Template::instance()->render( 'component/view.htm' );
	//				$content               = ob_get_clean();
	//
	//				$navItems = new ItemsService();
	//				$navItems->prepareItems();
	//
	//				$f3->set('currentSubId',$compCatID);
	//				$f3->set('currentId',$compCatParentId);
	//
	//				ob_start();
	//				echo \Template::instance()->render( 'common/nav.htm' );
	//				$navbar               = ob_get_clean();
	//
	//				$passThrough['html']   = [
	//					[
	//						'html'      => $content,
	//						'target'    => '.atomic-dash__content',
	//						'placement' => 'prepend',
	//					],
	//					[
	//						'html' => $navbar,
	//						'target'    => '.atomic-fileSystem',
	//						'placement' => 'replace',
	//					],
	//
	//				];
	////				$passThrough['html'] = 'blah';
	////				$passThrough['placement'] = 'replace';
	////				$passThrough['target'] = '.atomic-fileSystem';
	//
	//				$passThrough['compId']    = $compId;
	//				$passThrough['hasJs']     = $hasJs;
	//
	//				return $this->renderJSON( $passThrough );
	//
	//
	//			} else {
	//				$passThrough['status']  = false;
	//				$passThrough['message'] = 'shit didn\'t work';
	//			}
	//		}
	//
	//
	//		$this->render( 'component/add.php', $passThrough );
	//
	//
	//	}

	//	function editAction($f3, $params) {
	//		$passThrough = [];
	//
	//		$component = new ComponentModel();
	//		$category = new CategoryModel();
	//
	//		$component->load(['componentId = :component', ':component' => $params['compId']]);
	//
	//		$compId = $component->componentId;
	//		$hasJs = $component->hasJs;
	//		$oldCompName = $component->slug;
	//		$compCatId = $component->categoryId;
	//
	//		$category->load(['categoryId = :category', ':category' => $compCatId]);
	//
	//		$catName = $category->slug;
	//		$compCatParentId = $category->parentCatId;
	//
	//		//Get Parent Category Name
	//		$categoryParent = new CategoryModel();
	//
	//		$filter = ['categoryId= ?', $compCatParentId];
	//
	//		$categoryParent->load($filter);
	//
	//		$parentName = $categoryParent->name;
	//
	//		/*echo 'Comp ID: '.$compId.'<br>';
	//		echo 'Has JS: '.$hasJs.'<br>';
	//		echo 'Cat ID: '.$compCatId.'<br>';
	//		echo 'Old Comp Name: '.$oldCompName.'<br>';
	//		die;*/
	//
	//		if (isFormRequest('POST')) {
	//			$compName = $f3->get('POST.atomic-comp-name');
	//			$compSlug = slugify($compName);
	//			$compBgColor = $f3->get('POST.atomic-bgColor');
	//			$compJs = $f3->get('POST.atomic-comp-js');
	//
	//			$component->name = filter_var($compName, FILTER_SANITIZE_STRING);
	//			$component->slug = filter_var($compSlug, FILTER_SANITIZE_STRING);
	//			$component->backgroundColor = $compBgColor;
	//
	//			$component->save();
	//
	//			$compName = $compSlug;
	//
	//			$jsDir = OptionService::getOption('jsDir');
	//			$jsExt = OptionService::getOption('jsExt');
	//
	//			$FileService = new FileService();
	//			$FileService->editStyleName($component, $oldCompName);
	//			$FileService->editMarkupName($component, $oldCompName);
	//
	//			if ($compJs === 'on') {
	//				$this->addJsAction($f3, ["component" => $component->componentId]);
	//				$hasJs = 1;
	//				$component->hasJs = 1;
	//
	//				//Change js comp name
	//				$FileService->editName(
	//					FRONT . '/' . $jsDir . '/' . $oldCompName . '.' . $jsExt,
	//					FRONT . '/' . $jsDir . '/' . $compName . '.' . $jsExt
	//				);
	//
	//				//Change js comp comment string
	//				$FileService->stringReplace(
	//					FRONT . '/' . $jsDir . '/' . $compName . '.' . $jsExt,
	//					'/* ' . $jsDir . '/' . $oldCompName,
	//					'/* ' . $jsDir . '/' . $compName
	//				);
	//			}
	//
	//			if ($category->categoryId !== null) {
	//				$passThrough['status'] = true;
	//				$passThrough['message'] = 'Yayy!!!';
	//
	//				$view = new Component($component);
	//
	//				$f3->set('comp', $view);
	//
	//				ob_start();
	//				echo \Template::instance()->render('component/comp-bar.htm');
	//				$content = ob_get_clean();
	//
	//				$navItems = new ItemsService();
	//				$navItems->prepareItems();
	//
	//				if (!empty($compCatParentId)) {
	//					$f3->set('currentSubId', $compCatId);
	//					$f3->set('currentId', $compCatParentId);
	//				}
	//				else {
	//					$f3->set('currentId', $compCatId);
	//				}
	//
	//				ob_start();
	//				echo \Template::instance()->render('common/nav.htm');
	//				$navbar = ob_get_clean();
	//
	//				$passThrough['html'] = [
	//					[
	//						'html' => $content,
	//						'target' => '#' . $compSlug . ' .atomic-compBar',
	//						'placement' => 'replace',
	//					],
	//					[
	//						'html' => $navbar,
	//						'target' => '.atomic-fileSystem',
	//						'placement' => 'replace',
	//					],
	//
	//				];
	//
	//				$passThrough['compId'] = $compId;
	//				$passThrough['hasJs'] = $hasJs;
	//
	//				return $this->renderJSON($passThrough);
	//			}
	//			else {
	//				$passThrough['status'] = false;
	//				$passThrough['message'] = 'shit didn\'t work';
	//			}
	//		}
	//
	//		$f3->set('component', $component);
	//
	//		$this->render('component/edit.php', $passThrough);
	//	}

	function editSourceAction($f3, $params) {
		$passThrough = [];
		$component = new ComponentModel();
		$category = new CategoryModel();

		$component->load(['componentId = :component', ':component' => $params['compId']]);

		$oldCompName = $component->slug;

		if (isFormRequest('POST')) {
			$markup = $f3->get('POST.atomic-markup-field');
			$styles = $f3->get('POST.atomic-styles-field');
			$js = $f3->get('POST.atomic-js-field');
			$description = $f3->get('POST.atomic-description-field');
			$bgColor = $f3->get('POST.atomic-bgColor');
			$name = $f3->get('POST.atomic-component-name');
			$requestJs = $f3->get('POST.atomic-add-js');
			$description = htmlspecialchars($description);

			$component->description = $description;
			$component->name = $name;
			$component->backgroundColor = $bgColor;
			$component->oldSlug = $oldCompName;
			$compSlug = slugify($name);
			$component->slug = $compSlug;

			if ($requestJs === 'on') {
				$component->hasJs = $requestJs;
			}

			$component->save();

			if (!$component->dry()) {
				$description = htmlspecialchars_decode($description);
				$category->load(['categoryId = :category', ':category' => $component->categoryId]);

				//Get Parent Category Name
				$categoryParent = new CategoryModel();
				$filter = ['categoryId= ?', $category->parentCatId];
				$categoryParent->load($filter);

				$stylesDir = OptionService::getOption('stylesDir');
				$stylesExt = OptionService::getOption('stylesExt');
				$markupDir = OptionService::getOption('markupDir');
				$markupExt = OptionService::getOption('markupExt');

				$FileService = new FileService();

				$componentPath = getComponentPath($component);

				file_put_contents(
					FRONT . '/' . $markupDir . '/' . $componentPath . '' . $component->slug . '.' . $markupExt,
					$markup
				);

				file_put_contents(
					FRONT . '/' . $stylesDir . '/' . $componentPath . '_' . $component->slug . '.' . $stylesExt,
					$styles
				);

				$FileService->editStyleName($component, $oldCompName);
				$FileService->editMarkupName($component, $oldCompName);

				if ($requestJs === 'on') {
					FileServiceJavascript::createFile($component);
					$component->hasJs = 1;
				}

				if ($component->hasJs && !empty($js)) {
					FileServiceJavascript::editContent($component, $js);

					if ($component->slug !== $component->oldSlug) {
						FileServiceJavascript::editCommentString($component->oldSlug, $component->slug);
						FileServiceJavascript::editFile($component, $oldCompName);
					}
				}

				$passThrough['status'] = true;
				$passThrough['message'] = 'Component saved.';

				$view = new Component($component);

				$f3->set('comp', $view);

				$navItems = new ItemsService();
				$navItems->prepareItems();

				if (!empty($category->parentCatId)) {
					$f3->set('currentSubId', $component->categoryId);
					$f3->set('currentId', $category->parentCatId);
				}
				else {
					$f3->set('currentId', $component->categoryId);
				}

				ob_start();
				echo \Template::instance()->render('component/view.htm');
				$content = ob_get_clean();

				ob_start();
				echo \Template::instance()->render('common/nav.htm');
				$navbar = ob_get_clean();

				$passThrough['html'] = [
					[
						'html' => $content,
						'target' => '#' . $oldCompName,
						'placement' => 'replace',
						'compId' => $component->componentId,
						'slug' => $component->slug,
						'description' => $description,
						'hasJs' => $component->hasJs,
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
				$passThrough['message'] = 'There was an error saving the component';
			}
		}

		$this->render(null, $passThrough);
	}

	function addJsAction($f3, $params) {
		$passThrough = [];

		$component = new ComponentModel();

		if (isFormRequest()) {
			$component->load(['componentId = :component', ':component' => $params['component']]);

			$component->hasJs = 1;

			$compId = $component->componentId;

			$component->save();

			$compName = $component->name;

			$compSlug = slugify($compName);

			FileServiceJavascript::createFile($component);

			if ($component->componentId !== null) {
				$passThrough['status'] = true;
				$passThrough['message'] = 'Yayy!!!';

				$view = new Component($component);

				$f3->set('comp', $view);

				$view = new Component($component);

				$f3->set('comp', $view);

				$passThrough['target'] = '[data-id=' . $compId . ']';
				$passThrough['placement'] = 'replace';
				$passThrough['compId'] = $compId;
				$passThrough['slug'] = $compSlug;

				return $this->template('component/view.htm', $passThrough);
			}
			else {
				$passThrough['status'] = false;
				$passThrough['message'] = 'shit didn\'t work';
			}
		}
		//$this->render('component/add-js.php', $passThrough);

	}

	function editColorAction($f3, $params) {
		$passThrough = [];

		$component = new ComponentModel();

		if (isFormRequest()) {
			$compColor = $f3->get('GET.atomic-bgColor');
			$component->load(['componentId = :component', ':component' => $params['component']]);

			$compId = $component->componentId;
			$hasJs = $component->hasJs;

			if (empty($compColor)) {
				$component->backgroundColor = null;
			}
			else {
				$component->backgroundColor = $compColor;
			}

			$component->save();

			$description = htmlspecialchars_decode($component->description);

			if ($component->componentId !== null) {
				$passThrough['status'] = true;
				$passThrough['message'] = 'Yayy!!!';

				$view = new Component($component);

				$f3->set('comp', $view);

				$passThrough['target'] = '[data-id=' . $compId . ']';
				$passThrough['placement'] = 'replace';
				$passThrough['compId'] = $compId;

				return $this->template('component/view.htm', $passThrough);
			}
			else {
				$passThrough['status'] = false;
				$passThrough['message'] = 'shit didn\'t work';
			}
		}
	}

	function deleteAction($f3, $params) {
		$passThrough = [];

		$component = new ComponentModel();
		$category = new CategoryModel();

		$component->load(['componentId = :component', ':component' => $params['compId']]);

		$compSlug = $component->slug;
		$compId = $component->componentId;
		$hasJs = $component->hasJs;

		$compCatId = $component->categoryId;
		$category->load(['categoryId = :category', ':category' => $compCatId]);

		$catId = $category->categoryId;
		$catSlug = $category->slug;

		$catParentId = $category->parentCatId;

		//Get Parent Category Info
		if (!empty($catParentId)) {
			$categoryParent = new CategoryModel($this->db);
			$filter = ['categoryId= ?', $catParentId];
			$categoryParent->load($filter);
			$catParentId = $categoryParent->categoryId;
			$catParentSlug = $categoryParent->slug;

			$dirPath = $catParentSlug . '/' . $catSlug;
		}
		else {
			$dirPath = $catSlug;
		}

		$stylesDir = OptionService::getOption('stylesDir');
		$stylesExt = OptionService::getOption('stylesExt');
		$markupDir = OptionService::getOption('markupDir');
		$markupExt = OptionService::getOption('markupExt');
		$jsDir = OptionService::getOption('jsDir');
		$jsExt = OptionService::getOption('jsExt');

		$FileService = new FileService();

		//Delete Component markup file

		$FileService->deleteFile(FRONT . '/' . $markupDir . '/' . $dirPath . '/' . $compSlug . '.' . $markupExt);

		//Delete style import string

		$importString = $FileService->stringBuilder('styleImport', $dirPath, $compSlug);

		$FileService->stringReplace(
			FRONT . '/' . $stylesDir . '/' . $dirPath . '/_' . $catSlug . '.' . $stylesExt,
			$importString,
			''
		);

		//Delete style file
		$FileService->deleteFile(FRONT . '/' . $stylesDir . '/' . $dirPath . '/_' . $compSlug . '.' . $stylesExt);

		if (!empty($hasJs)) {
			$FileService->deleteFile(FRONT . '/' . $jsDir . '/' . $compSlug . '.' . $jsExt);
		}

		if ($category->categoryId !== null) {
			$passThrough['status'] = true;
			$passThrough['message'] = 'Yayy!!!';

			$component->erase();

			$navItems = new ItemsService();
			$navItems->prepareItems();

			$f3->set('currentId', $catId);
			$f3->set('dirPath', $dirPath);

			ob_start();
			echo \Template::instance()->render('common/nav.htm');
			$navbar = ob_get_clean();

			$passThrough['html'] = [
				[
					'html' => $navbar,
					'target' => '.atomic-fileSystem',
					'placement' => 'replace',
				],

			];

			$passThrough['compSlug'] = $compSlug;

			return $this->renderJSON($passThrough);
		}
		else {
			$passThrough['status'] = false;
			$passThrough['message'] = 'shit didn\'t work';
		}
	}

	function singleAction($f3, $params) {
		$model = new ComponentModel(\Base::instance()->get('db'));

		$category = new CategoryModel($this->db);

		$filter = ['componentId = :component', ':component' => $params['compId']];

		$model->load($filter);

		$catId = $model->categoryId;

		$activeCompId = $model->componentId;

		$category->load(['categoryId = :category', ':category' => $catId]);

		$compCatParentId = $category->parentCatId;

		//Get Parent Category Name
		$categoryParent = new CategoryModel($this->db);

		$filter = ['categoryId= ?', $compCatParentId];

		$categoryParent->load($filter);

		$markupExt = OptionService::getOption('markupExt');

		if (!empty($compCatParentId)) {
			$dirPath = $categoryParent->name . ' / ' . $category->name;
		}
		else {
			$dirPath = $category->name . ' / ' . $model->name . '.' . $markupExt;
		}

		/*$catLink = baseAlias('category', ['catId'=>$catId]);

		$f3->set( 'catLink', $catLink );*/

		$view = new Component($model);

		$f3->set('comp', $view);

		$f3->set('dirPath', $dirPath);

		$f3->set('isSingle', true);

		$f3->set('activeCompId', $activeCompId);

		$navItems = new ItemsService();
		$navItems->prepareItems();

		if (!empty($compCatParentId)) {
			$f3->set('currentSubId', $catId);
			$f3->set('currentId', $compCatParentId);
		}
		else {
			$f3->set('currentId', $catId);
		}

		echo \Template::instance()->render('component/single.htm');
	}
}
