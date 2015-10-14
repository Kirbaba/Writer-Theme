<?php

define('WRITE_THEME_DIR', plugin_dir_path(__FILE__));
define('WRITE_THEME_URL', plugin_dir_url(__FILE__));

require_once(WRITE_THEME_DIR."lib/Parser_write_theme.php");
require_once(WRITE_THEME_DIR."lib/Write_theme.php");

define('TM_DIR', get_template_directory(__FILE__));
define('TM_URL', get_template_directory_uri(__FILE__));

function add_style_wt(){
    wp_enqueue_style( 'my-bootstrap-extension', get_template_directory_uri() . '/css/bootstrap.css', array(), '1');
    wp_enqueue_style( 'my-styles', get_template_directory_uri() . '/css/style.css', array(), '1');
    wp_enqueue_style( 'my-sass', get_template_directory_uri() . '/sass/style.css', array('my-styles'), '1');
    wp_enqueue_style( 'fotorama', get_template_directory_uri() . '/css/fotorama.css', array('my-styles'), '1');
    wp_enqueue_style( 'fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array('my-styles'), '1');
}

function add_script_wt(){
    //wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jq.js', array(), '1');
    wp_enqueue_script( 'jq', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '1');
    wp_enqueue_script( 'my-bootstrap-extension', get_template_directory_uri() . '/js/bootstrap.js', array(), '1');
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/script.js', array(), '1');
    wp_enqueue_script( 'fotorama-js', get_template_directory_uri() . '/js/fotorama.js', array(), '1');

}

function add_admin_script(){
    //wp_enqueue_script('admin',get_template_directory_uri() . '/js/admin.js', array(), '1');
    wp_enqueue_style( 'my-bootstrap-extension-admin', get_template_directory_uri() . '/css/bootstrap.css', array(), '1');
    //wp_enqueue_style( 'my-style-admin', get_template_directory_uri() . '/css/admin.css', array(), '1');

}

add_action('admin_enqueue_scripts', 'add_admin_script');

add_action( 'wp_enqueue_scripts', 'add_style_wt' );
add_action( 'wp_enqueue_scripts', 'add_script_wt' );

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
//    add_menu_page( 'Магазин книг', 'Книги', 'manage_options', 'store', 'store' );
//    add_menu_page( 'Бесплатные материалы', 'Материалы', 'manage_options', 'free_book', 'free_book' );
    add_menu_page( 'Услуги', 'Услуги', 'manage_options', 'service', 'service' );
}

// load script to admin
function admin_js() {
    $url = TM_URL . '/js/admin.js';
    echo "<script type='text/javascript' src='$url'></script>";
}
add_action('admin_head', 'admin_js');

