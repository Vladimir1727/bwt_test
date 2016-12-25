<form action="index.php<?php if (isset($_GET['page'])) echo '?page='.$_GET['page']; ?>" method="post" class="form-inline">
	<span class="text-primary">
		<?php
			echo 'вошел: ';
			echo $_SESSION['name'];
		?>
	</span>
	<input type="submit" class="btn btn-warning" value="выйти" name="exit_but">
</form>