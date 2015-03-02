// A RESTful factory for retreiving organisasi from 'organisasi.json'
app.factory('organisasi', ['$http', function ($http, $httpProvider) {
    return {
        getkecamatan: function () {
            return $http.get('/api/v1/get-list-kecamatan');
        },
        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            return $http({
                method: 'get',
                url: '/api/v1/backoffice/organisasi?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        //
        show: function (_id) {
            return $http({
                method: 'get',
                url: '/api/v1/backoffice/organisasi/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        // save a comment (pass in comment data)
        store: function (inputData) {
            return $http({
                method: 'POST',
                url: '/api/v1/backoffice/organisasi',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        update: function (inputData) {
            return $http({
                method: 'PUT',
                url: '/api/v1/backoffice/organisasi/' + inputData._id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        },

        // destroy a comment
        destroy: function (_id) {
            return $http({
                method: 'delete',
                url: '/api/v1/backoffice/organisasi/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        }
    }
}]);