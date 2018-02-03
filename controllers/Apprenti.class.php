<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');

	class Apprenti extends \core\Controller {

		public function execute(string $action = null, int $id = null)
		{
			$view = $this->_application->getView();
			$user = $this->_application->getUser();
			$id_classeur = $user->getIdClasseur();
			$datas['pages'] = $this->getPages($id_classeur);
			$viewFile = 'apprenti/liste_pages';

			if($action != null)
			{
				switch($action)
				{
					case 'page':
						$datas['page'] = $this->getPage($id);
						$viewFile = 'apprenti/page';

						$this->replaceContent($id, $user->getId(), $datas['page']['contenu']);
					break;
					case 'modifierpage':
						$this->updateContent($user->getId());

						$datas['page'] = $this->getPage($id);
						$viewFile = 'apprenti/page';

						$this->replaceContent($id, $user->getId(), $datas['page']['contenu']);
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

		private function getPages(int $id_classeur)
		{
			$req = \libs\DB::query('SELECT pages.id_page AS id_page, pages.titre AS titre FROM pages WHERE pages.id_classeur = ? ORDER BY pages.position ASC', array($id_classeur))->fetchAll();

			return $req;
		}

		private function getPage(int $id_page)
		{
			$req = \libs\DB::query('SELECT pages.id_page AS id_page, pages.titre AS titre, pages.contenu AS contenu, pages.position AS position FROM pages WHERE pages.id_page = ? LIMIT 1', array($id_page))->fetch();

			return $req;
		}

		private function replaceContent($id_page, $id_apprenti, &$content)
		{
			$formulaires = \libs\DB::query('SELECT * FROM formulaires LEFT JOIN contenu ON formulaires.id_formulaire = contenu.id_formulaire WHERE formulaires.id_page = ? AND contenu.id_apprenti = ?', array($id_page, $id_apprenti))->fetchAll();

			while(preg_match('#%(.+)%#', $content, $formName))
			{
				$exist = false;

				foreach($formulaires as $formulaire)
				{
					if($formulaire['id_formulaire'] == $formName[1])
					{
						if($formulaire['cible'] == 'apprentis')
						{
							$content = str_replace($formName[0], '<div class="input-field inline"><input type="text" name="'. $formName[1] .'" value="'. $formulaire['valeur'] .'" /></div>', $content);
						}
						else if($formulaure['cible'] == 'tuteurs')
						{
							$content = str_replace($formName[0], '<div class="input-field inline"><input type="text" name="'. $formName[1] .'" value="'. $formulaire['valeur'] .'" disabled /></div>', $content);
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
			/*echo preg_match('#%(.+)%#', $content, $result);
			var_dump($result);*/
		}

		private function updateContent($id_apprenti)
		{
			if(isset($_POST))
			{
				foreach($_POST as $id_formulaire => $post)
				{
					if(is_numeric($id_formulaire))
					{
						\libs\DB::query('REPLACE INTO contenu(valeur, id_formulaire, id_apprenti) VALUES(?, ?, ?)', array($post, $id_formulaire, $id_apprenti)); // INSERT si la ligne n'exise pas, sinon UPDATE - Fonctionne sur MySQL/MariaDB
					}
				}
			}
		}
	};