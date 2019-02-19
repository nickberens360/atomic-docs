



<?php echo $this->render($header,NULL,get_defined_vars(),0); ?>



<?php echo $this->render($search,NULL,get_defined_vars(),0); ?>



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



        <?php echo $this->render($sideBar,NULL,get_defined_vars(),0); ?>



    </div>

    <div class="atomic-dash__main atomic-dash__item">






        <?php echo $this->render($pageBar,NULL,get_defined_vars(),0); ?>










        <p class="atomic-catDescription"><?= ($catDescription) ?> </p>


        <div class="atomic-dash__content">




            <?php echo $this->render($catLoop,NULL,get_defined_vars(),0); ?>



        </div>

    </div>
</div>







<?php echo $this->render($footer,NULL,get_defined_vars(),0); ?>






</body>