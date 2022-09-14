<?php


class Json extends File
{
    public function __construct($type, $number, $language, $format)
    {
        parent::__construct($type, $number, $language, $format);
    }

    public static function getJsonFile($type, $number, $language, $format)
    {
        $filename = self::FIlE_NAME . '.' . $format;
        if ($type && $language && $number) {
            $fp = fopen($filename, 'w');
            file_put_contents($filename, self::getData());
            $file = file_get_contents($filename);
            self::fileDownload($filename);
            fclose($fp);
            chmod($filename, 0777);
            unset($file);
        }
        return self::getData();

    }
}
$type = $_POST['type'];
$number = $_POST['number'];
$language = $_POST['language'];
$format = $_POST['format'];
if ($format === 'json') {
    Json::getJsonFile($type, $number, $language,$format);
}
