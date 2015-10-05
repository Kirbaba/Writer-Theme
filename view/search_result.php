<div class="searchTitle"><?= $result['title'] ?></div>
<?php foreach($result['posts'] as $post) { ?>
    <?php $type = 'Запись'; ?>
    <?php if($post->post_type == 'topic') {$type = 'Форум';} ?>
    <?php if($post->post_type == 'topic' or $post->post_type == 'post') { ?>
    <div class="searchItem">
        <div class="searchItemTitle"><?= $post->post_title ?> (<?= $type ?>)</div>
        <div class="searchItemText">
            <?= $post->post_content; ?>
        </div>
    </div>
        <?php } ?>
<? } ?>