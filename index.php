<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <header class="header">
    	<nav class="navigation">
    		<ul>
                <li><a href="#go_about" class="smoothScroll">обо мне</a></li>
    			<li><a href="#go_serv" class="smoothScroll">услуги</a></li>
    			<li><a href="#go_store" class="smoothScroll">Магазин</a></li>
    			<li><a href="#go_materials" class="smoothScroll">бесплатные материалы</a></li>
    			<li><a href="<?php echo get_permalink(23); ?>">форум</a></li>
    			<li><a href="#go_contacts" class="smoothScroll">КОНТАКТЫ</a></li>    			
    		</ul>
            <a href="/cart" class="button-buy">
                <img src="<?php bloginfo('template_directory'); ?>/img/marker20.png" alt="">
            </a>
			<a href="/search/" class="button-search"></a>
    	</nav>
    </header>
                              
    <section class="entry">
    	<div class="entry__text">
    		<h1>Владимир Гойдин</h1>
    		<h3>Земля, недвижимость, правовое сопровождение</h3>
    		<p>
                <?php
                    $text = get_post( 54 );
                    echo $text->post_content;
                ?>
            </p>
    	</div>
    </section>

    <section class="aboutme">
        <a id="go_about"></a>
        <div class="aboutme__text">
            <div class="aboutme__text--line"></div>
            <h3>Обо мне</h3>
            <?= do_shortcode('[about_me_text]');?>
        </div>
        <?= do_shortcode('[about_me]');?>
    </section>
   
    <section class="services">
      <a id="go_serv"></a>
        <div class="services__arrow"></div>
        <h1 class="block_title">Услуги</h1>
        <div class="fotorama" data-minwidth="100%" data-maxheight="760" data-fit="scaledown" data-nav="false" data-autoplay="true" >
            <?= do_shortcode('[service]');?>
        </div>
    </section>

    <section class="store">
        <a id="go_store"></a>
        <div class="contain">
            <div class="store__arrow"></div>
            <h1 class="block_title">магазин</h1>
            <?= do_shortcode('[store]');?>
        </div>
    </section>

    <section class="materials">
        <a id="go_materials"></a>
        <div class="contain">
        <h1 class="block_title">бесплатные материалы</h1>
        <h2 class="block_descript">(материалы в помощь)</h2>
            <?= do_shortcode('[free_book]');?>
        </div>
    </section>

    <?php echo do_shortcode("[reviews]");?>
    <section class="contactme"> 
        <a id="go_contacts"></a>                       
            <h1 class="block_title">Свяжитесь со мной</h1>
            <div class="contactme__form">
                <?php echo do_shortcode("[contact-form-7 id='5' title='form']"); ?>
                <? do_shortcode("[bbp-forum-index]");?>
            </div>
            <div class="contactme__forum">
                <a href="<?php echo get_permalink(23); ?>">перейти на форум</a>
            </div>        
    </section>
    
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

                <div class="row">
                    <p class="phone_number"><?php echo get_theme_mod('phone_textbox'); ?></p>
                    <p class="email_adress"><?php echo get_theme_mod('email_textbox'); ?></p>
                </div>

            </div>
        </div>
    </section>
    
    <footer class="footer">
        <h5>© 2015 - Все права защищены</h5>
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="send-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Оформление заказа</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon1">Имя</span>
                            <input type="text" name="order-name" class="form-control" placeholder="Укажите ваше имя" aria-describedby="sizing-addon1">
                        </div>
                        <br>
                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon1">E-mail</span>
                            <input type="email" name="order-mail" class="form-control" placeholder="Укажите ваш e-mail" aria-describedby="sizing-addon1">
                        </div>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-success send-free-order">Отправить</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ok-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3>Спасибо. Мы вышлем Вам материал на указанный адрес электронной почты в ближайшее время</h3>
                    <a href="/" class="btn btn-warning">Вернуться на главную</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="buy-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Товар добавлен в корзину</h4>
                </div>
                <div class="modal-body">
                    <!--<p>Укажите ваше имя:</p>
                    <input type="text" name="order-name">
                    <p>Укажите ваш e-mail:</p>
                    <input type="email" name="order-mail">-->
                    <div class="row">
                        <div class="pull-left">
                            <a class="gonext" href="#" data-dismiss="modal">
                                <h4> Вернуться на сайт</h4>
                            </a>
                        </div>
                        <div class="pull-right">
                            <a class="goorder" href="/cart">
                                <h4>Оформить заказ <span class="glyphicon glyphicon-share-alt"></span></h4>
                            </a>
                        </div>
                    </div>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-success send-order" data-dismiss="modal">Отправить</button>
                </div>-->
            </div>
        </div>
    </div>
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
<?php wp_footer(); ?>
<?= do_shortcode('[to_scroll]'); ?>
</body>
</html>