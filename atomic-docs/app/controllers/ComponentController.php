<?php

class ComponentController extends Controller{




    function addAction($f3, $params){


        $passThrough = [];


        $component= new ComponentModel($this->db);
        $category = new CategoryModel($this->db);
        $category->load(['categoryId = :category', ':category' => $params['catId']]);

        $compCatName = $category->name;
        $compCatID = $category->categoryId;
        $compCatParentId = $category->parentCatId;

        //Get Parent Category Name
        $categoryParent = new CategoryModel($this->db);

        $filter = ['categoryId= ?', $compCatParentId];

        $categoryParent->load($filter);

        $parentName = $categoryParent->name;


        if (isFormRequest('POST')) {


            $compName = $f3->get('POST.atomic-comp-name');
            $compDescription = $f3->get('POST.atomic-comp-description');

            $compBgColor = $f3->get('POST.atomic-bgColor');
            $compJs = $f3->get('POST.atomic-comp-js');

            $component->name = filter_var($compName, FILTER_SANITIZE_STRING);
            $component->description = filter_var($compDescription, FILTER_SANITIZE_STRING);
            $component->categoryId = $compCatID;
            $component->sort = 1;
            $component->backgroundColor = $compBgColor;


            $component->save();


            if($compJs === 'on'){

                $this->addJsAction($f3, ["component"=>$component->componentId]);

            }



            $option = OptionService::get();

            $stylesDir = $option->stylesDir;
            $stylesExt = $option->stylesExt;
            $markupDir = $option->markupDir;
            $markupExt = $option->markupExt;


            $FileService = new FileService();


            if(!empty($parentName)){
                $folderPath = $parentName.'/'.$compCatName;
            }
            else{
                $folderPath = $compCatName;
            }




            //Create style file
            $FileService->makeFile(FRONT .'/'.$stylesDir.'/'.$folderPath.'/_'.$compName.'.'.$stylesExt);


            //Create style import string
            $importSting = '@import "_'.$compName.'";';

            //Write style import string to root file
            $FileService->write(FRONT .'/'.$stylesDir.'/'.$folderPath.'/_'.$compCatName.'.scss', $importSting);



            //Create style file location comment string
            $commentString = '/* '.$stylesDir.'/'.$folderPath.'/_'.$compName.'.'.$stylesExt.' */'. "\n\n";

            //Write style file location comment string to file
            $FileService->write(FRONT .'/'.$stylesDir.'/'.$folderPath.'/_'.$compName.'.'.$stylesExt, $commentString);



            //Create markup file
            $FileService->makeFile(FRONT .'/'.$markupDir.'/'.$folderPath.'/'.$compName.'.'.$markupExt);


            //Create markup file location comment string
            $commentString = '<!-- '.$markupDir.'/'.$folderPath.'/'.$compName.'.'.$markupExt.' -->'. "\n\n";

            //Write markup file location comment string to file
            $FileService->write(FRONT .'/'.$markupDir.'/'.$folderPath.'/'.$compName.'.'.$markupExt, $commentString);







            if($component->componentId !== null){
                $passThrough['status'] = true;
                $passThrough['message'] = 'Yayy!!!';


            }
            else {
                $passThrough['status'] = false;
                $passThrough['message'] = 'shit didn\'t work';
            }
        }


        $this->render('component/add.php', $passThrough);


    }



