<?php
class Model_enter extends bwt_test\Model
{
	function __construct(){
		$this->bd=new bwt_test\bdtools;
	}
	public function put_data($data)
	{
		$email=$data[0];
		$pass=$data[1];
		$pdo=$this->bd->connect();
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
