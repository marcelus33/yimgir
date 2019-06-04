<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	/*
	'connectionString' => 'pgsql:host=localhost;port=5432;dbname=mgir',
	'emulatePrepare' => true,
	'username' => 'postgres',
	'password' => '12345',
	'charset' => 'utf8',*/
	'connectionString' => 'mysql:host=localhost;port=3306;dbname=mgir',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	'nullConversion' => PDO::NULL_EMPTY_STRING,
	
);