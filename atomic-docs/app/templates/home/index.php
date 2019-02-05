<?php include __DIR__ . '/../common/header.php'




?>







<?php echo \View::instance()->render('home/search.php') ?>


<!--<div class="atomic-editPanel">
    <div class="atomic-editPanel__inner">
        <a href="#" class="js-atomic-editPanel-close atomic-editPanel__close">
            <i class="fa fa-times fa-3x"></i>
        </a>

        <form action="">
            <div class="atomic-formGroup">
                <label for="" class="atomic-label">Label</label>
                <input type="text" class="atomic-input">
            </div>
            <div class="atomic-formGroup">
                <label for="" class="atomic-label">Label</label>
                <textarea name="" id="" class="atomic-textarea"></textarea>
            </div>
        </form>
        <div class="atomic-formGroup">
            <label for="" class="atomic-label">Label</label>
            <input class="atomic-colorPicker" type="text" name="bgColor" value="">
        </div>

        <div class="atomic-btnGroup">
            <button class="atomic-btn atomic-btn-1">Save</button>
            <button class="atomic-btn atomic-btn-simple"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </div>


        <div class="atomic-hint">
            <h4 class="atomic-hint__title">Title</h4>
            <p>To change the order the components appear on the page you can simply drag and drop them in the sidebar. You can
                also move them to a different category by dragging and dropping them into the desired category's component list.
                All changes will also be reflected in the project's file structure as well as the @import style strings order as
                well!</p>
        </div>


    </div>
</div>-->







<div class="atomic-dash">

    <div class="atomic-dash__side atomic-dash__item">

        <?php include __DIR__ . '/../common/sideBar.php' ?>

    </div>

    <div class="atomic-dash__main atomic-dash__item">
        <div class="atomic-pageBarWrap">
            <div class="atomic-pageBar">
                <div class="atomic-pageBar__item atomic-pageBar__left">
                    <h1 class="atomic-catTitle">Category <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
                </div>
                <div class="atomic-pageBar__item atomic-pageBar__right">
                    <ul class="atomic-dashControls">
                        <li><a href="#" class="js-atomic-dashControl" data-atomicwidth="100%"><i class="fa fa-desktop" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="js-atomic-dashControl" data-atomicwidth="768px"><i class="fa fa-tablet" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="js-atomic-dashControl" data-atomicwidth="375px"><i class="fa fa-mobile" aria-hidden="true"></i></a></li>
                    </ul>
                </div>

            </div>


        </div>

        <p class="atomic-catDescription">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, aliquam asperiores aspernatur cumque dicta ea eaque eos illo
            inventore.</p>
        <div class="atomic-dash__content">






        </div>

    </div>
</div>





<?php include __DIR__ . '/../common/footer.php' ?>


</body>