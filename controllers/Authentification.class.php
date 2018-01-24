<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');
	require_once \core\FileManager::getDAOPath('Utilisateurs');

	class Authentification extends \core\Controller {

		/**
		 * Affiche la page d'authentification
		 */
		public function execute(string $action = null, int $param = null)
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

			$this->_application->getView()->setFile('authentification/form');
			$this->_application->getView()->setTitle('Authentification');
		}

		/**
		 * L'utilisateur valide le formulaire d'authentification
		 */
		private function actionConnect()
		{
			if(\libs\http\Request::postExists('firstName') && \libs\http\Request::postExists('lastName') && \libs\http\Request::postExists('password'))
			{
				$user = \dao\Utilisateurs::getUser(\libs\http\Request::postData('firstName'), \libs\http\Request::postData('lastName'), \libs\http\Request::postData('password'));

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
		public function actionDisconnect()
		{
			session_destroy();

			\libs\http\Response::redirect('index.php');
		}
	}
