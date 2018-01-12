<?php
	session_start();

	require_once '../core/FileManager.class.php';
	require_once \core\FileManager::getCorePath('Application');

	$app = new \core\Application;

	$app->init();

	$app->execute();

	// A VOIR MODULE MODIFICATION MOT DE PASSE FORMATEUR
	// A VOIR APPRECIATION DANS LA BASE DE DONNEES
?>