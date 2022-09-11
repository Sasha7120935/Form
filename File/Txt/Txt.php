<?php

namespace Form\File;

class Txt extends File
{
    public function __construct( $type, $number, $language, $format )
    {
        parent::__construct( $type, $number, $language, $format );
    }
    public function get_txt_file( $type, $number, $language, $format )
    {
        $data = file_get_contents('https://fakerapi.it/api/v1/' . $type . '?_locale=' . $language . '&_quantity=' . $number);
        $filename = self::FIlE_NAME . '.' . $format;
        if ( $type && $language && $number ) {
            $fp = fopen( $filename, 'w' );
            $data = json_decode( $data );
            $txt = print_r( $data, true );
            file_put_contents( $filename, $txt );
            $this->file_download( $filename );
            fclose( $fp );
            chmod( $filename, 0777 );
            unset( $file );
            return $data;
        }

    }

}

$type = $_POST['type'];
$number = $_POST['number'];
$language = $_POST['language'];
$format = $_POST['format'];
if ($format === 'txt') {
    $obj = new Txt( $type, $number, $language, $format );
    $obj->get_txt_file( $type, $number, $language, $format );
}
