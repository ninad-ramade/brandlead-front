<?php
require_once('common/CommonConstants.php');
require_once('library/Model.php');
$apiPath = CommonConstants::_API_PATH_;
$authToken = CommonConstants::_API_AUTH_KEY_;
$model = new Model();
//var_dump($model->callApi($apiPath,CommonConstants::_LIST_ENDPOINT_METHOD_));exit;
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/style.css">
<script src="assets/js/angular.js"></script>
<script src="assets/js/app.js"></script>
<script src="https://kit.fontawesome.com/6a6d88c2eb.js" crossorigin="anonymous"></script>
<script src="assets/js/namesController.js"></script>
<script>
var apiPath = '<?php echo $apiPath; ?>';
var token = window.atob('<?php echo $authToken; ?>');
var listMethod = '<?php echo CommonConstants::_LIST_ENDPOINT_METHOD_; ?>';
var createMethod = '<?php echo CommonConstants::_CREATE_ENDPOINT_METHOD_; ?>';
var updateMethod = '<?php echo CommonConstants::_UPDATE_ENDPOINT_METHOD_; ?>';
var deleteMethod = '<?php echo CommonConstants::_DELETE_ENDPOINT_METHOD_; ?>';
var restoreMethod = '<?php echo CommonConstants::_RESTORE_ENDPOINT_METHOD_; ?>';
</script>
</head>
<body ng-app="brandlead-front" class="ng-scope" ng-controller="namesController" ng-cloak>
	<div class="loader">Loading...</div>
	<header>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
    			<div class="navbar-header">
    				<a class="navbar-brand" href="#">Brandlead Hello Names</a>
    			</div>
			</div>
		</nav>
	</header>
	<div class="container">
		<h3></h3>
        <div class="row">
        	<label>{{name.label}}</label><input type="text" id="name" ng-model="name.value">
        	<a href="javascript:void(0)" class="btn btn-primary" ng-click="addName()"><i class="fas fa-user-plus"></i> Add</a>
        	<a href="javascript:void(0)" class="btn btn-primary" ng-click="fetchTrashed()"><i class="fas fa-trash"></i> Fetch Trashed</a>
        	<a href="javascript:void(0)" class="btn btn-primary" ng-click="fetchNames()"><i class="fas fa-check"></i> Fetch Active</a>
        </div>
        <div class="row">
        	<table class="table">
        		<tr>
        			<th>Name</th>
        			<th>Actions</th>
        		</tr>
                <tr ng-repeat="item in names track by $index" ng-class="item.deleted_at ? 'deleted' : ''">
                	<td><span ng-if="!item.visible">{{item.name}}</span><span ng-if="item.visible"><input ng-model="item.name" placeholder="{{item.name}}"><i class="fas fa-check" ng-click="updateName(item.id, item.name)"></i></span></td>
                	<td><i ng-if="item.deleted_at" title="Restore" ng-click="restoreName(item.id)" class="fas fa-trash-restore"></i><i class="fas fa-edit" title="Edit" ng-if="!item.deleted_at" ng-click="item.visible=!item.visible"></i><i class="fas fa-trash" title="Delete" ng-if="!item.deleted_at" ng-click="deleteName(item.id)"></i></td>
                </tr>
        	</table>
      	</div>
	</div>
</body>
</html>