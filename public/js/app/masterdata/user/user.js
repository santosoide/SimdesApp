app.controller('UserCtrl', ['$scope', 'user', '$stateParams', function ($scope, user) {

    // siapkan scope pagination data dan pencarian data
    $scope.main = {
        page: 1,
        term: ''
    };

    //Init loading
    $scope.isFirstLoading = true;
    $scope.isFirstLoaded = false;

    // Disable Control Umum
    $scope.disUtama = {
        btnRefresh: true,
        txtCari: true,
        btnCari: true,
        btnPagging: true
    };

    // init get data
    user.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            //Hide loading
            $scope.isFirstLoading = false;
            $scope.isFirstLoaded = true;

            // result data
            $scope.user = data.data;

            // set the current page
            $scope.current_page = data.current_page;

            // set the last page
            $scope.last_page = data.last_page;

            // set the data from
            $scope.from = data.from;

            // set the data until to
            $scope.to = data.to;

            // set the total result data
            $scope.total = data.total;

            $scope.disConUmum(false)
        })
        .error(function (data) {
            $scope.redirect(data);
        });

    // get data
    $scope.getData = function () {
        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);

        user.get($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.user = data.data;

                // set the current page
                $scope.current_page = data.current_page;

                // set the last page
                $scope.last_page = data.last_page;

                // set the data from
                $scope.from = data.from;

                // set the data until to
                $scope.to = data.to;

                // set the total result data
                $scope.total = data.total;

                $scope.done();

                //Disable All Controller
                $scope.disConUmum(false);
            })
            .error(function (data) {
                $scope.redirect(data);
            });
    };

    // Navigasi halaman terakhir
    $scope.lastPage = function () {
        $scope.main.page = $scope.last_page

        $scope.getData()
    };

    // navigasi halaman selanjutnya
    $scope.nextPage = function () {
        // jika page = 1 < halaman terakhir
        if ($scope.main.page < $scope.last_page) {
            // halaman saat ini ditambah increment++
            $scope.main.page++
        }
        // panggil ajax data
        $scope.getData();
    };

    // navigasi halaman sebelumnya
    $scope.previousPage = function () {
        // jika page = 1 > 1
        if ($scope.main.page > 1) {
            // page dikurangi decrement --
            $scope.main.page--
        }
        // panggil ajax data
        $scope.getData();
    };

    // Navigasi halaman pertama
    $scope.firstPage = function () {
        $scope.main.page = 1

        $scope.getData()
    };

    // refresh data
    $scope.refreshData = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        // reset page  = 1
        $scope.main.page = 1;
        // reset term = ''
        $scope.main.term = '';
        //panggil ajax data
        $scope.getData();
    };

    // Cari Data
    $scope.cari = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.main.page = 1;
        $scope.getData();
    };

    // Enable or Disable Contoller Umum
    $scope.disConUmum = function (opt) {
        if (opt == true) { //Disable
            $scope.disUtama = {
                btnRefresh: true,
                txtCari: true,
                btnCari: true,
                btnPagging: true

            };
        } else { //Enable
            $scope.disUtama = {
                btnRefresh: false,
                txtCari: false,
                btnCari: false,
                btnPagging: false
            };
        }
    };
}]);


