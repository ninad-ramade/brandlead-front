ang.controller('namesController', function shopController($scope, $http){
	$scope.token = window.btoa(token);
	$scope.setNames = function (names) {
		$scope.names = names.data;
	}
	$scope.fetchNames = function () {
		$scope.apiRequest(apiPath, listMethod, $scope.setNames, []);
	}
	$scope.showLoader = function() {
		document.getElementsByClassName('loader')[0].style.display = 'block';
	}
	$scope.hideLoader = function() {
		document.getElementsByClassName('loader')[0].style.display = 'none';
	}
	$scope.apiRequest = function(url, method, callback, data) {
        $scope.showLoader();
        var contentType = 'application/json';
    	var headers = {'Content-Type': contentType, 'Authorization': 'Bearer ' + $scope.token};
        $http({
            method: method,
            url: url,
            data: data,
            headers: headers

        }).then(function success(response) {
            $scope.hideLoader();
            if (callback != null && typeof callback != 'undefined') {
                callback(response.data);
            }
        });
	}
	$scope.deleteName = function(id) {
		var c = confirm('Are you sure you want to delete?');
		if(c == true) {
			deleteApiPath = apiPath + '/' + id;
			$scope.apiRequest(deleteApiPath, deleteMethod, $scope.fetchNames, []);
		}
	}
	$scope.fetchNames();
});