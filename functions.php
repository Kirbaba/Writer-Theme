<?php

define('WRITE_THEME_DIR', plugin_dir_path(__FILE__));
define('WRITE_THEME_URL', plugin_dir_url(__FILE__));

require_once(WRITE_THEME_DIR."/lib/parser_write_theme.php");
require_once(WRITE_THEME_DIR."/lib/write_theme.php");

define('TM_DIR', get_template_directory(__FILE__));
define('TM_URL', get_template_directory_uri(__FILE__));

require_once TM_DIR.'/parser.php';

function add_style(){
   
    wp_enqueue_style( 'my-styles', get_template_directory_uri() . '/css/style.css', array(), '1');
    wp_enqueue_style( 'my-sass', get_template_directory_uri() . '/sass/style.css', array('my-styles'), '1');
    wp_enqueue_style( 'fotorama', get_template_directory_uri() . '/css/fotorama.css', array('my-styles'), '1');
}

function add_script(){
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', array(), '1');
    wp_enqueue_script( 'jq', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '1');
    wp_enqueue_script( 'my-bootstrap-extension', get_template_directory_uri() . '/js/bootstrap.js', array(), '1');
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/script.js', array(), '1');
    wp_enqueue_script( 'fotorama-js', get_template_directory_uri() . '/js/fotorama.js', array(), '1');

    
}

add_action( 'wp_enqueue_scripts', 'add_style' );
add_action( 'wp_enqueue_scripts', 'add_script' );

function prn($content) {
    echo '<pre style="background: lightgray; border: 1px solid black; padding: 2px">';
    print_r ( $content );
    echo '</pre>';
}

function my_pagenavi() {
    global $wp_query;

    $big = 999999999; // уникальное число для замены

    $args = array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) )
    ,'format' => ''
    ,'current' => max( 1, get_query_var('paged') )
    ,'total' => $wp_query->max_num_pages
    );

    $result = paginate_links( $args );

    // удаляем добавку к пагинации для первой страницы
    $result = str_replace( '/page/1/', '', $result );

    echo $result;
}

function excerpt_readmore($more) {
    return '... <br><a href="'. get_permalink($post->ID) . '" class="readmore">' . 'Читать далее' . '</a>';
}
add_filter('excerpt_more', 'excerpt_readmore');


if ( function_exists( 'add_theme_support' ) )
    add_theme_support( 'post-thumbnails' );


add_action('admin_menu', 'admin_menu');

function admin_menu(){
    add_menu_page( 'Настройки "Обо мне"', 'Обо мне', 'manage_options', 'about_me', 'about_me' );
    add_menu_page( 'Магазин книг', 'Книги', 'manage_options', 'store', 'store' );
    add_menu_page( 'Бесплатные материалы', 'Материалы', 'manage_options', 'free_book', 'free_book' );
    add_menu_page( 'Услуги', 'Услуги', 'manage_options', 'service', 'service' );
}

// load script to admin
function admin_js() {
    $url = TM_URL . '/js/admin.js';
    echo "<script type='text/javascript' src='$url'></script>";
}
add_action('admin_head', 'admin_js');

if (function_exists('wp_enqueue_media')) {
    wp_enqueue_media();
} else {
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
}

