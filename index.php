<?php
	$pageTitle = 'Pengwich';
	$bodyClass = 'home';
	require_once 'inc/header.php';

	// if($user->isLoggedIn()) {
	// 	echo 'Logged In';
	// } else {
	// 	echo 'Not Logged In';
	// }

	// $user = DB::getInstance();

	//SELECT OR DELETE
	// $user->query('SELECT * FROM users', array());
	// if(!$user->count()) {
	// 	echo 'Sorry, no users found';
	// } else {
	// 	foreach ($user->results() as $user) {
	// 		echo $user->username . "<br>";
	// 	}
	// }

	//INSERT
	// $user->insert('users', array(
	// 	'username' => 'yourboydale',
	// 	'password' => 'password',
	// 	'name' => 'Dale'
	// ));


	//UPDATE
	// $user->update('users', 'userID', 17, array(
	// 	'password' => 'newPassword',
	// 	'name' => 'Daleeeeee'
	// ));


?>

		
			<ul class="posts">
				<li>
					<div class="cf mealAndUserInfo">
						<a href="#" class="userImg"><img src="img/user.jpg" alt=""></a>
						<div class="mealAttr">
							<div class="cf userAndDate">
								<a href="#">itsYourBoyMo</a>
								<a href="#" class="dateTime">13 Jun 16</a>
							</div>

							<a href="#" class="title">The Pengest Munch for the Fam.</a>
						</div>
					</div>

					<a href="#" class="mealImg"><img src="img/burger01.jpg" alt="haha" class="notOverlayMealImg"></a>

					<div class="cf ratings">
						<a href="#">
							<i class="material-icons">favorite_border</i>
							<span>19</span>
						</a>
						<a href="#">
							<i class="material-icons">expand_more</i>
							<span>Ingredients</span>
						</a>
						<a href="#">
							<i class="material-icons">expand_more</i>
							<span>Instructions</span>
						</a>
						<a href="#">
							<i class="material-icons">add</i>
						</a>
					</div>

					<ul class="ingredients">
						<li>1 Onion</li>
						<li>2kg of Minced Meat</li>
						<li>3.5 Ounces of Salt</li>
						<li>Tomato plum</li>
						<li>Tomato Puree</li>
						<li>Jumbo</li>
						<li>Mixed Vegetables</li>
						<li>Bolognese Sauce</li>
						<li>Lasagne Sauce</li>
						<li>Cheese</li>
					</ul>

					<ul class="instructions">
						<li>Heat up the oil.</li>
						<li>Chop the onions into little pieces, fry them</li>
						<li>Add the minced meat to the fried onions and then mix them.</li>
						<li>Mix the meat, onion and salt together.</li>
						<li>When the meat’s colour changes to grey, add tomato plum.</li>
						<li>A couple of minutes later, add tomato puree.</li>
						<li>Then add Jumbo, more flavours.</li>
						<li>Add mixed vegetables.</li>
						<li>Add the Bolognese sauce and wait for everything to cook to satisfaction.</li>
					</ul>

					<form method="POST" name="mealist">
						<div>
							<input type="checkbox" name="gym_meals" id="gym_meals">
							<label for="gym_meals">Gym Meals</label>
						</div>

						<div>
							<input type="checkbox" name="student_cooks" id="student_cooks">
							<label for="student_cooks">Student Cooks</label>
						</div>

						<div>
							<input type="checkbox" name="breakfast" id="breakfast">
							<label for="breakfast">Breakfast</label>
						</div>

						<div>
							<input type="checkbox" name="lunch" id="lunch">
							<label for="lunch">Lunch</label>
						</div>

						<div>
							<input type="checkbox" name="dinner" id="dinner">
							<label for="dinner">Dinner</label>
						</div>

						<div class="createMealist">
							<a href="#">Create Mealist</a>
						</div>
					</form>

					<div class="comments">
						<a href="#"><img src="img/user.jpg" alt=""></a>
						<ul class= "cf">
							<li class="cf">
								<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
								<div class="commentAttr">
									<div class="cf commenterAndDate">
										<a href="#">itsYourBoyMo</a>
										<p>13 Jun 16</p>
									</div>

									<p class="comment">The Pengest Munch for the Fam.</p>
								</div>
							</li>
							<li class="cf">
								<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
								<div class="commentAttr">
									<div class="cf commenterAndDate">
										<a href="#">itsYourBoyMo</a>
										<p>13 Jun 16</p>
									</div>

									<p class="comment">The Pengest Munch for the Fam.</p>
								</div>
							</li>
							<li class="cf">
								<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
								<div class="commentAttr">
									<div class="cf commenterAndDate">
										<a href="#">itsYourBoyMo</a>
										<p>13 Jun 16</p>
									</div>

									<p class="comment">The Pengest Munch for the Fam.</p>
								</div>
							</li>
							<li class="cf">
								<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
								<div class="commentAttr">
									<div class="cf commenterAndDate">
										<a href="#">itsYourBoyMo</a>
										<p>13 Jun 16</p>
									</div>

									<p class="comment">The Pengest Munch for the Fam.</p>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<div class="cf mealAndUserInfo">
						<a href="#" class="userImg"><img src="img/user.jpg" alt=""></a>
						<div class="mealAttr">
							<div class="cf userAndDate">
								<a href="#">itsYourBoyMo</a>
								<a href="#" class="dateTime">13 Jun 16</a>
							</div>

							<a href="#" class="title">The Pengest Munch for the Fam.</a>
						</div>
					</div>

					<a href="#" class="mealImg"><img src="img/burger01.jpg" alt="" class="notOverlayMealImg"></a>

					<div class="cf ratings">
						<a href="#">
							<i class="material-icons">favorite_border</i>
							<span>19</span>
						</a>
						<a href="#">
							<i class="material-icons">expand_more</i>
							<span>Ingredients</span>
						</a>
						<a href="#">
							<i class="material-icons">expand_more</i>
							<span>Instructions</span>
						</a>
						<a href="#">
							<i class="material-icons">add</i>
						</a>
					</div>

					<ul class="ingredients">
						<li>1 Onion</li>
						<li>2kg of Minced Meat</li>
						<li>3.5 Ounces of Salt</li>
						<li>Tomato plum</li>
						<li>Tomato Puree</li>
						<li>Jumbo</li>
						<li>Mixed Vegetables</li>
						<li>Bolognese Sauce</li>
						<li>Lasagne Sauce</li>
						<li>Cheese</li>
					</ul>

					<ul class="instructions">
						<li>Heat up the oil.</li>
						<li>Chop the onions into little pieces, fry them</li>
						<li>Add the minced meat to the fried onions and then mix them.</li>
						<li>Mix the meat, onion and salt together.</li>
						<li>When the meat’s colour changes to grey, add tomato plum.</li>
						<li>A couple of minutes later, add tomato puree.</li>
						<li>Then add Jumbo, more flavours.</li>
						<li>Add mixed vegetables.</li>
						<li>Add the Bolognese sauce and wait for everything to cook to satisfaction.</li>
					</ul>

					<form method="POST" name="mealist">
						<div>
							<input type="checkbox" name="gym_meals" id="gym_meals">
							<label for="gym_meals">Gym Meals</label>
						</div>

						<div>
							<input type="checkbox" name="student_cooks" id="student_cooks">
							<label for="student_cooks">Student Cooks</label>
						</div>

						<div>
							<input type="checkbox" name="breakfast" id="breakfast">
							<label for="breakfast">Breakfast</label>
						</div>

						<div>
							<input type="checkbox" name="lunch" id="lunch">
							<label for="lunch">Lunch</label>
						</div>

						<div>
							<input type="checkbox" name="dinner" id="dinner">
							<label for="dinner">Dinner</label>
						</div>

						<div class="createMealist">
							<a href="#">Create Mealist</a>
						</div>
					</form>

					<div class="comments">
						<a href="#"><img src="img/user.jpg" alt=""></a>
						<ul class= "cf">
							<li class="cf">
								<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
								<div class="commentAttr">
									<div class="cf commenterAndDate">
										<a href="#">itsYourBoyMo</a>
										<p>13 Jun 16</p>
									</div>

									<p class="comment">The Pengest Munch for the Fam.</p>
								</div>
							</li>
							<li class="cf">
								<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
								<div class="commentAttr">
									<div class="cf commenterAndDate">
										<a href="#">itsYourBoyMo</a>
										<p>13 Jun 16</p>
									</div>

									<p class="comment">The Pengest Munch for the Fam.</p>
								</div>
							</li>
							<li class="cf">
								<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
								<div class="commentAttr">
									<div class="cf commenterAndDate">
										<a href="#">itsYourBoyMo</a>
										<p>13 Jun 16</p>
									</div>

									<p class="comment">The Pengest Munch for the Fam.</p>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<div class="cf mealAndUserInfo">
						<a href="#" class="userImg"><img src="img/user.jpg" alt=""></a>
						<div class="mealAttr">
							<div class="cf userAndDate">
								<a href="#">itsYourBoyMo</a>
								<a href="#" class="dateTime">13 Jun 16</a>
							</div>

							<a href="#" class="title">The Pengest Munch for the Fam.</a>
						</div>
					</div>

					<a href="#" class="mealImg"><img src="img/burger01.jpg" alt="" class="notOverlayMealImg"></a>

					<div class="cf ratings">
						<a href="#">
							<i class="material-icons">favorite_border</i>
							<span>19</span>
						</a>
						<a href="#">
							<i class="material-icons">expand_more</i>
							<span>Ingredients</span>
						</a>
						<a href="#">
							<i class="material-icons">expand_more</i>
							<span>Instructions</span>
						</a>
						<a href="#">
							<i class="material-icons">add</i>
						</a>
					</div>

					<ul class="ingredients">
						<li>1 Onion</li>
						<li>2kg of Minced Meat</li>
						<li>3.5 Ounces of Salt</li>
						<li>Tomato plum</li>
						<li>Tomato Puree</li>
						<li>Jumbo</li>
						<li>Mixed Vegetables</li>
						<li>Bolognese Sauce</li>
						<li>Lasagne Sauce</li>
						<li>Bread</li>
					</ul>

					<ul class="instructions">
						<li>Heat up the oil.</li>
						<li>Chop the onions into little pieces, fry them</li>
						<li>Add the minced meat to the fried onions and then mix them.</li>
						<li>Mix the meat, onion and salt together.</li>
						<li>When the meat’s colour changes to grey, add tomato plum.</li>
						<li>A couple of minutes later, add tomato puree.</li>
						<li>Then add Jumbo, more flavours.</li>
						<li>Add mixed vegetables.</li>
						<li>Add the Bolognese sauce and wait for everything to cook to satisfaction.</li>
					</ul>

					<form method="POST" name="mealist">
						<div>
							<input type="checkbox" name="gym_meals" id="gym_meals">
							<label for="gym_meals">Gym Meals</label>
						</div>

						<div>
							<input type="checkbox" name="student_cooks" id="student_cooks">
							<label for="student_cooks">Student Cooks</label>
						</div>

						<div>
							<input type="checkbox" name="breakfast" id="breakfast">
							<label for="breakfast">Breakfast</label>
						</div>

						<div>
							<input type="checkbox" name="lunch" id="lunch">
							<label for="lunch">Lunch</label>
						</div>

						<div>
							<input type="checkbox" name="dinner" id="dinner">
							<label for="dinner">Dinner</label>
						</div>

						<div class="createMealist">
							<a href="#">Create Mealist</a>
						</div>
					</form>

					<div class="comments">
						<a href="#"><img src="img/user.jpg" alt=""></a>
						<ul class= "cf">
							<li class="cf">
								<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
								<div class="commentAttr">
									<div class="cf commenterAndDate">
										<a href="#">itsYourBoyMo</a>
										<p>13 Jun 16</p>
									</div>

									<p class="comment">The Pengest Munch for the Fam.</p>
								</div>
							</li>
							<li class="cf">
								<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
								<div class="commentAttr">
									<div class="cf commenterAndDate">
										<a href="#">itsYourBoyMo</a>
										<p>13 Jun 16</p>
									</div>

									<p class="comment">The Pengest Munch for the Fam.</p>
								</div>
							</li>
							<li class="cf">
								<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
								<div class="commentAttr">
									<div class="cf commenterAndDate">
										<a href="#">itsYourBoyMo</a>
										<p>13 Jun 16</p>
									</div>

									<p class="comment">The Pengest Munch for the Fam.</p>
								</div>
							</li>
						</ul>
					</div>
				</li>
			</ul>

<?php
	include('inc/footer.php'); 
?>
