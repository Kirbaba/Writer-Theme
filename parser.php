<?php
class Parser {

    public function parse ($tpl, $data = array(), $view = false) {
        $file = file_get_contents($tpl); // Получаем шаблон

        foreach ($data as $key => $value) {
            $key = "{".$key."}";
            $file = preg_replace("/$key/", $value, $file);
        }

        if ($view == true) {
            echo $file;
        }
        elseif($view == false) {
            return $file;
        }
    }

} 