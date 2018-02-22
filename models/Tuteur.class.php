<?php
	namespace models;

	require_once \core\FileManager::getModelPath('Utilisateur');

	class Tuteur extends \models\Utilisateur {

		public function getApprentis() 
		{
			$req = \libs\DB::query('SELECT apprentis.id_utilisateur AS id_utilisateur, utilisateurs.prenom AS prenom, utilisateurs.nom AS nom FROM apprentis JOIN utilisateurs ON utilisateurs.id_utilisateur = apprentis.id_utilisateur WHERE apprentis.id_tuteur = ? LIMIT 1', array($this->getId()))->fetchAll();

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
