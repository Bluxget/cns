<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');
	require_once \core\FileManager::getPersistencePath('Classeurs');
	/*require_once \core\FileManager::getPersistencePath('Option');*/

	class Apprenti extends \core\Controller {

		/**
		 * Affiche la liste des classeurs de l'apprenti
		 */
		public function actionDefault()
		{
			$datas['classeurs'] = \persistences\Classeurs::getByApprenti(\libs\http\Request::sessionData('id_user'));

			$this->_view->setFile('apprenti/list');
			$this->_view->setTitle('Liste des classeurs');
			$this->_view->setDatas($datas);
		}
	}
