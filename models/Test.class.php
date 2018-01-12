<?php
	namespace models;

	require_once \core\FileManager::getCorePath('Model');

	class Test extends \core\Model {

		private $_idOption;
		private $_name;

		public function getIdTest() { return $this->_idTest; }
		public function getName() { return $this->_name; }
		public function getMark() { return $this->_mark; }

		public function setIdTest(int $idTest)
		{ 
			$this->_idTest = $idTest;
		}
		public function setName(string $name)
		{ 
			$this->_name = $name;
		}
	}
