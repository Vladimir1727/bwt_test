<form action="<?php echo $_SERVER['HTTP_ORIGIN'];?>/registration/adduser" method="post" id="reg_form">
	<div class="form-group">
		<label for="uname">Имя</label>
		<input type="text" id="uname" class="form-control" name="uname">
	</div>
	<div class="form-group">
		<label for="usubname">Фамилия</label>
		<input type="text" id="usubname" class="form-control" name="usubname">
	</div>
	<div class="form-group">
		<label for="uemail">E-mail</label>
		<input type="email" id="uemail" class="form-control" name="uemail">
	</div>
	<div class="form-group">
		<label for="male">мужчина</label>
		<input type="radio" id="male" name="sex" value="male">
		<label for="female">женщина</label>
		<input type="radio" id="female" name="sex" value="female">
	</div>
	<div class="form-group">
		<label for="bday">День рождения</label>
		<input type="date" class="form-control" name="bday">
	</div>
	<div class="form-group">
		<label for="pass1">Пароль</label>
		<input type="password" id="pass1" class="form-control" name="pass1">
	</div>
	<div class="form-group">
		<label for="pass2">Подтверждение пароля</label>
		<input type="password" id="pass2" class="form-control"  name="pass2">
	</div>
	<div class="g-recaptcha" data-sitekey="6Lc9yg8UAAAAAK2387to-Bg3kl5HZMV32F3lSWpJ"></div>
	<input type="submit" class="btn btn-default" name="adduser" id="adduser" value="Зарегестрироваться">
</form>