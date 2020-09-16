<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users Table</title>
</head>
<body>
	<table border="1">
		
		<thead>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>lastname</th>
				<th>phone</th>
				<th>SHOW</th>
				<th>EDIT</th>
				<th>DELETE</th>
			</tr>
		</thead>

		<tbody>
			<?php 
				foreach ($users as $user) {
			
					echo "
				<tr>
					<td>{$user['id']}</td>
					<td>{$user['name']}</td>
					<td>{$user['lastname']}</td>
					<td>{$user['phone']}</td>
					<td><a href='/php2/framework/user/getUser/{$user['id']}' >show</a></td>
					<td><a href='/php2/framework/user/edit/{$user['id']}' >edit</a></td>
					<td><a href='/php2/framework/user/delete/{$user['id']}' >delete</a></td>
				</tr>
					";
				}
			?>
		</tbody>
		
	</table>

	<br>
	<a href="/php2/framework/user/create">Insert User</a>

	<br>
	<br>
	<br>
	<a href="/php2/framework/user/getAllUsers">All Users</a>
	<br>
	<a href="/php2/framework/transaction/getAllTransactions">All Transactions</a>


</body>
</html>