<?php

class ComponentController extends Controller {


	function viewAction( $f3, $params ) {


		$model = new ComponentModel( \Base::instance()->get( 'db' ) );


		$filter = [ 'componentId = :component', ':component' => $params['component'] ];


		$model->load( $filter );


		$view = new Component( $model );

		$f3->set( 'component', $view );


		echo \Template::instance()->render( 'component/iframe.htm' );


	}

	function addAction( $f3, $params ) {


		$passThrough = [];


		$component = new ComponentModel( $this->db );
		$category  = new CategoryModel( $this->db );
		$category->load( [ 'categoryId = :category', ':category' => $params['catId'] ] );


		$compCatName     = $category->slug;
		$compCatID       = $category->categoryId;
		$compCatParentId = $category->parentCatId;

		//Get Parent Category Name
		$categoryParent = new CategoryModel( $this->db );

		$filter = [ 'categoryId= ?', $compCatParentId ];

		$categoryParent->load( $filter );

		$parentName = $categoryParent->slug;


		if ( isFormRequest( 'POST' ) ) {


			$compName        = $f3->get( 'POST.atomic-comp-name' );
			$compDescription = $f3->get( 'POST.atomic-comp-description' );
			$compSlug        = slugify( $compName );
			$compBgColor     = $f3->get( 'POST.atomic-bgColor' );
			$compJs          = $f3->get( 'POST.atomic-comp-js' );




			$component->name            = filter_var( $compName, FILTER_SANITIZE_STRING );
			$component->slug            = filter_var( $compSlug, FILTER_SANITIZE_STRING );
			$component->description     = filter_var( $compDescription, FILTER_SANITIZE_STRING );
			$component->categoryId      = $compCatID;
			$component->sort            = 1;
			$component->backgroundColor = $compBgColor;


			$component->save();


			$compName = $compSlug;

			$compId = $component->componentId;





			$stylesDir = OptionService::getOption( 'stylesDir' );
			$stylesExt = OptionService::getOption( 'stylesExt' );
			$markupDir = OptionService::getOption( 'markupDir' );
			$markupExt = OptionService::getOption( 'markupExt' );


			$FileService = new FileService();


			if ( ! empty( $parentName ) ) {
				$folderPath = $parentName . '/' . $compCatName;
			} else {
				$folderPath = $compCatName;
			}


			//Create style file
			$FileService->makeFile( FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $compName . '.' . $stylesExt );


			//Create style import string
			//$importSting = '@import "_' . $compName . '";';

			$importString = $FileService->stringBuilder('styleImport', $folderPath, $compSlug);

			//Write style import string to root file
			$FileService->write( FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $compCatName . '.scss', $importString );


			//Create style file location comment string
			$commentString = '/* ' . $stylesDir . '/' . $folderPath . '/_' . $compName . '.' . $stylesExt . ' */' . "\n\n";

			//Write style file location comment string to file
			$FileService->write( FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $compName . '.' . $stylesExt, $commentString );


			//Create markup file
			$FileService->makeFile( FRONT . '/' . $markupDir . '/' . $folderPath . '/' . $compName . '.' . $markupExt );


			//Create markup file location comment string
			$commentString = '<!-- ' . $markupDir . '/' . $folderPath . '/' . $compName . '.' . $markupExt . ' -->' . "\n\n";

			//Write markup file location comment string to file
			$FileService->write( FRONT . '/' . $markupDir . '/' . $folderPath . '/' . $compName . '.' . $markupExt, $commentString );


			if ( $compJs === 'on' ) {

				//$this->addJsAction( $f3, [ "component" => $component->componentId ] );


				$jsDir = OptionService::getOption( 'jsDir' );
				$jsExt = OptionService::getOption( 'jsExt' );


				$FileService = new FileService();

				//Create js file
				$FileService->makeFile( FRONT . '/' . $jsDir . '/' . $compSlug . '.' . $jsExt );

				//Create js file location comment string
				$commentString = '/* ' . $jsDir . '/' . $compSlug . '.' . $jsExt . ' */' . "\n\n";

				//Write js file location comment string to file
				$FileService->write( FRONT . '/' . $jsDir . '/' . $compSlug . '.' . $jsExt, $commentString );

				$hasJs            = 1;
				$component->hasJs = 1;

			}
			else{
				$hasJs            = null;
				$component->hasJs = null;
			}


			if ( $component->componentId !== null ) {
				$passThrough['status']  = true;
				$passThrough['message'] = 'Yayy!!!';

				$view = new Component( $component );


				$f3->set( 'comp', $view );

				ob_start();
				echo \Template::instance()->render( 'component/view.htm' );
				$content               = ob_get_clean();

				$navItems = new ItemsService();
				$navItems->prepareItems();

				$f3->set('currentSubId',$compCatID);
				$f3->set('currentId',$compCatID);

				ob_start();
				echo \Template::instance()->render( 'common/nav.htm' );
				$navbar               = ob_get_clean();

				$passThrough['html']   = [
					[
						'html'      => $content,
						'target'    => '.add-comp-form',
						'placement' => 'replace',
					],
					[
						'html' => $navbar,
						'target'    => '.atomic-fileSystem',
						'placement' => 'replace',
					],

				];


				$passThrough['compId']    = $compId;
				$passThrough['hasJs']     = $hasJs;

				return $this->renderJSON( $passThrough );


			} else {
				$passThrough['status']  = false;
				$passThrough['message'] = 'shit didn\'t work';
			}
		}


		$this->render( 'component/add.php', $passThrough );


	}

