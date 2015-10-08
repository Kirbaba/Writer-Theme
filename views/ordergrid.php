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
                            echo $sum;?> р.</p>
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
<!-- Modal -->
<div class="modal fade" id="send-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Оформление заказа</h4>
            </div>
            <form action="<?=get_template_directory_uri()?>/order.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon1">Имя</span>
                            <input type="text" name="order-name" class="form-control" placeholder="Укажите ваше имя" aria-describedby="sizing-addon1">
                        </div>
                        <br>
                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon1">E-mail</span>
                            <input type="email" name="order-mail" class="form-control" value="<?=$user?>" aria-describedby="sizing-addon1">
                        </div>
                        <br>
                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon1">Телефон</span>
                            <input type="text" name="order-phone" class="form-control" placeholder="Телефон для связи" aria-describedby="sizing-addon1">
                        </div>
                        <br>
                    </div>
                </div>
                <input type="hidden" name="sum" value="<?=$sum?>">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>