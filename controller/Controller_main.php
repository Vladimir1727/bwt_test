<?php
class Controller_main extends Controller
{
	
	function action_index()
	{
		$this->view->generate('regform_view.php', 'stamp_view.php');
	}
}