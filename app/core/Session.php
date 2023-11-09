<?php

/**
 * Session class
 * Сохранение или считывание данных в текущем сеансе
 */

namespace Core;

defined('ROOTPATH') or exit('Access Denied!');

class Session
{

	public $mainkey = 'APP';
	public $userkey = 'USER';

	/** активирует сеанс, если он еще не запущен **/
	private function start_session(): int
	{
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}

		return 1;
	}

	/** ввод данных в сеанс **/
	public function set(mixed $keyOrArray, mixed $value = ''): int
	{
		$this->start_session();

		if (is_array($keyOrArray)) {
			foreach ($keyOrArray as $key => $value) {

				$_SESSION[$this->mainkey][$key] = $value;
			}

			return 1;
		}

		$_SESSION[$this->mainkey][$keyOrArray] = $value;

		return 1;
	}

	/**получить данные из сеанса. вернуть - значение по умолчанию, если данные не найдены**/
	public function get(string $key, mixed $default = ''): mixed
	{

		$this->start_session();

		if (isset($_SESSION[$this->mainkey][$key])) {
			return $_SESSION[$this->mainkey][$key];
		}

		return $default;
	}

	/** сохраняет данные пользовательской строки в сеансе после входа в систему **/
	public function auth(mixed $user_row): int
	{
		$this->start_session();

		$_SESSION[$this->userkey] = $user_row;

		return 0;
	}

	/** удаляет пользовательские данные из сеанса **/
	public function logout(): int
	{
		$this->start_session();

		if (!empty($_SESSION[$this->userkey])) {

			unset($_SESSION[$this->userkey]);
		}

		return 0;
	}

	/** проверяет, вошел ли пользователь в систему **/
	public function is_logged_in(): bool
	{
		$this->start_session();

		if (!empty($_SESSION[$this->userkey])) {

			return true;
		}

		return false;
	}

	/** получает данные из столбца в пользовательских данных сеанса **/
	public function user(string $key = '', mixed $default = ''): mixed
	{
		$this->start_session();

		if (empty($key) && !empty($_SESSION[$this->userkey])) {

			return $_SESSION[$this->userkey];
		} else

		if (!empty($_SESSION[$this->userkey]->$key)) {

			return $_SESSION[$this->userkey]->$key;
		}

		return $default;
	}

	/** возвращает данные из ключа и удаляет их **/
	public function pop(string $key, mixed $default = ''): mixed
	{
		$this->start_session();

		if (!empty($_SESSION[$this->mainkey][$key])) {

			$value = $_SESSION[$this->mainkey][$key];
			unset($_SESSION[$this->mainkey][$key]);
			return $value;
		}

		return $default;
	}

	/** возвращает все данные из массива APP */
	public function all(): mixed
	{
		$this->start_session();

		if (isset($_SESSION[$this->mainkey])) {
			return $_SESSION[$this->mainkey];
		}

		return [];
	}
}
