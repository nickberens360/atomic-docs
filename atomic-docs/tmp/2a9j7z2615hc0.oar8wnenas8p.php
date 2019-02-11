<div class="atomic-fileSystem">

    <div class="atomic-catItemGroup" data-parent="root">

        <ul class="atomic-nav atomic-dropable" data-cat="root">

            <?php foreach (($sideBarCats?:[]) as $cat): ?>




                <?php if ($currentId  ==  $cat['category']->categoryId): ?>
                    
                        <li class="atomic-active" data-type="cat" data-slug="<?= ($cat['category']->slug) ?>"><i class="js-atomic-catContent-trigger fa fa-folder" aria-hidden="true"></i>
                    
                    <?php else: ?>
                        <li data-type="cat" data-slug="<?= ($cat['category']->slug) ?>"><i class="js-atomic-catContent-trigger fa fa-folder" aria-hidden="true"></i>
                    

                <?php endif; ?>





                <a href="<?= ($cat['catLink']) ?>"><?= ($cat['category']->name) ?></a>
                <ul class="atomic-sub atomic-dropable" data-cat="<?= ($cat['category']->slug) ?>">
                    <?php if ($cat['subcategories']): ?>
                        <?php foreach (($cat['subcategories']?:[]) as $subCat): ?>





                            <?php if ($currentSubId  ==  $subCat['category']->categoryId): ?>
                                
                                    <li class="atomic-active" data-type="cat" data-slug="<?= ($subCat['category']->slug) ?>"><i class="js-atomic-catContent-trigger fa fa-folder" aria-hidden="true"></i> <a href="<?= ($subCat['childCatLink']) ?>"><?= ($subCat['category']->name) ?></a>
                                
                                <?php else: ?>
                                    <li data-type="cat" data-slug="<?= ($subCat['category']->slug) ?>"><i class="js-atomic-catContent-trigger fa fa-folder" aria-hidden="true"></i> <a href="<?= ($subCat['childCatLink']) ?>"><?= ($subCat['category']->name) ?></a>
                                

                            <?php endif; ?>










                            <ul class="atomic-sub atomic-dropable" data-cat="<?= ($subCat['category']->slug) ?>">
                                <?php foreach (($subCat['components']?:[]) as $subComp): ?>
                                    <li data-type="comp" data-slug="<?= ($subComp->slug) ?>"><i class="fa fa-file-o"></i> <a href="#"><?= ($subComp->name) ?></a></li>
                                <?php endforeach; ?>
                            </ul>

                            </li>

                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php foreach (($cat['components']?:[]) as $comp): ?>
                        <?php if ($activeCompId == $comp->componentId): ?>
                            
                                <li class="atomic-active-item" data-type="comp" data-slug="<?= ($comp->slug) ?>"><i class="fa fa-file-o"></i> <a href="<?= ($comp->compLink) ?>"><?= ($comp->name) ?></a></li>
                            
                            <?php else: ?>
                                <li data-type="comp" data-slug="<?= ($comp->slug) ?>"><i class="fa fa-file-o"></i> <a href="<?= ($comp->compLink) ?>"><?= ($comp->name) ?></a></li>
                            
                        <?php endif; ?>


                    <?php endforeach; ?>

                </ul>



                </li>

            <?php endforeach; ?>

        </ul>



    </div>


</div>