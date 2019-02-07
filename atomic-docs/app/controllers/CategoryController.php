<?php

/** @var componentId int */

class CategoryController extends Controller
{


	/**
	 * @param \Base $f3
	 * @param $params
	 */
    function indexAction($f3, $params)
    {


        //Get Component DB
        $components = new ComponentModel($this->db);

        //Get Category DB
        $category = new CategoryModel($this->db);



        $filter = [ 'categoryId= ?', $params['catId']];



        $category->load($filter);


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
        $this->f3->set('catName', $catSlug);

        //Set current category ID
        $this->f3->set('catID', $catID);

        //Set current cat slug
        $this->f3->set('slug', $slug);


        //Set current cat description
        $this->f3->set('catDescription', $catDescription);









        //Set title tag
        $titleTag = 'Atomic | ' . $catSlug;
        $this->f3->set('title', $titleTag);

        $f3->set('dirPath', $catSlug);


        $catComps = $components->find($filter, ['order' => 'sort']);
		$compViews = [];
        foreach ($catComps as $comp){



        	$compViews[] = new Component($comp);


        }

        //Set components array stuff
        $f3->set('catComponents', $compViews);




	    $this->preparePageBarLinks($f3, $catID);




	    echo \Template::instance()->render('category/index.htm');




    }







    function preparePageBarLinks($f3,$catID){
	    //Edit category link
	    $editLink = baseAlias('editCategory', $catID);
	    $f3->set('editLink', $editLink);

	    //Add sub-category link
	    $addSubCatLink = baseAlias('addSubCategory', $catID);
	    $f3->set('addSubCatLink', $addSubCatLink);

	    //Add component link
	    $addCompLink = baseAlias('addComponent', $catID);
	    $f3->set('addCompLink', $addCompLink);

	    //Delete category link

	    $deleteCatLink = baseAlias('deleteCategory', $catID);
	    $f3->set('deleteCategory', $deleteCatLink);


    }




    function indexSubAction($f3, $params)
    {


        //Get Component DB
        $components = new ComponentModel($this->db);

        //Get Category DB
        $category = new CategoryModel($this->db);


        $filter = ['categoryId= ?', $params['catSubId']];

        $subId = $params['catSubId'];

        //echo $subId;


        $category->load($filter);


        $f3->set('category', $category);


        //Get category slug
        $catSlug = $category->slug;

        //Get category name
        $catName = $category->name;


        //Get category ID
        $catID = $category->categoryId;

        //Get parent ID
	    $parentID = $category->parentCatId;






        //Set current category name
        $this->f3->set('catName', $catName);

        //Set current category ID
        $this->f3->set('catID', $catID);







        //Set title tag
        $titleTag = 'Atomic | ' .$catSlug;
        $this->f3->set('title', $titleTag);


        $catComps = $components->find($filter, ['order' => 'sort']);


        $f3->set('catComponents', $catComps);


        //Get Parent Category Name
        $categoryParent = new CategoryModel($this->db);


	    $parentFilter = ['categoryId= ?', $parentID];

        $categoryParent->load($parentFilter);

        $parentName = $categoryParent->name;



        $parentID = $categoryParent->categoryId;


	    $f3->set('dirPath', $parentName.' / '.$catName);



	    $catComps = $components->find($filter, ['order' => 'sort']);



	    $compViews = [];
	    foreach ($catComps as $comp){
		    $comp->description = htmlspecialchars_decode($comp->description);
		    $compViews[] = new Component($comp);
	    }


	    $f3->set('catComponents', $compViews);



        $isSubCat = true;

        $f3->set('isSubCat', $isSubCat);








	    //BUILD PAGEBAR LINKS

	    //Edit category link
	    $editLink = baseAlias('editSubCategory', array('parentId'=>$parentID, 'catId'=>$catID));

	    $f3->set('editLink', $editLink);

	    //Add component link
	    $addCompLink = baseAlias('addComponent', $catID);
	    $f3->set('addCompLink', $addCompLink);



	    //Add component link
	    $addCompLink = baseAlias('addSubComponent', array('parentId'=>$parentID, 'catId'=>$catID));
	    $f3->set('addCompLink', $addCompLink);

	   /* $deleteCatLink = baseAlias('deleteCategory', $subId);
	    $f3->set('deleteCategory', $deleteCatLink);

	    echo $deleteCatLink;*/



        //echo $this->render('category/index.php');
	    echo \Template::instance()->render('category/index.htm');


    }


