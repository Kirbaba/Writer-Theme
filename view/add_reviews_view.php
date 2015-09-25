<h1>Добавить отзыв</h1>

<form action="/wp-admin/admin.php?page=write_reviews" method="post">
    <p>Введите отзыв <textarea name="text"></textarea> </p>
    <p>Введите ФИО <input type="text" name="fio" id=""/></p>
    <p>Введите название фирмы <input type="text" name="name" id=""/></p>
    <p><img class="custom_media_image" src="" alt="" style="width: 80px;"></p>
    <p><button class="custom_media_upload">Загрузить</button></p>
    <p><input id="image" class="custom_media_url" type="hidden" name="attachment_url" value=""></p>

    <input type="submit" name="reviews" value = "Добавить отзыв"/>
</form>