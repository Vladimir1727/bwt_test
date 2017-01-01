<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Книга отзывов и предложений</title>
	<link rel="stylesheet" href="<?php echo $_SERVER['HTTP_ORIGIN'];?>/css/bootstrap.min.css">
	<link rel="stylesheet/css" href="<?php echo $_SERVER['HTTP_ORIGIN'];?>/css/style.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<p style="display:none">6Lc9yg8UAAAAAK2387to-Bg3kl5HZMV32F3lSWpJ</p>
</head>
<body>
<?php 
foreach ($_SERVER as $k => $v) {
	//echo $k.'='.$v.'<br>';
}
 ?>
<!-- гланое меню -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/registration">Книга отзывов</a>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      	<li <?php if ($_SERVER['REQUEST_URI']=='/registration') echo 'class="active"'; ?>>
	      	<a href="/registration">
	      		<span class="glyphicon glyphicon-user"></span>
	      		Регистрация
	      	</a>
      	</li>
      	<li <?php if ($_SERVER['REQUEST_URI']=='/weather') echo 'class="active"'; ?>>
	    	<a href="/weather" >
	    		<span class="glyphicon glyphicon-tint"></span>
	        	Погода
	        </a>
	    </li>	
		<li <?php if ($_SERVER['REQUEST_URI']=='/feedform') echo 'class="active"'; ?>>
			<a href="/feedform">
				<span class="glyphicon glyphicon-plus"></span>
				Добавить отзыв
			</a>
		</li>
		<li <?php if ($_SERVER['REQUEST_URI']=='/allfeeds') echo 'class="active"'; ?>>
	    	<a href="/allfeeds">
	    		<span class="glyphicon glyphicon-th-list"></span>
	        	Все отзывы
	        </a>
	    </li>
	</ul>
    <ul class="nav navbar-nav navbar-right">
         <li> 
         <?php 
         	include_once(Controller_enter::$enter_form); 
         ?>
         	
         </li>
      </ul>
    	
    </div>
  </div>
</nav>
<!-- основной раздел -->
<main>
	<?php include 'view/'.$content_view; ?>
</main>
<!-- футер -->
<footer>
	<p class="text-center">
		<span class="glyphicon glyphicon-copyright-mark"></span>
		Diamandy production
		<p><?php var_dump($_SESSION['err']); ?></p>
		<p><?php var_dump($_SESSION['email']); ?></p>
	</p>
</footer>
<script src="<?php echo $_SERVER['HTTP_ORIGIN'];?>/js/jquery-2.0.0.min.js"></script>
<script src="<?php echo $_SERVER['HTTP_ORIGIN'];?>/js/bootstrap.min.js"></script>
<script src="<?php echo $_SERVER['HTTP_ORIGIN'];?>/js/script.js"></script>
</body>
</html>