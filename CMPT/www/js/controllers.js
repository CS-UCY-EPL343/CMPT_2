angular.module('app.controllers', [])
  
.controller('homeCtrl', ['$scope', '$stateParams', // The following is the constructor function for this page's controller. See https://docs.angularjs.org/guide/controller
// You can include any angular dependencies as parameters for this function
// TIP: Access Route Parameters for your page via $stateParams.parameterName
function ($scope, $stateParams) {


}])
   
.controller('hotlineCtrl', ['$scope', '$stateParams', '$http', '$ionicHistory', '$state', '$window',// The following is the constructor function for this page's controller. See https://docs.angularjs.org/guide/controller
// You can include any angular dependencies as parameters for this function
// TIP: Access Route Parameters for your page via $stateParams.parameterName
function ($scope, $stateParams, $http, $ionicHistory, $state, $window) {

	$scope.data = {};
	$scope.data.ReportFor = "Website";
	$scope.data.activity = "Child Pornography";



	$scope.submit = function(){

		var sub = confirm("Are you sure you want to submit the report?");
		if (sub) {
			if(!$scope.data.url){
				alert("please fill in all the required fields");
				return;
			}
			

			var link = 'http://10.0.2.2/cyberethics/api.php';
			//var link = 'http://localhost/cyberethics/api.php';
			//var link = 'http://cproject.in.cs.ucy.ac.cy/cyberethics/api.php';
			$http.post(link, {'email' : $scope.data.email,
								'name': $scope.data.name,
								'surname':$scope.data.surname,
								'DOB':$scope.data.DOB,
								'sex':$scope.data.sex,
								'ReportFor':$scope.data.ReportFor,
								'url':$scope.data.url,
								'activity':$scope.data.activity,
								'details':$scope.data.details}).success(function (res){
	            alert("Report submitted successfully");
	            $scope.data.url = "";
	            $scope.data.email = "";
	            $scope.data.name = "";
	            $scope.data.surname = "";
				$scope.data.details = "";
				$scope.data.sex = "";
				$scope.data.DOB = "";
				$scope.data.ReportFor = "Website";
				$scope.data.activity = "Child Pornography";	            

	            

	        }).error(function(){
	        	alert("Error reporting form. Check internet connection and try again.");	  

	        });
		}	
	}

	$scope.clear = function(){

		var clear = confirm("Are you sure you want to clear the report?");
		if(clear){
			$scope.data.url = "";
            $scope.data.email = "";
            $scope.data.name = "";
            $scope.data.surname = "";
			$scope.data.details = "";
			$scope.data.sex = "";
			$scope.data.DOB = "";
			$scope.data.ReportFor = "Website";
			$scope.data.activity = "Child Pornography";	 
		}

	}


}])
   
.controller('helplineCtrl', ['$scope', '$stateParams', '$http', '$state', // The following is the constructor function for this page's controller. See https://docs.angularjs.org/guide/controller
// You can include any angular dependencies as parameters for this function
// TIP: Access Route Parameters for your page via $stateParams.parameterName
	function ($scope, $stateParams, $http, $state) {

	$scope.data = {};
	$scope.data.ReportFor = "Website";
	$scope.data.activity = "Child Pornography";


	$scope.submit = function(){

		var sub = confirm("Are you sure you want to submit the report?");
		if (sub) {
			if(!$scope.data.url || !$scope.data.email){
				alert("please fill in all the required fields");
				return;
			}

			if(!$scope.data.email){
				alert($scope.data.email);
			}


			//var link = 'http://10.0.2.2/cyberethics/apiHelpline.php';
			var link = 'http://localhost/cyberethics/apiHelpline.php';
			//var link = 'http://cproject.in.cs.ucy.ac.cy/cyberethics/api.php';
			$http.post(link, {'email' : $scope.data.email,
								'name': $scope.data.name,
								'surname':$scope.data.surname,
								'DOB':$scope.data.DOB,
								'sex':$scope.data.sex,
								'ReportFor':$scope.data.ReportFor,
								'url':$scope.data.url,
								'activity':$scope.data.activity,
								'details':$scope.data.details}).success(function (res){
	            alert("Report submitted successfully");
	            $scope.data.url = "";
	            $scope.data.email = "";
	            $scope.data.name = "";
	            $scope.data.surname = "";
				$scope.data.details = "";
				$scope.data.sex = "";
				$scope.data.DOB = "";
				$scope.data.ReportFor = "Website";
				$scope.data.activity = "Child Pornography";	            

	            

	        }).error(function(){
	        	alert("Error reporting form. Check internet connection and try again.");	  

	        });
		}	
	}

	$scope.clear = function(){

		var clear = confirm("Are you sure you want to clear the report?");
		if(clear){
			$scope.data.url = "";
            $scope.data.email = "";
            $scope.data.name = "";
            $scope.data.surname = "";
			$scope.data.details = "";
			$scope.data.sex = "";
			$scope.data.DOB = "";
			$scope.data.ReportFor = "Website";
			$scope.data.activity = "Child Pornography";	 
		}
	}


}])
   
