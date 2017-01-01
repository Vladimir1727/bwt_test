<?php
class Controller_feedform extends bwt_test\Controller
{
	function __construct()
	{
		$this->model = new Model_feedform();
		$this->view = new bwt_test\View();
	}	
	function action_index()
	{
		if (isset($_SESSION['id']) && $_SESSION['id']>0){
			$this->view->generate('feedform_view.php','stamp_view.php');
		}else $this->view->generate('regform_view.php', 'stamp_view.php');
	}
	function action_addfeed()
	{
		$secret = "6Lc9yg8UAAAAAL5dFaJtyLl6j8p_Qel2uQocjxXr";
		$response = null;
		$reCaptcha = new ReCaptcha($secret);
		if ($_POST["g-recaptcha-response"]){
			$response = $reCaptcha->verifyResponse(
	        	$_SERVER["REMOTE_ADDR"],
	        	$_POST["g-recaptcha-response"]
	    	);
		}
		if ($response != null && $response->success){
			if ($_POST['fname']!="" && $_POST['femail']!="" && $_POST['feed']!=""){
				$data=array($_POST['fname'],$_POST['femail'],$_POST['feed']);
				$feed=$this->model->put_data($data);
				if ($feed==true) $this->view->generate('feedok_view.php','stamp_view.php');
					else $this->view->generate('feederr_view.php','stamp_view.php');
			}else $this->view->generate('feederr_view.php','stamp_view.php');
		}else $this->view->generate('feederr_view.php','stamp_view.php');
	}
}
