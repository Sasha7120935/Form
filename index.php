<?php //ini_set('display_errors', 1);
//error_reporting(E_ALL); ?>
<?php require_once 'classes/File.php'; ?>
<?php //require_once 'classes/Json.php'; ?>
<?php //require_once 'classes/Csv.php'; ?>
<?php //require_once 'classes/Txt.php'; ?>
<?php require_once 'form.html'; ?>
<?php
function classLoader($class)
{
    $filename = $class.'.php' ;
    $dirs = array(__DIR__ .'/' , __DIR__.'/classes/') ;
    foreach ($dirs as $dir)
    {
        if (file_exists($dir.$filename))
        {
            include $dir.$filename ;
            break ;
        }
    }
}
spl_autoload_register('classLoader');
Data::getPost();