// Обо мне
function about_me(){
    global $wpdb;
    global $wpdbn;

    if (function_exists('wp_enqueue_media')) {
        wp_enqueue_media();
    } else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }

    $curr_photos = $wpdb->get_results( "SELECT * FROM `about_me`");
    
    //prn($curr_photos);
    //prn($curr_text);

    if(isset($_POST['attachment_url'])){
        if(isset($_POST['changed']) || !empty($curr_photos)){
            $wpdb->update('about_me',array("small_img" => $_POST['attachment_url'],
               "big_img" => $_POST['attachment_url2']), array('id' => "1"));
            $message = "Фото успешно обновлены!";
        }else{
            $wpdb->insert('about_me', array("small_img" => $_POST['attachment_url'],
                "big_img" => $_POST['attachment_url2']));
            $message = "Фото успешно добавлены!";
        }

        echo mysql_error();
    }
    $curr_text = $wpdb->get_results( "SELECT * FROM `about_me-text`");
     if(isset($_POST['aboutme__admin_text'])){
        if(isset($_POST['changed']) || !empty($curr_text)){
            $wpdb->update('about_me-text',array("txt" => $_POST['aboutme__admin_text']), array('id' => "1"));
            $message = "Текст успешно обновлен!";
        }else{
            $wpdb->insert('about_me-text', array("txt" => $_POST['aboutme__admin_text']));
            $message = "Текст успешно обновлен!";
        }

        echo mysql_error();
    }


    $generate = '';
    $generate2 = '';

    $aboutme_currenttext = $wpdb->get_results("SELECT * FROM aboutme__admin_text");
    foreach ($aboutme_currenttext as $aboutme_currenttexts) {
        $aboutme_currenttext .= "<tr data-id='".$aboutme_currenttexts->id."'>
            <td class='curr_img' style='padding-right: 10px'><img  src='". $aboutme_currenttexts->txt. "' alt='' style='width: 100px;'/></td>            
            <td><a href='#' class='change_about'>Редактировать</a></td>
        </tr>";
    }

    $slides = $wpdb->get_results("SELECT * FROM about_me");
    foreach ($slides as $slide) {
        $generate .= "<tr data-id='".$slide->id."'>
            <td class='curr_img' style='padding-right: 10px'><img  src='". $slide->small_img. "' alt='' style='width: 100px;'/></td>
            <td class='curr_img2' style='padding-right: 10px'><img  src='". $slide->big_img. "' alt='' style='width: 200px;'/></td>
            <td><a href='#' class='change_about'>Редактировать</a></td>
        </tr>";
    }


    $parser = new Parser();
    $parser->parse(TM_DIR."/views/admin_about.php",array('slides'=>$generate, 'aboutme_currenttext'=>$generate2,
        'message'=>$message), true);
}
//Обо мне (шорткод)
function about_me_sc(){
    global $wpdb;

    $generate = "";

    $slides = $wpdb->get_results("SELECT * FROM about_me");

    //prn($slides);

    $generate .= '<div class="aboutme__photo">
            <div class="aboutme__photo--front">
                <img src="'.$slides[0]->small_img.'" alt="">
            </div>
            <div class="aboutme__photo--back">
                <img src="'.$slides[0]->big_img.'" alt="">
            </div>
        </div>';

    return $generate;
}
add_shortcode('about_me', 'about_me_sc');

//Магазин
function store(){
    global $wpdb;

    if (function_exists('wp_enqueue_media')) {
        wp_enqueue_media();
    } else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }

    if(isset($_GET['del_book'])){
        $wpdb->delete('store',array("id" => $_GET['del_book']));
        $message = "Книга успешно удалена!";
    }

    if(isset($_POST['attachment_url'])){
        if(isset($_POST['changed'])){
            $wpdb->update('store',array("img" => $_POST['attachment_url'],
                "title" => $_POST['title'],"descr" => $_POST['descr'],"link" => $_POST['link'],"price" => $_POST['price']), array('id' => $_POST['changed']));
            $message = "Книга успешно обновлена!";
        }else{
            $wpdb->insert('store', array("img" => $_POST['attachment_url'],
                "title" => $_POST['title'],"descr" => $_POST['descr'],"link" => $_POST['link'],"price" => $_POST['price']));
            $message = "Книга успешно добавлена!";
        }

        echo mysql_error();
    }


    $generate = '';

    $books = $wpdb->get_results("SELECT * FROM store");
    foreach ($books as $book) {
        $generate .= "<tr data-book-id='".$book->id."'>
            <td class='curr_title'>". $book->title ."</td>
            <td class='curr_descr'>". $book->descr ."</td>
            <td class='curr_price'>". $book->price ."</td>
            <td class='curr_link' ><a href='". $book->link ."'>". $book->link ."</a></td>
            <td class='curr_img' style='padding-right: 10px'><img  src='". $book->img. "' alt='' style='width: 50px;'/></td>
            <td><a href='#' class='change_book'>Редактировать</a>
            <a href='/wp-admin/admin.php?page=store&del_book=$book->id'>Удалить</a></td>
        </tr>";
    }


    $parser = new Parser();
    $parser->parse(TM_DIR."/views/admin_store.php",array('slides'=>$generate,
        'message'=>$message), true);
}
//Магазин (шорткод)
function store_sc(){
    global $wpdb;

    $generate = "";

    $books = $wpdb->get_results("SELECT * FROM store");
    foreach ($books as $book) {
        $generate .= '<a href="'.$book->link.'">
                <div class="store__box">
                    <img src="'.$book->img.'" alt="">
                    <div class="store__box--text">
                        <h4>'.$book->title.'</h4>
                        <p>'.$book->descr.'</p>
                    </div>
                    <div class="store__box--price">
                        <h4>'.$book->price.'</h4>
                    </div>
                </div>
            </a>';
    }

    return $generate;
}
add_shortcode('store', 'store_sc');

