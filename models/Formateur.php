<?php
	namespace models;

	require_once \core\FileManager::getModelPath('Utilisateur');

	class Formateur extends \models\Utilisateur {

		private $_section;

		public function getSection() { return $this->_section; }

		public function setSection(array $section)
		{
			$this->_section = $section;
		}
	};
