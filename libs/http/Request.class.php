<?php
	namespace libs\http;

	/**
	 * Classe de gestion de la requête HTTP
	 */
	class Request {

		public static function referer() { return $_SERVER['HTTP_REFERER']; }
		public static function method() { return $_SERVER['REQUEST_METHOD']; }
		public static function uri() { return $_SERVER['REQUEST_URI']; }

		public static function sessionExists(string $key) { return isset($_SESSION[$key]); }
		public static function sessionData(string $key) { return self::sessionExists($key) ? $_SESSION[$key] : null; }

		public static function postExists(string $key) { return isset($_POST[$key]); }
		public static function postData(string $key) { return self::postExists($key) ? $_POST[$key] : null; }

		public static function getExists(string $key) { return isset($_GET[$key]); }
		public static function getData(string $key) { return self::getExists($key) ? $_GET[$key] : null; }
	}