//Бесплатные материаы (админка)
function free_book(){
    global $wpdb;

    if (function_exists('wp_enqueue_media')) {
        wp_enqueue_media();
    } else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }

    if(isset($_GET['del_book'])){
        $wpdb->delete('free_book',array("id" => $_GET['del_book']));
        $message = "Книга успешно удалена!";
    }

    if(isset($_POST['attachment_url'])){
        if(isset($_POST['changed'])){
            $wpdb->update('free_book',array("img" => $_POST['attachment_url'],
                "title" => $_POST['title'],"descr" => $_POST['descr'],"link" => $_POST['link'],"price" => $_POST['price']), array('id' => $_POST['changed']));
            $message = "Книга успешно обновлена!";
        }else{
            $wpdb->insert('free_book', array("img" => $_POST['attachment_url'],
                "title" => $_POST['title'],"descr" => $_POST['descr'],"link" => $_POST['link'],"price" => $_POST['price']));
            $message = "Книга успешно добавлена!";
        }

        echo mysql_error();
    }


    $generate = '';

    $books = $wpdb->get_results("SELECT * FROM free_book");
    foreach ($books as $book) {
        $generate .= "<tr data-book-id='".$book->id."'>
            <td class='curr_title'>". $book->title ."</td>
            <td class='curr_descr'>". $book->descr ."</td>
            <td class='curr_price'>". $book->price ."</td>
            <td class='curr_link' ><a href='". $book->link ."'>". $book->link ."</a></td>
            <td class='curr_img' style='padding-right: 10px'><img  src='". $book->img. "' alt='' style='width: 50px;'/></td>
            <td><a href='#' class='change_free_book'>Редактировать</a>
            <a href='/wp-admin/admin.php?page=free_book&del_book=$book->id'>Удалить</a></td>
        </tr>";
    }


    $parser = new Parser();
    $parser->parse(TM_DIR."/views/admin_free_book.php",array('slides'=>$generate,
        'message'=>$message), true);
}
//Бесплатные материалы (шорткод)
function free_book_sc(){
    global $wpdb;

    $generate = "";

    $books = $wpdb->get_results("SELECT * FROM free_book");
    foreach ($books as $book) {
        $generate .= '<a href="'.$book->link.'">
                <div class="store__box">
                    <img src="'.$book->img.'" alt="">
                    <div class="store__box--text">
                        <h4>'.$book->title.'</h4>
                        <p>'.$book->descr.'</p>
                    </div>
                    <div class="store__box--price">
                        <h4>'.$book->price.'</h4>
                    </div>
                </div>
            </a>';
    }

    return $generate;
}
add_shortcode('free_book', 'free_book_sc');

