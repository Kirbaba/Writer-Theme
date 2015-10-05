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
            <!-- <p>Lorem ipsum dolor sit amet, vel eu illud noluisse gubergren, an sit quidam moderatius, 
                per at feugiat adipiscing temporibus. Quo ignota eirmod eu, per in saepe eruditi corrumpit. 
                Vel zril tibique id, vix case docendi et. Duo enim mucius an, per civibus adversarium te. 
                Eum wisi maiorum fastidii ex, vitae salutatus euripidis usu ea.</p>
                <p>Lorem ipsum dolor sit amet, vel eu illud noluisse gubergren, an sit quidam moderatius, 
                    per at feugiat adipiscing temporibus. Quo ignota eirmod eu, per in saepe eruditi 
                    corrumpit. Vel zril tibique id, </p>
            <a href="#">узнать больше</a> -->
            <?= do_shortcode('[about_me_text]');?>
        </div>
        <?= do_shortcode('[about_me]');?>
<!--        <div class="aboutme__photo">-->
<!--            <div class="aboutme__photo--front">-->
<!--                <img src="--><?php //bloginfo('template_directory'); ?><!--/img/_MG_0396.png" alt="">-->
<!--            </div>-->
<!--            <div class="aboutme__photo--back">-->
<!--                <img src="--><?php //bloginfo('template_directory'); ?><!--/img/back.png" alt="">-->
<!--            </div>-->
<!--        </div>-->
    </section>
   
    <section class="services">
      <a id="go_serv"></a>
        <div class="services__arrow"></div>
        <h1 class="block_title">Услуги</h1>
        <div class="fotorama" data-minwidth="100%" data-maxheight="760" data-fit="scaledown" data-nav="false" data-autoplay="true" >
            <?= do_shortcode('[service]');?>
<!--            <div class="services__container">-->
<!--                <div class="services__container__col">-->
<!--                    <div class="services__img">-->
<!--                        <img src="--><?php //bloginfo('template_directory'); ?><!--/img/3233.png" alt="">-->
<!--                    </div>-->
<!--                    <div class="services__text">-->
<!--                        <div class="services__text--box">-->
<!--                            <h4>Тренинги по России</h4>-->
<!--                            <p>Приняли участие на выставке MATE 2015 и представили наши проекты и технологии-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="services__container__col">                    -->
<!--                    <div class="services__text">-->
<!--                        <div class="services__text--box">-->
<!--                            <h4>Тренинги в Москве</h4>-->
<!--                            <p>Приняли участие на выставке MATE 2015 и представили наши проекты и технологии-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="services__img">-->
<!--                        <img src="--><?php //bloginfo('template_directory'); ?><!--/img/Background.png" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="services__container__col">-->
<!--                    <div class="services__img">-->
<!--                        <img src="--><?php //bloginfo('template_directory'); ?><!--/img/Background-1.png" alt="">-->
<!--                    </div>-->
<!--                    <div class="services__text">-->
<!--                        <div class="services__text--box">-->
<!--                            <h4>Книги</h4>-->
<!--                            <p>Приняли участие на выставке MATE 2015 и представили наши проекты и технологии-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--           -->
<!---->
<!--            <div class="services__container">                -->
<!--                <div class="services__container__col">-->
<!--                    <div class="services__img">-->
<!--                        <img src="--><?php //bloginfo('template_directory'); ?><!--/img/3233.png" alt="">-->
<!--                    </div>-->
<!--                    <div class="services__text">-->
<!--                        <div class="services__text--box">-->
<!--                            <h4>Тренинги по России</h4>-->
<!--                            <p>Приняли участие на выставке MATE 2015 и представили наши проекты и технологии-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="services__container__col">                    -->
<!--                    <div class="services__text">-->
<!--                        <div class="services__text--box">-->
<!--                            <h4>Тренинги в Москве</h4>-->
<!--                            <p>Приняли участие на выставке MATE 2015 и представили наши проекты и технологии-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="services__img">-->
<!--                        <img src="--><?php //bloginfo('template_directory'); ?><!--/img/Background.png" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="services__container__col">-->
<!--                    <div class="services__img">-->
<!--                        <img src="--><?php //bloginfo('template_directory'); ?><!--/img/Background-1.png" alt="">-->
<!--                    </div>-->
<!--                    <div class="services__text">-->
<!--                        <div class="services__text--box">-->
<!--                            <h4>Книги</h4>-->
<!--                            <p>Приняли участие на выставке MATE 2015 и представили наши проекты и технологии-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </section>

    <section class="store">
        <a id="go_store"></a>
        <div class="contain">
            <div class="store__arrow"></div>
            <h1 class="block_title">магазин</h1>
            <?= do_shortcode('[store]');?>
