<?php

class Csv extends File
{
    public function __construct($type, $number, $language, $format)
    {
        parent::__construct($type, $number, $language, $format);
    }

    public static function getCsvFile($type, $number, $language, $format)
    {
        $filename = self::FIlE_NAME . '.' . $format;

        if ($type && $language && $number) {
            $fp = fopen($filename, 'w');
            $data = json_decode(self::getData(), true);
            $process_array = self::processArray($data);
            $file = file_put_contents($filename, $process_array);
            self::fileDownload($filename);
            fclose($fp);
            chmod($filename, 0777);
            unset($file);
        }
        return self::getData();
    }

    public static function processArray($data, $level = 0): array
    {
        $level++;
        $arr = [];
        if (!is_array($data)) {
            $arr[] = $data;
        }
        foreach ($data as $arrayItem) {
            $arr = array_merge($arr, self::processArray($arrayItem, $level));
        }
        return $arr;
    }
}
$type = $_POST['type'];
$number = $_POST['number'];
$language = $_POST['language'];
$format = $_POST['format'];
if ($format === 'csv') {
    Csv::getCsvFile($type, $number, $language,$format);
}
