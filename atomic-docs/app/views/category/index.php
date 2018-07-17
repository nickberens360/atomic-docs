<?php echo \View::instance()->render('common/header.php');


$f3 = Base::instance();



?>






<?php echo \View::instance()->render('home/search.php') ?>



<div class="atomic-editPanel">
    <div class="atomic-editPanel__inner">
        <a href="#" class="js-atomic-editPanel-close atomic-editPanel__close">
            <i class="fa fa-times fa-3x"></i>
        </a>

        <div class="atomic-editPanel__form"></div>





    </div>
</div>







<div class="atomic-dash">

    <div class="atomic-dash__side atomic-dash__item">


        <?php echo \View::instance()->render('common/sideBar.php') ?>

    </div>

    <div class="atomic-dash__main atomic-dash__item">




        <?php echo \View::instance()->render('common/pageBar.php') ?>








        <p class="atomic-catDescription"><?= $f3->get('category')->description ?> </p>


        <div class="atomic-dash__content">




            <?php echo \View::instance()->render('component/index.php') ?>



        </div>

    </div>
</div>





<?php echo \View::instance()->render('common/footer.php') ?>






</body>