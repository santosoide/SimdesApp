app.factory('password', ['$http', function ($http) {
    return {
        update: function (inputData) {
            return $http({
                method: 'post',
                url: '/api/v1/profile/post-password/',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        }
    }
}]);
