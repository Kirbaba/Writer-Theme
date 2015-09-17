<h1>Настройки "Обо мне"</h1>
<div>
    <h2>{message}</h2>
</div>
<hr>
<table class="admin-table">
    <tr>
        <td valign="top" style="padding-right: 20px">
            <form class='main_slider' action="/wp-admin/admin.php?page=about_me" method="post" name="about_me">
                <p><b>Выберите переднее (маленькое) изображение:</b><br>
                <p><img class="custom_media_image" src="" alt="" style="width: 80px;"></p>
                <p><button class="custom_media_upload">Загрузить</button></p>
                <p><input id="image" class="custom_media_url" type="text" name="attachment_url" value=""></p>
                <p><b>Выберите заднее (большое) изображение:</b><br>
                <p><img class="custom_media_image2" src="" alt="" style="width: 80px;"></p>
                <p><button class="custom_media_upload2">Загрузить</button></p>
                <p><input id="image" class="custom_media_url2" type="text" name="attachment_url2" value=""></p>
                <p><input type='submit' value='Отправить'/></p>
            </form>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table style="width: 100%">
                <caption>Текущие изображения</caption>
                <tr>
                    <td style="padding-right: 10px">
                        <p>Изображение переднее (маленькое) :</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Изображение заднее (большое) :</p>
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