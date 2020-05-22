<?php

namespace Rox;



class Foreup_api
{
	private $validuser;
	private $token;

	/**
	 * 	Function that returns true
	 *
	 * @return bool
	 */
	function __construct() {
        $this->validuser = false;
        $this->token = false;
    }

	private function setValidUser($stat) {
		$this->validuser =  $stat;
	}

	public function getToken() {
		return $this->token;
	}
	
	private function setToken($tok) {
		$this->token =  $tok;
	}

	public function func() {
		return true;
	}

	public function isValidUser() {
		return $this->validuser;
	}

	

	public function authenticate($email, $password) {

		$uri = "https://mobile.foreupsoftware.com/api_rest/index.php/tokens";
		
		$credentialsObj = new \stdClass();
		$credentialsObj->email = $email;
		$credentialsObj->password = $password;

		$credentialsJSON = json_encode($credentialsObj);

		// $response = '{"data":{"type":"token","id":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpc3MiOiJmb3JldXBzb2Z0d2FyZS5jb20iLCJhdWQiOiJmb3JldXBzb2Z0d2FyZS5jb20iLCJpYXQiOjE1OTAxMzUxMjAsImV4cCI6MTU5MjcyNzEyMCwibGV2ZWwiOjMsImNpZCI6MTk0NjcsImVtcGxveWVlIjp0cnVlLCJ1aWQiOjY2NDY4MDl9.Lp90I235B8_bdDfvDHuXUtKVvZq3lYhPIlfYmHwqMdovhom1kum4sJDVT-l22usgvRxc1pyQc2qEhGkKRGu8Pw","attributes":[]},"meta":{"warnings":[]}}';

		// $response = json_decode($response);

		$this->setToken("");
		$this->setValidUser(false);


		try {
			$response = \Httpful\Request::post($uri)
				->sendsJson()
				->body($credentialsJSON)
				->send();

			if (isset($response->code) && $response->code == '200') {
				$raw_body = json_decode($response->raw_body);
				$response = new \stdClass();
				$response->success = true;
				$response->token = $raw_body->data->id; 
				$response->message = 'Successfully retrieved the token';
				$this->setToken($response->token);
				$this->setValidUser(true);
			} else {
				$response = new \stdClass();
				$response->success = false;
				$response->token = ""; 
				$response->message = "Unable to retrieve token";				
			}
		} catch (exception $e) {
			$response = new \stdClass();
			$response->success = false;
			$response->token = ""; 
			$response->message = "An exception occurred: Unable to retrieve token";
		}

		return $response;
	}

	public function timezone_offset_string($offset)
	{
		return sprintf("%s%02d%02d", ($offset >= 0) ? '+' : '-', abs($offset / 3600), abs($offset % 3600) / 60);
	}


	public function CreateCustomer($courseId, $data) {

		$uri = "https://mobile.foreupsoftware.com/api_rest/index.php/courses/" . $courseId . "/customers";
		$response = new \stdClass();
		$response->success = false;

		$offset = timezone_offset_get(new \DateTimeZone(date_default_timezone_get()), new \DateTime());
		//echo "offset: " . date_default_timezone_get() . ' ==> ' . timezone_offset_string($offset) . "\n";
		$data->date_created =  date("Y-m-d ") . 'T' . date("h:i:s") . $offset;


		if ($this->isValidUser()) {

			$head = '{ "data": { "type": "customer", "attributes":';
			$body = json_encode($data);
			$footer = "}}}";

			$fullJSON = $head.$body.$footer;

			$dataOBJ = json_decode($fullJSON);
			
			try {

				$response = \Httpful\Request::post($uri)
					->expectsJson()
					->body($fullJSON)
					//->addHeader('x-authorization', 'Bearer ' . $this->getToken())

					->addHeaders(
						array(
							'Content-Type' => 'application/json',
							'x-authorization' => 'Bearer ' . $this->getToken()
						)
					)

					->send();

				if (isset($response->code) && $response->code == '200') {
					$raw_body = json_decode($response->raw_body);
					$response = new \stdClass();
					$response->success = true;
					$response->message = 'Successfully added a customer';
					$this->setToken($response->token);
					$this->setValidUser(true);
				} else {
					$response = new \stdClass();
					$response->success = false;
					$response->token = ""; 
					$response->message = "Error: Unable to add a customer";				
				}
				
				var_dump($response);

			} catch (exception $e) {
				$response = new \stdClass();
				$response->success = false;
				$response->token = ""; 
				$response->message = "An exception occurred: Unable to add new customer";
			}

		} else {

			$response->message = "Error: You must authenticate first";

		}

		return $response;
	}

}