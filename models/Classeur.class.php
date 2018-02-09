<?php
	namespace models;

	require_once \core\FileManager::getCorePath('Model');

	class Classeur extends \core\Model {

		public function getPages(int $id_classeur)
		{
			$req = \libs\DB::query('SELECT pages.id_page AS id_page, pages.titre AS titre, pages.position AS position FROM pages WHERE pages.id_classeur = ? ORDER BY pages.position ASC', array($id_classeur))->fetchAll();

			return $req;
		}

		public function getPage(int $id_page)
		{
			$req = \libs\DB::query('SELECT pages.id_page AS id_page, pages.titre AS titre, pages.contenu AS contenu, pages.position AS position FROM pages WHERE pages.id_page = ? LIMIT 1', array($id_page))->fetch();

			return $req;
		}
	};
