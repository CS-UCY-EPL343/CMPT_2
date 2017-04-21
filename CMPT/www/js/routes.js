angular.module('app.routes', [])

.config(function($stateProvider, $urlRouterProvider) {

  // Ionic uses AngularUI Router which uses the concept of states
  // Learn more here: https://github.com/angular-ui/ui-router
  // Set up the various states which the app can be in.
  // Each state's controller can be found in controllers.js
  $stateProvider
    
  

      .state('menu.home', {
    url: '/page1',
    views: {
      'side-menu21': {
        templateUrl: 'templates/home.html',
        controller: 'homeCtrl'
      }
    }
  })

  .state('menu.hotline', {
    url: '/page2',
    views: {
      'side-menu21': {
        templateUrl: 'templates/hotline.html',
        controller: 'hotlineCtrl'
      }
    }
  })

  .state('menu.helpline', {
    url: '/page3',
    views: {
      'side-menu21': {
        templateUrl: 'templates/helpline.html',
        controller: 'helplineCtrl'
      }
    }
  })

  .state('menu.aboutUs', {
    url: '/page4',
    views: {
      'side-menu21': {
        templateUrl: 'templates/aboutUs.html',
        controller: 'aboutUsCtrl'
      }
    }
  })

  .state('menu.contactUs', {
    url: '/page5',
    views: {
      'side-menu21': {
        templateUrl: 'templates/contactUs.html',
        controller: 'contactUsCtrl'
      }
    }
  })

  .state('menu.chat', {
    url: '/page13',
    views: {
      'side-menu21': {
        templateUrl: 'templates/chat.html',
        controller: 'chatCtrl'
      }
    }
  })

  .state('menu.helplineTopics', {
    url: '/page6',
    views: {
      'side-menu21': {
        templateUrl: 'templates/helplineTopics.html',
        controller: 'fAQCtrl'
      }
    }
  })

  .state('menu.settings', {
    url: '/page7',
    views: {
      'side-menu21': {
        templateUrl: 'templates/settings.html',
        controller: 'settingsCtrl'
      }
    }
  })

  .state('menu', {
    url: '/side-menu21',
    templateUrl: 'templates/menu.html',
    controller: 'menuCtrl'
  })

  .state('menu.language', {
    url: '/page9',
    views: {
      'side-menu21': {
        templateUrl: 'templates/language.html',
        controller: 'languageCtrl'
      }
    }
  })

  .state('menu.illegalActivites', {
    url: '/page10',
    views: {
      'side-menu21': {
        templateUrl: 'templates/illegalActivites.html',
        controller: 'illegalActivitesCtrl'
      }
    }
  })

  .state('menu.partners', {
    url: '/page11',
    views: {
      'side-menu21': {
        templateUrl: 'templates/partners.html',
        controller: 'partnersCtrl'
      }
    }
  })

$urlRouterProvider.otherwise('/side-menu21/page1')

  

});