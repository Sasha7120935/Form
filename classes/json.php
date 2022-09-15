<?php

namespace Classes;

class Json extends File
{
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
