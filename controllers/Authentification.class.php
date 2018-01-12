<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');
	require_once \core\FileManager::getPersistencePath('Former');

	class Authentification extends \core\Controller {

		/**
		 * Affiche la page d'authentification
		 */
		public function actionDefault()
		{
			if(\libs\http\Request::sessionExists('id_former'))
				\libs\http\Response::redirect('index.php');

			$this->_view->setFile('authentification/form');
			$this->_view->setTitle('Authentification');
		}

		/**
		 * L'utilisateur valide le formulaire d'authentification
		 */
		public function actionConnect()
		{
			if(\libs\http\Request::sessionExists('id_former'))
				\libs\http\Response::redirect('index.php');

			if(isset($_POST['username'], $_POST['password']))
			{
				$params = array(
					'name' => \libs\http\Request::postData('username'), 
					'password' => \libs\http\Request::postData('password')
				);

				$former = new \models\Former($params);

				if(\persistences\Former::isValid($former) === TRUE)
				{
					$_SESSION['id_former'] = $former->getIdFormer();

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

			$this->_view->setFile('authentification/form');
			$this->_view->setTitle('Authentification');
		}
	}