// Обо мне
function about_me(){
    global $wpdb;

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
            $wpdb->update('about_me-text',array("txt" => $_POST['aboutme__admin_text'],"link" => $_POST['aboutme__admin_link']), array('id' => "1"));
            $message = "Текст успешно обновлен!";
        }else{
            $wpdb->insert('about_me-text', array("txt" => $_POST['aboutme__admin_text'],"link" => $_POST['aboutme__admin_link']));
            $message = "Текст успешно обновлен!";
        }

        echo mysql_error();
    }


    $generate = '';
    $generate2 = '';

    $texts = $wpdb->get_results("SELECT * FROM `about_me-text`"); 

    foreach ($texts as $text) {
        $generate2 .= "
                <p><b>Текущий текст:</b><br>$text->txt</p>
                <p><b>Ссылка кнопки 'Узнать больше':</b><br> <a href='#'>$text->link</a></p> 
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


    $parser = new Parser_write_theme();
    $parser->parse(TM_DIR."/views/admin_about.php",array('slides'=>$generate, 'texts'=>$generate2,
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

//Обо мне (шорткод) - текст
function about_me_text_sc(){
    global $wpdb;

    $generate = "";

    $slides = $wpdb->get_results("SELECT * FROM `about_me-text`");

    //prn($slides);

    $generate .= '<p>'.$slides[0]->txt.'</p>';
            /* <a href="'.$slides[0]->link.'">узнать больше</a>';*/

    return $generate;
}
add_shortcode('about_me_text', 'about_me_text_sc');

//Магазин
/*function store(){
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


    $parser = new Parser_write_theme();
    $parser->parse(TM_DIR."/views/admin_store.php",array('slides'=>$generate,
        'message'=>$message), true);
}*/
//Магазин (шорткод)
function store_sc(){
    $type = 'store';
    $args = array(
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => -1);

    $my_query = null;
    $my_query = new WP_Query($args);

    $parser = new Parser_write_theme();
    $parser->render(TM_DIR . '/views/storetpl.php', ['my_query' => $my_query]);
}
add_shortcode('store', 'store_sc');



//Бесплатные материаы (админка)
/*function free_book(){
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


    $parser = new Parser_write_theme();
    $parser->parse(TM_DIR."/views/admin_free_book.php",array('slides'=>$generate,
        'message'=>$message), true);
}*/
//Бесплатные материалы (шорткод)
function free_book_sc(){
    $type = 'freestore';
    $args = array(
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => -1);

    $my_query = null;
    $my_query = new WP_Query($args);

    $parser = new Parser_write_theme();
    $parser->render(TM_DIR . '/views/freestoretpl.php', ['my_query' => $my_query]);
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


    $parser = new Parser_write_theme();
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

//Поиск по сайту
function search_function(){
    $parser = new Parser_write_theme();
    if(isset($_POST['s'])){
        $parser->render(WRITE_THEME_DIR."/view/search_result.php",[]);
    }
    else {
        $parser->render(WRITE_THEME_DIR."/view/search_page.php",[]);
    }
}

function getSearch(){
    global $wpdb;
    $parser = new Parser_write_theme();

    $s = $_POST['s'];

    $result['title'] = $_POST['s'];
    $result['posts'] = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_title LIKE '%$s%'");

    $parser->render(WRITE_THEME_DIR."/view/search_result.php",['result' => $result]);
    die();
}

add_shortcode('search','search_function');
add_action('wp_ajax_nopriv_get_search', 'getSearch');
add_action('wp_ajax_get_search', 'getSearch');
add_action('wp_ajax_nopriv_add_to_cart', 'addToCart');
add_action('wp_ajax_add_to_cart', 'addToCart');
add_action('wp_ajax_nopriv_del_from_cart', 'delFromCart');
add_action('wp_ajax_del_from_cart', 'delFromCart');
add_action('wp_ajax_nopriv_order', 'set_order');
add_action('wp_ajax_order', 'set_order');
add_action('wp_ajax_nopriv_get_count', 'getCartCount');
add_action('wp_ajax_get_count', 'getCartCount');
add_action('wp_ajax_nopriv_freeorder', 'set_free_order');
add_action('wp_ajax_freeorder', 'set_free_order');

/*------------------------СТРАНИЦА Книги------------------------------*/
add_action('init', 'my_custom_init_store');
function my_custom_init_store()
{
    $labels = array(
        'name' => 'Магазин', // Основное название типа записи
        'singular_name' => 'Товар', // отдельное название записи типа Book
        'add_new' => 'Добавить товар',
        'add_new_item' => 'Добавить новый товар',
        'edit_item' => 'Редактировать товар',
        'new_item' => 'Новый товар',
        'view_item' => 'Посмотреть товар',
        'search_items' => 'Найти товар',
        'not_found' =>  'Товаров не найдено',
        'not_found_in_trash' => 'В корзине товаров не найдено',
        'parent_item_colon' => '',
        'menu_name' => 'Магазин'

    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail')
    );
    register_post_type('store',$args);
}

add_action('init', 'my_custom_init_freestore');
function my_custom_init_freestore()
{
    $labels = array(
        'name' => 'Бесплатные материалы', // Основное название типа записи
        'singular_name' => 'Товар', // отдельное название записи типа Book
        'add_new' => 'Добавить товар',
        'add_new_item' => 'Добавить новый товар',
        'edit_item' => 'Редактировать товар',
        'new_item' => 'Новый товар',
        'view_item' => 'Посмотреть товар',
        'search_items' => 'Найти товар',
        'not_found' =>  'Товаров не найдено',
        'not_found_in_trash' => 'В корзине товаров не найдено',
        'parent_item_colon' => '',
        'menu_name' => 'Бесплатные материалы'

    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail')
    );
    register_post_type('freestore',$args);
}

function my_extra_fields() {
    add_meta_box( 'extra_price', 'Цена', 'extra_fields_box_func', 'store', 'normal', 'high'  );
}
add_action('add_meta_boxes', 'my_extra_fields', 1);

function extra_fields_box_func( $post ){
    ?>
    <p><span>Введите только цифры.</span><input type="text"  name="extra[price]" value="<?php echo get_post_meta($post->ID, 'price', 1); ?>" style="width:50%" /></p>
    <?php
}
function extra_fields_title_func( $post ){
    ?>
    <p><span>Введите подзаголовок.</span><input type="text"  name="extra[subtitle]" value="<?php echo get_post_meta($post->ID, 'subtitle', 1); ?>" style="width:50%" /></p>
    <?php
}

add_action('save_post', 'my_extra_fields_update', 10, 1);

/* Сохраняем данные, при сохранении поста */
function my_extra_fields_update( $post_id ){

    if( !isset($_POST['extra']) ) return false;
    foreach( $_POST['extra'] as $key=>$value ){
        if( empty($value) ){
            delete_post_meta($post_id, $key); // удаляем поле если значение пустое
            continue;
        }

        update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
    }
    return $post_id;
}

// Настройки темы

add_action('customize_register', function($customizer){
    /*Меню настройки контактов*/
    $customizer->add_section(
        'contacts_section',
        array(
            'title' => 'Настройки контактов',
            'description' => 'Контакты',
            'priority' => 35,
        )
    );
    $customizer->add_setting(
        'phone_textbox',
        array('default' => '(416) 555-5252')
    );
    $customizer->add_control(
        'phone_textbox',
        array(
            'label' => 'Телефон',
            'section' => 'contacts_section',
            'type' => 'text',
        )
    );
    $customizer->add_setting(
        'email_textbox',
        array('default' => 'hello@treehouse.com')
    );
    $customizer->add_control(
        'email_textbox',
        array(
            'label' => 'Email',
            'section' => 'contacts_section',
            'type' => 'text',
        )
    );


    /*меню настройки соц сетей*/
    $customizer->add_section(
        'social_section',
        array(
            'title' => 'Соц. сети',
            'description' => 'Ссылки на соц. сети',
            'priority' => 35,
        )
    );
    $customizer->add_setting(
        'tw_textbox',
        array('default' => '')
    );
    $customizer->add_setting(
        'fb_textbox',
        array('default' => '')
    );
    $customizer->add_setting(
        'p_textbox',
        array('default' => '')
    );
    $customizer->add_setting(
        'gpl_textbox',
        array('default' => '')
    );
    $customizer->add_setting(
        'vk_textbox',
        array('default' => '')
    );
    $customizer->add_setting(
        'in_textbox',
        array('default' => '')
    );
    $customizer->add_setting(
        'ok_textbox',
        array('default' => '')
    );
    $customizer->add_setting(
        'yt_textbox',
        array('default' => '')
    );
    $customizer->add_setting(
        'vim_textbox',
        array('default' => '')
    );
    $customizer->add_setting(
        'tm_textbox',
        array('default' => '')
    );
    $customizer->add_setting(
        'sk_textbox',
        array('default' => '')
    );





    $customizer->add_control(
        'fb_textbox',
        array(
            'label' => 'Facebook',
            'section' => 'social_section',
            'type' => 'text',
        )
    );

    $customizer->add_control(
        'gpl_textbox',
        array(
            'label' => 'Google+',
            'section' => 'social_section',
            'type' => 'text',
        )
    );

    $customizer->add_control(
        'p_textbox',
        array(
            'label' => 'Pinterest',
            'section' => 'social_section',
            'type' => 'text',
        )
    );


    $customizer->add_control(
        'tw_textbox',
        array(
            'label' => 'Twitter',
            'section' => 'social_section',
            'type' => 'text',
        )
    );

    $customizer->add_control(
        'vk_textbox',
        array(
            'label' => 'Vkontakte',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'in_textbox',
        array(
            'label' => 'Instagram',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'ok_textbox',
        array(
            'label' => 'Odnoklassniki',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'yt_textbox',
        array(
            'label' => 'Youtube',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'vim_textbox',
        array(
            'label' => 'Vimeo',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'tm_textbox',
        array(
            'label' => 'Tumblr',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'sk_textbox',
        array(
            'label' => 'Skype',
            'section' => 'social_section',
            'type' => 'text',
        )
    );

});

function addToCart(){
    $itemId = $_POST['id'];

    if(isset($_COOKIE['cartCookie'])){
        $newCookie = $_COOKIE['cartCookie'].','.$itemId;
    }else{
        $newCookie = $itemId;
    }

    setcookie("cartCookie", $newCookie, time()+86400,'/');
    // prn($newCookie);
    die();
}

function delFromCart(){
    $itemId = $_POST['id'];

    $items = explode(',',$_COOKIE['cartCookie']);
    //получаем количество одинаковых товаров


    foreach($items as $key => $item){
        if($item == $itemId){
            unset($items[$key]);
        }
    }

    // prn($items);
    $items = implode(',',$items);

    setcookie("cartCookie", $items, time()+86400,'/');
    // prn($newCookie);
    die();
}

function order_page_sc(){
    global $current_user;
    get_currentuserinfo();

    $items = explode(',',$_COOKIE['cartCookie']);

    //получаем количество одинаковых товаров

    if(empty($items[0])){
        $items[0] = 0;
    }else{
        $items = array_count_values($items);
    }
   // prn($items);
    $user = $current_user->user_email;
    $parser = new Parser_write_theme();
    $parser->render(TM_DIR . '/views/ordergrid.php', ['items' => $items, 'user' => $user]);
}

add_shortcode('order_page', 'order_page_sc');

function set_order(){

    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $admin_email = get_option('admin_email');
    //prn($admin_email);
    $items = explode(',',$_COOKIE['cartCookie']);
    //получаем количество одинаковых товаров
    $items = array_count_values($items);


    $str = "С вашего сайта заказали товар:<br>";
    $sum = 0;
    foreach($items as $key => $value){
        $sum = $sum + $value*get_post_meta($key, 'price', 1);

        $str .= 'ID товара: '.$key.'<br>';
        $str .= 'Название: '.get_the_title($key).' <br>';
        $str .= 'Кол-во: '. $value .' <br>';
        $str .= 'Цена: '. $value*get_post_meta($key, 'price', 1) .' р. <br><br>';
    }

    $str .= 'Итого: '.$sum.' р. <br><br>';
    $str .= 'Имя заказчика: '.$name.' <br>';
    $str .= 'Email : '.$mail.' <br>';
    $str .= 'Телефон для связи : '.$phone.' <br>';
    $str .= 'Адресс доставки : '.$address.' <br>';

    mail($admin_email, "Заказ товара с вашего сайта",
        $str,
        "Content-type: text/html; charset=UTF-8\r\n");

    setcookie("cartCookie", "", time()+86400,'/');
    die();
}

function generateNumber($length = 8){
    $chars = '0123456789';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}

add_shortcode('auth_link', 'auth_link_fn');

function auth_link_fn(){
    global $current_user;
    get_currentuserinfo();

    if(empty($current_user->user_login)){
        echo '<br><a href="/wp-login.php?action=register">Регистрация</a> / <a href="/wp-login.php">Вход</a>';
    }
}

add_shortcode('to_scroll', 'to_scroll_fn');

function to_scroll_fn(){
    global $current_user;
    get_currentuserinfo();

    if(empty($current_user->user_login)){
        echo '<div id="auth-user" data-value="0"></div>';
    }
    else {
        echo '<div id="auth-user" data-value="1"></div>';
    }
}

function getCartCount()
{
    $items = explode(',', $_COOKIE['cartCookie']);
    if(empty($items[0])){
       // prn($items);
    }else{
       // prn($items);
        echo count($items);
    }
    die();
}

/*------------------------Заказы------------------------------*/

function register_orders_page(){
    add_menu_page(
        'Заказы', 'Заказы', 'manage_options', 'orders', 'admin_orders_page', '', 200
    );
}

function admin_orders_page(){
    global $wpdb;
    $parser = new Parser_write_theme();

    if(isset($_GET['del'])){
        $wpdb->delete( 'orders', ['id'=>$_GET['del']] );
    }

    $orders = $wpdb->get_results("SELECT * FROM orders", ARRAY_A);

    $parser->render(TM_DIR . '/view/orders_admin_page.php', ['orders' => $orders]);
}

add_action( 'admin_menu', 'register_orders_page' );

function set_free_order(){

    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $id   = $_POST['id'];

    $admin_email = get_option('admin_email');

    $str = "С вашего сайта заказали товар:<br>";

    $str .= 'ID товара: '.$id.'<br>';
    $str .= 'Название: '.get_the_title($id).' <br>';
    $str .= 'Цена: Бесплатно <br><br>';


    $str .= 'Итого: 0 р. <br><br>';
    $str .= 'Имя заказчика: '.$name.' <br>';
    $str .= 'Email : '.$mail.' <br>';

    mail($admin_email, "Заказ товара с вашего сайта",
        $str,
        "Content-type: text/html; charset=UTF-8\r\n");

    setcookie("cartCookie", "", time()+86400,'/');
    die();
}