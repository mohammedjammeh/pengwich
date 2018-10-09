<?php
	require_once 'core/ini.php';

	$validate = new Validate();
	if(isset($_POST["submitSignUpForm"])) {
		if(Token::check(Input::get('tokenSignUp'), 'tokenSignUp')) {
			$validate->check($_POST, array(
				'fullNameSignUp' => array(
					'name' => 'Full name',
					'required' => true,
					'min' => 2,
					'max' => 50,
					'preg_match' => array(
						'pregMatchCode' => '/^[a-zA-Z][a-zA-Z ]*$/',
						'pregMatchText' => 'Please use letters for you full name. Only your username will be shown on your profile.'
					)
				),
				'userNameSignUp' => array(
					'name' => 'Username',
					'required' => true,
					'min' => 2,
					'max' => 20,
					'unique' => 'users',
					'preg_match' => array(
						'pregMatchCode' => '/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/',
						'pregMatchText' => 'Please use letters, numbers or an underscore for your username without space. Start with a letter.'
					)
				),
				'passwordSignUp' => array(
					'name' => 'Password',
					'required' => true,
					'min' => 6
				)
			));


			if($validate->passed()) {
				$user = new User();
				$salt = Hash::salt(32);

				try {
					$user->create(array(
						'username' => Input::get('userNameSignUp'),
						'password' => Hash::make(Input::get('passwordSignUp'), $salt),
						'salt' => $salt,
						'name' => Input::get('fullNameSignUp'),
						'joined' => date('Y-m-d H:i:s')
					));
				} catch(Exception $e) {
					die($e->getMessage);
				}
				
				Session::flash('success', 'Welcome to Pengwich. <br> You have registered successfully. <br> You can now log in.');
				Redirect::to('login.php');
			} 
		}

	}

	$validateSignIn = new Validate();
	if(isset($_POST["submitSignInForm"])) {
		if(Token::check(Input::get('tokenSignIn'), 'tokenSignIn')) {
			$validateSignIn->check($_POST, array(
				'userNameLogin' => array(
					'name' => 'username',
					'required' => true
				),

				'passwordLogin' => array(
					'name' => 'password',
					'required' => true
				)
			));

			if($validateSignIn->passed()) {
				$user = new User();
				$remember = (Input::get('remember') === 'on') ? true : false;

				$login = $user->login(Input::get('userNameLogin'), Input::get('passwordLogin'), $remember);

				if($login) {
					Redirect::to('index.php');
				} else {
					$validateSignIn->addError("Sorry, you've entered the wrong login details. Please try again.");
				}
			}
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to Pengwich.</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/normalize.css" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Bad+Script|Open+Sans:400,400i,600" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	
	<body class="login">
		<div>
			<header class="cf">
				<h1><a href="index.php" title="Pengwich">Pengwich</a></h1>
			</header>

			<section>
				<?php 
					if(Session::exists('success')) {
						echo '<p class="newUserMessage">' . Session::flash('success') . '</p>';
					}
				?>
				<form method="POST" name="signInForm" class="<?php echo $validate->hide(); ?>">
					<p><?php echo end($validateSignIn->errors()); ?></p>
					<input type="text" name="userNameLogin" placeholder="Username" value="<?php echo escape(Input::get('userNameLogin')); ?>">
					<input type="password" name="passwordLogin" placeholder="Password">
					<input type="hidden" name="tokenSignIn" value="<?php echo Token::generate('tokenSignIn'); ?>">
					<fieldset>
						<input type="checkbox" name="remember" id="remember">
						<label for="remember">Remember My Login Info</label>
					</fieldset>
					<input type="submit" name="submitSignInForm" value="sign in">
				</form>

				<form method="POST" name="signUpForm" class="<?php echo $validate->hide('hide'); ?>">
					<p><?php echo end($validate->errors()); ?></p>
					<input type="text" name="fullNameSignUp" placeholder="Full name" value="<?php echo escape(Input::get('fullNameSignUp')); ?>">
					<input type="text" name="userNameSignUp" placeholder="Username" value="<?php echo escape(Input::get('userNameSignUp')); ?>">
					<input type="password" name="passwordSignUp" placeholder="Password">
					<input type="hidden" name="tokenSignUp" value="<?php echo Token::generate('tokenSignUp'); ?>">
					<input type="submit" name="submitSignUpForm" value="sign up">
				</form>

				<p>OR</p>

				<a href="#" class="signIn <?php echo $validate->hide('hide'); ?>">Sign In</a>

				<a href="#" class="signUp <?php echo $validate->hide(); ?>">Sign Up</a>
				
			</section>

			<footer>
				<p>&copy; 2017 Pengwich.</p>
			</footer>
		</div>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script src="js/script.js" type="text/javascript"></script>
	</body>
</html>