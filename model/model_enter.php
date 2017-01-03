<?php
class Model_enter extends bwt_test\Model
{
	public function put_data($data)
	{
		$pdo=bwt_test\bdtools::connect();
		$email=$data[0];
		$pass=$data[1];
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
