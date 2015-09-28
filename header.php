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
    <header class="header--page">
    	<nav class="navigation">
    		<ul>
    			<li><a href="<?php echo get_home_url();?>#go_about">обо мне</a></li>
    			<li><a href="<?php echo get_home_url();?>#go_serv">услуги</a></li>
    			<li><a href="<?php echo get_home_url();?>#go_store">Магазин</a></li>
    			<li><a href="<?php echo get_home_url();?>#go_materials">бесплатные материалы</a></li>
    			<li><a href="<?php echo get_permalink(23); ?>">форум</a></li>
    			<li><a href="<?php echo get_home_url();?>#go_contacts">КОНТАКТЫ</a></li>    			
    		</ul>
    		<a href="#nowhere" class="button-buy"></a>
			<a href="#nowhere" class="button-search"></a>
    	</nav>
    </header>