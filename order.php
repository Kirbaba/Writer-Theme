<?php
$items = explode(',',$_COOKIE['cartCookie']);
setcookie("cartCookie", "", time()+86400,'/');

require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

get_header();

?>
<div class="orderWrap">
    <div class="orderPay">

<?php

/* Источник: http://n-wp.ru/8295 */
$mrh_login = "vgoidin";
$mrh_pass1 = "12345qwert";

$inv_id = generateNumber();

$inv_desc = "Оплата с сайта http://vgoidin.ru, E-mail: ".$_POST['order-mail'].", Номер заказа: ".$inv_id  ;

$out_summ = $_POST['sum'];

$is_test = 1;

$shp_item = 1;

$in_curr = "";

$culture = "ru";

$encoding = "utf-8";

$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");

?>
        <span class="orderId">Номер заказа: <?=$inv_id?></span>
        <form action='https://merchant.roboxchange.com/Index.aspx' method=POST>
            <input type=hidden name=MrchLogin value='<?=$mrh_login?>'>
            <input type=hidden name=OutSum value='<?=$out_summ?>'>
            <input type=hidden name=IsTest value='<?=$is_test?>'>
            <input type=hidden name=InvId value='<?=$inv_id?>'>
            <input type=hidden name=Desc value='<?=$inv_desc?>'>
            <input type=hidden name=SignatureValue value='<?=$crc?>'>
            <input type=hidden name=Shp_item value='<?=$shp_item?>'>
            <input type=hidden name=IncCurrLabel value='<?=$in_curr?>'>
            <input type=hidden name=Culture value='<?=$culture?>'>
            <label class="sbmLabel" for="sbm">К оплате: <?=$out_summ?> руб.</label>
            <input id="sbm" type=submit class="btn btn-primary" value='Оплатить'>
        </form>
    </div>
</div>
<?php


//получаем количество одинаковых товаров

if(empty($items[0])){
    $items[0] = 0;
}else{
    $items = array_count_values($items);
}

$i = 0;
$books = '';
foreach($items as $k=>$v){
    if($i == 0){
        $books .= $k;
    }
    else{
        $books .= ",".$k;
    }
    $i++;
}

global $wpdb;
$wpdb->insert( 'orders', [
    'order_key'=>$inv_id,
    'pay'=>0,
    'sum'=>$out_summ,
    'books'=>$books,
    'email'=>$_POST['order-mail'],
    'phone'=>$_POST['order-phone']
] );

$admin_email = get_option('admin_email');
$text = "Поступил новый заказ, номер заказа: ".$inv_id;
mail($admin_email, "Заказ товара с вашего сайта",$text,"Content-type: text/html; charset=UTF-8\r\n");
get_footer();
