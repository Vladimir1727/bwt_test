<?php
/*$data=Feed::allfeeds();
$_SESSION['table']=$data;
include_once('v/v_allfeeds.php');*/
class Controller_allfeeds extends Controller
{
	
	function action_index()
	{
		$this->view->generate('feedform_view.php', 'stamp_view.php');
	}
}