    function addAction($f3, $params)
    {

        $passThrough = [];

        if (isFormRequest()) {
            $catName = $f3->get('GET.atomic-cat-name');
            $catDescription = $f3->get('GET.atomic-cat-description');

            $catSlug = slugify($catName);

            $category = new CategoryModel($this->db);
            $category->name = filter_var($catName, FILTER_SANITIZE_STRING);
            $category->slug = filter_var($catSlug, FILTER_SANITIZE_STRING);
            $category->description = filter_var($catDescription, FILTER_SANITIZE_STRING);
            $category->sort = 1;


            $category->save();

	        $catId = $category->categoryId;

            $FileSystemService = new FileSystemService();

            $FileSystemService->createCategory($catSlug);

	        $catLink = baseAlias('category', ['catId'=>$catId]);


	        if(!$category->dry()){
	        	$this->renderJSON(['redirect'=>$catLink]);
	        }
	        else{
		        $this->renderJSON(['silly'=>'fat mark']);
	        }


        }


        $this->render('category/add.php', $passThrough);




    }

    function addSubAction($f3, $params)
    {


        $passThrough = [];




        if (isFormRequest()) {
            $catName = $f3->get('GET.atomic-cat-name');
            $catDescription = $f3->get('GET.atomic-cat-description');

            $catSlug = slugify($catName);

            $category = new CategoryModel($this->db);
            $category->name = filter_var($catName, FILTER_SANITIZE_STRING);
            $category->slug = filter_var($catSlug, FILTER_SANITIZE_STRING);
            $category->description = filter_var($catDescription, FILTER_SANITIZE_STRING);
            $category->sort = 1;

            $category->parentCatId = $params['catId'];



            $saved = $category->save();

            $catId = $category->categoryId;








            //Get Parent Category Name
            $categoryParent = new CategoryModel($this->db);

            $filter = ['categoryId= ?', $params['catId']];

            $categoryParent->load($filter);

            $parentSlug = $categoryParent->slug;
            $parentCatId = $categoryParent->categoryId;


            $stylesDir = OptionService::getOption('stylesDir');
            $stylesExt = OptionService::getOption('stylesExt');
            $markupDir = OptionService::getOption('markupDir');



            $FileService = new FileService();

            $FileService->makeDirectory(
                FRONT . '/'.$markupDir.'/'.$parentSlug.'/'.$catSlug
            );


            //Create style dir
            $FileService->makeDirectory(
                FRONT . '/'.$stylesDir.'/'.$parentSlug.'/'.$catSlug
            );


            //Create style file
            $FileService->write(
                FRONT . '/'.$stylesDir.'/'.$parentSlug.'/' . $catSlug . '/_' . $catSlug . '.'.$stylesExt,
                ''
            );


            //Write import string to root style file
            $importSting = '@import "' . $catSlug . '/_' . $catSlug . '";' . "\n";
            $rootScssFile = FRONT . '/'.$stylesDir.'/'.$parentSlug.'/_'.$parentSlug.'.'.$stylesExt;
            $FileService->write($rootScssFile, $importSting);



	        $catLink = baseAlias('categorySub', ['catId'=>$parentCatId, 'catSubId'=>$catId]);





	        if(!$category->dry()){
		        $this->renderJSON(['redirect'=>$catLink]);
	        }
	        else{
		        $this->renderJSON(['silly'=>'fat mark']);
	        }


            /*if ($saved->categoryId !== null) {
                $passThrough['status'] = true;
                $passThrough['message'] = 'Yayy!!!';


            } else {
                $passThrough['status'] = false;
                $passThrough['message'] = 'shit didn\'t work';
            }*/
        }


        $this->render('category/add.php', $passThrough);


    }