.controller('aboutUsCtrl', ['$scope', '$stateParams', // The following is the constructor function for this page's controller. See https://docs.angularjs.org/guide/controller
// You can include any angular dependencies as parameters for this function
// TIP: Access Route Parameters for your page via $stateParams.parameterName
function ($scope, $stateParams) {


}])
   
.controller('contactUsCtrl', ['$scope', '$stateParams', // The following is the constructor function for this page's controller. See https://docs.angularjs.org/guide/controller
// You can include any angular dependencies as parameters for this function
// TIP: Access Route Parameters for your page via $stateParams.parameterName
function ($scope, $stateParams) {


}])

.controller('chatCtrl', ['$scope', '$stateParams', // The following is the constructor function for this page's controller. See https://docs.angularjs.org/guide/controller
// You can include any angular dependencies as parameters for this function
// TIP: Access Route Parameters for your page via $stateParams.parameterName
function ($scope, $stateParams) {


}])
   
.controller('fAQCtrl', ['$scope', '$stateParams', // The following is the constructor function for this page's controller. See https://docs.angularjs.org/guide/controller
// You can include any angular dependencies as parameters for this function
// TIP: Access Route Parameters for your page via $stateParams.parameterName
function ($scope, $stateParams) {


}])
   
.controller('settingsCtrl', ['$scope', '$stateParams', // The following is the constructor function for this page's controller. See https://docs.angularjs.org/guide/controller
// You can include any angular dependencies as parameters for this function
// TIP: Access Route Parameters for your page via $stateParams.parameterName
function ($scope, $stateParams) {


}])
   
.controller('menuCtrl', ['$scope', '$stateParams', // The following is the constructor function for this page's controller. See https://docs.angularjs.org/guide/controller
// You can include any angular dependencies as parameters for this function
// TIP: Access Route Parameters for your page via $stateParams.parameterName
function ($scope, $stateParams) {


}])
   
.controller('languageCtrl', ['$scope', '$stateParams', // The following is the constructor function for this page's controller. See https://docs.angularjs.org/guide/controller
// You can include any angular dependencies as parameters for this function
// TIP: Access Route Parameters for your page via $stateParams.parameterName
function ($scope, $stateParams) {


}])
   
.controller('illegalActivitesCtrl', ['$scope', '$stateParams', // The following is the constructor function for this page's controller. See https://docs.angularjs.org/guide/controller
// You can include any angular dependencies as parameters for this function
// TIP: Access Route Parameters for your page via $stateParams.parameterName
function ($scope, $stateParams) {


}])
   
.controller('partnersCtrl', ['$scope', '$stateParams', // The following is the constructor function for this page's controller. See https://docs.angularjs.org/guide/controller
// You can include any angular dependencies as parameters for this function
// TIP: Access Route Parameters for your page via $stateParams.parameterName
function ($scope, $stateParams) {


}])
 