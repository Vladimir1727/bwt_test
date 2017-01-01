<?php
class Controller_registration extends Controller
{
	function __construct()
	{
		$this->model = new Model_registration();
		$this->view = new View();
	}

	function action_index()
	{
		$this->view->generate('regform_view.php', 'stamp_view.php');
	}
	function action_adduser()
	{
		$secret = "6Lc9yg8UAAAAAL5dFaJtyLl6j8p_Qel2uQocjxXr";
		$response = null;
		$reCaptcha = new ReCaptcha($secret);
		if ($_POST["g-recaptcha-response"]) {
			$response = $reCaptcha->verifyResponse(
	        	$_SERVER["REMOTE_ADDR"],
	        	$_POST["g-recaptcha-response"]
	    	);
		}
		if ($response != null && $response->success) {
	        if ($_POST['uname']!="" && $_POST['usubname']!="" && $_POST['pass1']!="" && $_POST['pass1']==$_POST['pass2'] && $_POST['uemail']!=""){
				$data=array();
				$data['name']=$_POST['uname'];
				$data['subname']=$_POST['usubname'];
				$data['email']=$_POST['uemail'];
				$data['sexid']=$_POST['sex'];
				$data['dbirth']=strtotime($_POST['bday']);
				$data['pass']=$_POST['pass1'];
				$reg=$this->model->put_data($data);
				if ($reg==true) $this->view->generate('regok_view.php','stamp_view.php');
					else $this->view->generate('regerr_view.php','stamp_view.php');
			}
				else $this->view->generate('regerr_view.php','stamp_view.php');
	     } else  $this->view->generate('regerr_view.php','stamp_view.php');
	
	}
}