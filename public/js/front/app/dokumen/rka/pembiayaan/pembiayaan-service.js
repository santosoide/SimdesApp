app.factory('rkapembiayaan', ['$http', function ($http) {
    return {

        setrka: function(inputData){
            //return $http.post('/api/v1/set-rka-pembiayaan/');
            return $http({
                method: 'POST',
                url: '/api/v1/set-rka-pembiayaan',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        setdpa: function(inputData){
            //return $http.post('/api/v1/set-rka-pembiayaan/');
            return $http({
                method: 'POST',
                url: '/api/v1/set-dpa-pembiayaan',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            //return $http.get('/api/v1/pembiayaan?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/get-rka-pembiayaan?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
                //data: $.param(inputData)
            });
        }
    }
}]);
