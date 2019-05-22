<?php
const DIR = __DIR__;

// запуск загрузчика
require_once __DIR__."\loader\loader.php";
// запуск разбора url
(new request)->url();

 ?>