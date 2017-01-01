<form action="<?php echo $_SERVER['HTTP_ORIGIN'];?>/enter" method="post" class="form-inline">
		<span style="color:#ddd;line-height:30px;font-size:16px;">
		<?php
			echo $_SESSION['name'];
		?>
		</span>
		<input type="submit" class="btn btn-warning" value="выйти" name="exit_but" id="exit_but">
</form>