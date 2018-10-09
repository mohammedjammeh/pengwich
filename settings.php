<?php
	$pageTitle = 'Profile Settings';
	$bodyClass = 'settings';
	require_once 'inc/header.php';

	$validate = new Validate();
	if(isset($_POST['settingsSubmit'])) {
		if(Token::check(Input::get('tokenSettings'), 'tokenSettings')) {
			$validate->check($_POST, array(
				'username' => array(
					'name' => 'Username',
					'required' => true,
					'min' => 2,
					'max' => 20,
					'uniqueToRest' => 'users',
					'preg_match' => array(
						'pregMatchCode' => '/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/',
						'pregMatchText' => 'Please use letters, numbers or an underscore for your username without space. Start with a letter.'
					)
				),

				'name' => array(
					'name' => 'Full name',
					'required' => true,
					'min' => 2,
					'max' => 50,
					'preg_match' => array(
						'pregMatchCode' => '/^[a-zA-Z][a-zA-Z ]*$/',
						'pregMatchText' => 'Please use letters for you full name. Only your username will be shown on your profile.'
					)
				),

				'location' => array(
					'name' => 'Location',
					'min' => 2,
					'max' => 50
				),

				'bio' => array(
					'name' => 'Bio',
					'min' => 10,
					'max' => 130
				),

				'fileProImg' => array(
					'name' => 'profile image',
					'fileExt' => array("png", "jpg", "jpeg", "tif", "psd", "gif"),
					'fileError' => 0,
					'fileSize' => 32097152
				),


				'fileBackImg' => array(
					'name' => 'background image',
					'fileExt' => array("png", "jpg", "jpeg", "tif", "psd", "gif"),
					'fileError' => 0,
					'fileSize' => 32097152
				)

			), 'Your profile details have been updated.');



			if($validate->passed()) {

				$profileImg = new Upload('fileProImg');
				$backgroundImg = new Upload('fileBackImg');

				try {
					$user->update(array(
						'username' => escape(Input::get('username')),
						'name' => escape(Input::get('name')),
						'location' => (empty(Input::get('location'))) ? null : escape(Input::get('location')),
						'bio' => (empty(Input::get('bio'))) ? null : escape(Input::get('bio')),
						'profileImg' => $profileImg->imgName($user->data()->profileImg),
						'backgroundImg' => $backgroundImg->imgName($user->data()->backgroundImg)
					));

				} catch(Exception $e) {
					die($e-getMessage());
				}

				$user = new User();
			} 
		}

	}

?>


			<form method="POST" name="userDetails" enctype="multipart/form-data">
				<p>Profile Settings</p>

				<?php
					if($validate->errors()) {
						echo '<p class="settingsError">' . end($validate->errors()) . '</p>';
					} elseif($validate->message()) {
						echo '<p class="settingsMessage">' . $validate->message() . '</p>';
					}
				?>

				<fieldset>
					<label for="proImgFile"><img src="<?php echo 'img/profile/' . $user->data()->profileImg ?>" alt=""></label>
					<input type="file" name="fileProImg" id="proImgFile">
				</fieldset>

				<fieldset>
					<label for="bgImgFile">Background Picture</label>
					<input type="file" name="fileBackImg" id="bgImgFile">
				</fieldset>
				
				<fieldset>
					<label for="username">Username</label>
					<input type="text" name="username" id="username" value="<?php echo escape($user->data()->username) ?>">
				</fieldset>

				<fieldset>
					<label for="name">Full Name</label>
					<input type="text" name="name" id="name" value="<?php echo escape($user->data()->name) ?>">
				</fieldset>
				
				<fieldset>
					<label for="location">Location</label>
					<input type="text" name="location" id="location" value="<?php echo escape($user->data()->location) ?>">
				</fieldset>

				<fieldset>
					<label for="bio">Bio</label>
					<textarea name="bio" id="bio"><?php echo escape($user->data()->bio) ?></textarea>
				</fieldset>

				<input type="hidden" name="tokenSettings" value="<?php echo Token::generate('tokenSettings'); ?>">

				<input type="submit" name="settingsSubmit" value="Save Changes">

				<a href="password.php">Change Password</a>
			</form>

<?php
	include('inc/footer.php'); 
?>

