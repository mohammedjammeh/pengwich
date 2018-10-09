<?php
	require_once 'core/ini.php';
	
	$user = new User();
	if(!$user->isLoggedIn()) {
		Redirect::to('login.php');
	}

	$db = DB::getInstance();
	$validateUpload = new Validate();
	if(isset($_POST["uploadPost"])) {
		if(Token::check(Input::get('tokenUpload'), 'tokenUpload')) {
			$validateUpload->check($_POST, array(
				'fileUpload' => array(
					'name' => 'Meal Image',
					'fileExt' => array("png", "jpg", "jpeg", "tif", "psd", "gif"),
					'fileError' => 0,
					'fileSize' => 32097152
				),

				'title' => array(
					'name' => 'meal Title',
					'required' => true,
					'min' => 2,
					'max' => 20
				)

			));


			$ingredientsInputs = array();
			for ($i=0; $i < count($_POST['ingredientsArea']); $i++) {
				$ingredientNo = $i + 1;
				if($i === 0 || $i === 1 || $i === 2) {
					$ingredientsAreaArray =  array(
						'name' => 'top 3 ingredients',
						'index' => $i,
						'required' => true,
						'min' => 2,
						'max' => 15
					);
				} else {
					$ingredientsAreaArray =  array(
						'name' => Upload::ordinal($ingredientNo) . ' ingredient',
						'index' => $i,
						'max' => 15
					);
				}
				$ingredientsInputs['ingredientsArea_0' . $ingredientNo] = $ingredientsAreaArray;
			}
			$validateUpload->check($_POST, $ingredientsInputs);



			$instructionsInputs = array();
			for ($i=0; $i < count($_POST['instructionsArea']); $i++) {
				$instructionNo = $i + 1;
				if($i === 0 || $i === 1 || $i === 2) {
					$instructionsAreaArray =  array(
						'name' => 'top 3 instructions',
						'index' => $i,
						'required' => true,
						'min' => 2,
						'max' => 15
					);
				} else {
					$instructionsAreaArray =  array(
						'name' => Upload::ordinal($instructionNo) . ' instruction',
						'index' => $i,
						'max' => 15
					);
				}
				$instructionsInputs['instructionsArea_0' . $instructionNo] = $instructionsAreaArray;
			}
			$validateUpload->check($_POST, $instructionsInputs);



			// $upload = new Upload("fileUpload");
			if($validateUpload->passed()) {
				$result = "yes";
			} elseif($validateUpload->errors()) {
				// $result = end($validateUpload->errors());
				$result = "no";
			}

			// echo $result;

		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo (empty($pageTitle)) ? $user->data()->username : $pageTitle ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/normalize.css" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Bad+Script|Open+Sans:400,400i,600" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body class="<?php echo $bodyClass; ?>">
		<header class="cf">
			<a href="#" class="backArrow"><i class="material-icons">arrow_back</i></a>
			<input type="text" name="searchBar" placeholder="search.." autofocus>
			<a href="#" class="closeArrow"><i class="material-icons">close</i></a>

			<h1><a href="index.php" title="Pengwich">Pengwich</a></h1>

			<a href="#" class="addPhoto"><label for="upload"><i class="material-icons">add_a_photo</i></label></a>
			<a href="#" class="notifications">
				<i class="material-icons">notifications</i>
				<span>9</span>
			</a>
			<a href="#" class="search"><i class="material-icons">search</i></a>
			<a href="#" class="menu"><i class="material-icons">more_vert</i></a>
			
			<ul class="menuItems">
				<li><a href="#">Home</a></li>
				<li><a href="#">Profile</a></li>
				<li><a href="#">Settings</a></li>
				<li><a href="#">Folders</a></li>
				<li><a href="#">Log Out</a></li>
			</ul>
		</header>

		<section>
			<ul class="notificationsList notificationsListAbsolute cf">
				<li>
					<a href="#" class="cf">
						<div class="notificationUser">
							<img src="img/user.jpg" alt="">
						</div>

						<div class="notificationInfo">
							<p><em>itsyourboymo</em> and 43 others liked your photo.</p>
							<p>31 July at 16:33</p>
						</div>

						<div class="notificationItself">
							<img src="img/burger01.jpg" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#" class="cf">
						<div class="notificationUser">
							<img src="img/user.jpg" alt="">
						</div>

						<div class="notificationInfo">
							<p>You've got a new follower <em>jammaly96</em></p>
							<p>31 July at 16:33</p>
						</div>

						<div class="notificationItself">
							
						</div>
					</a>
				</li>
				<li>
					<a href="#" class="cf">
						<div class="notificationUser">
							<img src="img/user.jpg" alt="">
						</div>

						<div class="notificationInfo">
							<p><em>itsyourboymo</em> and 43 others liked your photo.</p>
							<p>31 July at 16:33</p>
						</div>

						<div class="notificationItself">
							<img src="img/burger01.jpg" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#" class="cf">
						<div class="notificationUser">
							<img src="img/user.jpg" alt="">
						</div>

						<div class="notificationInfo">
							<p><em>itsyourboymo</em> and 43 others liked your photo.</p>
							<p>31 July at 16:33</p>
						</div>

						<div class="notificationItself">
							<img src="img/burger01.jpg" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#" class="cf">
						<div class="notificationUser">
							<img src="img/user.jpg" alt="">
						</div>

						<div class="notificationInfo">
							<p>You've got a new follower <em>jammaly96</em></p>
							<p>31 July at 16:33</p>
						</div>

						<div class="notificationItself">
							
						</div>
					</a>
				</li>
				<li>
					<a href="#" class="cf">
						<div class="notificationUser">
							<img src="img/user.jpg" alt="">
						</div>

						<div class="notificationInfo">
							<p><em>itsyourboymo</em> and 43 others liked your photo.</p>
							<p>31 July at 16:33</p>
						</div>

						<div class="notificationItself">
							<img src="img/burger01.jpg" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#" class="cf">
						<div class="notificationUser">
							<img src="img/user.jpg" alt="">
						</div>

						<div class="notificationInfo">
							<p><em>itsyourboymo</em> and 43 others liked your photo.</p>
							<p>31 July at 16:33</p>
						</div>

						<div class="notificationItself">
							<img src="img/burger01.jpg" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#" class="cf">View All Notifications</a>
				</li>
			</ul>