    function editAction($f3, $params)
    {

        $passThrough = [];
        $category = new CategoryModel($this->db);
        $category->load(['categoryId = :category', ':category' => $params['catId']]);






        $oldCatName = $category->slug;
        $catId = $category->categoryId;









        if (isFormRequest('POST')) {

            $catName = $f3->get('POST.atomic-cat-name');
            $catDescription = $f3->get('POST.atomic-cat-description');

	        $catSlug = slugify($catName);

            $category->name = filter_var($catName, FILTER_SANITIZE_STRING);
            $category->slug = filter_var($catSlug, FILTER_SANITIZE_STRING);

            $category->description = filter_var($catDescription, FILTER_SANITIZE_STRING);


            $category->save();

	        $catName = $category->name;



	        $stylesDir = OptionService::getOption('stylesDir');
	        $stylesExt = OptionService::getOption('stylesExt');
	        $markupDir = OptionService::getOption('markupDir');
	        $markupExt = OptionService::getOption('markupExt');






			$FileService = new FileService();



            //Change directory name - WORKING
            $FileService->editName(
                FRONT . '/'.$stylesDir.'/' . $oldCatName,
                FRONT . '/'.$stylesDir.'/' . $catSlug
            );

            //Change root style file name
            $FileService->editName(
                FRONT . '/'.$stylesDir.'/' . $catSlug . '/_' .$oldCatName.'.'.$stylesExt,
                FRONT . '/'.$stylesDir.'/' . $catSlug . '/_' .$catSlug.'.'.$stylesExt
            );

            //Change style root import string
            $FileService->stringReplace(
                FRONT . '/'.$stylesDir.'/main.scss',
                '@import "'.$oldCatName.'/_'.$oldCatName.'";',
                '@import "'.$catSlug.'/_'.$catSlug.'";'
            );

            //Change each file's comment string
            $FileService->globFindReplace(
                FRONT . '/'.$stylesDir.'/'.$catSlug.'/_*.'.$stylesExt,
                '/* '.$stylesDir.'/'.$oldCatName.'/',
                '/* '.$stylesDir.'/'.$catSlug.'/'
            );



            //Change markup directory name
            $FileService->editName(
                FRONT . '/'.$markupDir.'/' . $oldCatName ,
                FRONT . '/'.$markupDir.'/' . $catSlug
            );

            //Change each file's comment string
            $FileService->globFindReplace(
                FRONT . '/'.$markupDir.'/'.$catSlug.'/*.'.$markupExt,
                '<!-- '.$markupDir.'/'.$oldCatName.'/',
                '<!-- '.$markupDir.'/'.$catSlug.'/'
            );

            //Change each file's comment string
            $FileService->globFindReplace(
                FRONT . '/'.$markupDir.'/'.$catSlug.'/*/*.'.$markupExt,
                '<!-- '.$markupDir.'/'.$oldCatName.'/',
                '<!-- '.$markupDir.'/'.$catSlug.'/'
            );




            if ($category->categoryId !== null) {
	            $passThrough['status']  = true;
	            $passThrough['message'] = 'Yayy!!!';



	            $navItems = new ItemsService();
	            $navItems->prepareItems();


	            $f3->set('currentId',$catId);
	            $f3->set('dirPath',$catName);
	            $this->preparePageBarLinks($f3, $catId);





	            ob_start();
	            echo \Template::instance()->render( 'common/pageBar.htm' );
	            $pageBar               = ob_get_clean();


	            ob_start();
	            echo \Template::instance()->render( 'common/nav.htm' );
	            $navbar               = ob_get_clean();

	            $passThrough['html']   = [
		            [
			            'html'      => $pageBar,
			            'target'    => '.atomic-pageBarWrap',
			            'placement' => 'replace',
		            ],
		            [
			            'html' => $navbar,
			            'target'    => '.atomic-fileSystem',
			            'placement' => 'replace',
		            ],

	            ];

	            return $this->renderJSON( $passThrough );








            } else {
                $passThrough['status'] = false;
                $passThrough['message'] = 'shit didn\'t work';
            }
        }




        $f3->set('category', $category);


        $this->render('category/edit.php', $passThrough);

    }




