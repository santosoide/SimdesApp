app.factory('rpjmdes_program', ['$http', function ($http) {
    return {

        getkewenangan: function () {
            return $http.get('/api/v1/get-list-kewenangan/')
        },

        getbidang: function (_id) {
            return $http.get('/api/v1/get-list-bidang/' + _id)
        },

        getprogram: function (_id) {
            return $http.get('/api/v1/get-list-program/' + _id)
        },

        getkegiatan: function (_id) {
            return $http.get('/api/v1/get-list-kegiatan/' + _id)
        },

        getsumberdana: function () {
            return $http.get('/api/v1/get-list-sumber-dana')
        },

        getDanaDesa: function (page, term) {
            //return $http.get('/api/v1/rpjmdes-program?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/get-list-dana-desa-tersedia?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        getDanaDesaDetil: function (_id) {
            //return $http.get('/api/v1/rpjmdes-program?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/dana-desa-by-desa/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        request: function (param) {
            return $http({
                method: 'post',
                url: '/api/v1/set-rpjmdes-program',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(param)
            })
        },

        hitungpelaksanaan: function (param) {
            return $http({
                method: 'post',
                url: 'api/v1/hitung-pagu-anggaran/',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(param)
            })
        },

        simpanpelaksanaan: function (param, id) {
            return $http({
                method: 'put',
                url: 'api/v1/pelaksanaan-rpjmdes-program/' + id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(param)
            })
        },

        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            //return $http.get('/api/v1/rpjmdes-program?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/rpjmdes-program?page=' + page + '&term=' + term,
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
