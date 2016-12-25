<?php
Tools::SetParam('localhost','root','123456','blog');
$pdo=Tools::connect();

class tools
{
	static private $param;
	static function setparam($host,$user,$pass,$dbname){
		tools::$param=array($host,$user,$pass,$dbname);
	}
	static function connect(){
		$dsn='mysql:host='.tools::$param[0].';dbname='.tools::$param[3].';charset=utf8;';//строка подключения
		$options=array(
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,//при ошибке - прерывать работу и сигнализировать об ошибке
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,//получание данных в ассоциативном массиве
			PDO::MYSQL_ATTR_INIT_COMMAND=>'set names "utf8"',
			);//массив параметров для PDO
		try {
			$pdo = new PDO($dsn,tools::$param[1],tools::$param[2],$options);
			return $pdo;
		} catch (PDOException $e) {
			echo "<small>ошибка подключения к БД</small>";
			return false;
		}
	}
}

class User{
	static function register($param){
		$pdo=Tools::connect();
		/*получаем id пола из табляцы sex*/
		if ($param['sexid']=="") $param['sexid']="unknow";
		$ps=$pdo->query('select id from sex where type="'.$param['sexid'].'"');
		$sid=$ps->fetch();
		$param['sexid']=$sid['id'];
		/*встявляем запись о новом пользователе*/
		$ps=$pdo->prepare('insert into users(name,subname,email,dbirth,pass,sexid)
			values (:name,:subname,:email,:dbirth,:pass,:sexid)');
		try {
			$ps->execute($param);
		} catch (PDOException $e) {
			return false;
		}
		return true;
	}
	static function enter($email,$pass){
		$pdo=Tools::connect();
		$ps=$pdo->prepare('select * from users where email=? and pass=?');
		try {
			$ps->execute(array($email,$pass));
		} catch (PDOException $e) {
			return false;
		}
		$user=$ps->fetch();
		
		$_SESSION['name']=$user['name'];
		$_SESSION['email']=$user['email'];
		$_SESSION['id']=$user['id'];
		if ($_SESSION['id']=="") return false;
		return true;
	}
}