<?php 
class Validate {
	private $_passed,
			$_message,
	 		$_errors = array(),
			$_db = null;

	public function __construct(){
		$this->_db = DB::getInstance();
	}


	public function check($source, $items = array(), $message = null) {
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				$item = escape($item);
				if(substr($item, 0, 4) !== 'file') {
					$item = (substr($item, 0, 3) === 'ing') ? substr($item, 0, 15) : substr($item, 0, 16);
					if(is_array($source[$item])) {
						$value = trim($source[$item][$rules['index']]);
					} else {
						$value = trim($source[$item]);
					}
				} else {
					if(!empty($_FILES[$item]["name"])) {
						$file = $_FILES[$item];
						$fileName = $file["name"];
						$fileError = $file["error"];
						$fileSize = $file["size"];
					}
				}

				if($rule === 'required' && empty($value)) {
					$ruleName = strtolower($rules['name']);
					$this->addError("Please fill in all required fields including your " . $ruleName . ".");
				} elseif (!empty($value)) {
					switch ($rule) {
						case 'min':
							if (strlen($value) < $rule_value) {
								$this->addError("{$rules['name']} must be a minimum of {$rule_value} characters.");
							}
							break;

						case 'max':
							if (strlen($value) > $rule_value) {
								$this->addError("{$rules['name']} must be a maximum of {$rule_value} characters.");
							}
							break;

						case 'unique':
							$check = $this->_db->get($rule_value, array('username', '=', $value));
							if($check->count()) {
								$this->addError("Sorry, <em>{$value}</em> has already been taken.");
							}

							break;

						case 'uniqueToRest':
							$checkUniqueToRest = $this->_db->get($rule_value, array('username', '=', $value));

							if($checkUniqueToRest->count()) {
								$checkUniqueUsername = $checkUniqueToRest->first()->username;

								$user = new User();
								$loggedInUsername = $user->data()->username;

								if($loggedInUsername !== $checkUniqueUsername) {
									$this->addError("Sorry, <em>{$value}</em> has already been taken.");
								}

							}

							break;

						case 'preg_match':
							if(!preg_match($rule_value['pregMatchCode'], $value)) {
								$this->addError($rule_value['pregMatchText']);
							}
							break;

						case 'preg_match1':
							if(!preg_match($rule_value['pregMatchCode'], $value)) {
								$this->addError($rule_value['pregMatchText']);
							}
							break;
						case 'matches':
							if ($rule_value['oldPasswordInput'] !== $rule_value['password']) {
								$this->addError("Sorry, you've entered the wrong password.");
							}
							break;
					}
				} elseif(isset($file)) {
					switch ($rule) {
						case 'fileExt':
							$fileExt = explode(".", $fileName);
							$fileExt = strtolower(end($fileExt));

							if(!in_array($fileExt, $rule_value)) {
								$this->addError("Sorry, image file type not accepted for your selected {$rules['name']}. Please try another file type.");
							}

							break;

						case 'fileError':
							if($fileError !== $rule_value) {
								$this->addError("Sorry, there was an error with your {$rules['name']}.");
								echo $fileError;
							} 

							break;

						case 'fileSize':
							if($fileSize >= $rule_value) {
								$this->addError("Please choose a {$rules['name']} with a lower file size.");
							}
							break;
					}
				}
			}
		}

		if (empty($this->_errors)) {
			$this->_passed = true;
			$this->_message = $message;
		}

		return $this;
	}

	public function addError($error) {
		$this->_errors[] = $error;
	}

	public function errors() {
		return $this->_errors;
	}

	public function passed() {
		return $this->_passed;
	}

	public function message() {
		return $this->_message;
	}


	public function hide($class = null) {
		if($class === 'hide') {
			if (empty($this->_errors)) {
				return 'hide';
			} else {
				return 'show';
			}
		} else {
			if (empty($this->_errors)) {
				return 'show'; 
			} else {
				return 'hide';
			}
		}
	}

}