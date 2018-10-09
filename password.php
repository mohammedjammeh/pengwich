<?php
	$pageTitle = 'Password Settings';
	$bodyClass = 'password';
	require_once 'inc/header.php'; 

	$validate = new Validate();
	if(isset($_POST['passwordSubmit'])) {
		if(Token::check(Input::get('tokenPassword'), 'tokenPassword')) {
			$validate->check($_POST, array(
				'oldPassword' => array(
					'name' => 'Old Password',
					'required' => true,
					'min' => 6,
					'matches' => array(
						'oldPasswordInput' => Hash::make(Input::get('oldPassword'), $user->data()->salt),
						'password' => $user->data()->password
					)
				),

				'newPassword' => array(
					'name' => 'New Password',
					'required' => true,
					'min' => 6
				)
			), 'Your password has been changed.');

			if($validate->passed()) {
				$salt = Hash::salt(32);
				$user->update(array(
					'password' => Hash::make(Input::get('newPassword'), $salt),
					'salt' => $salt
				));

				// $user = new User();
			} 
		}
	}

?>


			<form method="POST" name="userDetails">
				<p>Change Password</p>

				<?php
					if($validate->errors()) {
						echo '<p class="settingsError">' . end($validate->errors()) . '</p>';
					} elseif($validate->message()) {
						echo '<p class="settingsMessage">' . $validate->message() . '</p>';
					}
				?>
	
				<fieldset>
					<label for="oldPassword">Old Password</label>
					<input type="password" name="oldPassword" id="oldPassword">
				</fieldset>

				<fieldset>
					<label for="newPassword">New Password</label>
					<input type="password" name="newPassword" id="newPassword">
				</fieldset>

				<input type="hidden" name="tokenPassword" value="<?php echo Token::generate('tokenPassword'); ?>">

				<input type="submit" name="passwordSubmit" value="Save Password">
			</form>
		
<?php
	include('inc/footer.php'); 
?>