	function addSubAction( $f3, $params ) {


		$passThrough = [];


		$component = new ComponentModel( $this->db );
		$category  = new CategoryModel( $this->db );


		$category->load( [ 'categoryId = :category', ':category' => $params['catId'] ] );


		$compCatName     = $category->slug;
		$compCatID       = $category->categoryId;
		$compCatParentId = $category->parentCatId;

		//Get Parent Category Name
		$categoryParent = new CategoryModel( $this->db );

		$filter = [ 'categoryId= ?', $compCatParentId ];

		$categoryParent->load( $filter );

		$parentName = $categoryParent->slug;



		if ( isFormRequest( 'POST' ) ) {


			$compName        = $f3->get( 'POST.atomic-comp-name' );
			$compDescription = $f3->get( 'POST.atomic-comp-description' );
			$compSlug        = slugify( $compName );
			$compBgColor     = $f3->get( 'POST.atomic-bgColor' );
			$compJs          = $f3->get( 'POST.atomic-comp-js' );

			$component->name            = filter_var( $compName, FILTER_SANITIZE_STRING );
			$component->slug            = filter_var( $compSlug, FILTER_SANITIZE_STRING );
			$component->description     = filter_var( $compDescription, FILTER_SANITIZE_STRING );
			$component->categoryId      = $compCatID;
			$component->sort            = 1;
			$component->backgroundColor = $compBgColor;


			$component->save();

			$compId = $component->componentId;

			$compName = $compSlug;


			if ( $compJs === 'on' ) {

				$this->addJsAction( $f3, [ "component" => $component->componentId ] );
				$hasJs            = 1;
				$component->hasJs = 1;

			}


			$stylesDir = OptionService::getOption( 'stylesDir' );
			$stylesExt = OptionService::getOption( 'stylesExt' );
			$markupDir = OptionService::getOption( 'markupDir' );
			$markupExt = OptionService::getOption( 'markupExt' );


			$FileService = new FileService();


			$folderPath = $parentName . '/' . $compCatName;


			//Create style file
			$FileService->makeFile( FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $compName . '.' . $stylesExt );


			//Create style import string
			$importSting = '@import "_' . $compName . '";';

			//Write style import string to root file
			$FileService->write( FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $compCatName . '.scss', $importSting );


			//Create style file location comment string
			$commentString = '/* ' . $stylesDir . '/' . $folderPath . '/_' . $compName . '.' . $stylesExt . ' */' . "\n\n";

			//Write style file location comment string to file
			$FileService->write( FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $compName . '.' . $stylesExt, $commentString );


			//Create markup file
			$FileService->makeFile( FRONT . '/' . $markupDir . '/' . $folderPath . '/' . $compName . '.' . $markupExt );


			//Create markup file location comment string
			$commentString = '<!-- ' . $markupDir . '/' . $folderPath . '/' . $compName . '.' . $markupExt . ' -->' . "\n\n";

			//Write markup file location comment string to file
			$FileService->write( FRONT . '/' . $markupDir . '/' . $folderPath . '/' . $compName . '.' . $markupExt, $commentString );


			if ( $component->componentId !== null ) {
				$passThrough['status']  = true;
				$passThrough['message'] = 'Yayy!!!';

				$view = new Component( $component );


				$f3->set( 'comp', $view );

				ob_start();
				echo \Template::instance()->render( 'component/view.htm' );
				$content               = ob_get_clean();

				$navItems = new ItemsService();
				$navItems->prepareItems();

				$f3->set('currentSubId',$compCatID);
				$f3->set('currentId',$compCatParentId);

				ob_start();
				echo \Template::instance()->render( 'common/nav.htm' );
				$navbar               = ob_get_clean();

				$passThrough['html']   = [
					[
						'html'      => $content,
						'target'    => '.atomic-dash__content',
						'placement' => 'prepend',
					],
					[
						'html' => $navbar,
						'target'    => '.atomic-fileSystem',
						'placement' => 'replace',
					],

				];
//				$passThrough['html'] = 'blah';
//				$passThrough['placement'] = 'replace';
//				$passThrough['target'] = '.atomic-fileSystem';

				$passThrough['compId']    = $compId;
				$passThrough['hasJs']     = $hasJs;

				return $this->renderJSON( $passThrough );


			} else {
				$passThrough['status']  = false;
				$passThrough['message'] = 'shit didn\'t work';
			}
		}


		$this->render( 'component/add.php', $passThrough );


	}

