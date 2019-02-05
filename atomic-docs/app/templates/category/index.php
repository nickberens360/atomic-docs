

<?php echo \Template::instance()->render(\Base::instance()->get('header'));


$f3 = Base::instance();



?>






<?php echo \Template::instance()->render(\Base::instance()->get('search')) ?>



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



        <?php echo \Template::instance()->render(\Base::instance()->get('sideBar')) ?>



    </div>

    <div class="atomic-dash__main atomic-dash__item">




	    <?php echo \Template::instance()->render(\Base::instance()->get('pageBar')) ?>







        <p class="atomic-catDescription"><?= $f3->get('category')->description ?> </p>


        <div class="atomic-dash__content">






            <?php echo \Template::instance()->render(\Base::instance()->get('catLoop')) ?>



        </div>

    </div>
</div>







<?php echo \Template::instance()->render(\Base::instance()->get('footer')) ?>






</body>