    function editActionBAK($f3, $params)
    {

        $passThrough = [];


        $component = new ComponentModel($this->db);
        $category = new CategoryModel($this->db);



        $component->load(['componentId = :component', ':component' => $params['compId']]);


        $oldCompName = $component->name;
        $compCatId = $component->categoryId;


        $category->load(['categoryId = :category', ':category' => $compCatId]);

        $catName = $category->name;
        $compCatParentId = $category->parentCatId;



        //Get Parent Category Name
        $categoryParent = new CategoryModel($this->db);

        $filter = ['categoryId= ?', $compCatParentId];

        $categoryParent->load($filter);

        $parentName = $categoryParent->name;


        if (isFormRequest('POST')) {

            $compName = $f3->get('POST.atomic-comp-name');
            $compDescription = $f3->get('POST.atomic-comp-description');
            $compBgColor = $f3->get('POST.atomic-bgColor');
            $compJs = $f3->get('POST.atomic-comp-js');

            $component->name = filter_var($compName, FILTER_SANITIZE_STRING);
            $component->description = filter_var($compDescription, FILTER_SANITIZE_STRING);
            $component->backgroundColor = $compBgColor;




            $component->save();

            if($compJs === 'on'){
                $this->addJsAction($f3, ["component"=>$component->componentId]);

            }


            if(!empty($parentName)){
                $folderPath = $parentName.'/'.$catName;
            }
            else{
                $folderPath = $catName;
            }



            $option = OptionService::get();

            $stylesDir = $option->stylesDir;
            $stylesExt = $option->stylesExt;
            $markupDir = $option->markupDir;
            $markupExt = $option->markupExt;
            $jsDir = $option->jsDir;
            $jsExt = $option->jsExt;


            $FileService = new FileService();


            //Change style comp name
            $FileService->editName(
                FRONT . '/'.$stylesDir.'/' . $catName .'/_'. $oldCompName .'.'.$stylesExt,
                FRONT . '/'.$stylesDir.'/' . $catName .'/_'. $compName .'.'.$stylesExt
            );

            //Change style comp root import string
            $FileService->stringReplace(
                FRONT . '/'.$stylesDir.'/'.$catName.'/_'.$catName.'.'.$stylesExt,
                '@import "_'.$oldCompName.'";',
                '@import "_'.$compName.'";'
            );

            //Change style comp comment string
            $FileService->stringReplace(
                FRONT . '/'.$stylesDir.'/'.$catName.'/_'.$compName.'.'.$stylesExt,
                '/* '.$stylesDir.'/'.$catName.'/_'.$oldCompName,
                '/* '.$stylesDir.'/'.$catName.'/_'.$compName
            );


            //Change component comp name
            $FileService->editName(
                FRONT . '/'.$markupDir.'/' . $catName .'/'. $oldCompName .'.'.$markupExt,
                FRONT . '/'.$markupDir.'/' . $catName .'/'. $compName .'.'.$markupExt
            );

            //Change markup comp comment string
            $FileService->stringReplace(
                FRONT . '/'.$markupDir.'/'.$catName.'/'.$compName.'.'.$markupExt,
                '<!-- '.$markupDir.'/'.$catName.'/'.$oldCompName.'.'.$markupExt.' -->',
                '<!-- '.$markupDir.'/'.$catName.'/'.$compName.'.'.$markupExt.' -->'
            );

            //Change js comp name
            $FileService->editName(
                FRONT . '/'.$jsDir.'/'. $oldCompName .'.'.$jsExt,
                FRONT . '/'.$jsDir.'/'. $compName .'.'.$jsExt
            );

            //Change js comp comment string
            $FileService->stringReplace(
                FRONT . '/'.$jsDir.'/'.$compName.'.'.$jsExt,
                '/* '.$jsDir.'/'.$oldCompName,
                '/* '.$jsDir.'/'.$compName
            );


            if ($category->categoryId !== null) {
                $passThrough['status'] = true;
                $passThrough['message'] = 'Yayy!!!';


            } else {
                $passThrough['status'] = false;
                $passThrough['message'] = 'shit didn\'t work';
            }
        }




        $f3->set('component', $component);


        $this->render('component/edit.php', $passThrough);

    }


