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
var deleteMethod = '<?php echo CommonConstants::_DELETE_ENDPOINT_METHOD_; ?>';
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
        	<label>Name</label><input type="text" id="name">
        	<a href="javascript:void()" class="btn btn-primary"><i class="fas fa-user-plus"></i> Add</a>
        </div>
        <div class="row">
        	<table class="table">
        		<tr>
        			<th>Name</th>
        			<th>Actions</th>
        		</tr>
                <tr ng-repeat="item in names track by $index">
                	<td>{{item.name}}</td>
                	<td><i class="fas fa-edit"></i><i class="fas fa-trash" ng-click="deleteName(item.id)"></i></td>
                </tr>
        	</table>
      	</div>
	</div>
</body>
</html>