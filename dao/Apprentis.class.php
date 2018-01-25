<?php
	namespace dao;

	require_once \core\FileManager::getCorePath('DAO');

	class Apprentis extends \core\DAO {

		public static function getAll()
		{
			//
		}
		
		public static function getByUser(\models\Utilisateur $user)
		{
			$user = \libs\DB::query('SELECT cursus.annee_debut, cursus.annee_fin FROM apprentis_cursus JOIN cursus ON cursus.id_cursus = apprentis_cursus.id_cursus WHERE id_apprenti = ? LIMIT 1', array($user->getId()))->fetch();
			$cursus =
			$params = array(
						'id' => $user['id_utilisateur'],
						'prenom' => $user['prenom'],
						'nom' => $user['nom'],
						'mdp' => $user['mot_de_passe']
					);

			return new \models\Apprenti($params);
		}
	};
