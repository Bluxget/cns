<?php
	namespace core;

	/**
	 * Classe modèle des persistences
	 */
	abstract class Persistence {
		
		abstract public static function getAll();
		abstract public static function getById(int $id);
	}
