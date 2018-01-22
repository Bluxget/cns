<?php
	namespace persistences;

	require_once \core\FileManager::getCorePath('Persistence');
	require_once \core\FileManager::getModelPath('User');

	class Users extends \core\Persistence {

		public static function getAll()
		{
			$users = \libs\DB::query('SELECT * FROM utilisateurs');

			$usersObj = array();

			foreach($users as $user)
			{
				$params = array(
						'id' => $user['id_utilisateur'],
						'firstName' => $user['prenom'],
						'lastName' => $user['nom'],
						'password' => $user['mot_de_passe']
					);
				$usersObj[] = new \models\User($params);
			}

			return $usersObj;
		}
		
		public static function getById(int $id)
		{
			$user = \libs\DB::query('SELECT * FROM utilisateurs WHERE id_utilisateur = ?', array($id))->fetch();
			$params = array(
						'id' => $user['id_utilisateur'],
						'firstName' => $user['prenom'],
						'lastName' => $user['nom'],
						'password' => $user['mot_de_passe']
					);

			return new \models\User($params);
		}

		public static function isValid(\models\User &$user)
		{
			$params = array(
					$user->getFirstName(), 
					$user->getLastName(), 
					$user->getPassword()
				);
			$req = \libs\DB::query('SELECT * FROM utilisateurs WHERE prenom = ? AND nom = ? AND mot_de_passe = ? LIMIT 1', $params)->fetch();
			if($req != false)
			{
				$user->setId($req['id_utilisateur']);
				return true;
			}
			return false;
		}
	}
