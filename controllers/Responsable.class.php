<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');
	require_once \core\FileManager::getPersistencePath('Mark');
	/*require_once \core\FileManager::getPersistencePath('Option');*/

	class Responsable extends \core\Controller {

		/**
		 * Affiche la liste des classeurs de la section
		 */
		public function actionDefault()
		{
			// Liste classeur

			$datas['marks'] = \persistences\Mark::getAll();

			$this->_view->setFile('marks/list');
			$this->_view->setTitle('Liste des notes');
			$this->_view->setDatas($datas);
		}
	}
