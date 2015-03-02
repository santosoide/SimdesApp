app.factory('lokasi', ['$http', function ($http) {
    return {
        getrpjmdesprogram: function (_id) {
            return $http.get('/api/v1/rpjmdes-program/' + _id);
        },

        get: function (_id, page, term) {
            return $http({
                method: 'get',
                url: '/api/v1/lokasi-program-by-program/' + _id + '?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        getPejabatDesa: function () {
            return $http.get('/api/v1/get-list-pejabat-desa');
        },

        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/v1/lokasi-program',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                data: $.param(inputData)
            });
        },
        //Tampil Data
        show: function (_id) {
            return $http.get('/api/v1/lokasi-program/' + _id);
        },

        update: function (inputData) {
            return $http({
                method: 'PUT',
                url: '/api/v1/lokasi-program/' + inputData._id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                data: $.param(inputData)
            });
        },

        // destroy a comment
        destroy: function (_id) {
            return $http.delete('/api/v1/lokasi-program/' + _id);
        }
    }
}]);
