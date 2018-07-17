<?php

/** @var componentId int */

class CategoryController extends Controller
{


    function indexAction($f3, $params)
    {


        //Get Component DB
        $components = new ComponentModel($this->db);

        //Get Category DB
        $category = new CategoryModel($this->db);




        //$filter = ['name= ?', $params['catSlug']];
        $filter = [ 'categoryId= ?', $params['catId']];



        $category->load($filter);


        $f3->set('category', $category);


        //Get category name
        $catName = $f3->get('category')->name;




        //Get category ID
        $catID = $f3->get('category')->categoryId;





        //Set current category name
        $this->f3->set('catName', $catName);

        //Set current category ID
        $this->f3->set('catID', $catID);



        //Set title tag
        $titleTag = 'Atomic | ' . $catName;
        $this->f3->set('title', $titleTag);

        $f3->set('dirPath', $catName);


        $catComps = $components->find($filter, ['order' => 'sort']);


        //Set components array stuff
        $f3->set('catComponents', $catComps);


        echo $this->render('category/index.php');


    }


    function indexSubAction($f3, $params)
    {


        //Get Component DB
        $components = new ComponentModel($this->db);

        //Get Category DB
        $category = new CategoryModel($this->db);






        $filter = ['categoryId= ?', $params['catSubId']];





        $category->load($filter);


        $f3->set('category', $category);


        //Get category name
        $catName = $category->name;




        //Get category ID
        $catID = $category->categoryId;

        //Set current category name
        $this->f3->set('catName', $catName);

        //Set current category ID
        $this->f3->set('catID', $catID);

        //Set title tag
        $titleTag = 'Atomic | ' .$catName;
        $this->f3->set('title', $titleTag);







        $catComps = $components->find($filter, ['order' => 'sort']);






        $f3->set('catComponents', $catComps);


        //Get Parent Category Name
        $categoryParent = new CategoryModel($this->db);

        $filter = ['categoryId= ?', $params['catId']];

        $categoryParent->load($filter);

        $parentName = $categoryParent->name;




        $f3->set('dirPath', $parentName.'/'.$catName);


        $isSubCat = true;

        $f3->set('isSubCat', $isSubCat);

        echo $this->render('category/index.php');


    }


