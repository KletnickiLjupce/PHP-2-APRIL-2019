<?php


class usersModel {

	public function getAllUsers()
	{
		global $db;

		$sql = " select * from user";
		$query = $db->query($sql);
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		
		return $result;
	}

	public function getUser($id)
	{
		global $db;

		$sql = " SELECT * 
				 FROM user
				 WHERE id = '$id'
		 ";

		$query = $db->query($sql);
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		
		return $result;
		// echo '<pre>';
		// print_r($result);
		// echo '</pre>';
	}

	function update($name, $lastname, $phone, $id){

		global $db;

		$sql = "
			UPDATE user
			SET 
				name 	 = :name,
				lastname = :lastname,
				phone 	 = :phone
			WHERE 
				id = :id
		";

		$query = $db->prepare($sql);

		$query->bindValue(':name' 		, $name, 		PDO::PARAM_STR);
		$query->bindValue(':lastname' 	, $lastname, 	PDO::PARAM_STR);
		$query->bindValue(':phone' 		, $phone,		PDO::PARAM_STR);
		$query->bindValue(':id' 		, $id, 			PDO::PARAM_STR);

		return $query->execute();
	}

	function delete($id){

		global $db;

		$sql = "
			DELETE FROM user
			WHERE 
				id = :id
		";

		$query = $db->prepare($sql);

		$query->bindValue(':id', $id, PDO::PARAM_STR);

		return $query->execute();
	}

	function insert($name, $lastname, $phone){

		global $db;

		$sql = "
			INSERT INTO user
				(name , lastname, phone)
			VALUES (
				:name,
				:lastname,
				:phone
			)
		";

		$query = $db->prepare($sql);

		$query->bindValue(':name' 		, $name, 		PDO::PARAM_STR);
		$query->bindValue(':lastname' 	, $lastname, 	PDO::PARAM_STR);
		$query->bindValue(':phone' 		, $phone,		PDO::PARAM_STR);

		return $query->execute();

	}
}