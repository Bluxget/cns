<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');

	class Responsable extends \core\Controller {

		public function execute(string $action = null, int $id = null)
		{
			$view = $this->_application->getView();
			$user = $this->_application->getUser();
			$datas['section'] = $user->getSection();
			$viewFile = 'responsable/liste_sections';
			$view->setTitle('Responsable');
			$view->setDatas($datas);

			if($action != null)
			{
				switch($action)
				{
					case 'apprentis':
						$view = $this->_application->getView();
						$user = $this->_application->getUser();
						$datas['apprentis'] = $user->getApprentis($id);
						$datas['nom_section'] = $user->getNomSection($id);
						$viewFile = 'responsable/liste_apprentis';
						//$view->setTitle('Responsable');
						//$view->setDatas($datas);
					break;

					case 'classeur':
						$view = $this->_application->getView();
						$user = $this->_application->getUser();
						$datas['nom_apprenti'] = $user->getNomApprenti($id);
						$id_classeur = $user->getIdClasseur($id);
						$classeur = new \models\Classeur;
						$datas['pages'] = $classeur->getPages($id_classeur);
						$_SESSION['currentApprenti'] = $id;
						$viewFile = 'responsable/liste_pages';
						//$view->setTitle('Responsable');
						//$view->setDatas($datas);
					break;

					case 'page' :
						$datas=null;
						$id_classeur = $user->getIdClasseur($id);
						$classeur = new \models\Classeur;
						$datas['page'] = $classeur->getPage($id);
						$datas['id_apprenti'] = \libs\http\Request::sessionData('currentApprenti');
						//var_dump($datas);
						$viewFile = 'responsable/page';
						$this->replaceContent($datas['page']['id_page'], $datas['id_apprenti'], $user->getId(), $datas['page']['contenu']);
					break;
				}
			}
			$view->setFile($viewFile);
			$view->setTitle('Responsable');
			$view->setDatas($datas);

		}

		private function replaceContent($idPage, $id_apprenti, $id_responsable, &$content)
		{
			$formulaires = \libs\DB::query('SELECT contenus.id_utilisateur AS id_utilisateur,
																						 formulaires.id_formulaire AS id_formulaire,
																						 formulaires.cible AS cible,
																						 formulaires.nom AS nom,
																						 contenus.valeur AS valeur,
																						 contenus.commentaire AS commentaire
																			FROM formulaires
																			LEFT JOIN contenus ON formulaires.id_formulaire = contenus.id_formulaire
																			WHERE formulaires.id_page = ? and contenus.id_utilisateur = ?', array($idPage, $id_apprenti))->fetchAll();
			//var_dump($formulaires);
			if ($formulaires != NULL){
				while(preg_match('#%\d%#', $content, $formName))
				{
					$formId = str_replace('%', '', $formName[0]);
					$exists = false;
					foreach($formulaires as $formulaire)
					{
						if($formulaire['id_formulaire'] == $formId)
						{
							$content = str_replace($formName[0], '<div>
																										<label for="apprentiContent">Contenu '.ucfirst($formulaire['cible']).'</label>
																										</div>
																										<div class="card-panel" id="apprentiContent">
																											<span class="blue-text text-darken-2" >'.stripslashes($formulaire['valeur']).'</span>
																										</div>
																										<label for="EnseignantContent">Commentaire Formateur</label>
																										<div class="card-panel" id="EnseignantContent">
																											<span class="green-text text-darken-2" >'.stripslashes($formulaire['commentaire']).'</span>
																										</div>
																										', $content);
							$exists = true;
						}

					}
					if(!$exists)
					{
						$content =str_replace($formName[0],'<div class="card-panel red darken-1">
																										<span class=" white-text">Contenu Inexistant</span>
																									</div>', $content);
					}
				}
			}
			else
			{
				while(preg_match('#%\d%#', $content, $formName))
				{
					$formId = str_replace('%', '', $formName[0]);
					$content =str_replace($formName[0],'<div class="card-panel red darken-1">
																									<span class=" white-text">Contenu Inexistant</span>
																								</div>', $content);
				}
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
