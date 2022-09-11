<?php require_once 'File/File.php'; ?>
<?php require_once 'File/Json/Json.php'; ?>
<?php require_once 'File/Csv/Csv.php'; ?>
<?php require_once 'File/Txt/Txt.php'; ?>
<?php require_once 'form.html'; ?>
<?php
   if (  $_POST['type'] && $_POST['language'] && $_POST['format']  === 'Choose...' ) {
       echo '<p>Select All Fields</p>';
    }
   ?>

