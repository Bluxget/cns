<?php
	namespace dao;

	require_once \core\FileManager::getCorePath('DAO');
	require_once \core\FileManager::getModelPath('Utilisateur');

	class Utilisateurs extends \core\DAO {

		public static function getAll()
		{
			$users = \libs\DB::query('SELECT * FROM utilisateurs');

			$usersObj = array();

			foreach($users as $user)
			{
				$params = array(
						'id' => $user['id_utilisateur'],
						'prenom' => $user['prenom'],
						'nom' => $user['nom'],
						'mdp' => $user['mot_de_passe']
					);
				$usersObj[] = new \models\Utilisateur($params);
			}

			return $usersObj;
		}
		
		public static function getById(int $id)
		{
			$user = \libs\DB::query('SELECT * FROM utilisateurs WHERE id_utilisateur = ?', array($id))->fetch();
			$params = array(
						'id' => $user['id_utilisateur'],
						'prenom' => $user['prenom'],
						'nom' => $user['nom'],
						'mdp' => $user['mot_de_passe']
					);

			return new \models\Utilisateur($params);
		}

		public static function getUser(string $prenom, string $nom, string $mdp)
		{
			$req = \libs\DB::query('SELECT * FROM utilisateurs WHERE prenom = ? AND nom = ? AND mot_de_passe = ? LIMIT 1', array($prenom, $nom, $mdp))->fetch();
			if($req != false)
			{
				$params = array(
						'id' => $req['id_utilisateur'],
						'prenom' => $req['prenom'],
						'nom' => $req['nom'],
						'mdp' => $req['mot_de_passe']
					);

				$userType = static::getUserType($params['id']);

				if($userType != false)
				{
					$user = '\\models\\'. ucfirst($userType);
				}
				// Création de l'objet
				return new $user($params);
			}
			return false;
		}

		private static function getUserType(int $id)
		{
			$req = \libs\DB::query('SELECT * FROM apprentis WHERE id_utilisateur = ? LIMIT 1', array($id))->fetch();
			if($req != false) { return 'apprenti'; }
			$req = \libs\DB::query('SELECT * FROM tuteurs WHERE id_utilisateur = ? LIMIT 1', array($id))->fetch();
			if($req != false) { return 'tuteur'; }
			$req = \libs\DB::query('SELECT * FROM formateurs WHERE id_utilisateur = ? LIMIT 1', array($id))->fetch();
			if($req != false) { return 'formateur'; }
			$req = \libs\DB::query('SELECT * FROM responsables WHERE id_utilisateur = ? LIMIT 1', array($id))->fetch();
			if($req != false) { return 'responsable'; }

			return false;
		}
	}
