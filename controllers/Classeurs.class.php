<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');
	require_once \core\FileManager::getPersistencePath('Mark');
	/*require_once \core\FileManager::getPersistencePath('Option');*/

	class Marks extends \core\Controller {

		/**
		 * Affiche la liste des notes
		 */
		public function actionDefault()
		{
			$datas['marks'] = \persistences\Mark::getAll();

			$this->_view->setFile('marks/list');
			$this->_view->setTitle('Liste des notes');
			$this->_view->setDatas($datas);
		}

		/**
		 * Affiche le formulaire d'ajout d'une note / Ajoute une note
		 */
		public function actionAjouter()
		{
			if(\libs\http\Request::postExists('validateMark'))
			{
				$params = array(
						'idApprentice' => \libs\http\Request::postData('idApprentice'), 
						'idFormer' => \libs\http\Request::sessionData('id_former'), 
						'idTest' => \libs\http\Request::postData('idTest'), 
						'mark' => \libs\http\Request::postData('mark'),
						'comment' => \libs\http\Request::postData('comment')
					);

				$mark = new \models\Mark($params);

				\persistences\Mark::insert($mark);
			}

			\libs\http\Response::redirect('?ctrl=marks');
		}

		/**
		 * Supprime une note
		 */
		public function actionSupprimer()
		{
			if(\libs\http\Request::postExists('id_apprentice'))
			{
				$params = array(
						'idApprentice' => \libs\http\Request::postData('id_apprentice'), 
						'idFormer' => \libs\http\Request::postData('id_former')
					);

				$mark = new \models\Mark($params);

				\persistences\Mark::delete($mark);
			}

			\libs\http\Response::redirect('?ctrl=marks');
		}
	}
