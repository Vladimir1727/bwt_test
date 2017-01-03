<?php
class Model_allfeeds extends bwt_test\Model
{
	public function get_data()
	{
		$pdo=bwt_test\bdtools::connect();
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