	function editAction( $f3, $params ) {

		$passThrough = [];


		$component = new ComponentModel( $this->db );
		$category  = new CategoryModel( $this->db );


		$component->load( [ 'componentId = :component', ':component' => $params['compId'] ] );


		$compId = $component->componentId;
		$hasJs  = $component->hasJs;
		$oldCompName = $component->slug;
		$compCatId   = $component->categoryId;




		$category->load( [ 'categoryId = :category', ':category' => $compCatId ] );


		$catName         = $category->slug;
		$compCatParentId = $category->parentCatId;



		//Get Parent Category Name
		$categoryParent = new CategoryModel( $this->db );

		$filter = [ 'categoryId= ?', $compCatParentId ];

		$categoryParent->load( $filter );

		$parentName = $categoryParent->name;


		/*echo 'Comp ID: '.$compId.'<br>';
		echo 'Has JS: '.$hasJs.'<br>';
		echo 'Cat ID: '.$compCatId.'<br>';
		echo 'Old Comp Name: '.$oldCompName.'<br>';
		die;*/



		if ( isFormRequest( 'POST' ) ) {

			$compName = $f3->get( 'POST.atomic-comp-name' );

			$compSlug = slugify( $compName );




			$compBgColor = $f3->get( 'POST.atomic-bgColor' );
			$compJs      = $f3->get( 'POST.atomic-comp-js' );

			$component->name            = filter_var( $compName, FILTER_SANITIZE_STRING );
			$component->slug            = filter_var( $compSlug, FILTER_SANITIZE_STRING );
			$component->backgroundColor = $compBgColor;


			$component->save();

			$compName = $compSlug;

			if ( $compJs === 'on' ) {
				$this->addJsAction( $f3, [ "component" => $component->componentId ] );
				$hasJs            = 1;
				$component->hasJs = 1;
			}


			if ( ! empty( $parentName ) ) {
				$folderPath = $categoryParent->slug . '/' . $category->slug;
			} else {
				$folderPath = $category->slug;
			}



			$stylesDir = OptionService::getOption( 'stylesDir' );
			$stylesExt = OptionService::getOption( 'stylesExt' );
			$markupDir = OptionService::getOption( 'markupDir' );
			$markupExt = OptionService::getOption( 'markupExt' );
			$jsDir     = OptionService::getOption( 'jsDir' );
			$jsExt     = OptionService::getOption( 'jsExt' );


			$FileService = new FileService();


			//Change style comp name
			$FileService->editName(
				FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $oldCompName . '.' . $stylesExt,
				FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $compName . '.' . $stylesExt
			);

			//Change style comp root import string
			$FileService->stringReplace(
				FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $catName . '.' . $stylesExt,
				'@import "_' . $oldCompName . '";',
				'@import "_' . $compName . '";'
			);

			//Change style comp comment string
			$FileService->stringReplace(
				FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $compName . '.' . $stylesExt,
				'/* ' . $stylesDir . '/' . $folderPath . '/_' . $oldCompName,
				'/* ' . $stylesDir . '/' . $folderPath . '/_' . $compName
			);


			//Change component comp name
			$FileService->editName(
				FRONT . '/' . $markupDir . '/' . $folderPath . '/' . $oldCompName . '.' . $markupExt,
				FRONT . '/' . $markupDir . '/' . $folderPath . '/' . $compName . '.' . $markupExt
			);

			//Change markup comp comment string
			$FileService->stringReplace(
				FRONT . '/' . $markupDir . '/' . $folderPath . '/' . $compName . '.' . $markupExt,
				'<!-- ' . $markupDir . '/' . $folderPath . '/' . $oldCompName . '.' . $markupExt . ' -->',
				'<!-- ' . $markupDir . '/' . $folderPath . '/' . $compName . '.' . $markupExt . ' -->'
			);


			if ( $hasJs !== null ) {
				//Change js comp name
				$FileService->editName(
					FRONT . '/' . $jsDir . '/' . $oldCompName . '.' . $jsExt,
					FRONT . '/' . $jsDir . '/' . $compName . '.' . $jsExt
				);

				//Change js comp comment string
				$FileService->stringReplace(
					FRONT . '/' . $jsDir . '/' . $compName . '.' . $jsExt,
					'/* ' . $jsDir . '/' . $oldCompName,
					'/* ' . $jsDir . '/' . $compName
				);
			}


			if ( $category->categoryId !== null ) {



				$passThrough['status']  = true;
				$passThrough['message'] = 'Yayy!!!';

				$view = new Component( $component );


				$f3->set( 'comp', $view );

				ob_start();
				echo \Template::instance()->render( 'component/comp-bar.htm' );
				$content               = ob_get_clean();

				$navItems = new ItemsService();
				$navItems->prepareItems();


				if(!empty($compCatParentId)){
					$f3->set('currentSubId',$compCatId);
					$f3->set('currentId',$compCatParentId);
				}
				else{
					$f3->set('currentId',$compCatId);
				}


				ob_start();
				echo \Template::instance()->render( 'common/nav.htm' );
				$navbar               = ob_get_clean();

				$passThrough['html']   = [
					[
						'html'      => $content,
						'target'    => '#'.$compSlug.' .atomic-compBar',
						'placement' => 'replace',
					],
					[
						'html' => $navbar,
						'target'    => '.atomic-fileSystem',
						'placement' => 'replace',
					],

				];


				$passThrough['compId']    = $compId;
				$passThrough['hasJs']     = $hasJs;

				return $this->renderJSON( $passThrough );





			} else {
				$passThrough['status']  = false;
				$passThrough['message'] = 'shit didn\'t work';
			}

		}


		$f3->set( 'component', $component );


		$this->render( 'component/edit.php', $passThrough );

	}






