<?php

namespace Classes;

class Txt extends File
{
    public static function getTxtFile($type, $number, $language, $format)
    {
        $filename = self::FIlE_NAME . '.' . $format;

        if ($type && $language && $number) {
            $fp = fopen($filename, 'w');
            $data = json_decode(self::getData());
            $txt = print_r($data, true);
            file_put_contents($filename, $txt);
            self::fileDownload($filename);
            fclose($fp);
            chmod($filename, 0777);
            unset($file);
        }

        return self::getData();

    }

}
