<?php
session_start();
//$_SESSION['reg']="Vova";
//include_once ("pages/classes.php");
//Tools::SetParam('localhost','root','123456','shop');
//$pdo=Tools::connect();
if(isset($_GET['page'])){
	$page=$_GET['page'];
	}
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Книга отзывов и предложений</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery-ui.min.css">
	<link rel="stylesheet/less" href="css/style.less">
</head>
<body>
<!-- гланое меню -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php?page=1">Книга отзывов</a>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      	<li <?php echo ($page==1)? "class='active'":"" ?>>
	      	<a href="index.php?page=1">
	      		<span class="glyphicon glyphicon-user"></span>
	      		Регистрация
	      	</a>
      	</li>
		<li <?php echo ($page==2)? "class='active'":"" ?>>
			<a href="index.php?page=2">
				<span class="glyphicon glyphicon-plus"></span>
				Добавить отзыв
			</a>
		</li>
		<li <?php echo ($page==3)? "class='active'":"" ?>>
	    	<a href="index.php?page=3">
	    		<span class="glyphicon glyphicon-th-list"></span>
	        	Все отзывы
	        </a>
	    </li>
		<li <?php echo ($page==4)? "class='active'":"" ?>>
	    	<a href="index.php?page=4">
	    		<span class="glyphicon glyphicon-tint"></span>
	        	Погода
	        </a>
	    </li>	
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
       	<?php include_once("c/enter.php"); ?>
      </ul>
    	
    </div>
  </div>
</nav>
<!-- основной раздел -->
<main>
<?php
if(isset($_GET['page'])){
		if($page==1) include_once("c/reg.php");
		if($page==2) include_once("c/addfeed.php");
		if($page==3) include_once("c/feeds.php");
		if($page==4) include_once("c/weather.php");
	}
else include_once("c/reg.php");
 ?>
</main>
<!-- футер -->
<footer>
	<p class="text-center">
		<span class="glyphicon glyphicon-copyright-mark"></span>
		Diamandy production
	</p>
</footer>
<script src="js/jquery-2.0.0.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>