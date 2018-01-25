<?php
	namespace models;

	require_once \core\FileManager::getModelPath('Utilisateur');

	class Tuteur extends \models\Utilisateur {

		private $_apprenti;

		public function getApprenti() { return $this->_apprenti; }

		public function setApprenti(array $apprenti)
		{
			$this->_apprenti = $apprenti;
		}
	};
