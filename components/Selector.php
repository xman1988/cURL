<?php
/**
 * Class SelectorModel Компонент вносит изменения в массив статей 
 * с помощью библиотеки для работы с DOM
 *
 */

namespace achivkin\components;
require_once 'libs/simple_html_dom.php';

class SelectorModel
{
	/**
	 * Метод перебирает переданный массив $arr. 
	 * Выбирает тег <iframe> и родительский тег <p>,затем удаляет теги и их содержимое. 
	 * Оставшиеся заголовки и статьи кладет в новый массив $newArr 
	 * 
	 *  @param array $arr Массив статей
	 *
	 * @return array $newArr Пересобранный массив статей
	 */
	public function select($arr)
	{
		$newArr = [];
		$i = 0;
		foreach ($arr as $item) {
			$newArr[$i]['title'] = $item['title']['rendered'];
			$str = $item['content']['rendered'];
			$html = str_get_html($str);
			$frame = $html->find('iframe');
			foreach ($frame as $value) {
				$value->outertext = '';
			}
			$str = $html->save();
			$newArr[$i]['article'] = $str;
			$html->clear();
			unset($html);
			$i++;
		}
		return $newArr;
	}
}