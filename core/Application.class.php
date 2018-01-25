<?php
	namespace core;

	require_once \core\FileManager::getLibPath('http/Request');
	require_once \core\FileManager::getLibPath('http/Response');
	require_once \core\FileManager::getLibPath('DB');
	require_once \core\FileManager::getCorePath('View');

	/**
	 * Classe principale de l'application
	 */
	class Application {

		private $_controller, $_view;
		private $_user, $_error, $_action, $_id = null;

		public function __construct()
		{
			if(\libs\http\Request::sessionExists('user'))
			{
				$this->setUser(unserialize(\libs\http\Request::sessionData('user')));
			}

			if(\libs\http\Request::getExists('action'))
			{
				$this->setAction(\libs\http\Request::getData('action'));
			}

			if(\libs\http\Request::getExists('id'))
			{
				$this->setId(\libs\http\Request::getData('id'));
			}

			$this->setView(new \core\View);

			$this->dispatcher();
		}

		public function &getView() { return $this->_view; }
		public function getError() { return $this->_error; }
		public function getUser() { return $this->_user; }
		public function getAction() { return $this->_action; }
		public function getId() { return $this->_id; }

		public function setView(\core\View $view) { $this->_view = $view; }
		public function setError(\Exception $error) { $this->_error = $error; }
		public function setUser($user) { $this->_user = $user; }
		public function setAction(string $action) { $this->_action = $action; }
		public function setId(int $id) { $this->_id = $id; }

		public function execute()
		{
			if($this->_error == null)
			{
				$this->_controller->execute($this->getAction(), $this->getId());
				\libs\http\Response::send($this->_view);
			}
			else
			{
				\libs\http\Response::redirect404();
			}
		}

		private function dispatcher()
		{
			// Si non connecté, controleur = authentification
			if($this->_user == null || $this->getAction() == 'disconnect')
			{
				$this->getView()->disableNav();
				$controller = 'authentification';
			}
			else
			{
				$this->getView()->enableNav();
				$controller = str_replace("models\\", "", get_class($this->getUser()));
				//var_dump($controller);

			}
			try
			{
				$this->loadController($controller);
			}
			catch(\Exception $e)
			{
				$this->setError($e);
			}
		}

		private function loadController(string $controller)
		{
			$controller = ucfirst($controller);

			if(file_exists(\core\FileManager::getControllerPath($controller)))
			{
				// Inclusion de la classe du controleur
				require_once \core\FileManager::getControllerPath($controller);

				$controller = '\\controllers\\'. $controller;
				// Création de l'objet
				$this->_controller = new $controller($this);
			}
			else
			{
				throw new \Exception('Controleur introuvable', 404);
			}
		}
	};
