<?php
	namespace models;

	require_once \core\FileManager::getModelPath('Utilisateur');

	class Apprenti extends \models\Utilisateur {

		private $_cursus;

		public function getCursus() { return $this->_cursus; }

		public function setCursus(array $cursus)
		{ 
			$this->_cursus = $cursus;
		}
	}
