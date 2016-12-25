<form action="index.php<?php if (isset($_GET['page'])) echo '?page='.$_GET['page']; ?>" method="post" class="form-inline">
		<span style="color:#ddd;line-height:30px;font-size:16px;">
		<?php
			echo $_SESSION['name'];
		?>
		</span>
		<input type="submit" class="btn btn-warning" value="выйти" name="exit_but" id="exit_but">
</form>