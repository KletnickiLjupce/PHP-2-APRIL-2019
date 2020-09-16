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
				<th>transaction_number</th>
				<th>type</th>
				<th>sum</th>
				<th>date</th>
				<th>user_id / name / lastname</th>
				<th>SHOW</th>
			</tr>
		</thead>

		<tbody>
			<?php 
				foreach ($transactions as $transaction) {
			
					echo "
				<tr>
					<td>{$transaction['id']}</td>
					<td>{$transaction['transaction_number']}</td>
					<td>{$transaction['type']}</td>
					<td>{$transaction['sum']}</td>
					<td>{$transaction['date']}</td>
					<td>{$transaction['user_id']} / {$transaction['name']} / {$transaction['lastname']}</td>
					<td><a href='/php2/framework/transaction/getTransaction/{$transaction['id']}' >show</a></td>
				</tr>
					";
				}
			?>
		</tbody>
		
	</table>

	<br>
	<a href="/php2/framework/user/getAllUsers">All Users</a>
	<br>
	<a href="/php2/framework/transaction/getAllTransactions">All Transactions</a>


</body>
</html>