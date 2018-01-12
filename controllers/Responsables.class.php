<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');
	require_once \core\FileManager::getPersistencePath('Apprentice');
	require_once \core\FileManager::getPersistencePath('Option');

	class Apprentices extends \core\Controller {

		protected $_access = 'responsable';

		/**
		 * Affiche la liste des apprentis
		 */
		public function actionDefault()
		{
			$datas['apprentices'] = \persistences\Apprentice::getAll();

			$this->_view->setFile('apprentices/list');
			$this->_view->setTitle('Liste des apprentis');
			$this->_view->setDatas($datas);
		}
	}
