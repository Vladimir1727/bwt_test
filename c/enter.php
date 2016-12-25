<?php
if (isset($_SESSION['id']) && $_SESSION['id']>0){
	//вход уже выполнен
	if (isset($_POST['exit_but'])){
		//нажата кнопка выйти
		$_SESSION['name']="";
		$_SESSION['email']="";
		$_SESSION['id']="";
		include_once('v/v_enter_form.php');
	}
	else{
		include_once('v/v_enter_ok.php');
	}
}
else{
	//вход не выполнен
	if (isset($_POST['enter_but'])){
		//нажата кнопка войти
		$enter=User::enter($_POST['eemail'],$_POST['epass']);
		if ($enter==true) include_once('v/v_enter_ok.php');
			else include_once('v/v_enter_err.php');
	}
	else{
		include_once('v/v_enter_form.php');
	}

}





