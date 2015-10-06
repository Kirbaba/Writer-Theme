<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaOWKyamSxMTXclSDFmJ2N4Am20PCTD6I&sensor=FALSE">
    </script>
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
    		<a href="#nowhere" class="button-buy"></a>
			<a href="/search/" class="button-search"></a>
    	</nav>
    </header>
                              
    <section class="entry">
    	<div class="entry__text">
    		<h1>Владимир Гойдин</h1>
    		<h3>Земля, недвижимость, правовое сопровождение</h3>
    		<p>
                <?php
                    $text = get_post( 78 );
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
                <a href="#" class="tw"></a>
                <a href="#" class="fb"></a>
                <a href="#" class="pn"></a>
                <a href="#" class="gp"></a>
                <p class="phone_number">(416) 555-5252</p>
                <p class="email_adress">hello@treehouse.com</p>
            </div>
        </div>
    </section>
    
    <footer class="footer">
        <h5>© 2015 - Все права защищены</h5>
    </footer>
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
</body>
</html>