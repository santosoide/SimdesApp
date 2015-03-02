// A RESTful factory for retreiving dashboard_back from 'dashboard_back.json'
app.factory('dashboard_back', ['$http', function ($http) {
    return {

        getJumlahDokumen: function () {
            //return $http.get('/api/v1/rpjmdes?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/backoffice/dashboard/get-jumlah-dokumen',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        }
    }
}]);