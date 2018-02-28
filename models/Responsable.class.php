<?php
	namespace models;

	require_once \core\FileManager::getModelPath('Utilisateur');

	class Responsable extends \models\Utilisateur {



		public function getSection() {
			$req = \libs\DB::query('SELECT sections.id_section, sections.nom AS nom_section FROM sections JOIN responsables_sections
															ON sections.id_section = responsables_sections.id_section
															WHERE id_responsable = ?', array($this->getId()))->fetchAll();
			return $req;
		}
		public function getNomSection($id_section) {
			$req = \libs\DB::query('SELECT sections.id_section, sections.nom AS nom_section FROM sections JOIN formateurs_sections
															ON sections.id_section = formateurs_sections.id_section
															WHERE sections.id_section = ? LIMIT 1', array($id_section))->fetch();
			return $req['nom_section'];
		}
		public function getApprentis($id_section){

			$req = \libs\DB::query('SELECT utilisateurs.id_utilisateur, utilisateurs.nom as nom_apprenti FROM utilisateurs
															JOIN apprentis ON utilisateurs.id_utilisateur = apprentis.id_utilisateur
															WHERE  apprentis.id_section = ?
															ORDER BY nom_apprenti', array($id_section))->fetchAll();
			return $req;
		}
		public function getNomApprenti($id_Apprenti){

			$req = \libs\DB::query('SELECT utilisateurs.nom as nom_apprenti, utilisateurs.prenom as prenom_apprenti FROM utilisateurs
															JOIN apprentis ON utilisateurs.id_utilisateur = apprentis.id_utilisateur
															WHERE  apprentis.id_Utilisateur = ? LIMIT 1', array($id_Apprenti))->fetch();
			return $req['nom_apprenti']." ".$req['prenom_apprenti'];
		}
		public function getIdClasseur($id_Apprenti)
		{
			$req = \libs\DB::query('SELECT classeurs.id_classeur AS id_classeur FROM classeurs
															JOIN sections ON sections.id_section = classeurs.id_section
															JOIN apprentis ON apprentis.id_section = sections.id_section
															WHERE apprentis.id_utilisateur = ? LIMIT 1', array($id_Apprenti))->fetch();

			return $req['id_classeur'];
		}


	};
