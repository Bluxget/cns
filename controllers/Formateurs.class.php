<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');
	require_once \core\FileManager::getPersistencePath('Former');

	class Formers extends \core\Controller {

		protected $_access = 'responsable';

		/**
		 * Affiche la liste des formateurs
		 */
		public function actionDefault()
		{
			$datas['formers'] = \persistences\Former::getAll();

			$this->_view->setFile('formers/list');
			$this->_view->setTitle('Liste des formateurs');
			$this->_view->setDatas($datas);
		}

		/**
		 * Affiche le formulaire d'ajout d'un formateur / Ajoute un formateur
		 */
		public function actionAdd()
		{
			if(\libs\http\Request::postExists('ajouter'))
			{
				$params = array(
						'rank' => \libs\http\Request::postData('rang'), 
						'name' => \libs\http\Request::postData('nom'), 
						'password' => \libs\http\Request::postData('password')
					);
				$former = new \models\Former($params);

				\persistences\Former::insert($former);

				\libs\http\Response::redirect('?ctrl=formers');
			}

			$datas['ranks'] = \persistences\Former::RANKS;

			$this->_view->setFile('formers/add');
			$this->_view->setTitle('Ajouter un formateur');
			$this->_view->setDatas($datas);
		}

		/**
		 * Affiche le formulaire de modification d'un formateur / Modifie un formateur
		 */
		public function actionUpdate()
		{
			if(\libs\http\Request::postExists('modifier'))
			{
				$params = array(
						'idFormer' => \libs\http\Request::postData('id'), 
						'rank' => \libs\http\Request::postData('rang'), 
						'name' => \libs\http\Request::postData('nom')
					);
				$former = new \models\Former($params);

				\persistences\Former::update($former);

				\libs\http\Response::redirect('?ctrl=formers');
			}
			else if(\libs\http\Request::postExists('id_former'))
			{
				$datas['former'] = \persistences\Former::getById(\libs\http\Request::postData('id_former'));
				$datas['ranks'] = \persistences\Former::RANKS;

				$this->_view->setFile('formers/update');
				$this->_view->setTitle('Modifier un formateur');
				$this->_view->setDatas($datas);
			}
			else
			{
				\libs\http\Response::redirect('?ctrl=formers');
			}
		}

		/**
		 * Supprime un formateur
		 */
		public function actionDelete()
		{
			if(\libs\http\Request::postExists('id_former') && \libs\http\Request::postData('id_former') != \libs\http\Request::sessionData('id_former'))
			{
				$params = array(
						'idFormer' => \libs\http\Request::postData('id_former')
					);

				$former = new \models\Former($params);

				\persistences\Former::delete($former);
			}

			\libs\http\Response::redirect('?ctrl=formers');
		}
	}