//Слайдер на главной (админка)
function service(){
    global $wpdb;

    if (function_exists('wp_enqueue_media')) {
        wp_enqueue_media();
    } else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }

    if(isset($_GET['del_slide'])){
        $wpdb->delete('service',array("id" => $_GET['del_slide']));
        $message = "Слайд успешно удален!";
    }

    if(isset($_POST['attachment_url'])){
        if(isset($_POST['changed']) ){
            $wpdb->update('service',array(
                "img1" => $_POST['attachment_url'],
                "title1" => $_POST['title'],
                "descr1" => $_POST['descr'],
                "img2" => $_POST['attachment_url2'],
                "title2" => $_POST['title2'],
                "descr2" => $_POST['descr2'],
                "img3" => $_POST['attachment_url3'],
                "title3" => $_POST['title3'],
                "descr3" => $_POST['descr3'],
            ),
            array('id' => $_POST["changed"]));
            $message = "Слайд успешно обновлен!";
        }else{
            $wpdb->insert('service', array(
                "img1" => $_POST['attachment_url'],
                "title1" => $_POST['title'],
                "descr1" => $_POST['descr'],
                "img2" => $_POST['attachment_url2'],
                "title2" => $_POST['title2'],
                "descr2" => $_POST['descr2'],
                "img3" => $_POST['attachment_url3'],
                "title3" => $_POST['title3'],
                "descr3" => $_POST['descr3'],
            ));
            $message = "Слайд успешно добавлен!";
        }

        echo mysql_error();
    }


    $generate = '';

    $slides = $wpdb->get_results("SELECT * FROM service");
    foreach ($slides as $slide) {
        $generate .= "<tr data-id='".$slide->id."'>
            <td class='curr_img' style='padding-right: 10px'><img  src='". $slide->img1. "' alt='' style='width: 50px;'/></td>
            <td class='curr_title' style='padding-right: 10px'>". $slide->title1. "</td>
            <td class='curr_descr' style='padding-right: 10px'>". $slide->descr1. "</td>
            <td class='curr_img2' style='padding-right: 10px'><img  src='". $slide->img2. "' alt='' style='width: 50px;'/></td>
            <td class='curr_title2' style='padding-right: 10px'>". $slide->title2. "</td>
            <td class='curr_descr2' style='padding-right: 10px'>". $slide->descr2. "</td>
            <td class='curr_img3' style='padding-right: 10px'><img  src='". $slide->img3. "' alt='' style='width: 50px;'/></td>
            <td class='curr_title3' style='padding-right: 10px'>". $slide->title3. "</td>
            <td class='curr_descr3' style='padding-right: 10px'>". $slide->descr3. "</td>
            <td ><a href='#' class='change_slide'>Редактировать</a>
            <a href='/wp-admin/admin.php?page=service&del_slide=$slide->id'>Удалить</a></td>
        </tr>";
    }


    $parser = new Parser();
    $parser->parse(TM_DIR."/views/admin_service.php",array('slides'=>$generate,
        'message'=>$message), true);
}
//слайдер на главной (шорткод)
function service_sc(){
    global $wpdb;

    $generate = "";

    $slides = $wpdb->get_results("SELECT * FROM service");

    //prn($slides);
    foreach($slides as $slide){
        $generate .= '<div class="services__container">
                <div class="services__container__col">
                    <div class="services__img">
                        <img src="'.$slide->img1.'" alt="">
                    </div>
                    <div class="services__text">
                        <div class="services__text--box">
                            <h4>'.$slide->title1.'</h4>
                            <p>'.$slide->descr1.' </p>
                        </div>
                    </div>
                </div>
                <div class="services__container__col">
                    <div class="services__text">
                        <div class="services__text--box">
                            <h4>'.$slide->title2.'</h4>
                            <p>'.$slide->descr2.'</p>
                        </div>
                    </div>
                    <div class="services__img">
                        <img src="'.$slide->img2.'" alt="">
                    </div>
                </div>
                 <div class="services__container__col">
                    <div class="services__img">
                        <img src="'.$slide->img3.'" alt="">
                    </div>
                    <div class="services__text">
                        <div class="services__text--box">
                            <h4>'.$slide->title3.'</h4>
                            <p>'.$slide->descr3.' </p>
                        </div>
                    </div>
                </div>
            </div>';
    }

    return $generate;
}
add_shortcode('service', 'service_sc');




function write_menu_page(){
    add_menu_page( 'Добавить отзыв', 'Добавить отзыв', 'administrator', 'write_reviews', 'write_reviews_admin_page' );
}

add_action('admin_menu', 'write_menu_page');




function write_reviews_admin_page(){
    $parser = new Parser_write_theme();
    if(isset($_GET['action'])) {
        if ($_GET['action'] == 'add_reviews') {
            $parser->parse(WRITE_THEME_DIR . "/view/add_reviews_view.php", array(), true);
        }

        if ($_GET['action'] == 'del') {
            $gen =new write_theme();
            $del = $gen->delete_reviews($_GET['id']);
            print_reviews();
        }
    }
    else{
        if (isset($_POST['reviews'])){
            $gen = new write_theme();
            $gen->add_reviews($_POST);
        }

        echo print_reviews();
    }
}

function print_reviews(){
    $parser = new Parser_write_theme();
    $gen =new write_theme();
    $res = $gen->get_reviews();
    $data['reviews'] = "";
    foreach ($res as $v) {
        $data['reviews'] .= $parser->parse(WRITE_THEME_DIR."/view/reviews_box_view.php",array('text' => $v->text_reviews,'fio' => $v->fio,'name' => $v->name,'link' => $v->link,'id' => $v->id_reviews), false);
    }

    $parser->parse(WRITE_THEME_DIR."/view/reviews_view.php",$data, true);
}

function reviews_home_short(){
    $parser = new Parser_write_theme();
    $gen =new write_theme();
    $html = '<section class="reviews">
    <div class="contain">
        <div class="reviews__arrow"></div>
        <h1 class="block_title">ОТЗЫВЫ</h1>';
    $res = $gen->get_reviews();
        foreach($res as $r){
            $html .='<div class="reviews__box">
            <p>'.$r->text_reviews.'</p>
            <div class="reviews__box--author">
                <div class="reviews__box--author-img">
                    <img src="'.$r->link.'">
                </div>
                <h4>'.$r->fio.'</h4>
                <p>'.$r->name.'</p>
            </div>
        </div>';
        }
    $html .= '</div>
            </section>';
   return $html;


}
add_shortcode('reviews','reviews_home_short');