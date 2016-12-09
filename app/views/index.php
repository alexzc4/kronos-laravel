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
<body class="container1" ng-app="commentApp" ng-controller="mainController">


	<!-- MODAL -->
	<div class="remodal md-whiteframe-3dp" id="modalSimple" data-remodal-id="modal" data-remodal-options='{ "hashTracking": false }'>
	  <button data-remodal-action="close" class="remodal-close md-whiteframe-1dp"></button>
	  <p>
	   	Группой компанией КРОНОС выполнялись работы по ремонту торгового центра.<br><br>
	   	Работы были выполнены в соответствии с действующими строительными нормами и правилами, согласно техническому заданию, с надлежащим качеством и в установленный срок. При этом, в ходе производства работ максимально учитывались пожелания заказчика, использовались современные строительные материалы и прогрессивные технологии в отделке помещений.
	  </p>
	</div>
	<!--END MODAL -->

	<!-- MODAL CONTACTS-->
	<div class="remodal md-whiteframe-3dp" id="modalContacts" data-remodal-id="modalContacts" data-remodal-options='{ "hashTracking": false }'>
	  <button data-remodal-action="close" class="remodal-close"></button>
	  <form action="" layout="column" layout-aligment="start stretch">
	  	<input type="text" placeholder="Имя">
	  	<input type="text" placeholder="Фамилия">
	  	<input type="text" placeholder="Телефон">
	  	<input type="text" placeholder="Email">
	  	<textarea name="" id="" cols="30" rows="7" placeholder="Сообщение"></textarea>

	  	<div class="atFile" 
	  	layout-xs="column" layout-align-xs="start stretch"
	  	layout-sm="row" layout-align-sm="space-between stretch"
	  	layout-md="row" layout-align-md="space-between stretch"
	  	layout-gt-md="row" layout-align-gt-md="space-between stretch">
	  		<div class="contactsModalWrapperFile buttonWrapper">
									<md-button data-remodal-target="modalContacts" href="javscript:void(0)" md-no-ink class="projectButton" >Прикрепить файл</md-button>
								</div>
	  		<div><input type="text" disabled="disables" value="Резюме.pdf"></div>
	  	</div>

	  	<div class="contactsModalWrapper buttonWrapper">
			<md-button  href="javscript:void(0)" md-no-ink class="projectButton" >Отправить резюме</md-button>
		</div>
	  </form>
	</div>
	<!--END MODAL CONTACTS-->

	<div ng-include src="'pages/partials/sidenav.html'" ></div>

<md-content layout-fill  ng-class="{active: $state.includes('services')}">

		<div id="bodyContainer" layout="column"  ng-cloak ng-class="{active: $state.includes('otherwise')}" >

			<div ng-include src="'pages/partials/header.html'"></div>  

			<div ui-view  ></div>

		</div>


		<div ng-include src="'pages/partials/footer.html'"></div>

		<div ng-include src="'pages/partials/footerLight.html'"></div>

	</md-content>


</body>
</html>
