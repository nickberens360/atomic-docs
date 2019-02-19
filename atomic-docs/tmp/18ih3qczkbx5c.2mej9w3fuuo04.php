



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





        <div class="atomic-dash__content">



            <?php echo $this->render($compView,NULL,get_defined_vars(),0); ?>

            <div id="disqus_thread"></div>
            <script>

                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://atomic-docs.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>



        </div>

    </div>
</div>





<script id="dsq-count-scr" src="//atomic-docs.disqus.com/count.js" async></script>

<?php echo $this->render($footer,NULL,get_defined_vars(),0); ?>






