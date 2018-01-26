<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');

	class Apprenti extends \core\Controller {

		public function execute()
		{
			$view = $this->_application->getView();
			$user = $this->_application->getUser();

			$datas['cursus'] = $user->getCursus();
			// si get page exist
				// methode show page
			// sinon
				// Liste classeur

			$view->setFile('apprenti/liste_classeur');
			$view->setTitle('Apprenti');
			$view->setDatas($datas);
		}

		private function getPage(int $id_page)
		{
			// si page exist
				// Contenu page
			// sinon
				// Erreur 404
		}
	};