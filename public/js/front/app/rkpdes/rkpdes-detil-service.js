app.factory('rkpdesdetil', ['$http', function ($http) {
    return {

        getrpjmdesprogram: function (_id) {
            //return $http.get('/api/v1/rpjmdes-program/' + _id);
            return $http({
                method: 'get',
                url: '/api/v1/rpjmdes-program/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            })
        },

        getLokasi: function (_id, page, term) {
            return $http({
                method: 'get',
                url: '/api/v1/lokasi-program-by-program/' + _id + '?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        getDanaDesa: function (page, term) {
            //return $http.get('/api/v1/rpjmdes-program?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/get-list-dana-desa-tersedia?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        get: function (_id, page) {
            //return $http.get('/api/v1/get-rkpdes/' + _id + '?page=' + page);
            return $http({
                method: 'get',
                url: '/api/v1/get-rkpdes/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/v1/rkpdes',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        show: function (_id) {
            //return $http.get('/api/v1/rkpdes/' + _id);
            return $http({
                method: 'get',
                url: '/api/v1/rkpdes/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        getLokasiDetil: function (_id) {
            //return $http.get('/api/v1/rkpdes/' + _id);
            return $http({
                method: 'get',
                url: '/api/v1/lokasi-program/' + _id,
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

        update: function (inputData) {
            return $http({
                method: 'PUT',
                url: '/api/v1/rkpdes/' + inputData._id,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: $.param(inputData)
            });
        },

        destroy: function (_id) {
            //return $http.delete('/api/v1/rkpdes/' + _id);
            return $http({
                method: 'delete',
                url: '/api/v1/rkpdes/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        kunci: function (term) {
            //return $http.delete('/api/v1/rkpdes/' + _id);
            return $http({
                method: 'post',
                url: '/api/v1/set-rkpdes-program/',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(term)
            });
        }
    }
}
])
;
