<?php
class Upload {
	private $_folder, 
			$_fileName;

	public function __construct($fileInput) {

		switch ($fileInput[4]) {
			case 'P':
				$this->_folder = "profile/";
				break;
			case 'B':
				$this->_folder = "background/";
				break;				
			case 'U':
				$this->_folder = "uploads/";
				break;
		}

		$file = $_FILES[$fileInput];
		$fileName = $file["name"];
		$fileTmp = $file["tmp_name"];

		$fileExt = explode(".", $fileName);
		$fileExt = strtolower(end($fileExt));

		if(!empty($fileName)) {
			$fileNameNew = uniqid() . "." . $fileExt;
			$fileDestination = "img/" . $this->_folder . $fileNameNew;
			move_uploaded_file($fileTmp, $fileDestination);

			$this->_fileName = $fileNameNew;
		}

	}

	public function imgName($fileName) {
		if (empty($this->_fileName)) { 
			return $fileName; 
		} else {
			return $this->_fileName; 
		}
	}


	public function ordinal($number) {
	    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
	    if ((($number % 100) >= 11) && (($number%100) <= 13)) {
	        return $number. 'th';
	    }
	    else {
	        return $number. $ends[$number % 10];
	    }
	}



}

