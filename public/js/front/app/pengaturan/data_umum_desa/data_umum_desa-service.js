// A RESTful factory for retreiving organisasi from 'organisasi.json'
app.factory('dus', ['$http', function ($http, $httpProvider) {
    return {

        getkecamatan: function () {
        return $http.get('/api/v1/get-list-kecamatan');
        },

        show: function () {
            return $http({
                method: 'get',
                url: '/api/v1/backoffice/data-umum-desa/',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },

        update: function (inputData) {
            return $http({
                method: 'PUT',
                url: '/api/v1/backoffice/organisasi/' + inputData._id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(inputData)
            });
        }
    }
}]);