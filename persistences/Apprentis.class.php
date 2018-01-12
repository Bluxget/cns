<?php
	namespace persistences;

	require_once \core\FileManager::getCorePath('Persistence');
	require_once \core\FileManager::getModelPath('Apprentice');

	class Apprentice extends \core\Persistence {

		public static function getAll()
		{
			$apprentices = \libs\DB::query('SELECT * FROM apprentices INNER JOIN options ON apprentices.id_option = options.id_option');

			$apprenticesObj = array();

			foreach($apprentices as $apprentice)
			{
				$params = array(
						'idApprentice' => $apprentice['id_apprentice'],
						'idOption' => $apprentice['id_option'],
						'option' => $apprentice['name'],
						'firstName' => $apprentice['first_name'],
						'lastName' => $apprentice['last_name'],
						'email' => $apprentice['email']
					);
				$apprenticesObj[] = new \models\Apprentice($params);
			}

			return $apprenticesObj;
		}

		public static function getById(int $id)
		{
			$apprentice = \libs\DB::query('SELECT * FROM apprentices INNER JOIN options ON apprentices.id_option = options.id_option WHERE id_apprentice = ?', array($id))->fetch();

			$params = array(
						'idApprentice' => $apprentice['id_apprentice'],
						'idOption' => $apprentice['id_option'],
						'option' => $apprentice['name'],
						'firstName' => $apprentice['first_name'],
						'lastName' => $apprentice['last_name'],
						'email' => $apprentice['email']
					);
			$apprenticeObj = new \models\Apprentice($params);

			return $apprenticeObj;
		}

		public static function insert(\models\Apprentice &$apprentice)
		{
			$params = array(
					$apprentice->getIdOption(), 
					$apprentice->getFirstName(), 
					$apprentice->getLastName(), 
					$apprentice->getEmail()
				);

			\libs\DB::query('INSERT INTO apprentices(id_option, first_name, last_name, email) VALUES(?, ?, ?, ?)', $params);

			$apprentice->setIdApprentice(\libs\DB::getLastInsertId());
		}

		public static function update(\models\Apprentice &$apprentice)
		{
			$params = array(
					$apprentice->getIdOption(), 
					$apprentice->getFirstName(), 
					$apprentice->getLastName(), 
					$apprentice->getEmail(), 
					$apprentice->getIdApprentice()
				);

			\libs\DB::query('UPDATE apprentices SET id_option = ?, first_name = ?, last_name = ?, email = ? WHERE id_apprentice = ? LIMIT 1', $params);
		}

		public static function delete(\models\Apprentice &$apprentice)
		{
			$params = array(
					$apprentice->getIdApprentice()
				);

			\libs\DB::query('DELETE FROM apprentices WHERE id_apprentice = ? LIMIT 1', $params);

			unset($apprentice);
		}
	}
