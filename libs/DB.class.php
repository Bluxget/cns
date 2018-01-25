<?php
	namespace libs;
	use \PDO;
	
	/**
	 * Gestion des requêtes et de la connexion à la base de donnée basé sur le design pattern Singleton
	 */
	final class DB {
		
		private const DB_HOST = 'localhost';
		private const DB_NAME = 'cns';
		private const DB_USER = 'root';
		private const DB_PASSWORD = 'toor';
		
		private static $_db;

		/**
		 * Initialisation de la connexion à la base de donnée
		 *
		 * @return void
		 */
		private static function init()
		{
			try 
			{
				self::$_db = new PDO('mysql:host='. self::DB_HOST .';dbname='. self::DB_NAME .';charset=utf8', self::DB_USER, self::DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch(PDOException $e) 
			{
				echo $e->getMessage();
				die();
			}
		}
		
		/**
		 * Convertit tous les caractères éligibles en entités HTML
		 *
		 * @param array $params Paramètres à sécurisé
		 *
		 * @return array
		 */
		private static function format(array $params)
		{
			foreach($params as &$param)
			{
				if(gettype($param) == 'string')
					$param = htmlentities(addslashes($param));
			}
			
			return $params;
		}
		
		/**
		 * Execution d'une requête vers la base de donnée
		 *
		 * @param string $request Requête à effectuer
		 * @param array $params Paramètres liés à la requête
		 *
		 * @return PDOStatement
		 */
		public static function query(string $request, array $params = null)
		{
			if(self::$_db === null)
			{
				self::init();
			}
			
			if($params !== null)
			{
				$params = self::format($params);
			}
			
			$req = self::$_db->prepare($request);
			$req->execute($params);
			
			return $req;
		}

		/**
		 * Retourne l'identifiant de la dernière ligne insérée ou la valeur d'une séquence
		 *
		 * @return String
		 */
		public static function getLastInsertId()
		{
			return self::$_db->lastInsertId();
		}
	};