	function editSourceAction( $f3, $params ) {

		$passThrough = [];

		$component = new ComponentModel( $this->db );
		$category  = new CategoryModel( $this->db );

		$component->load( [ 'componentId = :component', ':component' => $params['compId'] ] );

		$oldCompName = $component->slug;








		if ( isFormRequest() ) {

			$markup      = $f3->get( 'GET.atomic-markup-field' );
			$styles      = $f3->get( 'GET.atomic-styles-field' );
			$js          = $f3->get( 'GET.atomic-js-field' );
			$description = $f3->get( 'GET.atomic-description-field' );
			$bgColor = $f3->get( 'GET.atomic-bgColor' );
			$name        = $f3->get( 'GET.atomic-component-name' );
			$requestJs        = $f3->get( 'GET.atomic-add-js' );
			$description = htmlspecialchars( $description );







			$component->description = $description;
			$component->name = $name;
			$component->backgroundColor = $bgColor;
			$compSlug = slugify($name);
			$component->slug = $compSlug;



			$component->save();

			$compCatId = $component->categoryId;
			$compSlug  = $component->slug;
			$compId  = $component->componentId;
			$hasJs  = $component->hasJs;
			$description = htmlspecialchars_decode($description);

			$compName = $compSlug;






			$category->load( [ 'categoryId = :category', ':category' => $compCatId ] );







			$catSlug = $category->slug;


			$catName = $catSlug;


			$compCatParentId = $category->parentCatId;

			//Get Parent Category Name
			$categoryParent = new CategoryModel( $this->db );

			$filter = [ 'categoryId= ?', $compCatParentId ];

			$categoryParent->load( $filter );

			$parentSlug = $categoryParent->slug;


			if ( ! empty( $parentSlug ) ) {
				$folderPath = $parentSlug . '/' . $catSlug;
			} else {
				$folderPath = $catSlug;
			}




			$stylesDir = OptionService::getOption( 'stylesDir' );
			$stylesExt = OptionService::getOption( 'stylesExt' );
			$markupDir = OptionService::getOption( 'markupDir' );
			$markupExt = OptionService::getOption( 'markupExt' );
			$jsDir     = OptionService::getOption( 'jsDir' );
			$jsExt     = OptionService::getOption( 'jsExt' );


			$FileService = new FileService();



			file_put_contents(
				FRONT . '/' . $markupDir . '/' . $folderPath . '/' . $oldCompName . '.' . $markupExt,
				$markup
			);

			file_put_contents(
				FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $oldCompName . '.' . $stylesExt,
				$styles
			);


			if ( !empty($js) ) {
				file_put_contents(
					FRONT . '/' . $jsDir . '/' . $oldCompName . '.' . $jsExt,
					$js
				);

				$FileService->editName(
					FRONT . '/' . $jsDir . '/' . $oldCompName . '.' . $jsExt,
					FRONT . '/' . $jsDir . '/' . $compName . '.' . $jsExt
				);

				//Change js comp comment string
				$FileService->stringReplace(
					FRONT . '/' . $jsDir . '/' . $compName . '.' . $jsExt,
					'/* ' . $jsDir . '/' . $oldCompName .'.'.$jsExt.' */',
					'/* ' . $jsDir . '/' . $compName .'.'.$jsExt.' */'
				);

			}










			//Change style comp name
			$FileService->editName(
				FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $oldCompName . '.' . $stylesExt,
				FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $compName . '.' . $stylesExt
			);



			//Change component comp name
			$FileService->editName(
				FRONT . '/' . $markupDir . '/' . $folderPath . '/' . $oldCompName . '.' . $markupExt,
				FRONT . '/' . $markupDir . '/' . $folderPath . '/' . $compName . '.' . $markupExt
			);



			//Change style comp root import string
			$FileService->stringReplace(
				FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $catName . '.' . $stylesExt,
				'@import "_' . $oldCompName . '";',
				'@import "_' . $compName . '";'
			);




			//Change style comp comment string
			$FileService->stringReplace(
				FRONT . '/' . $stylesDir . '/' . $folderPath . '/_' . $compName . '.' . $stylesExt,
				'/* ' . $stylesDir . '/' . $folderPath . '/_' . $oldCompName .'.'. $stylesExt . ' */',
				'/* ' . $stylesDir . '/' . $folderPath . '/_' . $compName .'.'. $stylesExt . ' */'
			);








			//Change markup comp comment string
			$FileService->stringReplace(
				FRONT . '/' . $markupDir . '/' . $folderPath . '/' . $compName . '.' . $markupExt,
				'<!-- ' . $markupDir . '/' . $folderPath . '/' . $oldCompName . '.' . $markupExt . ' -->',
				'<!-- ' . $markupDir . '/' . $folderPath . '/' . $compName . '.' . $markupExt . ' -->'
			);



			if ( $requestJs === 'on' ) {
				$this->addJsAction( $f3, [ "component" => $component->componentId ] );
				$hasJs            = 1;
				$component->hasJs = 1;
			}




//			if ( !empty($js) ) {
//				//Change js comp name
//
//				$FileService->editName(
//					FRONT . '/' . $jsDir . '/' . $oldCompName . '.' . $jsExt,
//					FRONT . '/' . $jsDir . '/' . $compName . '.' . $jsExt
//				);
//
//				//Change js comp comment string
//				$FileService->stringReplace(
//					FRONT . '/' . $jsDir . '/' . $compName . '.' . $jsExt,
//					'/* ' . $jsDir . '/' . $oldCompName . ' */',
//					'/* ' . $jsDir . '/' . $compName .' */'
//				);
//			}









			if ( $component->componentId !== null ) {
				$passThrough['status']  = true;
				$passThrough['message'] = 'Yayy!!!';

				$view = new Component( $component );


				$f3->set( 'comp', $view );

				$navItems = new ItemsService();
				$navItems->prepareItems();


				if(!empty($compCatParentId)){
					$f3->set('currentSubId',$compCatId);
					$f3->set('currentId',$compCatParentId);
				}
				else{
					$f3->set('currentId',$compCatId);
				}

				ob_start();
				echo \Template::instance()->render( 'component/view.htm' );
				$content               = ob_get_clean();


				ob_start();
				echo \Template::instance()->render( 'common/nav.htm' );
				$navbar               = ob_get_clean();

				$passThrough['html']   = [
					[
						'html'      => $content,
						'target'    => '#'.$oldCompName,
						'placement' => 'replace',
						'compId'    => $compId,
						'slug'    => $compSlug,
						'description'    => $description,
						'hasJs'    => $hasJs,
					],
					[
						'html' => $navbar,
						'target'    => '.atomic-fileSystem',
						'placement' => 'replace',
					],

				];



				return $this->renderJSON( $passThrough );

			} else {
				$passThrough['status']  = false;
				$passThrough['message'] = 'shit didn\'t work';
			}
		}

		$this->render( null, $passThrough );

	}









