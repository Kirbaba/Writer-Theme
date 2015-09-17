<h1>Настройки слайдера "Наши проекты"</h1>
<div>
    <h2>{message}</h2>
</div>
<hr>
<table class="admin-table">
    <tr>
        <td valign="top" style="padding-right: 20px">
            <form class="service" action="/wp-admin/admin.php?page=service" method="post" name="service">
                <p>
                    <b>Выберите 1-е изображение:</b></br>
                    <img class="custom_media_image" src="" alt="" style="width: 80px;">
                    <input id="image" class="custom_media_url" type="text" name="attachment_url" value="">
                    <button class="custom_media_upload">Загрузить</button>
                </p>
                <p>
                    <b>Укажите заголовок 1:</b></br>
                    <input class="title" type="text" name="title" value="">
                    <b>Укажите описание 1:</b><br>
                    <input class="descr" type="text" name="descr" value="">
                </p>
                <p>
                    <b>Выберите 2-е изображение:</b></br>
                    <img class="custom_media_image2" src="" alt="" style="width: 80px;">
                    <input id="image" class="custom_media_url2" type="text" name="attachment_url2" value="">
                    <button class="custom_media_upload2">Загрузить</button>
                </p>
                <p>
                    <b>Укажите заголовок 2:</b></br>
                    <input class="title2" type="text" name="title2" value="">
                    <b>Укажите описание 2:</b><br>
                    <input class="descr2" type="text" name="descr2" value="">
                </p>
                <p>
                    <b>Выберите 3-е изображение:</b></br>
                    <img class="custom_media_image3" src="" alt="" style="width: 80px;">
                    <input id="image" class="custom_media_url3" type="text" name="attachment_url3" value="">
                    <button class="custom_media_upload3">Загрузить</button>
                </p>
                <p>
                    <b>Укажите заголовок 3:</b></br>
                    <input class="title3" type="text" name="title3" value="">
                    <b>Укажите описание 1:</b><br>
                    <input class="descr3" type="text" name="descr3" value="">
                </p>
                <p><input type='submit' value='Отправить'/></p>
            </form>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table style="width: 100%">
                <caption>Существующие слайды</caption>
                <tr>
                    <td style="padding-right: 10px">
                        <p>Изображение 1 :</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Заголовок 1 :</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Описание 1 :</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Изображение 2 :</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Заголовок 2 :</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Описание 2 :</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Изображение 3 :</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Заголовок 3 :</p>
                    </td>
                    <td style="padding-right: 10px">
                        <p>Описание 3 :</p>
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