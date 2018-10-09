<?php 
class User {
	private $_db,
			$_data,
			$_sessionName,
			$_cookieName,
			$_isLoggedIn;

	public function __construct ($user = null) {
		$this->_db = DB::getInstance();
		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');

		if(!$user) {
			if(Session::exists($this->_sessionName)) {
				$user = Session::get($this->_sessionName);

				if($this->find($user)) {
					$this->_isLoggedIn = true;
				} else {
					$this->_isLoggedIn = false;
				}
			}
		} else {
			$this->find($user);
		}
	}

	public function create($fields = array()) {
		if(!$this->_db->insert('users', $fields)) {
			throw new Exception('Sorry, there was a problem creating an account.');
		}
	}


	public function find($user = null) {
		if($user) {
			$field = (is_numeric($user)) ? 'userID' : 'username';
			$data = $this->_db->get('users', array($field, '=', $user));
			
			if($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}

		return false;
	}

	public function exists() {
		return (!empty($this->_data)) ? true : false;
	}


	public function data() {
		return $this->_data;
	}




	public function login($username = null, $password = null, $remember = false) {

		if(!$username && !$password && $this->exists()) {
			Session::put($this->_sessionName, $this->data()->userID);
		} else {
			$user = $this->find($username);
			if($user) {
				if($this->data()->password === Hash::make($password, $this->data()->salt)) {
					Session::put($this->_sessionName, $this->data()->userID);

					if($remember) {
						$hash = Hash::unique();
						$hashCheck = $this->_db->get('users_session', array('userID', '=', $this->data()->userID));

						if(!$hashCheck->count()) {
							$this->_db->insert('users_session', array(
								'userID' => $this->data()->userID,
								'hash' => $hash
							));
						} else {
							$hash = $hashCheck->first()->hash;
						}

						Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
					}

					return true;
				}
			}
		}
		return false;
	}


	public function logout() {
		$this->_db->delete('users_session', array('userID', '=', $this->data()->userID));
		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}


	public function isLoggedIn() {
		return $this->_isLoggedIn;
	}

	public function userLoggedIn() {
		$userID = Session::get($this->_sessionName);
		$username = $this->_db->get('users', array('userID', '=', $userID))->first()->username;

		if($this->_data->username === $username) {
			return true;
		} else {
			return false;
		}
	}


	public function update($fields = array(), $id =  null) {
		if(!$id && $this->isLoggedIn()) {
			$id = $this->data()->userID;
		}

		if(!$this->_db->update('users', 'userID', $id, $fields)) {
			throw new Exception('Sorry, there was a problem in updating your profile.');
		}
	}

}