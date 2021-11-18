var ang = angular.module("brandlead-front", [], function ($httpProvider) {
    $httpProvider.defaults.headers.common['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';

})