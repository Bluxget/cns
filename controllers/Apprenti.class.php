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
			$req = \libs\DB::query('SELECT pages.id_page AS id_page, pages.titre AS titre, pages.contenu AS contenu FROM pages WHERE pages.id_page = ? LIMIT 1', array($id_page))->fetch();

			return $req;
		}

		private function replaceContent($id_page, $id_apprenti, &$content)
		{
			$formulaires = \libs\DB::query('SELECT * FROM formulaires LEFT JOIN contenu ON contenu.id_formulaire = formulaires.id_formulaire WHERE formulaires.id_page = ? AND formulaires.cible = "apprentis" AND contenu.id_apprenti = ?', array($id_page, $id_apprenti))->fetchAll();

			while(preg_match('#%(.+)%#', $content, $formName))
			{
				foreach($formulaires as $formulaire)
				{
					if($formulaire['nom'] == $formName[1])
					{
						$content = str_replace($formName[0], '<div class="input-field inline"><input type="text" name="'. $formName[1] .'" value="'. $formulaire['valeur'] .'" /></div>', $content);
						break;
					}
				}
			}
			/*echo preg_match('#%(.+)%#', $content, $result);
			var_dump($result);*/
		}
	};