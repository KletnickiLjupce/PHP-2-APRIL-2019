<?php


class transactionModel {

	public function getAllTransactions()
	{
		global $db;

		$sql = " SELECT transactions.*, user.name, user.lastname
				 from transactions
				 LEFT JOIN user
				 ON user.id = transactions.user_id
		 ";
		$query = $db->query($sql);
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		
		return $result;
	}

	public function getTransaction($id)
	{
		global $db;

		$sql = " SELECT transactions.* , user.name, user.lastname
				 FROM transactions
				 LEFT JOIN user
				 ON user.id = transactions.user_id
				 WHERE id = '$id'
		 ";

		$query = $db->query($sql);
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		
		return $result;
		// echo '<pre>';
		// print_r($result);
		// echo '</pre>';
	}
}