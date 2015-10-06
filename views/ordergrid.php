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
                            echo $sum;
                            ?> р.</p>
                        <p><button class="btn btn-primary" data-toggle="modal" data-target="#send-modal">Оформить заказ</button></p>
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