app.factory('pembiayaan', ['$http', function ($http) {
    return {
        simpanpelaksanaan: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/v1/pelaksanaan-pembiayaan',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },
        setrka: function(inputData){
            //return $http.post('/api/v1/set-rka-pembiayaan/');
            return $http({
                method: 'POST',
                url: '/api/v1/set-rka-pembiayaan',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        //Get Akun
        getkelompok: function () {
            return $http.get('/api/v1/get-list-kelompok/3')
        },

        getjenis: function (id) {
            return $http.get('/api/v1/get-list-jenis/' + id);
        },

        getobyek: function (id) {
            return $http.get('/api/v1/get-list-obyek/' + id);
        },

        getrincian: function (id) {
            return $http.get('/api/v1/get-list-rincian/' + id)
        },

        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            //return $http.get('/api/v1/pembiayaan?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/pembiayaan?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
            });
        },

        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/v1/pembiayaan',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },
        //Tampil Data
        show: function (_id) {
            //return $http.get('/api/v1/pembiayaan/' + _id);
            return $http({
                method: 'get',
                url: '/api/v1/pembiayaan/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
            });
        },

        update: function (inputData) {
            return $http({
                method: 'PUT',
                url: '/api/v1/pembiayaan/' + inputData._id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        // destroy a comment
        destroy: function (_id) {
            //return $http.delete('/api/v1/pembiayaan/' + _id);
            return $http({
                method: 'delete',
                url: '/api/v1/pembiayaan/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
            });
        }
    }
}]);
