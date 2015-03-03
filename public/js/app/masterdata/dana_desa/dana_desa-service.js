app.factory('dana_desa', ['$http', function ($http) {
    return {

        getOrganisasi: function (page, term) {
            return $http({
                method: 'get',
                url: '/api/v1/backoffice/get-modal-organisasi?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        getDetilOrganisasi: function (_id) {
            return $http({
                method: 'get',
                url: '/api/v1/backoffice/organisasi/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        getsumberdana: function () {
            return $http.get('/api/v1/get-list-sumber-dana')
        },


        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            return $http({
                method: 'get',
                url: '/api/v1/dana-desa?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        //Simpan data
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/v1/dana-desa',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },
        //Tampil Data
        show: function (_id) {
            return $http({
                method: 'get',
                url: '/api/v1/dana-desa/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },


        update: function (inputData) {
            return $http({
                method: 'PUT',
                url: '/api/v1/dana-desa/' + inputData._id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        // destroy a comment
        destroy: function (_id) {
            return $http({
                method: 'delete',
                url: '/api/v1/dana-desa/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        }
    }
}]);