	function addJsAction( $f3, $params ) {


		$passThrough = [];


		$component = new ComponentModel( $this->db );


		if ( isFormRequest() ) {
			$component->load( [ 'componentId = :component', ':component' => $params['component'] ] );

			$component->hasJs = 1;

			$compId = $component->componentId;

			$component->save();

			$compName = $component->name;

			$compSlug = slugify( $compName );


			$jsDir = OptionService::getOption( 'jsDir' );
			$jsExt = OptionService::getOption( 'jsExt' );


			$FileService = new FileService();

			//Create js file
			$FileService->makeFile( FRONT . '/' . $jsDir . '/' . $compSlug . '.' . $jsExt );

			//Create js file location comment string
			$commentString = '/* ' . $jsDir . '/' . $compSlug . '.' . $jsExt . ' */' . "\n\n";

			//Write js file location comment string to file
			$FileService->write( FRONT . '/' . $jsDir . '/' . $compSlug . '.' . $jsExt, $commentString );


			if ( $component->componentId !== null ) {


				$passThrough['status']  = true;
				$passThrough['message'] = 'Yayy!!!';

				$view = new Component( $component );


				$f3->set( 'comp', $view );


				$view = new Component( $component );


				$f3->set( 'comp', $view );


				$passThrough['target']    = '[data-id=' . $compId . ']';
				$passThrough['placement'] = 'replace';
				$passThrough['compId']    = $compId;
				$passThrough['slug']    = $compSlug;


				return $this->template( 'component/view.htm', $passThrough );


			} else {
				$passThrough['status']  = false;
				$passThrough['message'] = 'shit didn\'t work';
			}
		}


		//$this->render('component/add-js.php', $passThrough);


	}

