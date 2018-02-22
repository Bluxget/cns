<?php
	namespace models;

	require_once \core\FileManager::getModelPath('Utilisateur');

	class Apprenti extends \models\Utilisateur {

		public function getIdClasseur()
		{
			$req = \libs\DB::query('SELECT classeurs.id_classeur AS id_classeur FROM classeurs JOIN sections ON sections.id_section = classeurs.id_section JOIN apprentis ON apprentis.id_section = sections.id_section WHERE apprentis.id_utilisateur = ? LIMIT 1', array($this->getId()))->fetch();

			return $req['id_classeur'];
		}

		public function getCursus()
		{
			$req = \libs\DB::query('SELECT classeurs.id_classeur AS id_classeur, cursus.annee_debut AS annee_debut, cursus.annee_fin AS annee_fin FROM apprentis_cursus JOIN cursus ON cursus.id_cursus = apprentis_cursus.id_cursus JOIN classeurs ON classeurs.id_cursus = cursus.id_cursus WHERE apprentis_cursus.id_apprenti = ?', array($this->getId()))->fetchAll();

			return $req;
		}
		
		public function getTuteur() 
		{
			$req = \libs\DB::query('SELECT apprentis.id_tuteur AS id_tuteur, utilisateurs.prenom AS prenom, utilisateurs.nom AS nom FROM apprentis JOIN utilisateurs ON utilisateurs.id_utilisateur = apprentis.id_tuteur WHERE apprentis.id_utilisateur = ? LIMIT 1', array($this->getId()))->fetch();

			return $req;
		}
	};
