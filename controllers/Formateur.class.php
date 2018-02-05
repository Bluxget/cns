<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');

	class Formateur extends \core\Controller {

		public function execute(string $action = null, int $id = null)
		{
			if($action != null)
			{
				switch($action)
				{
					case 'apprentis':
						$view = $this->_application->getView();
						$user = $this->_application->getUser();
						$datas['apprentis'] = $user->getApprentis($id);
						$datas['nom_section'] = $user->getNomSection($id);
						$view->setFile('formateur/liste_apprentis');
						$view->setTitle('Formateur');
						$view->setDatas($datas);
					break;

					case 'classeur':
						$view = $this->_application->getView();
						$user = $this->_application->getUser();
						$datas['nom_apprenti'] = $user->getNomApprenti($id);
						$id_classeur = $user->getIdClasseur($id);
						$datas['pages'] = $user->getPages($id_classeur);
						$view->setFile('formateur/liste_pages');
						$view->setTitle('Formateur');
						$view->setDatas($datas);
					break;
				}
			}
			else
			{
				$view = $this->_application->getView();
				$user = $this->_application->getUser();
				$datas['section'] = $user->getSection();
				$view->setFile('formateur/liste_sections');
				$view->setTitle('Formateur');
				$view->setDatas($datas);
			}
		}


		private function getPage(int $id_page)
		{
			// si page exist
				// Contenu page
			// sinon
				// Erreur 404
		}
	};