<!--            <a href="#">-->
<!--                <div class="store__box">-->
<!--                    <div class="store__box--stars">-->
<!--                        <span class="star-gld"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>                        -->
<!--                    </div>-->
<!--                    <img src="--><?php //bloginfo('template_directory'); ?><!--/img/Layer-108.png" alt="">-->
<!--                    <div class="store__box--text">-->
<!--                        <h4>Книга 1</h4>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur.</p>-->
<!--                    </div>-->
<!--                    <div class="store__box--price">-->
<!--                        <h4>850 руб</h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--            <a href="#">-->
<!--                <div class="store__box">-->
<!--                     <div class="store__box--stars">-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>                        -->
<!--                    </div>-->
<!--                    <img src="--><?php //bloginfo('template_directory'); ?><!--/img/Layer-109.png" alt="">-->
<!--                    <div class="store__box--text">-->
<!--                        <h4>Книга 2</h4>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur.</p>-->
<!--                    </div>-->
<!--                    <div class="store__box--price">-->
<!--                        <h4>850 руб</h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--            <a href="#">-->
<!--                <div class="store__box">-->
<!--                     <div class="store__box--stars">-->
<!--                        <span class="star-gld"></span>-->
<!--                        <span class="star-gld"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>                        -->
<!--                    </div>-->
<!--                    <img src="--><?php //bloginfo('template_directory'); ?><!--/img/Layer-111.png" alt="">-->
<!--                    <div class="store__box--text">-->
<!--                        <h4>Книга 3</h4>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur.</p>-->
<!--                    </div>-->
<!--                    <div class="store__box--price">-->
<!--                        <h4>850 руб</h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--            <a href="#">-->
<!--                <div class="store__box">-->
<!--                     <div class="store__box--stars">-->
<!--                        <span class="star-gld"></span>-->
<!--                        <span class="star-gld"></span>-->
<!--                        <span class="star-gld"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>                        -->
<!--                    </div>-->
<!--                    <img src="--><?php //bloginfo('template_directory'); ?><!--/img/Layer-116.png" alt="">-->
<!--                    <div class="store__box--text">-->
<!--                        <h4>Книга 4</h4>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur.</p>-->
<!--                    </div>-->
<!--                    <div class="store__box--price">-->
<!--                        <h4>850 руб</h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--            <a href="#">-->
<!--                <div class="store__box">-->
<!--                     <div class="store__box--stars">-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>                        -->
<!--                    </div>-->
<!--                    <img src="--><?php //bloginfo('template_directory'); ?><!--/img/Layer-117.png" alt="">-->
<!--                    <div class="store__box--text">-->
<!--                        <h4>Книга 5</h4>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur.</p>-->
<!--                    </div>-->
<!--                    <div class="store__box--price">-->
<!--                        <h4>850 руб</h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->

        </div>
    </section>

    <section class="materials">
        <a id="go_materials"></a>
        <div class="contain">
        <h1 class="block_title">бесплатные материалы</h1>
        <h2 class="block_descript">(материалы в помощь)</h2>
            <?= do_shortcode('[free_book]');?>