    function addAction($f3, $params)
    {


        $passThrough = [];


        if (isFormRequest()) {
            $catName = $f3->get('GET.atomic-cat-name');
            $catDescription = $f3->get('GET.atomic-cat-description');

            $category = new CategoryModel($this->db);
            $category->name = filter_var($catName, FILTER_SANITIZE_STRING);
            $category->description = filter_var($catDescription, FILTER_SANITIZE_STRING);
            $category->sort = 1;
            $saved = $category->save();



            $FileSystemService = new FileSystemService();

            $FileSystemService->createCategory($catName);


            if ($saved->categoryId !== null) {
                $passThrough['status'] = true;
                $passThrough['message'] = 'Yayy!!!';


            } else {
                $passThrough['status'] = false;
                $passThrough['message'] = 'shit didn\'t work';
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

            $category = new CategoryModel($this->db);
            $category->name = filter_var($catName, FILTER_SANITIZE_STRING);
            $category->description = filter_var($catDescription, FILTER_SANITIZE_STRING);
            $category->sort = 1;

            $category->parentCatId = $params['catId'];



            $saved = $category->save();


            //Get Parent Category Name
            $categoryParent = new CategoryModel($this->db);

            $filter = ['categoryId= ?', $params['catId']];

            $categoryParent->load($filter);

            $parentName = $categoryParent->name;


            $option = OptionService::get();

            $stylesDir = $option->stylesDir;
            $stylesExt = $option->stylesExt;
            $markupDir = $option->markupDir;



            $FileService = new FileService();

            $FileService->makeDirectory(
                FRONT . '/'.$markupDir.'/'.$parentName.'/'.$catName
            );


            //Create style dir
            $FileService->makeDirectory(
                FRONT . '/'.$stylesDir.'/'.$parentName.'/'.$catName
            );


            //Create style file
            $FileService->write(
                FRONT . '/'.$stylesDir.'/'.$parentName.'/' . $catName . '/_' . $catName . '.'.$stylesExt,
                ''
            );


            //Write import string to root style file
            $importSting = '@import "' . $catName . '/_' . $catName . '";' . "\n";
            $rootScssFile = FRONT . '/'.$stylesDir.'/'.$parentName.'/_'.$parentName.'.'.$stylesExt;
            $FileService->write($rootScssFile, $importSting);


            if ($saved->categoryId !== null) {
                $passThrough['status'] = true;
                $passThrough['message'] = 'Yayy!!!';


            } else {
                $passThrough['status'] = false;
                $passThrough['message'] = 'shit didn\'t work';
            }
        }


        $this->render('category/add.php', $passThrough);


    }




    function editAction($f3, $params)
    {

        $passThrough = [];
        $category = new CategoryModel($this->db);
        $category->load(['categoryId = :category', ':category' => $params['catId']]);






        $oldCatName = $category->name;

        if (isFormRequest('POST')) {

            $catName = $f3->get('POST.atomic-cat-name');
            $catDescription = $f3->get('POST.atomic-cat-description');

            $category->name = filter_var($catName, FILTER_SANITIZE_STRING);
            $category->description = filter_var($catDescription, FILTER_SANITIZE_STRING);


            $category->save();


            $option = OptionService::get();

            $stylesDir = $option->stylesDir;
            $stylesExt = $option->stylesExt;
            $markupDir = $option->markupDir;
            $markupExt = $option->markupExt;



            $FileService = new FileService();





            /*$src = FRONT . '/'.$stylesDir.'/' . $oldCatName;
            $dst = FRONT . '/'.$stylesDir.'/' . $catName;*/


             //$FileSystemService = new FileSystemService();
             //$FileSystemService->recurse_copy($src, $dst);
             //rename($src, FRONT .'/temp/'.$oldCatName);


            //Change directory name - WORKING
            $FileService->editName(
                FRONT . '/'.$stylesDir.'/' . $oldCatName,
                FRONT . '/'.$stylesDir.'/' . $catName
            );





            //Change root style file name
            $FileService->editName(
                FRONT . '/'.$stylesDir.'/' . $catName . '/_' .$oldCatName.'.'.$stylesExt,
                FRONT . '/'.$stylesDir.'/' . $catName . '/_' .$catName.'.'.$stylesExt
            );


            //Change style root import string
            $FileService->stringReplace(
                FRONT . '/'.$stylesDir.'/main.scss',
                '@import "'.$oldCatName.'/_'.$oldCatName.'";',
                '@import "'.$catName.'/_'.$catName.'";'
            );



            //Change each file's comment string
            $FileService->globFindReplace(
                FRONT . '/'.$stylesDir.'/'.$catName.'/_*.'.$stylesExt,
                '/* '.$stylesDir.'/'.$oldCatName.'/',
                '/* '.$stylesDir.'/'.$catName.'/'
            );

            $FileService->globFindReplace(
                FRONT . '/'.$stylesDir.'/'.$catName.'/*/_*.'.$stylesExt,
                '/* '.$stylesDir.'/'.$oldCatName.'/',
                '/* '.$stylesDir.'/'.$catName.'/'
            );




            //Change markup directory name
            $FileService->editName(
                FRONT . '/'.$markupDir.'/' . $oldCatName ,
                FRONT . '/'.$markupDir.'/' . $catName
            );

            //Change each file's comment string
            $FileService->globFindReplace(
                FRONT . '/'.$markupDir.'/'.$catName.'/*.'.$markupExt,
                '<!-- '.$markupDir.'/'.$oldCatName.'/',
                '<!-- '.$markupDir.'/'.$catName.'/'
            );


            //Change each file's comment string
            $FileService->globFindReplace(
                FRONT . '/'.$markupDir.'/'.$catName.'/*/*.'.$markupExt,
                '<!-- '.$markupDir.'/'.$oldCatName.'/',
                '<!-- '.$markupDir.'/'.$catName.'/'
            );




            if ($category->categoryId !== null) {
                $passThrough['status'] = true;
                $passThrough['message'] = 'Yayy!!!';


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
        $parentName = $categoryParent->name;



        $oldCatName = $category->name;

        if (isFormRequest('POST')) {

            $catName = $f3->get('POST.atomic-cat-name');
            $catDescription = $f3->get('POST.atomic-cat-description');

            $category->name = filter_var($catName, FILTER_SANITIZE_STRING);
            $category->description = filter_var($catDescription, FILTER_SANITIZE_STRING);


            $category->save();




            $option = OptionService::get();

            $stylesDir = $option->stylesDir;
            $stylesExt = $option->stylesExt;
            $markupDir = $option->markupDir;
            $markupExt = $option->markupExt;



            $FileService = new FileService();


            //Change style directory name
            $FileService->editName(
                FRONT . '/'.$stylesDir.'/'.$parentName.'/' . $oldCatName ,
                FRONT . '/'.$stylesDir.'/'.$parentName.'/' . $catName
            );

            //Change root style file name
            $FileService->editName(
                FRONT . '/'.$stylesDir.'/'.$parentName.'/' . $catName . '/_' .$oldCatName.'.'.$stylesExt,
                FRONT . '/'.$stylesDir.'/'.$parentName.'/' . $catName . '/_' .$catName.'.'.$stylesExt
            );


            $FileService->stringReplace(
                FRONT . '/'.$stylesDir.'/'.$parentName.'/_'.$parentName.'.'.$stylesExt,
                '@import "'.$oldCatName.'/_'.$oldCatName.'";',
                '@import "'.$catName.'/_'.$catName.'";'
            );

            //Change each file's comment string
            $FileService->globFindReplace(
                FRONT . '/'.$stylesDir.'/'.$parentName.'/'.$catName.'/_*.'.$stylesExt,
                '/* '.$stylesDir.'/'.$parentName.'/'.$oldCatName.'/',
                '/* '.$stylesDir.'/'.$parentName.'/'.$catName.'/'
            );


            //Change markup directory name
            $FileService->editName(
                FRONT . '/'.$markupDir.'/'.$parentName.'/' . $oldCatName ,
                FRONT . '/'.$markupDir.'/'.$parentName.'/' . $catName
            );

            //Change each file's comment string
            $FileService->globFindReplace(
                FRONT . '/'.$markupDir.'/'.$parentName.'/'.$catName.'/*.'.$markupExt,
                '<!-- '.$markupDir.'/'.$parentName.'/'.$oldCatName.'/',
                '<!-- '.$markupDir.'/'.$parentName.'/'.$catName.'/'
            );





            if ($category->categoryId !== null) {
                $passThrough['status'] = true;
                $passThrough['message'] = 'Yayy!!!';


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

        $category = new CategoryModel($this->db);

        $filter = ['categoryId= ?', $params['catId']];

        $category->load($filter);


        $f3->set('category', $category);


        $catName = $f3->get('category');


        $f3->set('catName', $catName->name);


        $f3->set('action', 'DELETE');


        $template = \View::instance();
        echo $template->render('category/delete.php');

    }


}