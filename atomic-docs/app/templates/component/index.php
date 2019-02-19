
<?php


$f3 = \Base::instance();






foreach ( $f3->get('catComponents') as $comp ) {

$f3->set('comp', $comp);

    ?>

    <?php echo \View::instance()->render('component/view.php') ?>

<?php } ?>








