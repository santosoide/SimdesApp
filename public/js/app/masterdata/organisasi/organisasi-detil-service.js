// A RESTful factory for retreiving organisasi_detil from 'organisasi_detil.json'
app.factory('organisasi_detil', ['$http', function ($http) {
    return {

        // get data dengan pagination dan pencarian data
        getVisi: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/get-visi-desa/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        getMisi: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/get-misi-desa/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        getProgram: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/get-program-desa/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getProgramFinal: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/find-finish-rpjmdes-program/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getProgramProses: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/find-not-finish-rpjmdes-program/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getProgramDetil: function (id) {
            //return $http.get('/api/v1/rpjmdes?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/rpjmdes-program/' + id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        setProgram: function (param) {
            return $http({
                method: 'post',
                url: '/api/v1/set-rpjmdes-program',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(param)
            })
        },

        getRKPDes: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/get-rkpdes-desa/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        setRKPDes: function (term) {
            //return $http.delete('/api/v1/rkpdes/' + _id);
            return $http({
                method: 'post',
                url: '/api/v1/set-rkpdes-program/',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(term)
            });
        },

        getPendapatan: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/get-pendapatan-desa/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getPendapatanFinal: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/find-finish-dpa-pendapatan/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getPendapatanProses: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/find-dpa-pendapatan/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        setPendapatanVerifikasi: function (param) {
            return $http({
                method: 'post',
                url: '/api/v1/set-finish-pendapatan',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(param)
            })
        },

        getBelanja: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/get-belanja-desa/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getBelanjaFinal: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/find-finish-dpa-belanja/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getBelanjaProses: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/find-dpa-belanja/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        setBelanjaVerifikasi: function (param) {
            return $http({
                method: 'post',
                url: '/api/v1/set-finish-belanja',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(param)
            })
        },

        getPembiayaan: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/get-pembiayaan-desa/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getPembiayaanFinal: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/find-finish-dpa-pembiayaan/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getPembiayaanProses: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/find-dpa-pembiayaan/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        setPembiayaanVerifikasi: function (param) {
            return $http({
                method: 'post',
                url: '/api/v1/set-finish-pembiayaan',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(param)
            })
        },

        getTranPendapatan: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/get-transaksi-pendapatan-desa/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        getTranBelanja: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/get-transaksi-belanja-desa/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getDetilTransaksiBelanja: function (_id) {
            //return $http.get('/api/v1/transaksi-belanja/' + _id);
            return $http({
                method: 'get',
                url: '/api/v1/transaksi-belanja/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getPejabatDesa: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/list-pejabat-desa/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getPenggunaDesa: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/backoffice/list-user-desa/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getDanaDesa: function (_id, page) {
            return $http({
                method: 'get',
                url: '/api/v1/list-dana-desa/' + _id + '?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        }
    }
}]);