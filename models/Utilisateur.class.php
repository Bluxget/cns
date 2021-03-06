<?php
	namespace models;

	require_once \core\FileManager::getCorePath('Model');

	abstract class Utilisateur extends \core\Model {

		protected $_id;
		protected $_prenom;
		protected $_nom;

		public function getId() { return $this->_id; }
		public function getPrenom() { return $this->_prenom; }
		public function getNom() { return $this->_nom; }

		public function setId(int $id)
		{ 
			$this->_id = $id;
		}
		public function setPrenom(string $prenom)
		{ 
			$this->_prenom = $prenom;
		}
		public function setNom(string $nom)
		{ 
			$this->_nom = $nom;
		}
	};
