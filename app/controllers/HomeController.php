<?php

class HomeController extends Controller
{
	private $data = [];

	public function index()
	{
		$books = new PhoneBookModel;

		$sql = "SELECT * FROM book";
		if ($books->pdo->checkConnect($sql) === "Error connect")
			$this->redirect("/config/setup.php");

		$this->data['title'] = "Index";
		$this->data['books'] = $books->getData();

		$this->view->generate("index.php", $this->data);
	}

	public function not_404()
	{
		$this->data['title'] = "404";

		$this->view->generate("404.php", $this->data);
	}

	public function createPerson($req)
	{
		if ($req['name'] != "" && $req['phone'] != "") :
			$person = new PhoneBookModel;

			$person->name = trim(htmlspecialchars($req['name']));
			$person->phone = trim(htmlspecialchars($req['phone']));

			$req['id'] = $person->create($person);

			echo $this->sendResponse($req, "OK");
		else :
			echo $this->sendError("Plaese fill out all fields");
		endif;
	}

	public function updatePerson($req)
	{
		$person = new PhoneBookModel;
		$myPerson = $person->getById($req['id']);

		if (!empty($myPerson)) :
			$person->id = $req['id'];
			$person->name = trim(htmlspecialchars($req['name']));
			$person->phone = trim(htmlspecialchars($req['phone']));

			$person->update($person);

			echo $this->sendResponse($req, "OK");
		else :
			echo $this->sendError("Wrong data!");
		endif;
	}

	public function daletePerson($req)
	{
		$person = new PhoneBookModel;
		$myPerson = $person->getById($req['id']);

		if (!empty($myPerson)) :
			$person->delete($req['id']);

			echo $this->sendResponse($req, "OK");
		else :
			echo $this->sendError("Wrong data!");
		endif;
	}

}
