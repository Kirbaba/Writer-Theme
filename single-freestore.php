<? get_header();?>
<section class="single">
    <div class="contain store-single">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php if ( has_post_thumbnail() ): ?>
                <h1 class="single__name"><?php the_title(); ?></h1>
                <div class="single__thumb">
                    <?php the_post_thumbnail(array(400,300), array('class'=>'new-img-pr')); ?>
                </div>
            <?php  endif;?>

            <div class="single__text store-single-text">
                <?php the_content(); ?>
            </div>

            <div class="single__buttons">
                <?php if('freestore' == get_post_type()){ ?>
                    <a href="#" data-toggle="modal" data-target="#send-modal" class="btn btn-danger buy-free-but" data-item="<?php echo get_the_ID() ?>">Заказать</a>
                    <a href="/#go_materials" class="btn btn-primary">Назад</a>
                <?php } else {?>
                    <a href="#" data-toggle="modal" data-target="#buy-modal" class="btn btn-danger buy-but" data-item="<?php echo get_the_ID() ?>">Купить</a>
                    <a href="/#go_store" class="btn btn-primary">Назад</a>
                <?php } ?>

            </div>
        <?php endwhile; ?>
        <?php  endif;?>
    </div>
</section>
<div class="modal fade" id="buy-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Товар добавлен в корзину</h4>
            </div>
            <div class="modal-body">
                <!--<p>Укажите ваше имя:</p>
                <input type="text" name="order-name">
                <p>Укажите ваш e-mail:</p>
                <input type="email" name="order-mail">-->
                <div class="row">
                    <div class="pull-left">
                        <a class="gonext" href="#" data-dismiss="modal">
                            <h4> Вернуться на сайт</h4>
                        </a>
                    </div>
                    <div class="pull-right">
                        <a class="goorder" href="/cart">
                            <h4>Оформить заказ <span class="glyphicon glyphicon-share-alt"></span></h4>
                        </a>
                    </div>
                </div>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-success send-order" data-dismiss="modal">Отправить</button>
            </div>-->
        </div>
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

            <div class="modal-body">
                <div class="row">
                    <div class="input-group input-group">
                        <span class="input-group-addon" id="sizing-addon1">Имя</span>
                        <input type="text" name="order-name" class="form-control" placeholder="Укажите ваше имя" aria-describedby="sizing-addon1">
                    </div>
                    <br>
                    <div class="input-group input-group">
                        <span class="input-group-addon" id="sizing-addon1">E-mail</span>
                        <input type="email" name="order-mail" class="form-control" placeholder="Укажите ваш e-mail" aria-describedby="sizing-addon1">
                    </div>
                    <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-success send-free-order">Отправить</button>
            </div>

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ok-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3>Спасибо. Мы вышлем Вам материал на указанный адрес электронной почты в ближайшее время</h3>
                <a href="/" class="btn btn-warning">Вернуться на главную</a>
            </div>
        </div>
    </div>
</div>

<div class="wrap" style="width:100%"></div>

<? get_footer(); ?>
