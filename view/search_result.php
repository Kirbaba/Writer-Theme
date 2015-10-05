<div class="searchTitle"><?= $result['title'] ?></div>
<?php foreach($result['posts'] as $post) { ?>
    <?php $type = 'Запись'; ?>
    <?php if($post->post_type == 'topic') {$type = 'Форум';} ?>
    <?php if($post->post_type == 'store') {$type = 'Магазин';} ?>
    <?php if($post->post_type == 'topic' or $post->post_type == 'post' or $post->post_type == 'store') { ?>
    <div class="searchItem">
        <div class="searchItemTitle"><a href="<?= $post->guid ?>"><?= $post->post_title ?> (<?= $type ?>)</a></div>
        <div class="searchItemText">
            <?= $post->post_content; ?>
        </div>
    </div>
        <?php } ?>
<? } ?>