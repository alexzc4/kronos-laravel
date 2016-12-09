<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel and Angular Comment System</title>

	<!-- CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

	<!-- bower:css -->
	<link rel="stylesheet" href="vendor/angular-material/angular-material.css" />
	<link rel="stylesheet" href="vendor/normalize-css/normalize.css" />
	<link rel="stylesheet" href="vendor/slick-carousel/slick/slick.css" />
	<link rel="stylesheet" href="vendor/angular-loading-bar/build/loading-bar.css" />
	<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css" />
	<link rel="stylesheet" href="vendor/lightbox2/dist/css/lightbox.css" />
	<link rel="stylesheet" href="vendor/remodal/dist/remodal.css" />
	<link rel="stylesheet" href="vendor/remodal/dist/remodal-default-theme.css" />

	<link rel="stylesheet" href="style/main.css">
	<style>
		
		form 		{ padding-bottom:20px; }
		.comment 	{ padding-bottom:20px; }
	</style>

	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	
		<!-- bower:js -->
	<script src="vendor/jquery/dist/jquery.js"></script>
	<script src="vendor/angular/angular.js"></script>
	<script src="vendor/angular-animate/angular-animate.js"></script>
	<script src="vendor/angular-aria/angular-aria.js"></script>
	<script src="vendor/angular-messages/angular-messages.js"></script>
	<script src="vendor/angular-material/angular-material.js"></script>
	<script src="vendor/angular-route/angular-route.js"></script>
	
	<script src="vendor/slick-carousel/slick/slick.js"></script>
	<script src="vendor/angular-loading-bar/build/loading-bar.js"></script>
	<script src="vendor/angular-sanitize/angular-sanitize.js"></script>
	<script src="vendor/lightbox2/dist/js/lightbox.js"></script>
	<script src="vendor/angular-slick/dist/slick.js"></script>
	<script src="vendor/angular-ui-router/release/angular-ui-router.js"></script>
	<script src="vendor/remodal/dist/remodal.js"></script>
	<!-- endbower -->

	<!-- ANGULAR -->
	<!-- all angular resources will be loaded from the /public folder -->
		<script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
		<script src="js/services/commentService.js"></script> <!-- load our service -->
		
		<script src="js/app.js"></script> <!-- load our application -->

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="commentApp" ng-controller="mainController">
<div class="col-md-8 col-md-offset-2">

	<!-- PAGE TITLE -->
	<div class="page-header">
		<h2>Laravel and Angular Single Page Application</h2>
		<h4>Commenting System</h4>
	</div>

	<!-- NEW COMMENT FORM -->
	<form ng-submit="submitComment()"> <!-- ng-submit will disable the default form action and use our function -->

		<!-- AUTHOR -->
		<div class="form-group">
			<input type="text" class="form-control input-sm" name="author" ng-model="commentData.author" placeholder="Name">
		</div>

		<!-- COMMENT TEXT -->
		<div class="form-group">
			<input type="text" class="form-control input-lg" name="comment" ng-model="commentData.text" placeholder="Say what you have to say">
		</div>
		
		<!-- SUBMIT BUTTON -->
		<div class="form-group text-right">	
			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
		</div>
	</form>

	<pre>
	{{ commentData }}
	</pre>

	<!-- LOADING ICON -->
	<!-- show loading icon if the loading variable is set to true -->
	<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

	<!-- THE COMMENTS -->
	<!-- hide these comments if the loading variable is true -->
	<div class="comment" ng-hide="loading" ng-repeat="comment in comments">
		<h3>Comment #{{ comment.id }} <small>by {{ comment.author }}</small></h3>
		<p>{{ comment.text }}</p>

		<p><a href="#" ng-click="deleteComment(comment.id)" class="text-muted">Delete</a></p>
	</div>

</div>
</body>
</html>
