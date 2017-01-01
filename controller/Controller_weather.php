<?php
class Controller_weather extends bwt_test\Controller
{
	function __construct()
	{
		$this->model = new Model_weather();
		$this->view = new bwt_test\View();
	}	
	function action_index()
	{
		if (isset($_SESSION['id']) && $_SESSION['id']>0){
			$data = $this->model->get_data();
			$this->view->generate('weather_view.php', 'stamp_view.php',$data);
		}else $this->view->generate('regform_view.php', 'stamp_view.php');
	}
}