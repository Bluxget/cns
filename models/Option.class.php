<?php
	namespace models;

	require_once \core\FileManager::getCorePath('Model');

	class Option extends \core\Model {

		private $_idOption;
		private $_name;

		public function getIdOption() { return $this->_idOption; }
		public function getName() { return $this->_name; }

		public function setIdOption(int $idOption)
		{ 
			$this->_idOption = $idOption;
		}
		public function setName(string $name)
		{ 
			$this->_name = $name;
		}
	}
