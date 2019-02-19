<?php
namespace achivkin\controllers;
/**
 * Class IndexController Класс парсит стороннюю страницу, заполняет html шаблон данными и выводит его на страницу
 *
 */
use achivkin\components\SelectorModel;
use achivkin\models\Curl;

require_once 'models/Curl.php';
require_once 'components/Selector.php';

class IndexController
{
	/**
	 * @var string $url Свойство с url адресом
	 */
	public static $url = 'https://turov.pro/wp-json/wp/v2/posts';
	
	/**
	 * Метод контроллера вызывает модель парсера Curl, 
	 * декодирует json строку в массив статей $arr,
	 * вызывает компонент SelectorModel для редактирования массива
	 * переработанный массив передает в render для вывода на страницу
	 *
	 *  @param array $arr Массив статей
	 *
	 * @return array $newArr Пересобранный массив статей
	 */
	public function actionIndex()
	{
		$modelObj = new Curl();
		$html = $modelObj->index(self::$url);
		$arr = json_decode($html, true);
		$selectorObj = new SelectorModel();
		$newArr = $selectorObj->select($arr);
		$this->render($newArr);
	}
	/**
	 * Метод подключает файл с представлением для вывода на страницу
	 *
	 *  @param array $newArr Массив статей
	 *
	 */
	public function render($newArr = null)
	{
		require_once 'views/layout.php';
	}
}