<?php
	session_start();

	require_once '../core/FileManager.class.php';
	require_once \core\FileManager::getCorePath('Application');

	$app = new \core\Application;

	$app->execute();
