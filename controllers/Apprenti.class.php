<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');

	class Apprenti extends \core\Controller {

		public function execute(string $action = null, int $id = null)
		{
			$view = $this->_application->getView();
			$user = $this->_application->getUser();

			if($action != null)
			{
				switch($action)
				{
					case 'classeur':
						$this->getClasseur();
					break;
					case 'page':
						$this->getPage();
					break;
				}
			}
			else
			{
				$datas['tuteur'] = $user->getTuteur();
				$datas['cursus'] = $user->getCursus();

				$view->setFile('apprenti/classeur');
				$view->setTitle('Apprenti');
				$view->setDatas($datas);
			}
		}

		private function getClasseur(int $id_classeur)
		{

		}

		private function getPage(int $id_page)
		{
			// si page exist
				// Contenu page
			// sinon
				// Erreur 404
		}
	};