<!--         <a href="#">-->
<!--                <div class="store__box">-->
<!--                    <div class="store__box--stars">-->
<!--                        <span class="star-gld"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>                        -->
<!--                    </div>-->
<!--                    <img src="--><?php //bloginfo('template_directory'); ?><!--/img/Layer-108.png" alt="">-->
<!--                    <div class="store__box--text">-->
<!--                        <h4>Книга 1</h4>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur.</p>-->
<!--                    </div>-->
<!--                    <div class="store__box--price">-->
<!--                        <h4>850 руб</h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--            <a href="#">-->
<!--                <div class="store__box">-->
<!--                     <div class="store__box--stars">-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>                        -->
<!--                    </div>-->
<!--                    <img src="--><?php //bloginfo('template_directory'); ?><!--/img/Layer-109.png" alt="">-->
<!--                    <div class="store__box--text">-->
<!--                        <h4>Книга 2</h4>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur.</p>-->
<!--                    </div>-->
<!--                    <div class="store__box--price">-->
<!--                        <h4>850 руб</h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--            <a href="#">-->
<!--                <div class="store__box">-->
<!--                     <div class="store__box--stars">-->
<!--                        <span class="star-gld"></span>-->
<!--                        <span class="star-gld"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>                        -->
<!--                    </div>-->
<!--                    <img src="--><?php //bloginfo('template_directory'); ?><!--/img/Layer-111.png" alt="">-->
<!--                    <div class="store__box--text">-->
<!--                        <h4>Книга 3</h4>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur.</p>-->
<!--                    </div>-->
<!--                    <div class="store__box--price">-->
<!--                        <h4>850 руб</h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--            <a href="#">-->
<!--                <div class="store__box">-->
<!--                     <div class="store__box--stars">-->
<!--                        <span class="star-gld"></span>-->
<!--                        <span class="star-gld"></span>-->
<!--                        <span class="star-gld"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>                        -->
<!--                    </div>-->
<!--                    <img src="--><?php //bloginfo('template_directory'); ?><!--/img/Layer-116.png" alt="">-->
<!--                    <div class="store__box--text">-->
<!--                        <h4>Книга 4</h4>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur.</p>-->
<!--                    </div>-->
<!--                    <div class="store__box--price">-->
<!--                        <h4>850 руб</h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--            <a href="#">-->
<!--                <div class="store__box">-->
<!--                     <div class="store__box--stars">-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>-->
<!--                        <span class="star-wht"></span>                        -->
<!--                    </div>-->
<!--                    <img src="--><?php //bloginfo('template_directory'); ?><!--/img/Layer-117.png" alt="">-->
<!--                    <div class="store__box--text">-->
<!--                        <h4>Книга 5</h4>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur.</p>-->
<!--                    </div>-->
<!--                    <div class="store__box--price">-->
<!--                        <h4>850 руб</h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
        </div>
    </section>

  <!--  <section class="reviews">
        <div class="contain">
            <div class="reviews__arrow"></div>
            <h1 class="block_title">ОТЗЫВЫ</h1>
            <div class="reviews__box">
                <p>Компания DIRECT OPTIMUM разработала пластиковую карту с Дополненной Реальностью.
                 В отличие от обычных листовок, которые всем надоели, наши карты с Дополненной Реальностью 
                 берут с восторгом и просят еще для своих Друзей. Это качественно новый вид рекламы, 
                 который работает многократно и навсегда запоминается из-за первоначального ВАУ эффекта. 
                    СПАСИБО DIRECT OPTIMUM!</p>
                <div class="reviews__box--author">
                    <div class="reviews__box--author-img">
                        <img src="<?php /*bloginfo('template_directory'); */?>/img/Layer-27.png" alt="">
                    </div>
                    <h4>Крутилин Александр</h4>
                    <p>Дисконтная система “Друзья”</p>
                </div>
            </div>
            <div class="reviews__box">
                 <p>Компания DIRECT OPTIMUM разработала пластиковую карту с Дополненной Реальностью.
                 В отличие от обычных листовок, которые всем надоели, наши карты с Дополненной Реальностью 
                 берут с восторгом и просят еще для своих Друзей. Это качественно новый вид рекламы, 
                 который работает многократно и навсегда запоминается из-за первоначального ВАУ эффекта. 
                    СПАСИБО DIRECT OPTIMUM!</p>
                <div class="reviews__box--author">
                    <div class="reviews__box--author-img">
                        <img src="<?php /*bloginfo('template_directory'); */?>/img/Layer-28.png" alt="">
                    </div>
                    <h4>Крутилин Александр</h4>
                    <p>Дисконтная система “Друзья”</p>
                </div>
            </div>
        </div>
    </section>-->
    <?php echo do_shortcode("[reviews]");?>
    <section class="contactme"> 
        <a id="go_contacts"></a>                       
            <h1 class="block_title">Свяжитесь со мной</h1>
            <div class="contactme__form">
                <!-- <form action="#">
                    <input type="text" class="contactme__form--input" placeholder="Ваше имя">
                    <input type="text" class="contactme__form--input" placeholder="email">
                    <textarea class="contactme__form--text" placeholder="Сообщение"></textarea>
                    <input type="submit" class="contactme__form--sub" value="Отправить"></div>  
                </form> -->
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
<?php wp_footer(); ?>
</body>
</html>