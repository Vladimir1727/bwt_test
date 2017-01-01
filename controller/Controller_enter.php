<?php
class Controller_enter extends Controller
{
	static public $enter_form;
	function __construct(){
		if (isset($_SESSION['id']) && $_SESSION['id']>0){
		//вход уже выполнен
			Controller_enter::$enter_form="enterok_view.php";
		}
		else{
			Controller_enter::$enter_form="enterform_view.php";
		}
		$this->model = new Model_enter();
		$this->view = new View();
	}
		
	function action_index()
	{
		if (isset($_SESSION['id']) && $_SESSION['id']>0){
		//вход уже выполнен
			if (isset($_POST['exit_but'])){
				//нажата кнопка выйти
				$_SESSION['name']="";
				$_SESSION['email']="";
				$_SESSION['id']="";
				Controller_enter::$enter_form="enterform_view.php";
			}
			else{
				Controller_enter::$enter_form="enterok_view.php";
			}
		}
		else{
			$_SESSION['err']="";
			//вход не выполнен
			if (isset($_POST['enter_but'])){
				//нажата кнопка войти
				if($_POST['eemail']!="" && $_POST['epass']!=""){
				$enter=$this->model->put_data(array($_POST['eemail'],$_POST['epass']));

				if ($enter==true) Controller_enter::$enter_form="enterok_view.php";
					else Controller_enter::$enter_form="entererr_view.php";
				}
				else Controller_enter::$enter_form="entererr_view.php";
			}
			else{
				Controller_enter::$enter_form="enterform_view.php";
			}
		}
		$this->view->generate('regform_view.php', 'stamp_view.php');
	}
}




