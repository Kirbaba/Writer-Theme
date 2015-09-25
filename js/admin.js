jQuery(document).ready(function ($) {
    jQuery('.custom_media_upload').click(function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            jQuery('.custom_media_image').attr('src', attachment.url);
            jQuery('.custom_media_url').val(attachment.url);
//                jQuery('.custom_media_id').val(attachment.id);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    jQuery('.custom_media_upload2').click(function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            jQuery('.custom_media_image2').attr('src', attachment.url);
            jQuery('.custom_media_url2').val(attachment.url);
//                jQuery('.custom_media_id').val(attachment.id);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });
    jQuery('.custom_media_upload3').click(function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            jQuery('.custom_media_image3').attr('src', attachment.url);
            jQuery('.custom_media_url3').val(attachment.url);
//                jQuery('.custom_media_id').val(attachment.id);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });

    //�������������� ��� ���
    jQuery(document).on('click','.change_about', function(){
        //console.log(jQuery(this));
        var id = jQuery(this).parent().parent().attr('data-id');
        var block = jQuery(this).parent().parent();

        var attachment_url = block.children('.curr_img').children().attr('src');
        var attachment_url2 = block.children('.curr_img2').children().attr('src');

        console.log(attachment_url);
        console.log(attachment_url2);

        jQuery('.custom_media_url').val(attachment_url);
        jQuery('.custom_media_url2').val(attachment_url2);

        if(jQuery('input').is('.changed')){
           // alert("1");
            jQuery('.changed').val(id);
        }else{
           // alert("2");
            jQuery('.about_me').append('<input type="hidden" class="changed" name="changed" value="'+id+'">');
        }
        return false;
    });
    //�������������� ��������
    jQuery(document).on('click','.change_book', function(){
        //console.log(jQuery(this));
        var id = jQuery(this).parent().parent().attr('data-book-id');
        var block = jQuery(this).parent().parent();

        var title = block.children('.curr_title').text();
        var descr = block.children('.curr_descr').text();
        var price = block.children('.curr_price').text();
        var link = block.children('.curr_link').children().attr('href');
        var attachment_url = block.children('.curr_img').children().attr('src');

        jQuery('.title').val(title);
        jQuery('.descr').val(descr);
        jQuery('.link').val(link);
        jQuery('.price').val(price);
        jQuery('.custom_media_url').val(attachment_url);

        if(jQuery('input').is('.changed')){
            // alert("1");
            jQuery('.changed').val(id);
        }else{
            // alert("2");
            jQuery('.store').append('<input type="hidden" class="changed" name="changed" value="'+id+'">');
        }
        return false;
    });
    //�������������� ��������
    jQuery(document).on('click','.change_free_book', function(){
        //console.log(jQuery(this));
        var id = jQuery(this).parent().parent().attr('data-book-id');
        var block = jQuery(this).parent().parent();

        var title = block.children('.curr_title').text();
        var descr = block.children('.curr_descr').text();
        var price = block.children('.curr_price').text();
        var link = block.children('.curr_link').children().attr('href');
        var attachment_url = block.children('.curr_img').children().attr('src');

        jQuery('.title').val(title);
        jQuery('.descr').val(descr);
        jQuery('.link').val(link);
        jQuery('.price').val(price);
        jQuery('.custom_media_url').val(attachment_url);

        if(jQuery('input').is('.changed')){
            // alert("1");
            jQuery('.changed').val(id);
        }else{
            // alert("2");
            jQuery('.free_book').append('<input type="hidden" class="changed" name="changed" value="'+id+'">');
        }
        return false;
    });
    //�������������� ��� ���
    jQuery(document).on('click','.change_slide', function(){
        //console.log(jQuery(this));
        var id = jQuery(this).parent().parent().attr('data-id');
        var block = jQuery(this).parent().parent();

        var attachment_url = block.children('.curr_img').children().attr('src');
        var attachment_url2 = block.children('.curr_img2').children().attr('src');
        var attachment_url3 = block.children('.curr_img3').children().attr('src');
        var title = block.children('.curr_title').text();
        var descr = block.children('.curr_descr').text();
        var title2 = block.children('.curr_title2').text();
        var descr2 = block.children('.curr_descr2').text();
        var title3 = block.children('.curr_title3').text();
        var descr3= block.children('.curr_descr3').text();


        jQuery('.custom_media_url').val(attachment_url);
        jQuery('.custom_media_url2').val(attachment_url2);
        jQuery('.custom_media_url3').val(attachment_url3);

        jQuery('.title').val(title);
        jQuery('.descr').val(descr);

        jQuery('.title2').val(title2);
        jQuery('.descr2').val(descr2);

        jQuery('.title3').val(title3);
        jQuery('.descr3').val(descr3);

        if(jQuery('input').is('.changed')){
            // alert("1");
            jQuery('.changed').val(id);
        }else{
            // alert("2");
            jQuery('.service').append('<input type="hidden" class="changed" name="changed" value="'+id+'">');
        }
        return false;
    });

    jQuery('.custom_media_upload').click(function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function(props, attachment) {
            jQuery('.custom_media_image').attr('src', attachment.url);
            jQuery('.custom_media_url').val(attachment.url);
// jQuery('.custom_media_id').val(attachment.id);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });

});

