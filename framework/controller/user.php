<?php
class user {
	
	public function getAllUsers(){

		$usersModel = new usersModel();
		$users = $usersModel->getAllUsers();

		include "view/user.php";
	}

	public function getUser($id){

		$usersModel = new usersModel();
		$users = $usersModel->getUser($id);

		include "view/user.php";
	}

	function edit ($id){

		$usersModel = new usersModel();
		$users = $usersModel->getUser($id);
		$user = $users[0];

		include "view/user_edit.php";

	}

	function serialize (){
		
		$usersModel = new usersModel();
		$users = $usersModel->getAllUsers();

		$serialized_string = serialize($users);
		pre($serialized_string);
		$unserialized = unserialize($serialized_string);
		pre($unserialized);
	}

	function update(){

		$usersModel = new usersModel();
		$response = $usersModel->update($_POST['name'], $_POST['lastname'], $_POST['phone'], $_POST['id']);

		if($response){
			header("Location: /php2/framework/user/getAllUsers");
		} else {
			echo '<pre>';
			print_r($response);
			echo '</pre>';
		}
	}

	function delete($id){

		$usersModel = new usersModel();
		$response = $usersModel->delete($id);

		if($response){
			header("Location: /php2/framework/user/getAllUsers");
		} else {
			echo '<pre>';
			print_r($response);
			echo '</pre>';
		}

	}

	function create(){

		include "view/user_create.php";
	}

	function insert(){

		$usersModel = new usersModel();
		$response = $usersModel->insert($_POST['name'], $_POST['lastname'], $_POST['phone']);

		if($response){
			header("Location: /php2/framework/user/getAllUsers");
		} else {
			echo '<pre>';
			print_r($response);
			echo '</pre>';
		}

	}

}