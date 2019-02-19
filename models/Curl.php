<?php
namespace achivkin\models;
/**
 * Class Curl Модель принимает url страницы и скачивает с нее данные
 *
 */

class Curl
{
	/**
	 * Метод устанавливает соединение с переданным url, используя библиотеку php сURL.
	 *
	 *  @param string $url Адрес url сторонней страницы
	 *
	 * @return string содержит строку в формате json
	 */
	public function index($url)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$html = curl_exec($ch);
		curl_close($ch);
		return $html;
	}
}