    function editAction($f3, $params)
    {

        $passThrough = [];


        $component = new ComponentModel($this->db);
        $category = new CategoryModel($this->db);



        $component->load(['componentId = :component', ':component' => $params['compId']]);


        $hasJs = $component->hasJs;


        $oldCompName = $component->name;
        $compCatId = $component->categoryId;


        $category->load(['categoryId = :category', ':category' => $compCatId]);

        $catName = $category->name;
        $compCatParentId = $category->parentCatId;



        //Get Parent Category Name
        $categoryParent = new CategoryModel($this->db);

        $filter = ['categoryId= ?', $compCatParentId];

        $categoryParent->load($filter);

        $parentName = $categoryParent->name;


        if (isFormRequest('POST')) {

            $compName = $f3->get('POST.atomic-comp-name');
            $compDescription = $f3->get('POST.atomic-comp-description');
            $compBgColor = $f3->get('POST.atomic-bgColor');
            $compJs = $f3->get('POST.atomic-comp-js');

            $component->name = filter_var($compName, FILTER_SANITIZE_STRING);
            $component->description = filter_var($compDescription, FILTER_SANITIZE_STRING);
            $component->backgroundColor = $compBgColor;




            $component->save();

            if($compJs === 'on'){
                $this->addJsAction($f3, ["component"=>$component->componentId]);

            }


            if(!empty($parentName)){
                $folderPath = $parentName.'/'.$catName;
            }
            else{
                $folderPath = $catName;
            }



            $option = OptionService::get();

            $stylesDir = $option->stylesDir;
            $stylesExt = $option->stylesExt;
            $markupDir = $option->markupDir;
            $markupExt = $option->markupExt;
            $jsDir = $option->jsDir;
            $jsExt = $option->jsExt;


            $FileService = new FileService();


            //Change style comp name
            $FileService->editName(
                FRONT . '/'.$stylesDir.'/' . $folderPath .'/_'. $oldCompName .'.'.$stylesExt,
                FRONT . '/'.$stylesDir.'/' . $folderPath .'/_'. $compName .'.'.$stylesExt
            );

            //Change style comp root import string
            $FileService->stringReplace(
                FRONT . '/'.$stylesDir.'/'.$folderPath.'/_'.$catName.'.'.$stylesExt,
                '@import "_'.$oldCompName.'";',
                '@import "_'.$compName.'";'
            );

            //Change style comp comment string
            $FileService->stringReplace(
                FRONT . '/'.$stylesDir.'/'.$folderPath.'/_'.$compName.'.'.$stylesExt,
                '/* '.$stylesDir.'/'.$folderPath.'/_'.$oldCompName,
                '/* '.$stylesDir.'/'.$folderPath.'/_'.$compName
            );


            //Change component comp name
            $FileService->editName(
                FRONT . '/'.$markupDir.'/' . $folderPath .'/'. $oldCompName .'.'.$markupExt,
                FRONT . '/'.$markupDir.'/' . $folderPath .'/'. $compName .'.'.$markupExt
            );

            //Change markup comp comment string
            $FileService->stringReplace(
                FRONT . '/'.$markupDir.'/'.$folderPath.'/'.$compName.'.'.$markupExt,
                '<!-- '.$markupDir.'/'.$folderPath.'/'.$oldCompName.'.'.$markupExt.' -->',
                '<!-- '.$markupDir.'/'.$folderPath.'/'.$compName.'.'.$markupExt.' -->'
            );




            if($hasJs !== null){
                //Change js comp name
                $FileService->editName(
                    FRONT . '/'.$jsDir.'/'. $oldCompName .'.'.$jsExt,
                    FRONT . '/'.$jsDir.'/'. $compName .'.'.$jsExt
                );

                //Change js comp comment string
                $FileService->stringReplace(
                    FRONT . '/'.$jsDir.'/'.$compName.'.'.$jsExt,
                    '/* '.$jsDir.'/'.$oldCompName,
                    '/* '.$jsDir.'/'.$compName
                );
            }








            if ($category->categoryId !== null) {
                $passThrough['status'] = true;
                $passThrough['message'] = 'Yayy!!!';


            } else {
                $passThrough['status'] = false;
                $passThrough['message'] = 'shit didn\'t work';
            }
        }




        $f3->set('component', $component);


        $this->render('component/edit.php', $passThrough);

    }


