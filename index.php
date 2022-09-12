<?php

require_once 'File/File.php'; ?>
<?php require_once 'File/Json/Json.php'; ?>
<?php require_once 'File/Csv/Csv.php'; ?>
<?php require_once 'File/Txt/Txt.php'; ?>
<?php require_once 'form.html'; ?>
<?php
$type = $_POST['type'];
$number = $_POST['number'];
$language = $_POST['language'];
$format = $_POST['format'];
if ($type && $language && $format === 'Choose...') {
    echo '<p>Select All Fields</p>';
} else {
    if ($format === 'csv') {
        $obj = new Form\File\Csv($type, $number, $language, $format);
        $obj->get_csv_file($type, $number, $language, $format);
    } elseif ($format === 'txt') {
        $obj = new Form\File\Txt($type, $number, $language, $format);
        $obj->get_txt_file($type, $number, $language, $format);
    } else {
        $obj = new Form\File\Json($type, $number, $language, $format);
        $obj->get_json_file($type, $number, $language, $format);

    }
}
