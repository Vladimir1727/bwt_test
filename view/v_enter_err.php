<form action="index.php<?php if (isset($_GET['page'])) echo '?page='.$_GET['page']; ?>" method="post" class="form-inline">
	<span class="text-warning">
		Ошибка входа
		<input type="submit" class="btn btn-danger" value="Попробовать ещё раз">
	</span>
</form>