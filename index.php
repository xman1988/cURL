<?php
/**
 * Точка входа на страницу. 
 * Вызывает метод actionIndex контроллера IndexController.
 *
 */
require_once 'controllers/IndexController.php';

use achivkin\controllers\IndexController;

$obj = new IndexController();
$obj->actionIndex();