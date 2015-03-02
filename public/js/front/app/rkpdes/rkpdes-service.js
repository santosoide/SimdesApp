app.factory('program', ['$http', function ($http) {
    return {

        //Get Akun
        getmasalah: function () {
            return $http.get('/api/v1/get-list-masalah')
        },

        getbidang: function () {
            return $http.get('/api/v1/list-bidang')
        },

        getprogram: function (_id) {
            return $http.get('/api/v1/get-list-program/' + _id)
        },

        getpejabat: function () {
            return $http.get('/api/v1/get-list-pejabat-desa')
        },

        getsumberdana: function () {
            return $http.get('/api/v1/get-list-sumber-dana')
        },

        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            //return $http.get('/api/v1/rpjmdes-program?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/get-rpjmdes-on-rkpdes?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/v1/rpjmdes-program',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },
        //Tampil Data
        show: function (_id) {
            //return $http.get('/api/v1/rpjmdes-program/' + _id);
            return $http({
                method: 'get',
                url: '/api/v1/rpjmdes-program/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        update: function (inputData) {
            return $http({
                method: 'PUT',
                url: '/api/v1/rpjmdes-program/' + inputData._id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        // destroy a comment
        destroy: function (_id) {
            //return $http.delete('/api/v1/rpjmdes-program/' + _id);
            return $http({
                method: 'delete',
                url: '/api/v1/rpjmdes-program/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        }
    }
}]);
