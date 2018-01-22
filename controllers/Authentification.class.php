<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');
	require_once \core\FileManager::getPersistencePath('Users');

	class Authentification extends \core\Controller {

		/**
		 * Affiche la page d'authentification
		 */
		public function actionDefault()
		{
			if(\libs\http\Request::sessionExists('id_user'))
				\libs\http\Response::redirect('index.php');

			$this->_view->setFile('authentification/form');
			$this->_view->setTitle('Authentification');
		}

		/**
		 * L'utilisateur valide le formulaire d'authentification
		 */
		public function actionConnect()
		{
			if(\libs\http\Request::sessionExists('id_user'))
				\libs\http\Response::redirect('index.php');

			if(\libs\http\Request::postExists('firstName') && \libs\http\Request::postExists('lastName') && \libs\http\Request::postExists('password'))
			{
				$params = array(
					'firstName' => \libs\http\Request::postData('firstName'), 
					'lastName' => \libs\http\Request::postData('lastName'), 
					'password' => \libs\http\Request::postData('password')
				);

				$user = new \models\User($params);

				if(\persistences\Users::isValid($user) === true)
				{
					$_SESSION['id_user'] = $user->getId();

					\libs\http\Response::redirect('index.php');
				}
			}

			$this->_view->setFile('authentification/error');
			$this->_view->setTitle('Authentification');
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
