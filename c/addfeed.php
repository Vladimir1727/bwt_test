<?php
if (isset($_POST['addfeed'])){
	//нажата кнопка добавить отзыв
	$feed=Feed::addfeed($_POST['fname'],$_POST['femail'],$_POST['feed']);
	if ($feed==true) include_once('v/v_feed_ok.php');
		else include_once('v/v_feed_err.php');
}
else{
	//обычная загрузка формы
	include_once('v/v_feed_form.php');
}
