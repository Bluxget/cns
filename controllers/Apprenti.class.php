<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');

	class Apprenti extends \core\Controller {

		public function execute()
		{
			// si get page exist
				// methode show page
			// sinon
				// Liste classeur
		}

		private function getPage(int $id_page)
		{
			// si page exist
				// Contenu page
			// sinon
				// Erreur 404
		}
	};