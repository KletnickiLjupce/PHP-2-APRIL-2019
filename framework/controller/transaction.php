<?php
class transaction {
	
	public function getAllTransactions(){

		$model = new transactionModel();
		$transactions = $model->getAllTransactions();

		include "view/transaction.php";
	}

	public function getTransaction($id){

		$model = new transactionModel();
		$transactions = $model->getTransaction($id);

		include "view/transaction.php";
	}

}