<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');

	class Tuteur extends \core\Controller {

		public function execute()
		{
			// si get page exist
				// methode show page
			// sinon
				// Liste classeur

			$this->_application->getView()->setFile('tuteur/liste_classeur');
			$this->_application->getView()->setTitle('Tuteur');
		}

		private function getPage(int $id_page)
		{
			// si page exist
				// Contenu page
			// sinon
				// Erreur 404
		}
	};
