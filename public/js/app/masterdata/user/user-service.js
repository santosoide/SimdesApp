app.factory('user', ['$http', function ($http) {
    return {
        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            //return $http.get('/api/v1/backoffice/user?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/backoffice/user?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        //
        show: function (_id) {
            //return $http.get('/api/v1/backoffice/user/' + _id);
            return $http({
                method: 'get',
                url: '/api/v1/backoffice/user/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        }
    }
}]);