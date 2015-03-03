app.factory('transaksi_masuk', ['$http', function ($http) {
    return {

        //Get Pendapatan
        getPendapatan: function () {
            return $http.get('/api/v1/get-list-pendapatan')
        },

        //Get Pejabat Desa
        getPejabatDesa: function () {
            return $http.get('/api/v1/get-list-pejabat-desa')
        },

        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            //return $http.get('/api/v1/transaksi-pendapatan?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/transaksi-pendapatan?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/v1/transaksi-pendapatan',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },
        //Tampil Data
        show: function (_id) {
            //return $http.get('/api/v1/transaksi-pendapatan/' + _id);
            return $http({
                method: 'get',
                url: '/api/v1/transaksi-pendapatan/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        update: function (inputData) {
            return $http({
                method: 'PUT',
                url: '/api/v1/transaksi-pendapatan/'+ inputData._id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        // destroy a comment
        destroy: function (_id) {
            //return $http.delete('/api/v1/transaksi-pendapatan/' + _id);
            return $http({
                method: 'delete',
                url: '/api/v1/transaksi-pendapatan/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        }
    }
}]);
