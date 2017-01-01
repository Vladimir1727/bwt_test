<?php
class Controller_main extends bwt_test\Controller
{
	
	function action_index()
	{
		$this->view->generate('regform_view.php', 'stamp_view.php');
	}
}