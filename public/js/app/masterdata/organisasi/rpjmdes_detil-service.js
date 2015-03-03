// A RESTful factory for retreiving rpjmdes_detil from 'rpjmdes_detil.json'
app.factory('rpjmdes_detil', ['$http', function ($http) {
    return {
        setProgram: function (param) {
            return $http({
                method: 'post',
                url: '/api/v1/set-rpjmdes-program',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(param)
            })
        },
        getLokasi: function (rpjmdes_id, organisasi_id) {
            return $http({
                method: 'get',
                url: '/api/v1/lokasi-program-by-desa/' + rpjmdes_id + '/' + organisasi_id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getDetil: function (_id) {
            return $http({
                method: 'get',
                url: '/api/v1/rpjmdes-program/' + _id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            })
        }
    }
}]);