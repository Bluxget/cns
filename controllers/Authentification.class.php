<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');

	class Authentification extends \core\Controller {

		/**
		 * Affiche la page d'authentification
		 */
		public function execute(string $action = null, int $id = null)
		{
			if($action != null)
			{
				switch($action)
				{
					case 'connect':
						$this->actionConnect();
					break;
					case 'disconnect':
						$this->actionDisconnect();
					break;
				}
			}
			else
			{
				$this->_application->getView()->setFile('authentification/form');
				$this->_application->getView()->setTitle('Authentification');
			}
		}

		/**
		 * L'utilisateur valide le formulaire d'authentification
		 */
		private function actionConnect()
		{
			if(\libs\http\Request::postExists('firstName') && \libs\http\Request::postExists('lastName') && \libs\http\Request::postExists('password'))
			{
				$user = $this->getUser(\libs\http\Request::postData('firstName'), \libs\http\Request::postData('lastName'), \libs\http\Request::postData('password'));

				if($user != false)
				{
					$_SESSION['user'] = serialize($user);

					\libs\http\Response::redirect('index.php');
				}
			}

			$this->_application->getView()->setFile('authentification/error');
			$this->_application->getView()->setTitle('Authentification');
		}

		/**
		 * L'utilisateur se deconnecte
		 */
		private function actionDisconnect()
		{
			session_destroy();

			\libs\http\Response::redirect('index.php');
		}

		/**
		 * Retourne l'id de l'utilisateur si les informations sont justes
		 */
		private function getUser(string $prenom, string $nom, string $mdp)
		{
			$req = \libs\DB::query('SELECT id_utilisateur FROM utilisateurs WHERE prenom = ? AND nom = ? AND mot_de_passe = ? LIMIT 1', array($prenom, $nom, $mdp))->fetch();
			if($req != false)
			{
				$userType = $this->getUserType($req['id_utilisateur']);

				if($userType != false)
				{
					if(file_exists(\core\FileManager::getModelPath($userType)))
					{
						$userType = '\\models\\'. $userType;

						$params = array(
							'id' => (int)$req['id_utilisateur'],
							'prenom' => $prenom,
							'nom' => $nom
						);
						// Création de l'objet
						return new $userType($params);
					}
				}
			}
			return false;
		}

		/**
		 * Retourne le type d'utilisateur
		 */
		private function getUserType(int $id)
		{
			$req = \libs\DB::query('SELECT * FROM apprentis WHERE id_utilisateur = ? LIMIT 1', array($id))->fetch();
			if($req != false) { return 'Apprenti'; }
			$req = \libs\DB::query('SELECT * FROM tuteurs WHERE id_utilisateur = ? LIMIT 1', array($id))->fetch();
			if($req != false) { return 'Tuteur'; }
			$req = \libs\DB::query('SELECT * FROM formateurs WHERE id_utilisateur = ? LIMIT 1', array($id))->fetch();
			if($req != false) { return 'Formateur'; }
			$req = \libs\DB::query('SELECT * FROM responsables WHERE id_utilisateur = ? LIMIT 1', array($id))->fetch();
			if($req != false) { return 'Responsable'; }

			return false;
		}
	};
