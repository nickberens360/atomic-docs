


<div id="atomic-search" class="atomic-search">
    <i class="fa fa-times fa-3x js_atomic-search__close atomic-search__close"></i>
    <div class="atomic-search__content">
        <div class="atomic-search__inputWrap">
            <input type="text" class="fuzzy-search atomic-search__input" placeholder="Search Components &amp; Categories">
        </div>
        <ul class="list atomic-search__results">



            <?php foreach ( $categories as $cat ) {  ?>

                <li><a class="atomic-search__item atomic-search__item-parent" href="/category/<?= $cat->name ?>"><?= $cat->name ?></a></li>
                <?php foreach ( $components as $comp ) {  ?>

                    <?php if ( $comp->categoryId == $cat->categoryId ) {  ?>
                        <li><a class="atomic-search__item" href="/category/<?= $cat->name ?>#<?= $comp->name ?>"><?= $comp->name ?></a></li>
                    <?php }  ?>

                <?php }  ?>


            <?php }  ?>





        </ul>
    </div>
</div>