app.factory('program', ['$http', function ($http) {
    return {
        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            return $http({
                method: 'get',
                url: '/api/v1/kewenangan-program?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        getkewenangan: function () {
            return $http.get('/api/v1/get-list-kewenangan');
        },

        getfungsi: function (id) {
            return $http.get('/api/v1/get-list-fungsi/' + id);
        },

        getbidang: function (id) {
            return $http.get('/api/v1/get-list-bidang/' + id);
        },

        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/v1/kewenangan-program',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },
        //Tampil Data
        show: function (_id) {
            return $http({
                method: 'get',
                url: '/api/v1/kewenangan-program/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
            });
        },

        update: function (inputData) {
            return $http({
                method: 'PUT',
                url: '/api/v1/kewenangan-program/' + inputData._id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        // destroy a comment
        destroy: function (_id) {
            return $http({
                method: 'delete',
                url: '/api/v1/kewenangan-program/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        }
    }
}]);
