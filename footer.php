        <section class="contactinfo">
        <div class="contain">
            <div class="contactinfo__block">
                <h3>контакты</h3>
                <div class="row">
                    <?php if( get_theme_mod('tw_textbox') != ''){ ?><a target="_blank" href="<?php echo get_theme_mod('tw_textbox'); ?>" ><i class="fa fa-twitter"></i></a><?php } ?>
                    <?php if( get_theme_mod('fb_textbox') != ''){ ?><a target="_blank" href="<?php echo get_theme_mod('fb_textbox'); ?>" ><i class="fa fa-facebook"></i></a><?php } ?>
                    <?php if( get_theme_mod('p_textbox') != ''){ ?><a target="_blank" href="<?php echo get_theme_mod('p_textbox'); ?>" ><i class="fa fa-pinterest"></i></a><?php } ?>
                    <?php if( get_theme_mod('gpl_textbox') != ''){ ?><a target="_blank" href="<?php echo get_theme_mod('gpl_textbox'); ?>" ><i class="fa fa-google-plus"></i></a><?php } ?>
                    <?php if( get_theme_mod('vk_textbox') != ''){ ?><a target="_blank" href="<?php echo get_theme_mod('vk_textbox'); ?>" ><i class="fa fa-vk"></i></a><?php } ?>
                    <?php if( get_theme_mod('in_textbox') != ''){ ?><a target="_blank" href="<?php echo get_theme_mod('in_textbox'); ?>" ><i class="fa fa-instagram"></i></a><?php } ?>
                    <?php if( get_theme_mod('ok_textbox') != ''){ ?><a target="_blank" href="<?php echo get_theme_mod('ok_textbox'); ?>" ><i class="fa fa-odnoklassniki"></i></a><?php } ?>
                    <?php if( get_theme_mod('yt_textbox') != ''){ ?><a target="_blank" href="<?php echo get_theme_mod('yt_textbox'); ?>" ><i class="fa fa-youtube"></i></a><?php } ?>
                    <?php if( get_theme_mod('vim_textbox') != ''){ ?><a target="_blank" href="<?php echo get_theme_mod('vim_textbox'); ?>" ><i class="fa fa-vimeo"></i></a><?php } ?>
                    <?php if( get_theme_mod('tm_textbox') != ''){ ?><a target="_blank" href="<?php echo get_theme_mod('tm_textbox'); ?>" ><i class="fa fa-tumblr"></i></a><?php } ?>
                    <?php if( get_theme_mod('sk_textbox') != ''){ ?><a target="_blank" href="<?php echo get_theme_mod('sk_textbox'); ?>" ><i class="fa fa-skype"></i></a><?php } ?>
                </div>

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
        <?= do_shortcode('[to_scroll]'); ?>
</body>
</html>