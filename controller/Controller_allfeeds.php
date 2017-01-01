<?php
class Controller_allfeeds extends Controller
{
	function __construct()
	{
		$this->model = new Model_allfeeds();
		$this->view = new View();
	}	
	function action_index()
	{
		if (isset($_SESSION['id']) && $_SESSION['id']>0){
			$data = $this->model->get_data();
			$this->view->generate('allfeeds_view.php', 'stamp_view.php',$data);
		}else $this->view->generate('regform_view.php', 'stamp_view.php');
	}
}