<?php
namespace bwt_test;
use PDO as PDO;
class bdtools
{
	private static $_instance = null;
	private function __construct() {
	}
	protected function __clone() {
	}

/*	static public function connect(){
		$file=file_get_contents('config_db');
		$config=json_decode($file);
		//echo $config->pass;
		$dsn='mysql:host='.$config->host.';dbname='.$config->database.';charset=utf8;';//строка подключения
		$options=array(
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,//при ошибке - прерывать работу и сигнализировать об ошибке
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,//получание данных в ассоциативном массиве
			PDO::MYSQL_ATTR_INIT_COMMAND=>'set names "utf8"',
			);//массив параметров для PDO
		try {
			$pdo = new PDO($dsn,$config->login,$config->pass,$options);
			return $pdo;
		} catch (PDOException $e) {
			echo "<small>ошибка подключения к БД</small>";
			return false;
		}
	}*/

	static public function connect() {
		if(is_null(self::$_instance))
		{
			self::$_instance = new self();
			$file=file_get_contents('config_db');
			$config=json_decode($file);
			//echo $config->pass;
			$dsn='mysql:host='.$config->host.';dbname='.$config->database.';charset=utf8;';//строка подключения
			$options=array(
				PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,//при ошибке - прерывать работу и сигнализировать об ошибке
				PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,//получание данных в ассоциативном массиве
				PDO::MYSQL_ATTR_INIT_COMMAND=>'set names "utf8"',
				);//массив параметров для PDO
			try {
				$pdo = new PDO($dsn,$config->login,$config->pass,$options);
				return $pdo;
			} catch (PDOException $e) {
				echo "<small>ошибка подключения к БД</small>";
				return false;
		}
			return self::$_instance;
		}
	}

}