    function editSubAction($f3, $params)
    {

        $passThrough = [];
        $category = new CategoryModel($this->db);
        $category->load(['categoryId = :category', ':category' => $params['catId']]);


        $parentId = $category->parentCatId;

        //Get Parent Category Name
        $categoryParent = new CategoryModel($this->db);
        $filter = ['categoryId= ?', $parentId];
        $categoryParent->load($filter);
        $parentName = $categoryParent->slug;
        $parentDisplayName = $categoryParent->name;



        $oldCatName = $category->slug;

        if (isFormRequest('POST')) {

            $catName = $f3->get('POST.atomic-cat-name');
            $catDescription = $f3->get('POST.atomic-cat-description');

            $catSlug = slugify($catName);

            $category->name = filter_var($catName, FILTER_SANITIZE_STRING);
            $category->slug = filter_var($catSlug, FILTER_SANITIZE_STRING);
            $category->description = filter_var($catDescription, FILTER_SANITIZE_STRING);


            $category->save();

            $catId = $category->categoryId;

	        $editLink = baseAlias('editCategory', $catId);

	        $f3->set('editLink', $editLink);







	        $dirPath = $parentDisplayName. '/' .$category->name;



	        $stylesDir = OptionService::getOption('stylesDir');
	        $stylesExt = OptionService::getOption('stylesExt');
	        $markupDir = OptionService::getOption('markupDir');
	        $markupExt = OptionService::getOption('markupExt');



            $FileService = new FileService();


            //Change style directory name
            $FileService->editName(
                FRONT . '/'.$stylesDir.'/'.$parentName.'/' . $oldCatName ,
                FRONT . '/'.$stylesDir.'/'.$parentName.'/' . $catSlug
            );

            //Change root style file name
            $FileService->editName(
                FRONT . '/'.$stylesDir.'/'.$parentName.'/' . $catSlug . '/_' .$oldCatName.'.'.$stylesExt,
                FRONT . '/'.$stylesDir.'/'.$parentName.'/' . $catSlug . '/_' .$catSlug.'.'.$stylesExt
            );

			//Change Import string
            $FileService->stringReplace(
                FRONT . '/'.$stylesDir.'/'.$parentName.'/_'.$parentName.'.'.$stylesExt,
                '@import "'.$oldCatName.'/_'.$oldCatName.'";',
                '@import "'.$catSlug.'/_'.$catSlug.'";'
            );

            //Change each file's comment string
            $FileService->globFindReplace(
                FRONT . '/'.$stylesDir.'/'.$parentName.'/'.$catSlug.'/_*.'.$stylesExt,
                '/* '.$stylesDir.'/'.$parentName.'/'.$oldCatName.'/',
                '/* '.$stylesDir.'/'.$parentName.'/'.$catSlug.'/'
            );




            //Change markup directory name
            $FileService->editName(
                FRONT . '/'.$markupDir.'/'.$parentName.'/' . $oldCatName ,
                FRONT . '/'.$markupDir.'/'.$parentName.'/' . $catSlug
            );

            //Change each file's comment string
            $FileService->globFindReplace(
                FRONT . '/'.$markupDir.'/'.$parentName.'/'.$catSlug.'/*.'.$markupExt,
                '<!-- '.$markupDir.'/'.$parentName.'/'.$oldCatName.'/',
                '<!-- '.$markupDir.'/'.$parentName.'/'.$catSlug.'/'
            );





            if ($category->categoryId !== null) {
	            $passThrough['status']  = true;
	            $passThrough['message'] = 'Yayy!!!';

	            $navItems = new ItemsService();
	            $navItems->prepareItems();

	            $f3->set('currentSubId',$catId);
	            $f3->set('currentId',$parentId);
	            $f3->set('dirPath',$dirPath);
	            $this->preparePageBarLinks($f3, $catId);


	            ob_start();
	            echo \Template::instance()->render( 'common/pageBar.htm' );
	            $pageBar               = ob_get_clean();


	            ob_start();
	            echo \Template::instance()->render( 'common/nav.htm' );
	            $navbar               = ob_get_clean();

	            $passThrough['html']   = [
		            [
			            'html'      => $pageBar,
			            'target'    => '.atomic-pageBarWrap',
			            'placement' => 'replace',
		            ],
		            [
			            'html' => $navbar,
			            'target'    => '.atomic-fileSystem',
			            'placement' => 'replace',
		            ],

	            ];

	            return $this->renderJSON( $passThrough );


            } else {
                $passThrough['status'] = false;
                $passThrough['message'] = 'shit didn\'t work';
            }
        }




        $f3->set('category', $category);


        $this->render('category/edit.php', $passThrough);

    }


    function deleteAction($f3, $params)
    {

	    $passThrough = [];

        $category = new CategoryModel($this->db);
        $filter = ['categoryId= ?', $params['catId']];
	    $subCatFilter = ['parentCatId= ?', $params['catId']];
        $subCats = $category->find($subCatFilter);
	    $category->load($filter);


	    $component = new ComponentModel($this->db);
	    $compFilter = ['categoryId= ?', $params['catId']];
	    $comps = $component->find($compFilter);

	    $subCatIds = [];
	    foreach ($subCats as $sc){

	    }




        $catSlug = $category->slug;

	    $stylesDir = OptionService::getOption( 'stylesDir' );
	    $stylesExt = OptionService::getOption( 'stylesExt' );

        $fileSystemService = new FileSystemService();

        $fileService = new FileService();


	    //Delete component comps and sub cats
	    $fileSystemService->deleteCat('markup', $catSlug);

	    //Delete import strings
	    $importString = $fileService->stringBuilder('styleImport', $catSlug, $catSlug);


	    $fileService->stringReplace(
		    FRONT.'/'.$stylesDir.'/main.'.$stylesExt,
		    $importString,
		    ''
	    );

	    //Delete styles comps and sub cats
	    $fileSystemService->deleteCat('styles', $catSlug);





	    if ( $category->categoryId !== null ) {
		    $passThrough['status']  = true;
		    $passThrough['message'] = 'Yayy!!!';


		    if(!empty($comps)){
			    foreach ( $comps as $c ) {
				    $c->erase();
			    }
		    }

		    if (!empty($subCats)){
			    foreach ( $subCats as $sc ) {
				    $sc->erase();
			    }
		    }

		    if(!empty($category)){
		    	$category->erase();
		    }




		    /*ob_start();
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
				    'target'    => '.atomic-dash__content',
				    'placement' => 'prepend',
			    ],
			    [
				    'html' => $navbar,
				    'target'    => '.atomic-fileSystem',
				    'placement' => 'replace',
			    ],

		    ];


		    $passThrough['compId']    = $compId;
		    $passThrough['hasJs']     = $hasJs;

		    return $this->renderJSON( $passThrough );*/


	    } else {
		    $passThrough['status']  = false;
		    $passThrough['message'] = 'shit didn\'t work';
	    }









    }


}