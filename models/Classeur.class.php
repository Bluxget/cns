<?php
	namespace models;

	require_once \core\FileManager::getCorePath('Model');

	class Classeur extends \core\Model {

		private $_id;
		private $_idSection;
		private $_idCursus;
		private $_cursus;

		public function getId() { return $this->_id; }
		public function getIdSection() { return $this->_idSection; }
		public function getIdCursus() { return $this->_idCursus; }
		public function getCursus() { return $this->_cursus; }

		public function setId(int $id)
		{ 
			$this->_id = $id;
		}
		public function setIdSection(int $idSection)
		{ 
			$this->_idSection = $idSection;
		}
		public function setIdCursus(int $idCursus)
		{ 
			$this->_idCursus = $idCursus;
		}
		public function setCursus(string $cursus)
		{ 
			$this->_cursus = $cursus;
		}
	}
