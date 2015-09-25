<?php

class Write_theme {
    function add_work($arr){
        $data['images'] = $arr['attachment_url'];
        $data['name'] = $arr['name_rab'];
        $data['link'] = $arr['link_rab'];
        global $wpdb;
        $wpdb->insert('work', $data );
    }

    function get_work(){
        global $wpdb;
        $res = $wpdb->get_results("SELECT * FROM work ORDER BY id_work DESC");
        return $res;
    }

    function delete_work($id){
        global $wpdb;
        $wpdb->delete( 'work', array( 'id_work' => $id ) );
    }

    function add_reviews($arr){
        $data['text_reviews'] = $arr['text'];
        $data['fio'] = $arr['fio'];
        $data['name'] = $arr['name'];
        $data['link'] = $arr['attachment_url'];
        global $wpdb;
        $wpdb->insert('reviews', $data );
    }

    function get_reviews(){
        global $wpdb;
        $res = $wpdb->get_results("SELECT * FROM reviews ORDER BY id_reviews DESC LIMIT 2");
        return $res;
    }
    function get_reviews_one(){
        global $wpdb;
        $res = $wpdb->get_results("SELECT * FROM reviews LIMIT 1");
        return $res;
    }

    function delete_reviews($id){
        global $wpdb;
        $wpdb->delete( 'reviews', array( 'id_reviews' => $id ) );
    }

    function get_all_reviews(){
        global $wpdb;
        $res = $wpdb->get_results("SELECT * FROM reviews");
        $k=0;
        foreach($res as $v){
            $k++;
        }
        return $k;
    }

} 