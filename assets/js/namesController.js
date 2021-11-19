ang.controller('namesController', function shopController($scope, $http){
	$scope.token = window.btoa(token);
	$scope.name = {
		value: '',
		label: 'Name'
	};
	$scope.setNames = function (names) {
		$scope.names = names.data;
	};
	$scope.fetchNames = function () {
		$scope.apiRequest(apiPath, listMethod, $scope.setNames, []);
	};
	$scope.fetchTrashed = function () {
		var trashedApiPath = apiPath + '/trashed';
		$scope.apiRequest(trashedApiPath, listMethod, $scope.setNames, []);
	};
	$scope.fetchActive = function () {
		var activeApiPath = apiPath + '/active';
		$scope.apiRequest(activeApiPath, listMethod, $scope.setNames, []);
	};
	$scope.showLoader = function() {
		document.getElementsByClassName('loader')[0].style.display = 'block';
	};
	$scope.hideLoader = function() {
		document.getElementsByClassName('loader')[0].style.display = 'none';
	};
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
	};
	$scope.addName = function() {
		if($scope.name.value == '') {
			alert('Name cannot be blank.');
			return false;
		}
		var createApiPath = apiPath + '/' + $scope.name.value;
		alert('Name added successfully.');
		$scope.apiRequest(createApiPath, createMethod, $scope.fetchNames, []);
	};
	$scope.updateName = function(id, name) {
		var c = confirm('Are you sure you want to update this name to ' + name + '?');
		if(c == false) {
			return c;
		}
		var updateApiPath = apiPath + '/' + id + '/' + name;
		alert('Name updated successfully.');
		$scope.apiRequest(updateApiPath, updateMethod, $scope.fetchNames, []);
	};
	$scope.deleteName = function(id) {
		var c = confirm('Are you sure you want to delete?');
		if(c == false) {
			return c;
		}
		var deleteApiPath = apiPath + '/' + id;
		alert('Name deleted successfully.');
		$scope.apiRequest(deleteApiPath, deleteMethod, $scope.fetchNames, []);
	};
	$scope.restoreName = function(id) {
		var c = confirm('Are you sure you want to restore?');
		if(c == false) {
			return c;
		}
		var restoreApiPath = apiPath + '/' + id;
		alert('Name restored successfully.');
		$scope.apiRequest(restoreApiPath, restoreMethod, $scope.fetchNames, []);
	}
	$scope.fetchNames();
});