<?php
	namespace models;

	require_once \core\FileManager::getModelPath('Utilisateur');

	class Apprenti extends \models\Utilisateur {

		private $_tuteur;

		public function getCursus()
		{
			$req = \libs\DB::query('SELECT cursus.id_cursus, cursus.annee_debut AS annee_debut, cursus.annee_fin AS annee_fin FROM apprentis_cursus JOIN cursus ON cursus.id_cursus = apprentis_cursus.id_cursus WHERE apprentis_cursus.id_apprenti = ?', array($this->getId()))->fetchAll();

			return $req;
		}
		public function getTuteur() { return $this->_tuteur; }

		public function setCursus(array $cursus)
		{
			$this->_cursus = $cursus;
		}
		public function setTuteur(array $tuteur)
		{
			$this->_tuteur = $tuteur;
		}
	};
