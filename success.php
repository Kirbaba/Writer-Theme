<?php
setcookie("cartCookie", '', time()+86400,'/');
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

get_header();
global $wpdb;
$wpdb->update( 'orders',
    array( 'pay' => 1 ),
    array( 'order_key' => $_GET['inv_id'] )
);

?>
<h2>Заказ успешно оплачен.</h2>
<?php
get_footer();
?>
