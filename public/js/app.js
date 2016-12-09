var commentApp = angular.module('commentApp', ['mainCtrl', 'commentService','ngMaterial','ngAnimate','ngRoute','slick','angular-loading-bar','ngAnimate','cfp.loadingBar','ngSanitize','ui.router']);

    commentApp.controller('mainController', function($scope, $http, Comment,$state, $timeout, $mdSidenav) {
    // object to hold all the data for the new comment form

      $scope.toggleLeft = buildToggler('left');
    $scope.toggleRight = buildToggler('right');
    $scope.$state = $state;

    function buildToggler(componentId) {
      return function() {
        $mdSidenav(componentId).toggle();
      }
    }
    
    $scope.commentData = {};

    // loading variable to show the spinning loading icon
    $scope.loading = true;
    
    // get all the comments first and bind it to the $scope.comments object
    Comment.get()
      .success(function(data) {
        $scope.comments = data;
        $scope.loading = false;
      });


    // function to handle submitting the form
    $scope.submitComment = function() {
      $scope.loading = true;

      // save the comment. pass in comment data from the form
      Comment.save($scope.commentData)
        .success(function(data) {
          $scope.commentData = {};
          // if successful, we'll need to refresh the comment list
          Comment.get()
            .success(function(getData) {
              $scope.comments = getData;
              $scope.loading = false;
            });

        })
        .error(function(data) {
          console.log(data);
        });
    };

    // function to handle deleting a comment
    $scope.deleteComment = function(id) {
      $scope.loading = true; 

      Comment.destroy(id)
        .success(function(data) {

          // if successful, we'll need to refresh the comment list
          Comment.get()
            .success(function(getData) {
              $scope.comments = getData;
              $scope.loading = false;
            });

        });
    };

  });

  commentApp.controller('HeaderController', function ($scope, $location) 
  { 
    $scope.getClass = function (path) {
      return ($location.path().substr(0, path.length) === path) ? 'active' : '';
    }

  })

  commentApp.controller('FooterController', function ($scope, $location) 
  { 
    $scope.getClass = function (path) {
      return ($location.path().substr(0, path.length) === path) ? 'active' : '';
    }

  })




  commentApp.controller('SidenavController', function ($scope, $location) 
  { 
    $scope.getClass = function (path) {
      return ($location.path().substr(0, path.length) === path) ? 'active' : '';
    }
  })


  commentApp.config(function($stateProvider, $urlRouterProvider) {

    $stateProvider
        
        .state('work', {
            url: '/how-we-work',
            cache: false,
            templateUrl: 'pages/how-we-work/work.html',
            controller: 'workCtrl',
            title: 'Как мы работаем',    
        })

        .state('contacts', {
            url: '/contacts',
            cache: false,
            templateUrl: 'pages/contacts/contacts.html',
            controller: 'contactsCtrl',
            title: 'Контакты',
        })     

        .state('projects', {
            url: '/projects',
            cache: false,
            templateUrl: 'pages/projects/projects.html',
            controller: 'projectsCtrl',
            title: 'Проекты',
        })  

        .state('azs', {
            url: '/activities/azs',
            cache: false,
            templateUrl: 'pages/azs/azs.html',
            controller: 'azsCtrl',
            title: 'АЗС',
        }) 

        .state('communication', {
            url: '/activities/communication',
            cache: false,
            templateUrl: 'pages/communication/communication.html',
            controller: 'communicationCtrl',
            title: 'Инженерные коммуникации',
        })  

        .state('reviews', {
            url: '/activities/reviews',
            cache: false,
            templateUrl: 'pages/reviews/reviews.html',
            controller: 'reviewsCtrl',
            title: 'Отзывы',
        }) 

        .state('services', {
            url: '/activities/services',
            cache: false,
            templateUrl: 'pages/services/services.html',
            controller: 'servicesCtrl',
            title: 'Услуги',
        }) 

        .state('group', {
            url: '/group',
            cache: false,
            templateUrl: 'pages/group/group.html',
            controller: 'groupCtrl',
            title: 'Группы компании',
        }) 

        .state('projectsD', {
            url: '/projects/{projectId}',
            templateUrl: 'pages/project-detail.html',
            title: 'Проекты',
            controller: function($scope, $http, $location, $stateParams) {

                $scope.projectId = $stateParams.projectId;

                var url = 'pages/projects/'+$stateParams.projectId+'.json';

                $http.get(url).success(function(data) {
                  $scope.project = data;
                });

            }
        })

        .state("otherwise", {
            url: "/",
            title: 'Главная страница',
            templateUrl: "pages/entry.html"
        });

        $urlRouterProvider.otherwise('/');
  });


  commentApp.run(function($rootScope){
    $rootScope.$on('$stateChangeSuccess', function (event, toState) {
        $rootScope.pageTitle = toState.title;
    });
});

  

  commentApp.controller('contactsCtrl', function ($scope, $templateCache) {
    $templateCache.removeAll();
  });

  commentApp.controller('projectsCtrl',['$scope','$http', '$location','$sce', function($scope, $http, $location,$sce) {
    $http.get('pages/projects/projects.json').success(function(data, status, headers, config) {
      $scope.projects = data;
    });

  }]);

  commentApp.controller('workCtrl',['$scope','$http', '$location','$state', function($scope, $http, $location,$state) {
   $scope.reload = function(){
      $state.reload('work');
    }

    $http.get('pages/how-we-work/how-we-work.json').success(function(data, status, headers, config) {
      $scope.work = data;
    })
  }]);

  commentApp.controller('azsCtrl',['$scope','$http', '$location', function($scope, $http, $location) {
    $http.get('pages/azs/azs.json').success(function(data, status, headers, config) {
      $scope.work = data;
    })
  }]);

  commentApp.controller('reviewsCtrl',['$scope','$http', '$location', function($scope, $http, $location) {
    $http.get('pages/reviews/reviews.json').success(function(data, status, headers, config) {
      $scope.reviews = data;
    })
  }]);  

  commentApp.controller('groupCtrl',['$scope','$http', '$location', function($scope, $http, $location) {
    $http.get('pages/group/group.json').success(function(data, status, headers, config) {
      $scope.group = data;
    })
  }]);  

  commentApp.controller('servicesCtrl',['$scope','$http', '$location', function($scope, $http, $location) {
    $http.get('pages/services/services.json').success(function(data, status, headers, config) {
      $scope.services = data;
    })
  }]);  

  commentApp.controller('communicationCtrl',['$scope','$http', '$location', function($scope, $http, $location) {
    $http.get('pages/communication/communication.json').success(function(data, status, headers, config) {
      $scope.communication = data;
    })
  }]);
