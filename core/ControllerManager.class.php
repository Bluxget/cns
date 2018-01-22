<?php
	namespace core;

	/**
	 * Classe de gestion de contrôleur
	 */
	class ControllerManager {

		private static $_controllers = array();

		/**
		 * Retourne l'instance du contrôleur
		 *
		 * @param string $name
		 *
		 * @return Controller
		 */
		public static function getController(string $name)
		{
			return self::$_controllers[$name];
		}

		/**
		 * Charge le contrôleur donné
		 *
		 * @param string $name
		 */
		public static function loadController(string $name)
		{
			if(file_exists(FileManager::getControllerPath($name)))
			{
				if(array_search($name, self::$_controllers) === FALSE)
				{
					require_once \core\FileManager::getControllerPath($name);

					$controller = '\\controllers\\'. ucfirst($name);

					self::$_controllers[$name] = new $controller;
				}
			}
		}
	}
