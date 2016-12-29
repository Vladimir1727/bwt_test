<?php
Tools::SetParam('127.0.0.1:3306','dvn16','12-ty-89','dvn16');
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
		$param['pass']=md5($param['pass']);
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
		//вход вользователя
		$pdo=Tools::connect();
		$ps=$pdo->prepare('select * from users where email=? and pass=?');
		try {
			$ps->execute(array($email,md5($pass)));
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

class Feed{
	static function addfeed($name,$email,$feed){
		//добавляем отзыв
		$pdo=Tools::connect();
		$ps=$pdo->query('select id from users where name="'.$name.'" and email="'.$email.'"');
		$row=$ps->fetch();
		$uid=$row['id'];
		if (!$uid>0) return false;
		$param= array('feed' => $feed,'ftime'=>time(),'userid'=> $uid);
		$ps=$pdo->prepare('insert into feeds(feed,ftime,userid)
			values (:feed,:ftime,:userid)');
		try {
			$ps->execute($param);
		} catch (PDOException $e) {
			return false;
		}
		return true;
	}

	static function allfeeds(){
		//все отзывы
		$pdo=Tools::connect();
		$ps=$pdo->prepare('select f.feed,f.ftime,u.name,u.subname 
			from feeds f,users u
			where f.userid=u.id');
		$data=array();
		try {
			$ps->execute();
		} catch (PDOException $e) {
			return false;
		}
		$i=0;
		while($row=$ps->fetch()){
			$data[$i]['feed']=$row['feed'];
			$data[$i]['time']=$row['ftime'];
			$data[$i]['name']=$row['name'];
			$data[$i]['subname']=$row['subname'];
			$i++;
		}
		return $data;
	}
}