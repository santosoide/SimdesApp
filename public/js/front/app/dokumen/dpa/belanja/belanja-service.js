app.factory('dpabelanja', ['$http', function ($http) {
    return {

        setdpa: function(inputData){
            //return $http.post('/api/v1/set-dpa-belanja/');
            return $http({
                method: 'POST',
                url: '/api/v1/set-dpa-belanja',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        setdpa: function(inputData){
            //return $http.post('/api/v1/set-dpa-belanja/');
            return $http({
                method: 'POST',
                url: '/api/v1/set-dpa-belanja',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            //return $http.get('/api/v1/belanja?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/get-dpa-belanja?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
                //data: $.param(inputData)
            });
        }
    }
}]);