	function editColorAction( $f3, $params ) {


		$passThrough = [];


		$component = new ComponentModel( $this->db );

		if ( isFormRequest() ) {

			$compColor = $f3->get( 'GET.atomic-bgColor' );
			$component->load( [ 'componentId = :component', ':component' => $params['component'] ] );

			$compId = $component->componentId;
			$hasJs  = $component->hasJs;


			if ( empty( $compColor ) ) {
				$component->backgroundColor = null;
			} else {
				$component->backgroundColor = $compColor;
			}


			$component->save();

			$description = htmlspecialchars_decode($component->description);



			if ( $component->componentId !== null ) {
				$passThrough['status']  = true;
				$passThrough['message'] = 'Yayy!!!';

				$view = new Component( $component );


				$f3->set( 'comp', $view );


				$passThrough['target']    = '[data-id=' . $compId . ']';
				$passThrough['placement'] = 'replace';
				$passThrough['compId']    = $compId;

				return $this->template( 'component/view.htm', $passThrough );


			} else {
				$passThrough['status']  = false;
				$passThrough['message'] = 'shit didn\'t work';
			}
		}


	}



	function deleteAction( $f3, $params ) {

		$passThrough = [];


		$component = new ComponentModel( $this->db );
		$category  = new CategoryModel( $this->db );


		$component->load( [ 'componentId = :component', ':component' => $params['compId'] ] );

		$compSlug = $component->slug;
		$compId = $component->componentId;
		$hasJs  = $component->hasJs;




		$compCatId   = $component->categoryId;
		$category->load( [ 'categoryId = :category', ':category' => $compCatId ] );

		$catId = $category->categoryId;
		$catSlug = $category->slug;



		$catParentId = $category->parentCatId;

		//Get Parent Category Info
		if(!empty($catParentId)){
			$categoryParent = new CategoryModel( $this->db );
			$filter = [ 'categoryId= ?', $catParentId ];
			$categoryParent->load( $filter );
			$catParentId = $categoryParent->categoryId;
			$catParentSlug = $categoryParent->slug;


			$dirPath = $catParentSlug.'/'.$catSlug;
		}
		else{
			$dirPath = $catSlug;
		}


		$stylesDir = OptionService::getOption( 'stylesDir' );
		$stylesExt = OptionService::getOption( 'stylesExt' );
		$markupDir = OptionService::getOption( 'markupDir' );
		$markupExt = OptionService::getOption( 'markupExt' );
		$jsDir     = OptionService::getOption( 'jsDir' );
		$jsExt     = OptionService::getOption( 'jsExt' );





		$FileService = new FileService();


		//Delete Component markup file

		$FileService->deleteFile( FRONT . '/' . $markupDir . '/' .$dirPath. '/' .$compSlug.'.'.$markupExt );

		//Delete style import string

		$importString = $FileService->stringBuilder('styleImport', $dirPath, $compSlug);

		$FileService->stringReplace(
			FRONT.'/'.$stylesDir.'/'.$dirPath.'/_'.$catSlug.'.'.$stylesExt,
			$importString,
			''
		);


		//Delete style file
		$FileService->deleteFile( FRONT . '/' . $stylesDir . '/' .$dirPath. '/_' .$compSlug.'.'.$stylesExt );



		if(!empty($hasJs)){
			$FileService->deleteFile( FRONT . '/' . $jsDir . '/' .$compSlug.'.'.$jsExt );
		}




		if ($category->categoryId !== null) {
			$passThrough['status']  = true;
			$passThrough['message'] = 'Yayy!!!';


			$component->erase();

			$navItems = new ItemsService();
			$navItems->prepareItems();


			$f3->set('currentId',$catId);
			$f3->set('dirPath',$dirPath);



			ob_start();
			echo \Template::instance()->render( 'common/nav.htm' );
			$navbar               = ob_get_clean();

			$passThrough['html']   = [
				[
					'html' => $navbar,
					'target'    => '.atomic-fileSystem',
					'placement' => 'replace',
				],

			];

			$passThrough['compSlug']     = $compSlug;



			return $this->renderJSON( $passThrough );









		} else {
			$passThrough['status'] = false;
			$passThrough['message'] = 'shit didn\'t work';
		}







	}




