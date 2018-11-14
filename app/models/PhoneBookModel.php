<?php

class PhoneBookModel extends Model
{
	public function getData()
	{
		$sql = "SELECT * FROM book";
		$res = $this->pdo->select($sql);

		return $res;
	}

	public function getById($id)
	{
		$sql = "SELECT * FROM book WHERE id='$id'";
		$res = $this->pdo->select($sql);

		return $res[0];
	}

	public function create($person)
	{
		$sql = "INSERT INTO book (name, phone) VALUES('$person->name', '$person->phone')";

		return $this->pdo->insert($sql);
	}

	public function update($person)
	{
		$sql = "UPDATE book SET name = '$person->name', phone = '$person->phone' WHERE id = '$person->id'";

		$this->pdo->update($sql);
	}

	public function delete($id)
	{
		$sql = "DELETE FROM book WHERE id='$id'";

		$this->pdo->delete($sql);
	}
}
