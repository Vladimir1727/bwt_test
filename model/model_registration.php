<?php
class Model_registration extends bwt_test\Model
{
	public function put_data($data)
	{
		$pdo=bwt_test\bdtools::connect();
		/*получаем id пола из табляцы sex*/
		if ($data['sexid']=="") $data['sexid']="unknow";
		$ps=$pdo->query('select id from sex where type="'.$data['sexid'].'"');
		$sid=$ps->fetch();
		$data['sexid']=$sid['id'];
		$data['pass']=md5($data['pass']);
		/*встявляем запись о новом пользователе*/
		$ps=$pdo->prepare('insert into users(name,subname,email,dbirth,pass,sexid)
			values (:name,:subname,:email,:dbirth,:pass,:sexid)');
		try {
			$ps->execute($data);
		} catch (PDOException $e) {
			return false;
		}
		return true;
	}

}
