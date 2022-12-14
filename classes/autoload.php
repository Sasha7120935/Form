<?php

namespace Classes;

class Autoload
{
    public static function getPost()
    {
        $type = $_POST['type'];
        $number = $_POST['number'];
        $language = $_POST['language'];
        $format = $_POST['format'];
        if ($format === 'csv') {
           Csv::getCsvFile($type, $number, $language, $format);
        } elseif ($format === 'txt') {
            Txt::getTxtFile($type, $number, $language, $format);
        } else {
            Json::getJsonFile($type, $number, $language, $format);
        }
    }
}
