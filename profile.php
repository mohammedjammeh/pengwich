<?php
	$pageTitle = '';
	$bodyClass = 'profile';
	require_once 'inc/header.php';
?>


			<div class="profileDescriptions" style="background-image: url('<?php echo 'img/background/' . $user->data()->backgroundImg ?>');">
				<div>
					<div class="imgDiv">
						<img src="<?php echo 'img/profile/' . $user->data()->profileImg ?>" alt="<?php echo $user->data()->username . '\'s Profile Picture.'?>" >
					</div>
					
					<div class="descriptions">
						<p><?php echo $user->data()->username ?></p>
						<div class="cf">
							<i class="material-icons">location_on</i>
							<span><?php echo (empty($user->data()->location)) ? 'No Location..' : $user->data()->location ?></span>
						</div>
						<p class="bio"><?php echo (empty($user->data()->bio)) ? 'No Bio..' : $user->data()->bio ?></p>

						<?php
							if($user->userLoggedIn()) {
								echo '<a href="settings.php" class="editProfileBtn">Edit Profile</a>';
							} else {
								echo '<a href="#" class="followBtn">Follow</a>';
							}
						?>

					</div>
				</div>
			</div>

			<div class="profileContent">
				<ul class="cf profileHeadings">
					<li>
						<a href="#">
							<p>meals</p>
							<p><?php echo $db->get('meals', array('userID', '=', $user->data()->userID))->count(); ?></p>
						</a>
					</li>

					<li>
						<a href="#">
							<p>following</p>
							<p><?php echo $db->get('following', array('userID', '=', $user->data()->userID))->count(); ?></p>
						</a>
					</li>

					<li>
						<a href="#">
							<p>followers</p>
							<p><?php echo $db->get('following', array('userID', '=', $user->data()->userID))->count();?></p>
						</a>
					</li>
				</ul>

				<!-- <ul class="cf mealHeadings">
					<li><a href="#">All Posts</a></li>
					<li><a href="#">Breakfast</a></li>
					<li><a href="#">Lunch</a></li>
					<li><a href="#">Dinner</a></li>
					<li><a href="#">Liked Posts</a></li>
					<li><a href="#">Student</a></li>
				</ul> -->

				<!-- <form method="POST">
					<select>
						<option>All Posts</option>
						<option>Liked Posts</option>
						<option>Breakfast</option>
						<option>Lunch</option>
						<option>Student Cooks</option>
						<option>Dinner</option>
					</select>
				</form> -->

				<ul class="posts">
					<li>
						<div class="cf mealAndUserInfo">

							<a href="#" class="userImg"><img src="img/user.jpg" alt=""></a>


							<div class="mealAttr">
								<div class="cf userAndDate userDateEdit">
									<a href="#">itsYourBoyMo</a>
									<a href="#" class="dateTime">13 Jun 16</a>
									<a href="#"><i class="material-icons">expand_more</i></a>
								</div>

								<ul>
									<li>
										<a href="#">Edit Post</a>
									</li>
									<li>
										<a href="#">Delete</a>
									</li>
								</ul>

								<a href="#" class="title">Our souls are about to be blessed.</a>
							</div>
						</div>

						<a href="#" class="mealImg"><img src="img/veggies.jpg" alt="haha" class="notOverlayMealImg"></a>

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

										<p class="comment">Jheeze, that munch looks wavey bro. Aye, bring me in.</p>
									</div>
								</li>
								<li class="cf">
									<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
									<div class="commentAttr">
										<div class="cf commenterAndDate">
											<a href="#">itsYourBoyMo</a>
											<p>13 Jun 16</p>
										</div>

										<p class="comment">Jheeze, that munch looks wavey bro. Aye, bring me in.</p>
									</div>
								</li>
								<li class="cf">
									<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
									<div class="commentAttr">
										<div class="cf commenterAndDate">
											<a href="#">itsYourBoyMo</a>
											<p>13 Jun 16</p>
										</div>

										<p class="comment">Jheeze, that munch looks wavey bro. Aye, bring me in.</p>
									</div>
								</li>
								<li class="cf">
									<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
									<div class="commentAttr">
										<div class="cf commenterAndDate">
											<a href="#">itsYourBoyMo</a>
											<p>13 Jun 16</p>
										</div>

										<p class="comment">Allow it man, just bring me in.</p>
									</div>
								</li>
							</ul>
						</div>
					</li>
					<!-- <li>
						<div class="cf mealAndUserInfo">
							<a href="#" class="userImg"><img src="img/user.jpg" alt=""></a>
							<div class="mealAttr">
								<div class="cf userAndDate userDateEdit">
									<a href="#">itsYourBoyMo</a>
									<a href="#" class="dateTime">13 Jun 16</a>
									<a href="#"><i class="material-icons">expand_more</i></a>
								</div>

								<ul>
									<li>
										<a href="#">Edit Post</a>
									</li>
									<li>
										<a href="#">Delete</a>
									</li>
								</ul>

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
					</li> -->
					<!-- <li>
						<div class="cf mealAndUserInfo">
							<a href="#" class="userImg"><img src="img/user.jpg" alt=""></a>
							<div class="mealAttr">
								<div class="cf userAndDate">
									<a href="#">itsYourBoyMo</a>
									<a href="#" class="dateTime">13 Jun 16</a>
								</div>

								<a href="#" class="title">You Know How We Do, We Eating Boyy!</a>
							</div>
						</div>

						<a href="#" class="mealImg"><img src="img/pineapple.jpg" alt="" class="notOverlayMealImg"></a>

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

										<p class="comment">Hahaha you're a funny yout</p>
									</div>
								</li>
								<li class="cf">
									<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
									<div class="commentAttr">
										<div class="cf commenterAndDate">
											<a href="#">itsYourBoyMo</a>
											<p>13 Jun 16</p>
										</div>

										<p class="comment">Move yourself, wastman. We've been doing this, you get me.</p>
									</div>
								</li>
								<li class="cf">
									<a href="#" class="commenterImg"><img src="img/user.jpg" alt=""></a>
									<div class="commentAttr">
										<div class="cf commenterAndDate">
											<a href="#">itsYourBoyMo</a>
											<p>13 Jun 16</p>
										</div>

										<p class="comment">Whatever Lol.</p>
									</div>
								</li>
							</ul>
						</div>
					</li>
				</ul>

				<ul class="cf followingOrFollowers">
					<li>
						<a href="#"><img src="img/user.jpg" alt=""></a>
						<a href="#">@itsYourBoyMo</a>
						<a href="#" class="following">Following</a>
					</li>
					<li>
						<a href="#"><img src="img/rahma.png" alt=""></a>
						<a href="#">@rahmus</a>
						<a href="#" class="following">Following</a>
					</li>
					<li>
						<a href="#"><img src="img/rahma.png" alt=""></a>
						<a href="#">@rahmus</a>
						<a href="#" class="follow">Follow</a>
					</li>
					<li>
						<a href="#"><img src="img/user.jpg" alt=""></a>
						<a href="#">@itsYourBoyMo</a>
						<a href="#" class="follow">Follow</a>
					</li>
					<li>
						<a href="#"><img src="img/user.jpg" alt=""></a>
						<a href="#">@itsYourBoyMo</a>
						<a href="#" class="follow">Follow</a>
					</li>
					<li>
						<a href="#"><img src="img/rahma.png" alt=""></a>
						<a href="#">@rahmus</a>
						<a href="#" class="follow">Follow</a>
					</li> -->
				</ul>				
			</div>

<?php
	include('inc/footer.php'); 
?>