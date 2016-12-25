<form action="index.php<?php if (isset($_GET['page'])) echo '?page='.$_GET['page']; ?>" method="post" id="enter_form" class="form-inline">
	<input type="email" id="eemail" class="form-control" name="eemail" placeholder="e-mail...">
	<input type="password" id="epass" class="form-control" name="epass" placeholder="пароль...">
	<input type="submit" class="btn btn-default" name="enter_but" id="enter_but" value="войти">
</form>