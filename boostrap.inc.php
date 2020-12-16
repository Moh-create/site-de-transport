<?php
spl_autoload_register(function ($class) {
 include
$_SERVER['DOCUMENT_ROOT'].'/site-de-transport/class/'.$class.'.php';
});