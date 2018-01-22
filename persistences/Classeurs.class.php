<?php
	namespace persistences;

	require_once \core\FileManager::getCorePath('Persistence');
	require_once \core\FileManager::getModelPath('Classeur');

	class Classeurs extends \core\Persistence {
		
		public static function getAll()
		{
			return null;
		}
		public static function getById(int $id)
		{
			return null;
		}

		public static function getByApprenti(int $id_apprenti)
		{
			$classeurs = \libs\DB::query('SELECT classeurs.id_classeur AS id_classeur, classeurs.id_section AS id_section, classeurs.id_cursus AS id_cursus, cursus.annee_debut AS annee_debut, cursus.annee_fin AS annee_fin FROM classeurs JOIN apprentis_cursus ON apprentis_cursus.id_cursus = classeurs.id_cursus JOIN cursus ON cursus.id_cursus = classeurs.id_cursus WHERE apprentis_cursus.id_apprenti = ?', array($id_apprenti));

			$classeursObj = array();

			foreach($classeurs as $classeur)
			{
				$params = array(
						'id' => $classeur['id_classeur'],
						'idSection' => $classeur['id_section'],
						'idCursus' => $classeur['id_cursus'],
						'cursus' => $classeur['annee_debut'] .' - '. $classeur['annee_fin']
					);
				$classeursObj[] = new \models\Classeur($params);
			}

			return $classeursObj;
		}
	}
