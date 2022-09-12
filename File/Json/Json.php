<?php

namespace Form\File;

class Json extends File
{
    public function __construct( $type, $number, $language, $format )
    {
        parent::__construct( $type, $number, $language, $format );
    }

    public function get_json_file( $type, $number, $language, $format )
    {
        $data = file_get_contents('https://fakerapi.it/api/v1/' . $type . '?_locale=' . $language . '&_quantity=' . $number );
        $filename = self::FIlE_NAME . '.' . $format;
        if ( $type && $language && $number ) {
            $fp = fopen( $filename, 'w' );
            file_put_contents( $filename, $data );
            $file = file_get_contents( $filename );
            $this->file_download( $filename );
            fclose( $fp );
            chmod( $filename, 0777 );
            unset( $file );
        }
        return $data;

    }
}
