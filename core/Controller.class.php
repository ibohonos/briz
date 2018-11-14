<?php

class Controller
{
	public $model;
	public $view;

	public function __construct()
	{
		$this->view = new View();
	}

	protected function redirect($url, $msg = "")
	{
		header('Location: ' . $url);

		return $msg;
	}

	protected function sendResponse($result, $message)
	{
		$response = [
			'success'	=> true,
			'result'	=> $result,
			'message'	=> $message,
		];

		return json_encode($response);
	}

	protected function sendError($error, $errorMessages = [])
	{
		$response = [
			'success' => false,
			'message' => $error,
		];

		if(!empty($errorMessages)){
			$response['result'] = $errorMessages;
		}

		return json_encode($response);
	}
}