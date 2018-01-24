<?php
	namespace core;

	/**
	 * Classe modèle des contrôleurs
	 */
	abstract class Controller {
		
		protected $_application;

		public function __construct(\core\Application &$application)
		{
			$this->_application = $application;
		}

		abstract public function execute(); // Fonction utilisée par l'application à chaque éxécution
	};