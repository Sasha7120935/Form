<?php

namespace Classes;

class File
{
    protected $type;
    protected $number;
    protected $language;
    protected $format;
    const FIlE_NAME = 'data';

    public function __construct($type, $number, $language, $format)
    {
        $this->type = $type;
        $this->number = $number;
        $this->language = $language;
        $this->format = $format;
    }

    public static function fileDownload($file)
    {
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }

        return $file;
    }

    public static function getData()
    {
        $type = $_POST['type'];
        $number = $_POST['number'];
        $language = $_POST['language'];

        return file_get_contents('https://fakerapi.it/api/v1/' . $type . '?_locale=' . $language . '&_quantity=' . $number);
    }

}
