<form action="/php2/framework/user/update" method="post">

	<label for="">Name :</label>
	<input type="text" name="name" value="<?= $user['name'] ?>">
	<br>

	<label for="">Lastname :</label>
	<input type="text" name="lastname" value="<?= $user['lastname'] ?>">
	<br>

	<label for="">Phone :</label>
	<input type="text" name="phone" value="<?= $user['phone'] ?>">
	<br>

	<input type="hidden" name="id" value="<?= $id ?>">

	<input type="submit" value="Update">
</form>

<style>
	label{
		width:80px;
		display: inline-block;
		margin-bottom: 15px;
	}
</style>
