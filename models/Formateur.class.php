<?php
	namespace models;

	require_once \core\FileManager::getModelPath('Utilisateur');

	class Formateur extends \models\Utilisateur {

		private $_section;
		private $_apprentis;

		public function getSection() {
			$req = \libs\DB::query('SELECT sections.id_section, sections.nom AS nom_section FROM sections JOIN formateurs_sections
															ON sections.id_section = formateurs_sections.id_section
															WHERE id_formateur = ?', array($this->getId()))->fetchAll();
			return $req;
		}
		public function getNomSection($id_section) {
			$req = \libs\DB::query('SELECT sections.id_section, sections.nom AS nom_section FROM sections JOIN formateurs_sections
															ON sections.id_section = formateurs_sections.id_section
															WHERE sections.id_section = ?', array($id_section))->fetchAll();
			return $req;
		}
		public function getApprentis($id_section){

			$req = \libs\DB::query('SELECT utilisateurs.id_utilisateur, utilisateurs.nom as nom_apprenti FROM utilisateurs
															JOIN apprentis ON utilisateurs.id_utilisateur = apprentis.id_utilisateur
															WHERE  apprentis.id_section = ?', array($id_section))->fetchAll();
			return $req;
		}


	};
