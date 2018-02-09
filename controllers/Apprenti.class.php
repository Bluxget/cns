<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');

	class Apprenti extends \core\Controller {

		public function execute(string $action = null, int $id = null)
		{
			$view = $this->_application->getView();
			$user = $this->_application->getUser();
			$id_classeur = $user->getIdClasseur();
			$classeur = new \models\Classeur;
			$datas['pages'] = $classeur->getPages($id_classeur);
			$viewFile = 'apprenti/liste_pages';

			if($action != null)
			{
				switch($action)
				{
					case 'page':
						$datas['page'] = $classeur->getPage($id);
						$viewFile = 'apprenti/page';

						$this->replaceContent($id, $user->getId(), $user->getTuteur()['id_tuteur'], $datas['page']['contenu']);
					break;
					case 'modifierpage':
						$this->updateContent($user->getId());

						\libs\http\Response::redirect('?action=page&id='. $id);
					break;
				}
			}
			else
			{
				$datas['tuteur'] = $user->getTuteur();
			}

			$view->setFile($viewFile);
			$view->setTitle('Apprenti');
			$view->setDatas($datas);
		}

		private function replaceContent($id_page, $id_apprenti, $id_tuteur, &$content)
		{
			$formulaires = \libs\DB::query('SELECT formulaires.id_formulaire AS id_formulaire, formulaires.cible AS cible, formulaires.nom AS nom, contenus.valeur AS valeur, contenus.commentaire AS commentaire FROM formulaires LEFT JOIN contenus ON formulaires.id_formulaire = contenus.id_formulaire WHERE formulaires.id_page = ? AND (contenus.id_utilisateur = ? OR contenus.id_utilisateur = ? OR contenus.id_utilisateur IS NULL)', array($id_page, $id_apprenti, $id_tuteur))->fetchAll();

			while(preg_match('#%\d%#', $content, $formName))
			{
				$formId = str_replace('%', '', $formName[0]);

				$exist = false;

				foreach($formulaires as $formulaire)
				{
					if($formulaire['id_formulaire'] == $formId)
					{
						if($formulaire['cible'] == 'apprentis')
						{
							$content = str_replace($formName[0], '<div class="input-field inline"><input type="text" name="'. $formId .'" id="'. $formId .'" value="'. $formulaire['valeur'] .'" title="'. $formulaire['commentaire'] .'" /><label for="'. $formId .'">'. $formulaire['nom'] .'</label></div>', $content);
						}
						else if($formulaire['cible'] == 'tuteurs')
						{
							$content = str_replace($formName[0], '<div class="input-field inline"><input type="text" name="'. $formId .'" id="'. $formId .'" value="'. $formulaire['valeur'] .'" disabled /><label for="'. $formId .'">'. $formulaire['nom'] .'</label></div>', $content);
						}

						$exist = true;

						break;
					}
				}

				if(!$exist)
				{
					$content = str_replace($formName[0], '', $content);;
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
						\libs\DB::query('REPLACE INTO contenus(valeur, id_formulaire, id_utilisateur) VALUES(?, ?, ?)', array($post, $id_formulaire, $id_apprenti)); // INSERT si la ligne n'exise pas, sinon UPDATE - Fonctionne sur MySQL/MariaDB
					}
				}
			}
		}
	};
