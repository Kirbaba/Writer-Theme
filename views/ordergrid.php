<div class="col-lg-12">
    <div class="row">
        <?php/* prn($_COOKIE['cartCookie'])*/?>
        <?php  if(!isset($items[0])){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-2">
                       <p class="order-page-title">Фото</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="order-page-title">Наименование товара</p>
                    </div>
                    <div class="col-lg-1">
                        <p class="order-page-title">Кол-во</p>
                    </div>
                    <div class="col-lg-2">
                        <p class="order-page-title">Цена</p>
                    </div>
                    <div class="col-lg-1">

                    </div>
                </div>
            </div>
            <div class="panel-body">
                <ul class="list-group">

                    <?php  foreach($items as $key => $value){ ?>
                        <li class="list-group-item" data-id="<?= $key ?>">
                            <div class="row">
                                <div class="col-lg-2 order-page-thumb">
                                    <?php echo get_the_post_thumbnail($key, 'full'); ?>
                                </div>
                                <div class="col-lg-6 order-page-name">
                                    <?php echo get_the_title($key); ?>
                                </div>
                                <div class="col-lg-1 order-page-count">
                                    <?php echo $value ?>
                                </div>
                                <div class="col-lg-2 order-page-price">
                                    <?php echo $value*get_post_meta($key, 'price', 1) ?> р.
                                </div>
                                <div class="col-lg-1">
                                    <button class="btn btn-danger delete-from-cart">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="panel-footer">
                <div class="row">

                    <div class="col-lg-2 pull-right">
                        <p class="order-page-title">Итого:
                            <?php
                            $sum = 0;
                            foreach($items as $key => $value){
                                $sum = $sum + $value*get_post_meta($key, 'price', 1);
                            }
                            $mrh_login = "vgoidin";
                            $mrh_pass1 = "123edcxzaqws";

                            $inv_id = 0;

                            $inv_desc = "Оплата с сайта http://vgoidin.ru ";

                            $out_summ = $sum;

                            $shp_item = 1;

                            $in_curr = "";

                            $culture = "ru";

                            $encoding = "utf-8";

                            $crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");
                            echo $sum;
                            ?> р.</p>
                        <p><button class="btn btn-primary" data-toggle="modal" data-target="#send-modal">Оформить заказ</button>
                            <!--<form action='https://merchant.roboxchange.com/Index.aspx' method=POST>
                                <input type=hidden name=MrchLogin value='<?/*=$mrh_login*/?>'>
                                <input type=hidden name=OutSum value='<?/*=$out_summ*/?>'>
                                <input type=hidden name=InvId value='<?/*=$inv_id*/?>'>
                                <input type=hidden name=Desc value='<?/*=$inv_desc*/?>'>
                                <input type=hidden name=SignatureValue value='<?/*=$crc*/?>'>
                                <input type=hidden name=Shp_item value='<?/*=$shp_item*/?>'>
                                <input type=hidden name=IncCurrLabel value='<?/*=$in_curr*/?>'>
                                <input type=hidden name=Culture value='<?/*=$culture*/?>'>
                                <input type=submit class="btn btn-primary" value='Оформить заказ'>
                            </form>-->
                        </p>
                    </div>
                    <div class="col-lg-2 pull-left">
                        <br>
                        <p>
                            <a href="/" class="btn btn-danger">Вернуться на главную</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php } else {?>
            <h2 class="empty-cart">Корзина пуста</h2>
            <h3 class="empty-cart"><a href="/">Вернуться на главную</a></h3>
        <?php }?>
    </div>
</div>