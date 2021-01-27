<form method="post">
	@csrf
	<input type="text" name="nama">
	<input type="submit" name="save">
</form>

 @include('sweetalert::alert')
	