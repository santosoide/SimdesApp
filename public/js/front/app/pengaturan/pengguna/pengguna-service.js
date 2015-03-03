app.factory('pengguna_desa', ['$http', function ($http) {
    return {
        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            return $http({
                method: 'get',
                url: '/api/v1/backoffice/user-from-frontoffice?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/v1/backoffice/user',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },
        //Tampil Data
        show: function (_id) {
            return $http.get('/api/v1/backoffice/user/' + _id);
        },

        update: function (inputData) {
            return $http({
                method: 'PUT',
                url: '/api/v1/backoffice/user/' + inputData._id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        // destroy a comment
        destroy: function (_id) {
            return $http({
                method: 'delete',
                url: '/api/v1/backoffice/user/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        }
    }
}]);