	function screenAction( $f3, $params ) {
		$passThrough = [];

		$component = new ComponentModel( $this->db );

		$component->load( [ 'componentId = :component', ':component' => $params['compId'] ] );


		if ( $component->componentId !== null ) {
			$passThrough['status']  = true;
			$passThrough['message'] = 'Yayy!!!';

			$screen = $component->fullScreen;


			if($screen == null){
				$result = 1;
			}
			else{
				$result = null;
			}


			$component->fullScreen = $result;
			$component->save();


		} else {
			$passThrough['status']  = false;
			$passThrough['message'] = 'shit didn\'t work';
		}


	}



	function singleAction( $f3, $params ) {

		$model = new ComponentModel( \Base::instance()->get( 'db' ) );

		$category  = new CategoryModel( $this->db );


		$filter = [ 'componentId = :component', ':component' => $params['compId'] ];


		$model->load( $filter );

		$catId = $model->categoryId;


		$activeCompId = $model->componentId;


		$category->load( [ 'categoryId = :category', ':category' => $catId ] );

		$compCatParentId = $category->parentCatId;

		//Get Parent Category Name
		$categoryParent = new CategoryModel( $this->db );

		$filter = [ 'categoryId= ?', $compCatParentId ];

		$categoryParent->load( $filter );


		$markupExt = OptionService::getOption( 'markupExt' );


		if(!empty($compCatParentId)){
			$dirPath = $categoryParent->name. ' / ' .$category->name;
		}
		else{
			$dirPath = $category->name. ' / ' .$model->name. '.' .$markupExt;
		}


		/*$catLink = baseAlias('category', ['catId'=>$catId]);

		$f3->set( 'catLink', $catLink );*/


		$view = new Component( $model );

		$f3->set( 'comp', $view );



		$f3->set( 'dirPath', $dirPath );

		$f3->set( 'isSingle', true );


		$f3->set( 'activeCompId', $activeCompId );




















		$navItems = new ItemsService();
		$navItems->prepareItems();

		if(!empty($compCatParentId)){
			$f3->set('currentSubId',$catId);
			$f3->set('currentId',$compCatParentId);
		}
		else{
			$f3->set('currentId',$catId);
		}





		echo \Template::instance()->render('component/single.htm');

	}



}