<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');

	class Formateur extends \core\Controller {

		public function execute()
		{
			// si get page exist
				// methode show page
			// sinon
				// Liste classeur

			$this->_application->getView()->setFile('formateur/liste_classeur');
			$this->_application->getView()->setTitle('Formateur');
		}

		private function getPage(int $id_page)
		{
			// si page exist
				// Contenu page
			// sinon
				// Erreur 404
		}
	};
