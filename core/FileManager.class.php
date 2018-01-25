<?php
	namespace core;

	/**
	 * Classe de gestion de fichier
	 */
	class FileManager {

		public const PROJECT_PATH = '/srv/http/john/cns-bis/'; // Ne pas oublier le / à la fin

		/**
		 * Retourne le chemin du contrôleur demandé
		 *
		 * @param string $file
		 *
		 * @return string
		 */
		public static function getControllerPath(string $file)
		{
			return self::PROJECT_PATH .'controllers/'. $file .'.class.php';
		}

		/**
		 * Retourne le chemin du modèle demandé
		 *
		 * @param string $file
		 *
		 * @return string
		 */
		public static function getModelPath(string $file)
		{
			return self::PROJECT_PATH .'models/'. $file .'.class.php';
		}

		/**
		 * Retourne le chemin de la vue demandé
		 *
		 * @param string $file
		 *
		 * @return string
		 */
		public static function getViewPath(string $file)
		{
			return self::PROJECT_PATH .'views/'. $file .'.php';
		}

		/**
		 * Retourne le chemin du lib demandé
		 *
		 * @param string $file
		 *
		 * @return string
		 */
		public static function getLibPath(string $file)
		{
			return self::PROJECT_PATH .'libs/'. $file .'.class.php';
		}

		/**
		 * Retourne le chemin du core demandé
		 *
		 * @param string $file
		 *
		 * @return string
		 */
		public static function getCorePath(string $file)
		{
			return self::PROJECT_PATH .'core/'. $file .'.class.php';
		}

		/**
		 * Retourne le chemin de la DAO demandée
		 *
		 * @param string $file
		 *
		 * @return string
		 */
		public static function getDAOPath(string $file)
		{
			return self::PROJECT_PATH .'dao/'. $file .'.class.php';
		}
	};

	// Inclusion automatique des models
	spl_autoload_register(function ($class) {
		require_once FileManager::getModelPath(str_replace('models\\', '', $class));
	});
