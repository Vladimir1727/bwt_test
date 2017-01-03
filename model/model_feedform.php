<?php
class Model_feedform extends bwt_test\Model
{
	public function put_data($data)
	{
		$pdo=bwt_test\bdtools::connect();
		$name=$data[0];
		$email=$data[1];
		$feed=$data[2];
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

}
