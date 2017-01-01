<?php
class bdtools
{
	public function connect(){
		$param=array('localhost','root','123456','blog');
		//$param=array($host,$user,$pass,$dbname);
		$dsn='mysql:host='.$param[0].';dbname='.$param[3].';charset=utf8;';//строка подключения
		$options=array(
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,//при ошибке - прерывать работу и сигнализировать об ошибке
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,//получание данных в ассоциативном массиве
			PDO::MYSQL_ATTR_INIT_COMMAND=>'set names "utf8"',
			);//массив параметров для PDO
		try {
			$pdo = new PDO($dsn,$param[1],$param[2],$options);
			return $pdo;
		} catch (PDOException $e) {
			echo "<small>ошибка подключения к БД</small>";
			return false;
		}
	}
}