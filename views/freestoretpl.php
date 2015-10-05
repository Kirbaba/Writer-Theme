<?php if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
<a href="#" class="buy-but" data-id="<?php echo $my_query->post->ID ?>">
    <div class="store__box">
       <?php echo get_the_post_thumbnail($my_query->post->ID,'full') ?>
        <div class="store__box--text">
            <h4><?php echo get_the_title() ?></h4>
            <p><?php echo get_the_content()?></p>
        </div>
        <div class="store__box--price">
            <h4>Бесплатно</h4>
        </div>
    </div>
</a>
    <?
endwhile;
}
wp_reset_query(); ?>