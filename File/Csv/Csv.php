<?php

namespace Form\File;

class Csv extends File
{
    public function __construct( $type, $number, $language, $format )
    {
        parent::__construct( $type, $number, $language, $format );
    }

    public function get_csv_file( $type, $number, $language, $format )
    {
        $data = file_get_contents('https://fakerapi.it/api/v1/' . $type . '?_locale=' . $language . '&_quantity=' . $number );
        $filename = self::FIlE_NAME . '.' . $format;
        if ( $type && $language && $number ) {
            $fp = fopen( $filename, 'w' );
            $data = json_decode( $data, true );
            $process_array = $this->process_array( $data );
            $file = file_put_contents( $filename, $process_array );
            $this->file_download( $filename );
            fclose( $fp );
            chmod( $filename, 0777 );
            unset( $file );
        }
        return $data;
    }
    public function process_array( $data, $level = 0 ) {
        $level++;
        $arr = [];
        if ( ! is_array( $data ) ) {
            $arr[] = $data;
        }
        foreach ( $data as $arrayItem ) {
            $arr = array_merge( $arr, $this->process_array( $arrayItem, $level ) );
        }
        return  $arr;
    }
}
$type = $_POST['type'];
$number = $_POST['number'];
$language = $_POST['language'];
$format = $_POST['format'];
if ($format === 'csv') {
    $obj = new Csv( $type, $number, $language, $format );
    $obj ->get_csv_file( $type, $number, $language, $format );
}

