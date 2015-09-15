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
    			<li><a href="#nowhere">обо мне</a></li>
    			<li><a href="#nowhere">услуги</a></li>
    			<li><a href="#nowhere">Магазин</a></li>
    			<li><a href="#nowhere">бесплатные материалы</a></li>
    			<li><a href="#nowhere">форум</a></li>
    			<li><a href="#nowhere">КОНТАКТЫ</a></li>    			
    		</ul>
    		<a href="#nowhere" class="button-buy"></a>
			<a href="#nowhere" class="button-search"></a>
    	</nav>
    </header>
                              
    <section class="entry">
    	<div class="entry__text">
    		<h1>имя фамилия</h1>
    		<h3>писатель, автор</h3>
    		<p><span>“</span>
				<b>Сдаться</b> может каждый – это легче всего на свете. 
				А вот <b>продолжать</b>, даже тогда, когда все вокруг приняли и простили бы 
				вам ваше поражение, – в этом кроется настоящая сила.</p>
    	</div>
    </section>

    <section class="aboutme">
        <div class="aboutme__text">
            <div class="aboutme__text--line"></div>
            <h3>Обо мне</h3>
            <p>Lorem ipsum dolor sit amet, vel eu illud noluisse gubergren, an sit quidam moderatius, 
                per at feugiat adipiscing temporibus. Quo ignota eirmod eu, per in saepe eruditi corrumpit. 
                Vel zril tibique id, vix case docendi et. Duo enim mucius an, per civibus adversarium te. 
                Eum wisi maiorum fastidii ex, vitae salutatus euripidis usu ea.</p>
                <p>Lorem ipsum dolor sit amet, vel eu illud noluisse gubergren, an sit quidam moderatius, 
                    per at feugiat adipiscing temporibus. Quo ignota eirmod eu, per in saepe eruditi 
                    corrumpit. Vel zril tibique id, </p>
            <a href="#">узнать больше</a>
        </div>
        <div class="aboutme__photo">
            <div class="aboutme__photo--front">
                <img src="<?php bloginfo('template_directory'); ?>/img/_MG_0396.png" alt="">
            </div>
            <div class="aboutme__photo--back">
                <img src="<?php bloginfo('template_directory'); ?>/img/back.png" alt="">
            </div>
        </div>
    </section>

    <section class="services">
        <div class="fotorama" data-minwidth="100%" data-fit="cover" data-autoplay="true" >
            <div class="contain">
                <div class=""><h1>Hello World</h1></div>
            </div>
            <div class="contain">
                <div class=""><h1>Hello World</h1></div>
            </div>
        </div>
    </section>
<?php wp_footer(); ?>
</body>
</html>