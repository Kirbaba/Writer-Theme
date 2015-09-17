<h1>Настройки материалов</h1>
<div>
    <h2>{message}</h2>
</div>
<hr>
<table class="admin-table">
    <tr>
        <td valign="top" style="padding-right: 20px">
            <form class="free_book" action="/wp-admin/admin.php?page=free_book" method="post" name="free_book">
                <p><b>Введите заголовок:</b><br>
                <p><input class="title" type="text" name="title" value=""></p>
                <p><b>Введите описание:</b><br>
                <p><input class="descr" type="text" name="descr" value=""></p>
                <p><b>Введите цену:</b><br>
                <p><input class="price" type="text" name="price" value=""></p>
                <p><b>Укажите ссылку:</b><br>
                <p><input class="link" type="text" name="link" value=""></p>
                <p><b>Выберите изображение:</b><br>
                <p><img class="custom_media_image" src="" alt="" style="width: 80px;"></p>
                <p><button class="custom_media_upload">Загрузить</button></p>
                <p><input id="image" class="custom_media_url" type="text" name="attachment_url" value=""></p>
                <p><input type='submit' value='Отправить'/></p>
            </form>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table style="width: 100%">
                <caption>Существующие книги</caption>
                <tr>
                    <td style="padding-right: 10px">
                        <p>Заголовок :</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Описание :</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Цена :</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Ссылка :</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Изображение :</p>
                    </td>
                    <td>
                        <p>Опции</p>
                    </td>
                </tr>
                {slides}
            </table>
        </td>
    </tr>
</table>
<br/>