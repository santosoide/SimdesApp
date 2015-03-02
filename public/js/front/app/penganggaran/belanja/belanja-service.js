app.factory('belanja', ['$http', function ($http) {
    return {

        simpanpelaksanaan: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/v1/pelaksanaan-belanja',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },
        
        setrka: function(inputData){
            //return $http.post('/api/v1/set-rka-belanja/');
            return $http({
                method: 'POST',
                url: '/api/v1/set-rka-belanja',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        getsshdetil: function (_id) {
            return $http({
                method: 'get',
                url: '/api/v1/standar-satuan-harga/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        getssh: function (page, term) {
            //return $http.get('/api/v1/standar-satuan-harga?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/standar-satuan-harga?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        getrkpdes: function(){
            return $http.get('/api/v1/get-list-rkpdes')
        },

        //Get Akun
        getkelompok: function () {
            return $http.get('/api/v1/get-list-kelompok/2')
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
            //return $http.get('/api/v1/belanja?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/belanja?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
            });
        },

        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/v1/belanja',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },
        //Tampil Data
        show: function (_id) {
            //return $http.get('/api/v1/belanja/' + _id);
            return $http({
                method: 'get',
                url: '/api/v1/belanja/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
            });
        },

        update: function (inputData) {
            return $http({
                method: 'PUT',
                url: '/api/v1/belanja/' + inputData._id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        // destroy a comment
        destroy: function (_id) {
            //return $http.delete('/api/v1/belanja/' + _id);
            return $http({
                method: 'delete',
                url: '/api/v1/belanja/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
            });
        }
    }
}]);
