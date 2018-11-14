<?php
include_once "database.php";

try {
	$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "CREATE TABLE IF NOT EXISTS `book` (
			`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			`name` varchar(255) NOT NULL,
			`phone` varchar(255) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

	$pdo->exec($sql);
	header('Location: /');
} catch (PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}