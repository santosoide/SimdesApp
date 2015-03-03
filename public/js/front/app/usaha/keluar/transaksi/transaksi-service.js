app.factory('transaksi_keluar', ['$http', function ($http) {
    return {

        //Get Belanja
        getBelanja: function () {
            return $http.get('/api/v1/get-list-belanja')
        },

        //Get Pejabat Desa
        getPejabatDesa: function () {
            return $http.get('/api/v1/get-list-pejabat-desa')
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


        getSSH: function (page, term) {
            //return $http.get('/api/v1/standar-satuan-harga?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/get-modal-standar-satuan-harga?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        getSSHDetil: function (_id) {
            return $http({
                method: 'get',
                url: '/api/v1/standar-satuan-harga/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            //return $http.get('/api/v1/transaksi-belanja?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/transaksi-belanja?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/v1/transaksi-belanja',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },
        //Tampil Data
        show: function (_id) {
            //return $http.get('/api/v1/transaksi-belanja/' + _id);
            return $http({
                method: 'get',
                url: '/api/v1/transaksi-belanja/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        update: function (inputData) {
            return $http({
                method: 'PUT',
                url: '/api/v1/transaksi-belanja/'+ inputData._id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        // destroy a comment
        destroy: function (_id) {
            //return $http.delete('/api/v1/transaksi-belanja/' + _id);
            return $http({
                method: 'delete',
                url: '/api/v1/transaksi-belanja/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        }
    }
}]);
