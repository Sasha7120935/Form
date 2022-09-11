<?php

namespace Form\File;

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

    public function file_download( $file )
    {
        if (file_exists( $file )) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename( $file ) );
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize( $file ) );
            readfile( $file );
            exit;
        }
        return $file;
    }


}