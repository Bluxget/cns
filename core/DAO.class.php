<?php
	namespace core;

	/**
	 * Classe modèle des Data Access Object
	 */
	abstract class DAO {
		
		abstract public static function getAll();
		abstract public static function getById(int $id);
	};
