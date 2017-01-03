<form action="/feedform/addfeed" method="post" id="feed_form">
	<div class="form-group">
		<label for="fname">Имя</label>
		<input type="text" id="fname" class="form-control" name="fname">
	</div>
	<div class="form-group">
		<label for="femail">E-mail</label>
		<input type="email" id="femail" class="form-control" name="femail">
	</div>
	<div class="form-group">
		<label for="femail">Ваш отзыв</label>
		<textarea name="feed" id="feed" class="form-control"></textarea>
	</div>
	<div class="g-recaptcha" data-sitekey="6Lc9yg8UAAAAAK2387to-Bg3kl5HZMV32F3lSWpJ"></div>
	<input type="submit" class="btn btn-default" name="addfeed" id="addfeed" value="добавить отзыв">
</form>