app.controller('DashboardBackCtrl', ['$scope', '$location', '$stateParams', 'dashboard_back', function ($scope, $location, $stateParams, dashboard_back) {

    //Begin Chart
    $scope.d = [[1, 6.5], [2, 6.5], [3, 7], [4, 8], [5, 7.5], [6, 7], [7, 6.8], [8, 7], [9, 7.2], [10, 7], [11, 6.8], [12, 7]];
    $scope.d0_1 = [[0, 7], [1, 6.5], [2, 12.5], [3, 7], [4, 9], [5, 6], [6, 11], [7, 6.5], [8, 8], [9, 7]];
    $scope.d0_2 = [[0, 4], [1, 4.5], [2, 7], [3, 4.5], [4, 3], [5, 3.5], [6, 6], [7, 3], [8, 4], [9, 3]];
    $scope.d1_1 = [[10, 120], [20, 70], [30, 70], [40, 60]];
    $scope.d1_2 = [[10, 50], [20, 60], [30, 90], [40, 35]];
    $scope.d1_3 = [[10, 80], [20, 40], [30, 30], [40, 20]];
    $scope.d2 = [];

    for (var i = 0; i < 20; ++i) {
        $scope.d2.push([i, Math.sin(i)]);
    }

    $scope.d3 = [
        {label: "iPhone5S", data: 40},
        {label: "iPad Mini", data: 10},
        {label: "iPad Mini Retina", data: 20},
        {label: "iPhone4S", data: 12},
        {label: "iPad Air", data: 18}
    ];

    $scope.refreshData = function () {
        $scope.d0_1 = $scope.d0_2;
    };

    $scope.getRandomData = function () {
        var data = [],
            totalPoints = 150;
        if (data.length > 0)
            data = data.slice(1);
        while (data.length < totalPoints) {
            var prev = data.length > 0 ? data[data.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;
            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }
            data.push(y);
        }
        // Zip the generated y values with the x values
        var res = [];
        for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]])
        }
        return res;
    }

    $scope.d4 = $scope.getRandomData();
    //End Chart

    //Disable Controller Aksi
    $scope.disAksi = {
        btnDetail: false,
        btnEdit: false,
        btnDelete: false
    };

    $scope.jumlah = {};
    $scope.jumlah.program = 0;
    $scope.jumlah.pendapatan = 0;
    $scope.jumlah.belanja = 0;
    $scope.jumlah.pembiayaan = 0;

    //Disable Controller Eksekusi
    $scope.btnEksekusi = false;

    //Enable or Disable Contoller Umum
    $scope.disConUmum = function (opt) {
        if (opt == true) { //Disable
            $scope.disUtama = {
                btnAdd: true,
                btnRefresh: true,
                txtCari: true,
                btnCari: true,
                btnPagging: true

            };
        } else { //Enable
            $scope.disUtama = {
                btnAdd: false,
                btnRefresh: false,
                txtCari: false,
                btnCari: false,
                btnPagging: false
            };
        }
    };

    //Enable or Disable controller Aksi
    $scope.disConAksi = function (opt) {
        if (opt == true) { //Disable
            $scope.disAksi = {
                btnDetail: true,
                btnEdit: true,
                btnDelete: true
            };
        } else { //Enable
            $scope.disAksi = {
                btnDetail: false,
                btnEdit: false,
                btnDelete: false
            };
        }
    };

    //==========RPJM Desa
    //siapkan scope pagination data dan pencarian data
    $scope.user_main = {
        page: 1
    };

    //Disable Controller Umum
    $scope.disUtama = {
        btnAdd: true,
        btnRefresh: true,
        txtCari: true,
        btnCari: true,
        btnPagging: true
    };

    //Navigasi halaman terakhir
    $scope.user_lastPage = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //Set Current page to the last page
        $scope.user_main.page = $scope.user_last_page;

        //Get data
        $scope.user_getData();
    };

    //navigasi halaman selanjutnya
    $scope.user_nextPage = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 < halaman terakhir
        if ($scope.user_main.page < $scope.user_last_page) {

            //halaman saat ini ditambah increment++
            $scope.user_main.page++
        }

        //panggil ajax data
        $scope.user_getData();
    };

    //navigasi halaman sebelumnya
    $scope.user_previousPage = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 > 1
        if ($scope.user_main.page > 1) {
            //page dikurangi decrement --
            $scope.user_main.page--
        }

        //panggil ajax data
        $scope.user_getData();
    };

    //Navigasi halaman pertama
    $scope.user_firstPage = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.user_main.page = 1;

        //Get data
        $scope.user_getData()
    };

    dashboard_back.getJumlahDokumen()
        .success(function (data1) {
            $scope.jumlah.program = data1.program;
            $scope.jumlah.pendapatan = data1.dpa_pendapatan;
            $scope.jumlah.belanja = data1.dpa_belanja;
            $scope.jumlah.pembiayaan = data1.dpa_pembiayaan;
        })

}]);