$(document).ready(function() {

	//login page
	$('.signUp').on('click', function() {
		$('.login form[name="signInForm"]').css("display", "none");
		$('.login form[name="signUpForm"]').css("display", "block");
		$(this).css("display", "none");
		$('.signIn').css("display", "block");
	});

	$('.signIn').on('click', function() {
		$('.login form[name="signUpForm"]').css("display", "none");
		$('.login form[name="signInForm"]').css("display", "block");
		$(this).css("display", "none");
		$('.signUp').css("display", "block");
	});













	//uploading
	var $body = $('body');
	var $uploadingOverlay = $('<div class="uploadingOverlay"></div>');
	var $uploadingForm = $('<form method="POST" name="uploadForm"></form>');

	var $fileFieldset = $('<fieldset></fieldset>');
	var $fileUpload = $('<input type="file" name="fileUpload" id="upload">');
	var $fileImg = $('<img>');

	var $titleFieldset = $('<fieldset></fieldset>');
	var $titleLabel = $('<label for="title">title</label>');
	var $titleInput = $('<input type="text" name="title" id="title">');

	var $ingredientsFieldset = $('<fieldset></fieldset>');
	var $ingredientsDiv = $('<div class="cf"></div>');
	var $ingredientsLabel = $('<label for="ingredientsArea">ingredients</label>');
	var $ingredientsAdd = $('<a href=""><i class="material-icons">add_circle</i></a>');

	var $instructionsFieldset = $('<fieldset></fieldset>');
	var $instructionsDiv = $('<div class="cf"></div>');
	var $instructionsLabel = $('<label for="instructionsArea">instructions</label>');
	var $instructionsAdd = $('<a href=""><i class="material-icons">add_circle</i></a>');

	var $tokenFieldSet = $('<fieldset></fieldset>');
	var $tokenInput = $('<input type="hidden" name="tokenUpload">');

	var $uploadFieldset = $('<fieldset></fieldset>');
	var $uploadBtn = $('<input type="submit" name="upload" value="post meal">');

	$body.append($uploadingOverlay);
	$uploadingOverlay.append($uploadingForm);

	$uploadingForm.append($fileFieldset);
	$fileFieldset.append($fileUpload);
	$fileFieldset.append($fileImg);

	$uploadingForm.append($titleFieldset);
	$titleFieldset.append($titleLabel);
	$titleFieldset.append($titleInput);

	$uploadingForm.append($ingredientsFieldset);
	$ingredientsFieldset.append($ingredientsDiv);
	$ingredientsDiv.append($ingredientsLabel);
	$ingredientsDiv.append($ingredientsAdd);
	for (var i = 0; i < 6; i++) {
		var $ingredientsInput = $('<input type="text" name="ingredientsArea[]" id="ingredientsArea">');
		$ingredientsFieldset.append($ingredientsInput);
	}

	$uploadingForm.append($instructionsFieldset);
	$instructionsFieldset.append($instructionsDiv);
	$instructionsDiv.append($instructionsLabel);
	$instructionsDiv.append($instructionsAdd);
	for (var i = 0; i < 5; i++) {
		var $instructionsInput = $('<input type="text" name="instructionsArea[]" id="instructionsArea">');
		$instructionsFieldset.append($instructionsInput);
	}

	$uploadingForm.append($tokenFieldSet);
	$tokenFieldSet.append($tokenInput);

	$uploadingForm.append($uploadFieldset);
	$uploadFieldset.append($uploadBtn);



	$ingredientsAdd.on('click', function(e){	
		e.preventDefault();
		var $newIngredientsInputs = $('<input type="text" name="ingredientsArea[]" id="ingredientsArea">');
		$ingredientsFieldset.append($newIngredientsInputs);
	});


	$instructionsAdd.on('click', function(e){	
		e.preventDefault();
		var $newInstructionsInputs = $('<input type="text" name="instructionsArea[]" id="instructionsArea">');
		$instructionsFieldset.append($newInstructionsInputs);
	});



	$('input[name="proImgFile"]').add($fileUpload).on('click', function(){
		$(this).val("");
	});
	
	// http://jsfiddle.net/LvsYc/
	function readURL(input, img) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                img.attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

	$.ajax({
		url: "token.php",
		data: {
			token : 'tokenUpload'
		},
		type: "POST",
		success: function(response) {
			$tokenInput.val(response);
		}
	});


	$fileUpload.change(function(){

		readURL(this, $fileImg);
		$("html, body").css("overflow", "hidden");

		$uploadingUrl = '?/' + 'uploading';
		window.history.pushState( {} , '', $uploadingUrl);

		$uploadingOverlay.show();
 	});



	//profile image uploading
 	$('#proImgFile').change(function(){
 		$proImgFileName = $(this).siblings('label').find('img');
 		readURL(this, $proImgFileName);
 	});



 	//when notifications icon gets clicked
	$('.notifications').on('click', function() {
		$('.notificationsList').css('display', 'block');
	});



	//when menu (more options) is clicked
	$('.menu').on('click', function() {
		$('.menuItems').toggle();
	});


	//when search icon is clicked
	$('.search').on('click', function() {
		$('.backArrow').add('header input').add('.closeArrow').fadeToggle(300);
		$('header').addClass('newHeader');
		$('h1').add('.addPhoto').add('.notifications').add('.search').add('.menu').hide();
		$('header input').focus();
	});


	$('.closeArrow').on('click', function() {
		$('header input').val('');
		$('header input').focus();
	});


	$('.backArrow').on('click', function() {
		$('.backArrow').add('header input').add('.closeArrow').fadeToggle(0);
		$('header').removeClass('newHeader');
		$('h1').add('.addPhoto').add('.notifications').add('.search').add('.menu').show(0);
	});




















	//Overlay when a post gets clicked
	var $overlay = $('<div class="overlay"></div>');
	var $overlayDiv = $('<div class="overlayDiv"></div>');

	var $mealAndUserInfo = $('<div class="cf mealAndUserInfo"></div>');
	var $userImgAnchor = $('<a class="userImg"></a>');
	var $userImg = $('<img>');
	var $mealAttr = $('<div class="mealAttr"></div>');
	var $userAndDate = $('<div class="cf userAndDate"></div>');
	var $mealDes = $('<a></a>');
	var $username = $('<a></a>');
	var $dateTime = $('<a></a>');
	var $editDeleteAnchor = $('<a href="#"><i class="material-icons">expand_more</i></a>');
	var $editDeleteUl = $('<ul></ul>');
	var $editLi = $('<li></li>');
	var $editLiAnchor = $('<a href="#">Edit Post</a>');
	var $deleteLi = $('<li></li>');
	var $deleteLiAnchor = $('<a href="#">Delete</a>');

	var $mealImgAnchor = $('<a class="mealImg"></a>');

	var $mealImg = $('<img>');
	var $ratings = $('<div class="cf ratings"></div>');
	var $favoriteAnchor = $('<a href="#"><i class="material-icons">favorite_border</i><span></span></a>');
	var $ingredientsAnchor = $('<a href="#"><i class="material-icons">expand_more</i><span>Ingredients</span></a>');
	var $instructionsAnchor = $('<a href="#"><i class="material-icons">expand_more</i><span>Instructions</span></a>');
	var $addAnchor = $('<a href="#"><i class="material-icons">add</i></a>');

	var $ingredientsUl = $('<ul class="ingredients"></ul>');
	var $instructionsUl = $('<ul class="instructions"></ul>');

	var $mealistFormParent = $('<div class="overlayMealistFormParent"></div>');
	var $mealistForm = $('<form method="POST" name="mealist"></form>'); 

	var $commentsDiv = $('<div class="comments"></div>');
	var $commentingDiv = $('<div class="commentingDiv cf"></div>');
	var $userCommentingAnchor = $('<a></a>');
	var $userCommentingImg = $('<img>');

	var $commentsUl = $('<ul class="cf"></ul>');
	var $commentsForm = $('<form method="POST" name="comment"></form>');
	var $commentsTextArea = $('<textarea name="userComment" placeholder="Hmm, add a comment.."></textarea>');
	var $commentsBtn = $('<button type="submit"><i class="material-icons">send</i></button>');


	$body.append($overlay);
	$overlay.append($overlayDiv);

	$overlayDiv.append($mealAndUserInfo);
	$mealAndUserInfo.append($userImgAnchor);
	$userImgAnchor.append($userImg);
	$mealAndUserInfo.append($mealAttr);
	$mealAttr.append($userAndDate);
	$userAndDate.append($username);
	$userAndDate.append($dateTime);
	$userAndDate.append($editDeleteAnchor);
	$mealAttr.append($editDeleteUl);
	$editDeleteUl.append($editLi);
	$editLi.append($editLiAnchor);
	$deleteLi.append($deleteLiAnchor);
	$editDeleteUl.append($deleteLi);
	$mealAttr.append($mealDes);

	$overlayDiv.append($mealImgAnchor);
	$mealImgAnchor.append($mealImg);

	$overlayDiv.append($mealistFormParent);
	$mealistFormParent.append($mealistForm);

	$overlayDiv.append($ratings);
	$ratings.append($favoriteAnchor);
	$ratings.append($ingredientsAnchor);
	$ratings.append($instructionsAnchor);
	$ratings.append($addAnchor);

	$overlayDiv.append($ingredientsUl);
	$overlayDiv.append($instructionsUl);

	$overlayDiv.append($commentsDiv);
	$commentsDiv.append($commentingDiv);
	$commentingDiv.append($userCommentingAnchor);
	$userCommentingAnchor.append($userCommentingImg);

	$commentingDiv.append($commentsForm);
	$commentsForm.append($commentsTextArea);
	$commentsForm.append($commentsBtn);
	$commentsDiv.append($commentsUl);


	$('.title').add('.notOverlayMealImg').on('click', function(event) {
		event.preventDefault(); 
		$("html, body").css("overflow", "hidden");
		$(".comments").css("display", "block");


		$elementClickedClassName = event.target.className;

		if($elementClickedClassName === 'title') {
			$mealAndUserInfoMainDiv = $(this).parent().parent();
		} else if($elementClickedClassName === 'dateTime') {
			$mealAndUserInfoMainDiv = $(this).parent().parent().parent();
		} else if($elementClickedClassName === 'notOverlayMealImg') {
			$mealAndUserInfoMainDiv = $(this).parent().siblings('.mealAndUserInfo');
		} else {
			alert('We do apologise for the error. We are working on it and shall be fixed ASAP.');
		}


		$userImgAnchorHref = $mealAndUserInfoMainDiv.children('.userImg').attr('href');
		$userImgSrc = $mealAndUserInfoMainDiv.children('.userImg').find('img').attr('src');
		$userImgAlt = $mealAndUserInfoMainDiv.children('.userImg').find('img').attr('alt');
		$mealDesText = $mealAndUserInfoMainDiv.children('div').children('a').text();
		$usernameText = $mealAndUserInfoMainDiv.children('div').children('div').children('a').eq(0).text();
		$usernameHref = $mealAndUserInfoMainDiv.children('div').children('div').children('a').eq(0).attr('href');
		$dateTimeText = $mealAndUserInfoMainDiv.children('div').children('div').children('a').eq(1).text();

		$mealImgAnchorHref = $mealAndUserInfoMainDiv.siblings('a').attr('href');
		$mealImgSrc = $mealAndUserInfoMainDiv.siblings('a').find('img').attr('src');
		$mealImgAlt = $mealAndUserInfoMainDiv.siblings('a').find('img').attr('alt');

		$favoritesNo = $mealAndUserInfoMainDiv.siblings('.ratings').children('a').eq(0).children('span').text();

		$ingredientsList = $mealAndUserInfoMainDiv.siblings('.ingredients').children('li');
		$instructionsList = $mealAndUserInfoMainDiv.siblings('.instructions').children('li');

		$mealistDivs = $mealAndUserInfoMainDiv.siblings('form[name="mealist"]').children('div');

		$userCommentingAnchorHref = $mealAndUserInfoMainDiv.siblings('.comments').children('a').attr('href');
		$userCommentingImgSrc = $mealAndUserInfoMainDiv.siblings('.comments').children('a').find('img').attr('src');
		$userCommentingImgAlt = $mealAndUserInfoMainDiv.siblings('.comments').children('a').find('img').attr('alt');

		$commentsList =	$mealAndUserInfoMainDiv.siblings('.comments').children('ul').children('li');

		$userImgAnchor.attr('href', $userImgAnchorHref);
		$userImg.attr('src', $userImgSrc);
		$userImg.attr('alt', $userImgAlt);
		$mealDes.text($mealDesText);
		$username.text($usernameText);
		$username.attr('href', $usernameHref);
		$dateTime.text($dateTimeText);

		if ($mealAndUserInfoMainDiv.children('div').children('div').hasClass('userDateEdit')) {
			$userAndDate.addClass('userDateEdit');
			$editDeleteAnchor.css('display', 'inline');
		} else {
			$userAndDate.removeClass('userDateEdit');
			$editDeleteAnchor.css('display', 'none');
		}


		$mealImgAnchor.attr('href', $mealImgAnchorHref);
		$mealImg.attr('src', $mealImgSrc);
		$mealImg.attr('alt', $mealImgAlt);

		$favoriteAnchor.children('span').text($favoritesNo);

		$($ingredientsList).each(function(index) {
			if(index === 0 ) {
				$ingredientsUl.empty();
			}
			$ingredientsListText = $(this).text();
			var $ingredientsLi = $('<li></li>');
			$ingredientsLi.text($ingredientsListText);
			$ingredientsUl.append($ingredientsLi);
		});


		$($instructionsList).each(function(index) {
			if(index === 0 ) {
				$instructionsUl.empty();
			}
			$instructionsListText = $(this).text();
			var $instructionsLi = $('<li></li>');
			$instructionsLi.text($instructionsListText);
			$instructionsUl.append($instructionsLi);
		});


		$($mealistDivs).each(function(index) {
			if(index === 0 ) {
				$mealistForm.empty();
			}

			if ($(this).hasClass('createMealist')) {
				$createMealistDiv = $('<div class="createMealist"></div>');
				$createMealistAnchor = $('<a href="#">Create Mealist</a>');

				$mealistForm.append($createMealistDiv);
				$createMealistDiv.append($createMealistAnchor);
			} else {
				$inputName = $(this).children('input').attr('name');
				$inputID = $(this).children('input').attr('id');
				$labelText = $(this).children('label').text();

				var $mealistDiv = $('<div></div>');
				var $mealistInput = $('<input type="checkbox">');
				var $mealistLabel = $('<label></label>');

				$mealistInput.attr('name', $inputName);
				$mealistInput.attr('id', $inputID);
				$mealistLabel.attr('for', $inputID);
				$mealistLabel.text($labelText);

				$mealistForm.append($mealistDiv);
				$mealistDiv.append($mealistInput);
				$mealistDiv.append($mealistLabel);
			}
		});

		$createMealistAnchor.on('click', function(e) {
			e.preventDefault();

			$newMealistInput = $('<input type="text" name="newMealistInput" placeholder="New Mealist Name..">');
			$newMealistBtn = $('<input type="submit" name="newMealistBtn" value="Create">');

			$(this).hide();
			$(this).parent('.createMealist').append($newMealistInput);
			$(this).parent('.createMealist').append($newMealistBtn);
			$(this).parent('.createMealist').css('cursor', 'default');
		});


		$userCommentingAnchor.attr('href', $userCommentingAnchorHref);
		$userCommentingImg.attr('src', $userCommentingImgSrc);
		$userCommentingImg.attr('alt', $userCommentingImgAlt);
 

		$($commentsList).each(function(index) {

			if(index === 0 ) {
				$commentsUl.empty();
			}

		    $commenterImgAnchorHref = $commentsList.eq(index).children('.commenterImg').attr('href');
		    $commenterImgSrc = $commentsList.eq(index).children('.commenterImg').find('img').attr('src');
			$commenterImgAlt = $commentsList.eq(index).children('.commenterImg').find('img').attr('alt');
			$commentText = $commentsList.eq(index).children('div').children('p').text();
			$commenterNameText = $commentsList.eq(index).children('div').children('div').children('a').eq(0).text();
			$commenterNameHref = $commentsList.eq(index).children('div').children('div').children('a').eq(0).attr('href');
			$commentDateTimeText = $commentsList.eq(index).children('div').children('div').children('p').text();

			var $commentLi = $('<li class="cf"></li>');
			var $commenterImgAnchor = $('<a class="commenterImg"></a>');
			var $commenterImg = $('<img>');
			var $commentAttr = $('<div class="commentAttr"></div>');
			var $commenterAndDate = $('<div class="cf commenterAndDate"></div>');
			var $comment = $('<p></p>');
			var $commenterName = $('<a></a>');
			var $commentDateTime = $('<p></p>');

			$commenterImgAnchor.attr('href', $commenterImgAnchorHref);
			$commenterImg.attr('src', $commenterImgSrc);
			$commenterImg.attr('alt', $commenterImgAlt);
			$comment.text($commentText);
			$commenterName.text($commenterNameText);
			$commenterName.attr('href', $commenterNameHref);
			$commentDateTime.text($commentDateTimeText);

			$commentLi.append($commenterImgAnchor);
			$commenterImgAnchor.append($commenterImg);
			$commentLi.append($commentAttr);
			$commentAttr.append($commenterAndDate);
			$commenterAndDate.append($commenterName);
			$commenterAndDate.append($commentDateTime);
			$commentAttr.append($comment);
			$commentsUl.append($commentLi);

		});

		$overlay.show();

		$mealImgSrcForUrl = $mealImgSrc;
		$mealImgSrcUrlSplitSlash = $mealImgSrcForUrl.split("/");
		$mealImgSrcUrlDot = $mealImgSrcUrlSplitSlash[1].split(".");

		$mealImgSrcUrl = '?/lightbox=' + $mealImgSrcUrlDot[0];
		window.history.pushState( {} , '', $mealImgSrcUrl);

	});



	//when overlay image is clicked
	var $imgOverlay = $('<div class="imgOverlay"></div>');
	var $image = $('<img>'); 

	$body.append($imgOverlay);
	$imgOverlay.append($image);

	$('.overlayDiv .mealImg').on('click', function(e) {
		e.preventDefault();

		$imageSrc = $(this).find('img').attr('src');
		$imageAlt = $(this).find('img').attr('alt');

		$image.attr('src', $imageSrc);
		$image.attr('alt', $imageAlt);

		$imgOverlay.show();

		$ImgSrcUrl = '?/img/' + $mealImgSrcUrlSplitSlash[1];
		window.history.pushState( {} , '', $ImgSrcUrl);

	});



	//when editing options icon gets clicked
	$('.userDateEdit a:first-of-type + a + a').add($editDeleteAnchor).add('.dateTime').on('click', function(e) {
		e.preventDefault();

		$editingBlockList = $(this).parent().siblings('ul');

		if($editingBlockList.css('display').toLowerCase() == 'block') {
			$editingBlockList.hide(300);
		} else {
			$editingBlockList.show(300);
		}

	});


	// when overlay edit icon gets clicked
	var $editForm = $('<form method="POST" name="editForm"></form>');

	var $fileFieldsetEdit = $('<fieldset></fieldset>');
	var $fileImgEdit = $('<img>');

	var $titleFieldsetEdit = $('<fieldset></fieldset>');
	var $titleLabelEdit = $('<label for="titleEdit">title</label>');
	var $titleInputEdit = $('<input type="text" name="titleEdit" id="titleEdit">');

	var $ingredientsFieldsetEdit = $('<fieldset></fieldset>');
	var $ingredientsDivEdit = $('<div class="cf"></div>');
	var $ingredientsLabelEdit = $('<label for="ingredientsAreaEdit">ingredients</label>');
	var $ingredientsAddEdit = $('<a href=""><i class="material-icons">add_circle</i></a>');

	var $instructionsFieldsetEdit = $('<fieldset></fieldset>');
	var $instructionsDivEdit = $('<div class="cf"></div>');
	var $instructionsLabelEdit = $('<label for="instructionsAreaEdit">instructions</label>');
	var $instructionsAddEdit = $('<a href=""><i class="material-icons">add_circle</i></a>');

	var $doneFieldsetEdit = $('<fieldset></fieldset>');
	var $doneBtnEdit = $('<input type="submit" name="doneEdit" value="Done">');

	$overlay.append($editForm);
	$editForm.append($titleFieldsetEdit);
	$titleFieldsetEdit.append($titleLabelEdit);
	$titleFieldsetEdit.append($titleInputEdit);

	$editForm.append($fileFieldsetEdit);
	$fileFieldsetEdit.append($fileImgEdit);

	$editForm.append($ingredientsFieldsetEdit);
	$ingredientsFieldsetEdit.append($ingredientsDivEdit);
	$ingredientsDivEdit.append($ingredientsLabelEdit);
	$ingredientsDivEdit.append($ingredientsAddEdit);

	$editForm.append($instructionsFieldsetEdit);
	$instructionsFieldsetEdit.append($instructionsDivEdit);
	$instructionsDivEdit.append($instructionsLabelEdit);
	$instructionsDivEdit.append($instructionsAddEdit);

	$editForm.append($doneFieldsetEdit);
	$doneFieldsetEdit.append($doneBtnEdit);

	$editForm.hide();

	$editLiAnchor.on('click', function(e){
		e.preventDefault();

		$titleInputEdit.val($mealDes.text());
		$fileImgEdit.attr('src', $mealImgSrc);
		$fileImgEdit.attr('alt', $mealImgAlt);


		$ingredientsUl.children('li').each(function(index) {
			if(index === 0 ) {
				$ingredientsFieldsetEdit.children('input').remove();
			}
			var $ingredientsInputEdit = $('<input type="text" name="ingredientsAreaEdit[]" id="ingredientsAreaEdit">');
			$ingredientsInputEdit.val($(this).text());
			$ingredientsFieldsetEdit.append($ingredientsInputEdit);
		});

		$instructionsUl.children('li').each(function(index) {
			if(index === 0 ) {
				$instructionsFieldsetEdit.children('input').remove();
			}
			var $instructionsInputEdit = $('<input type="text" name="instructionsAreaEdit[]" id="instructionsAreaEdit">');
			$instructionsInputEdit.val($(this).text());
			$instructionsFieldsetEdit.append($instructionsInputEdit);
		});

		$overlayDiv.hide();
		$editForm.show();

	});

	$ingredientsAddEdit.on('click', function(e){	
		e.preventDefault();
		var $newIngredientsInputEdit = $('<input type="text" name="ingredientsAreaEdit[]" id="ingredientsAreaEdit">');
		$ingredientsFieldsetEdit.append($newIngredientsInputEdit);
	});


	$instructionsAddEdit.on('click', function(e){	
		e.preventDefault();
		var $newInstructionsInputEdit = $('<input type="text" name="instructionsAreaEdit[]" id="instructionsAreaEdit">');
		$instructionsFieldsetEdit.append($newInstructionsInputEdit);
	});


	//when body edit icon gets clicked
	$('.userDateEdit + ul a:first-of-type').on('click', function(e){
		e.preventDefault();
		$(this).parent().parent().siblings('a').trigger('click');
		$editLiAnchor.trigger('click');
	});



	// when create mealist button gets clicked
	$('.createMealist a').on('click', function(e) {
		e.preventDefault();

		$newMealistInput = $('<input type="text" name="newMealistInput" placeholder="New Mealist Name..">');
		$newMealistBtn = $('<input type="submit" name="newMealistBtn" value="Create">');

		$(this).hide();
		$(this).parent().append($newMealistInput);
		$(this).parent().append($newMealistBtn);
		$(this).parent().css('cursor', 'default');
	});



	//when ingredients, instructions, and add to mealist button gets clicked
	$('.ratings a').on('click', function(e) {
		e.preventDefault();
	});


	$('.ratings a:first-of-type + a').on('click', function() {
		if($(this).siblings('.ratings a:first-of-type + a + a').children().hasClass('active')) {
			$(this).siblings('.ratings a:first-of-type + a + a').children().toggleClass('active');
			$(this).parent().siblings('.instructions').slideToggle(400);
		}
		$(this).parent().siblings('.ingredients').slideToggle(400);
		$(this).children().toggleClass('active');
	});


	$('.ratings a:first-of-type + a + a').on('click', function() {
		if($(this).siblings('.ratings a:first-of-type + a').children().hasClass('active')) {
			$(this).siblings('.ratings a:first-of-type + a').children().toggleClass('active');
			$(this).parent().siblings('.ingredients').slideToggle(400);
		}
		$(this).parent().siblings('.instructions').slideToggle(400);
		$(this).children().toggleClass('active');
	});


	$('.ratings a:first-of-type + a + a + a').on('click', function() {
		if($(this).siblings('.ratings a:first-of-type + a + a').children().hasClass('active')) {
			$(this).siblings('.ratings a:first-of-type + a + a').children().toggleClass('active');
			$(this).parent().siblings('.instructions').slideToggle(400);
		} else if($(this).siblings('.ratings a:first-of-type + a').children().hasClass('active')) {
			$(this).siblings('.ratings a:first-of-type + a').children().toggleClass('active');
			$(this).parent().siblings('.ingredients').slideToggle(400);
		}
		$(this).parent().siblings('form[name="mealist"]').slideToggle(250);
		$(this).parent().siblings('div').children('form[name="mealist"]').slideToggle(250);
	});





















	//hide nav options, notifications, mealist or edit icon when other any other part of the .html document gets clicked
	$(document).mouseup(function(e) {
	    var $mealistContainer = $('form[name="mealist"]');
	    var $menuItems = $('.menuItems');
	    var $notificationsList = $('.notificationsListAbsolute');
	    var $editDeleteIconList = $('.mealAttr ul');

	    if (!$mealistContainer.is(e.target) && $mealistContainer.has(e.target).length === 0) {
	        $mealistContainer.hide();
	    }  

	    if (!$menuItems.is(e.target) && $menuItems.has(e.target).length === 0) {
	    	$menuItems.hide(200);
	    } 

	    if (!$notificationsList.is(e.target) && $notificationsList.has(e.target).length === 0) {
	    	$notificationsList.hide(200);
	    }

	    if (!$editDeleteIconList.is(e.target)) {
	    	$editDeleteIconList.hide(250);
	    }

	});



	//hides overlay
	function hideUploadingOverlay() {
		$("html, body").css("overflow", "auto");
		$fileImg.removeAttr('src');
		$uploadingOverlay.hide();
		window.history.pushState( {} , '', '?/');
	}


	function hideOverlay() {
		$("html, body").css("overflow", "auto");
		$(".comments").css("display", "none");

		if($('.overlayDiv .ratings a:first-of-type + a').children().hasClass('active')) {
			$('.overlayDiv .ratings a:first-of-type + a').children().removeClass('active');
			$('.overlayDiv .ratings a:first-of-type + a').parent().siblings('.ingredients').slideToggle(400);
		}

		if($('.overlayDiv .ratings a:first-of-type + a + a').children().hasClass('active')) {
			$('.overlayDiv .ratings a:first-of-type + a + a').children().removeClass('active');
			$('.overlayDiv .ratings a:first-of-type + a + a').parent().siblings('.instructions').slideToggle(400);
		}

		$editForm.hide();
		$overlayDiv.show();

		$overlay.hide();

		window.history.pushState( {} , '', '?/');
	}


	$uploadingOverlay.on('click', function(){
		hideUploadingOverlay();
	});


	$overlay.on('click', function(e){
		e.preventDefault();
		hideOverlay();
	});


	$imgOverlay.on("click", function(e){
		e.preventDefault();
		$imgOverlay.hide();
		window.history.pushState( {} , '', $mealImgSrcUrl);
	});


	$(window).on('popstate', function(e) {
		e.preventDefault();
		if($imgOverlay.css('display').toLowerCase() == 'block') {
			$imgOverlay.hide();
		} else if ($uploadingOverlay.css('display').toLowerCase() == 'block') {
			hideUploadingOverlay();
		} else {
			hideOverlay();
			$('.mealAttr ul').hide();
		}
	});



	$body.on("keydown", function(event){
		if(event.keyCode == 27) {
			if($imgOverlay.css('display').toLowerCase() == 'block') {
				$imgOverlay.hide();
				window.history.pushState( {} , '', $mealImgSrcUrl);
			} else if ($uploadingOverlay.css('display').toLowerCase() == 'block') {
				hideUploadingOverlay();
			} else {
				hideOverlay();
			}
		}
	});


	//stops the children of the overlay div from inheriting its action (which is to hide when clicked)
	$uploadingOverlay.children().add($overlayDiv).add($editForm).add($image).on("click", function(evt){
	    evt.stopPropagation();
	});













	$('input[name="upload"]').on('click', function(e){
		$.ajax({
			// url: "upload.php",
			// dataType: 'json',
			type: 'POST',
			data: { 
				uploadPost : 'uploadPost'
			},
			success: function(response) {
				alert(response);
			}
		});
		e.preventDefault();
	});
	

});