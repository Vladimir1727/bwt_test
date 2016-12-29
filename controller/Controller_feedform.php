<?php
/*if (isset($_POST['addfeed'])){
	//нажата кнопка добавить отзыв
	//echo $_POST['g-recaptcha-response'];
$secret = "6Lc9yg8UAAAAAL5dFaJtyLl6j8p_Qel2uQocjxXr";
	$response = null;
	$reCaptcha = new ReCaptcha($secret);
	if ($_POST["g-recaptcha-response"]) {
		$response = $reCaptcha->verifyResponse(
        	$_SERVER["REMOTE_ADDR"],
        	$_POST["g-recaptcha-response"]
    	);
	}
	if ($response != null && $response->success){
		if ($_POST['fname']!="" && $_POST['femail']!="" && $_POST['feed']!=""){
		$feed=Feed::addfeed($_POST['fname'],$_POST['femail'],$_POST['feed']);
		if ($feed==true) include_once('v/v_feed_ok.php');
			else include_once('v/v_feed_err.php');
		}
		else include_once('v/v_feed_err.php');
	} else include_once('v/v_feed_err.php');
}
else{
	//обычная загрузка формы
	
}
*/
//include_once('view/v_feed_form.php');
class Controller_feedform extends Controller
{
	
	function action_index()
	{
		$this->view->generate('feedform_view.php', 'stamp_view.php');
	}
}
