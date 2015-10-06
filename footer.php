        <section class="contactinfo">
        <div class="contain">
            <div class="contactinfo__block">
                <h3>контакты</h3>
                <a href="<?php echo get_theme_mod('tw_textbox'); ?>" class="tw"></a>
                <a href="<?php echo get_theme_mod('fb_textbox'); ?>" class="fb"></a>
                <a href="<?php echo get_theme_mod('p_textbox'); ?>" class="pn"></a>
                <a href="<?php echo get_theme_mod('gpl_textbox'); ?>" class="gp"></a>
                <p class="phone_number"><?php echo get_theme_mod('phone_textbox'); ?></p>
                <p class="email_adress"><?php echo get_theme_mod('email_textbox'); ?></p>
            </div>
        </div>
    </section>
    
    <footer class="footer">
        <h5>© 2015 - Все права защищены</h5>
    </footer>
<?php wp_footer(); ?>
        <script type="text/javascript">
            addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
            var ajaxurl = '/wp-admin/admin-ajax.php',
                pagenow = 'toplevel_page_mainpage',
                typenow = '',
                adminpage = 'toplevel_page_mainpage',
                thousandsSeparator = ' ',
                decimalPoint = ',',
                isRtl = 0;
        </script>
</body>
</html>