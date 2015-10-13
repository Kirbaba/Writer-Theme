<?php if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
    <div class="store__box">
        <a href="#" data-toggle="modal" data-target="#send-modal" class="buy-free-but" data-item="<?php echo $my_query->post->ID ?>">
            <div class="store__box--block">
                <?php echo get_the_post_thumbnail($my_query->post->ID,'full') ?>
                <div class="store__box--text">
                    <h4><?php echo get_the_title() ?></h4>
<!--                    <p>--><?php //echo get_the_content()?><!--</p>-->
                </div>
                <div class="store__box--price">
                    <h4>Бесплатно</h4>
                </div>
            </div>
        </a>
        <a class="store__box--more btn btn-primary" href="<?php the_permalink(); ?>">Подробнее</a></div>
    <?
endwhile;
}
wp_reset_query(); ?>