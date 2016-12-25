<?php
if (isset($_POST['adduser'])){
	/*регистрируем нового пользователя*/
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

/*форма регистрации*/
include_once('v/v_reg_form.php');