    function addJsAction($f3, $params){


        $passThrough = [];


        $component= new ComponentModel($this->db);

        if (isFormRequest()){
            $component->load(['componentId = :component', ':component' => $params['component']]);

            $component->hasJs = 1;

            $component->save();

            $compName = $component->name;

            $option = OptionService::get();

            $jsDir = $option->jsDir;
            $jsExt = $option->jsExt;


            $FileService = new FileService();

            //Create js file
            $FileService->makeFile(FRONT .'/'.$jsDir.'/'.$compName.'.'.$jsExt);

            //Create js file location comment string
            $commentString = '/* '.$jsDir.'/'.$compName.'.'.$jsExt.' */'. "\n\n";

            //Write js file location comment string to file
            $FileService->write(FRONT .'/'.$jsDir.'/'.$compName.'.'.$jsExt, $commentString);







            if($component->componentId !== null){
                $passThrough['status'] = true;
                $passThrough['message'] = 'Yayy!!!';


            }
            else {
                $passThrough['status'] = false;
                $passThrough['message'] = 'shit didn\'t work';
            }
        }


        //$this->render('component/add-js.php', $passThrough);


    }


    function editColorAction($f3, $params){


        $passThrough = [];


        $component= new ComponentModel($this->db);

        if (isFormRequest()){

            $compColor= $f3->get('GET.atomic-bgColor');


            $component->load(['componentId = :component', ':component' => $params['component']]);


            if(empty($compColor)){
                $component->backgroundColor = null;
            }
            else{
                $component->backgroundColor = $compColor;
            }


            $component->save();



            if($component->componentId !== null){
                $passThrough['status'] = true;
                $passThrough['message'] = 'Yayy!!!';


            }
            else {
                $passThrough['status'] = false;
                $passThrough['message'] = 'shit didn\'t work';
            }
        }



    }


    function editSourceAction($f3, $params){

        $passThrough = [];

        $component = new ComponentModel($this->db);
        $category = new CategoryModel($this->db);


        if (isFormRequest()){

            $markup= $f3->get('GET.atomic-markup-field');
            $styles= $f3->get('GET.atomic-styles-field');
            $js= $f3->get('GET.atomic-js-field');



            $component->load(['componentId = :component', ':component' => $params['compId']]);


            $compCatId = $component->categoryId;
            $compName = $component->name;



            $category->load(['categoryId = :category', ':category' => $compCatId]);

            $catName = $category->name;

            $compCatParentId = $category->parentCatId;

            //Get Parent Category Name
            $categoryParent = new CategoryModel($this->db);

            $filter = ['categoryId= ?', $compCatParentId];

            $categoryParent->load($filter);

            $parentName = $categoryParent->name;


            if(!empty($parentName)){
                $folderPath = $parentName.'/'.$catName;
            }
            else{
                $folderPath = $catName;
            }




            $option = OptionService::get();

            $stylesDir = $option->stylesDir;
            $stylesExt = $option->stylesExt;
            $markupDir = $option->markupDir;
            $markupExt = $option->markupExt;
            $jsDir = $option->jsDir;
            $jsExt = $option->jsExt;

            $FileService = new FileService();





            file_put_contents(
                FRONT . '/'.$markupDir.'/' . $folderPath .'/'. $compName .'.'.$markupExt,
                $markup
            );

            file_put_contents(
                FRONT . '/'.$stylesDir.'/' . $folderPath .'/_'. $compName .'.'.$stylesExt,
                $styles
            );

            file_put_contents(
                FRONT . '/'.$jsDir.'/'. $compName .'.'.$jsExt,
                $js
            );








            if($component->componentId !== null){
                $passThrough['status'] = true;
                $passThrough['message'] = 'Yayy!!!';


            }
            else {
                $passThrough['status'] = false;
                $passThrough['message'] = 'shit didn\'t work';
            }
        }



    }





}