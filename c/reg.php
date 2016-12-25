<?php
if (isset($_POST['adduser'])){
	/*регистрируем нового пользователя*/
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
				$send=true;
				$data=array();
				$data['name']=$_POST['uname'];
				$data['subname']=$_POST['usubname'];
				$data['email']=$_POST['uemail'];
				$data['sexid']=$_POST['sex'];
				$data['dbirth']=strtotime($_POST['bday']);
				$data['pass']=$_POST['pass1'];
				$reg=User::register($data);
				if ($reg==true) include_once('v/v_reg_ok.php');
					else include_once('v/v_reg_err.php');
				exit;
			}
			else include_once('v/v_reg_err.php');
      } else  include_once('v/v_reg_form.php');
        //reCaptcha введена
}
else include_once('v/v_reg_form.php');