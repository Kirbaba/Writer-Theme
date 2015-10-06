<?php
/*
Template Name: Order
*/
?>
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
            <li><a href="/" >Главная</a></li>
            <li><a href="<?php echo get_permalink(23); ?>">форум</a></li>
        </ul>
        <a href="/cart" class="button-buy"></a>
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

<section class="store">
    <a id="go_store"></a>
    <div class="contain">
        <div class="store__arrow"></div>
        <h1 class="block_title">Корзина</h1>
        <?= do_shortcode('[order_page]'); ?>
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
                    <div class="input-group input-group">
                        <span class="input-group-addon" id="sizing-addon1">Телефон</span>
                        <input type="text" name="order-phone" class="form-control" placeholder="Телефон для связи" aria-describedby="sizing-addon1">
                    </div>
                    <br>
                    <div class="input-group input-group">
                        <span class="input-group-addon" id="sizing-addon1">Адрес</span>
                        <input type="text" name="order-address" class="form-control" placeholder="Адрес доставки" aria-describedby="sizing-addon1">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success send-order" data-dismiss="modal">Отправить</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ok-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3>Заказ успешно оформлен, скоро с вами свяжутся.</h3>
                <a href="/" class="btn btn-warning">Вернуться на главную</a>
            </div>
        </div>
    </div>
</div>
<div class="wrap" style="width:100%"></div>
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

