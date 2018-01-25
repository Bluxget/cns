<?php
	namespace models;

	require_once \core\FileManager::getModelPath('Utilisateur');

	class Apprenti extends \models\Utilisateur {

		private $_cursus;
		private $_tuteur;

		public function getCursus() { return $this->_cursus; }
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
