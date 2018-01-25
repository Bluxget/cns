<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');

	class Responsable extends \core\Controller {

		public function execute()
		{
			// si get page exist
				// methode show page
			// sinon
				// Liste classeur

			$this->_application->getView()->setFile('responsable/liste_classeur');
			$this->_application->getView()->setTitle('Responsable');
		}

		private function getPage(int $id_page)
		{
			// si page exist
				// Contenu page
			// sinon
				// Erreur 404
		}
	};
