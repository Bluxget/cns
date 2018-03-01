<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');

	class Formateur extends \core\Controller {

		public function execute(string $action = null, int $id = null)
		{
			$view = $this->_application->getView();
			$user = $this->_application->getUser();
			$datas['section'] = $user->getSection();
			$viewFile = 'formateur/liste_sections';
			$view->setTitle('Formateur');
			$view->setDatas($datas);

			if($action != null)
			{
				switch($action)
				{
					case 'apprentis':
						$datas= null;
						$idApprenti = null;
						$view = $this->_application->getView();
						$user = $this->_application->getUser();
						$datas['apprentis'] = $user->getApprentis($id);
						$datas['nom_section'] = $user->getNomSection($id);
						$viewFile = 'formateur/liste_apprentis';
					break;

					case 'classeur':
						$datas= null;
						$view = $this->_application->getView();
						$user = $this->_application->getUser();
						$datas['nom_apprenti'] = $user->getNomApprenti($id);
						$id_classeur = $user->getIdClasseur($id);
						$classeur = new \models\Classeur;
						$datas['pages'] = $classeur->getPages($id_classeur);
						$_SESSION['currentApprenti'] = $id;
						$viewFile = 'formateur/liste_pages';
					break;

					/*case 'page':
						$id_classeur = $user->getIdClasseur($id);
						$classeur = new \models\Classeur;
						$datas['page'] = $classeur->getPage($id);
						$datas['pages'] = $classeur->getPages($id);
						$datas['id_apprenti'] = $id;//\libs\http\Request::getData('id_apprenti');
						$viewFile = 'formateur/page';

						$this->replaceContent($datas['page'], $id, $user->getId(), $datas['page']['contenu']);
					break;*/

					case 'page' :
						$datas=null;
						$id_classeur = $user->getIdClasseur($id);
						$classeur = new \models\Classeur;
						$datas['page'] = $classeur->getPage($id);
						$datas['id_apprenti'] = \libs\http\Request::sessionData('currentApprenti');
						//var_dump($datas);
						$viewFile = 'formateur/page';
						$this->replaceContent($datas['page']['id_page'], $datas['id_apprenti'], $user->getId(), $datas['page']['contenu']);
					break;

					case 'modifierpage':
						$this->updateContent(\libs\http\Request::sessionData('currentApprenti'));

						\libs\http\Response::redirect('?action=page&id='. $id);
					break;

				}
			}
			$view->setFile($viewFile);
			$view->setTitle('Formateur');
			$view->setDatas($datas);

		}

		private function replaceContent($idPage, $id_apprenti, $id_formateur, &$content)
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
																											<label for="apprentiContent">Contenu Apprenti</label>
																										</div>
																										<div class="card-panel">
																											<span class="blue-text text-darken-2">'.stripslashes($formulaire['valeur']).'</span>
																										</div>
																										<div>
																											<label for="apprentiContent">Commentaire Formateur</label>
																										</div>
																										<div class="card-panel">
																											<span class="green-text text-darken-2">'.stripslashes($formulaire['commentaire']).'</span>
																										</div>
																										<div class="input-field inline col s12">
																										<input type="text" name="'. $formId .'" id="'. $formId .'" value="'.stripslashes($formulaire['commentaire']).'"/>
																										<label for="'. $formId .'">Editer Commentaire</label></div>
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

		private function updateContent($id_apprenti)
		{
			if(isset($_POST))
			{

				foreach($_POST as $id_formulaire => $post)
				{
					if(is_numeric($id_formulaire))
					{
						\libs\DB::query('UPDATE contenus
														SET commentaire = ?
														WHERE id_formulaire = ? AND id_utilisateur = ?', array($post, $id_formulaire, $id_apprenti));
						//\libs\DB::query('REPLACE INTO contenus(commentaire, id_formulaire, id_utilisateur) VALUES(?, ?, ?)', array($post, $id_formulaire, $id_apprenti)); // INSERT si la ligne n'exise pas, sinon UPDATE - Fonctionne sur MySQL/MariaDB
					}
				}
			}
		}

	};
