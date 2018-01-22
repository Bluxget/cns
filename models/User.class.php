<?php
	namespace models;

	require_once \core\FileManager::getCorePath('Model');

	class User extends \core\Model {

		private $_id;
		private $_firstName;
		private $_lastName;
		private $_password;

		public function getId() { return $this->_id; }
		public function getLastName() { return $this->_lastName; }
		public function getFirstName() { return $this->_firstName; }
		public function getPassword() { return $this->_password; }

		public function setId(int $id)
		{ 
			$this->_id = $id;
		}
		public function setFirstName(string $firstName)
		{ 
			$this->_firstName = $firstName;
		}
		public function setLastName(string $lastName)
		{ 
			$this->_lastName = $lastName;
		}
		public function setPassword(string $password)
		{ 
			$this->_password = $password;
		}
	}
