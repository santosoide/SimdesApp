app.controller('DashboardFrontCtrl', ['$scope', '$location', '$stateParams', 'dashboard_front', function ($scope, $location, $stateParams, dashboard_front) {

    //Begin Chart
    $scope.d = [ [1,6.5],[2,6.5],[3,7],[4,8],[5,7.5],[6,7],[7,6.8],[8,7],[9,7.2],[10,7],[11,6.8],[12,7] ];
    $scope.d0_1 = [ [0,7],[1,6.5],[2,12.5],[3,7],[4,9],[5,6],[6,11],[7,6.5],[8,8],[9,7] ];
    $scope.d0_2 = [ [0,4],[1,4.5],[2,7],[3,4.5],[4,3],[5,3.5],[6,6],[7,3],[8,4],[9,3] ];
    $scope.d1_1 = [ [10, 120], [20, 70], [30, 70], [40, 60] ];
    $scope.d1_2 = [ [10, 50],  [20, 60], [30, 90],  [40, 35] ];
    $scope.d1_3 = [ [10, 80],  [20, 40], [30, 30],  [40, 20] ];
    $scope.d2 = [];
    for (var i = 0; i < 20; ++i) {
        $scope.d2.push([i, Math.sin(i)]);
    }
    $scope.d3 = [
        { label: "iPhone5S", data: 40 },
        { label: "iPad Mini", data: 10 },
        { label: "iPad Mini Retina", data: 20 },
        { label: "iPhone4S", data: 12 },
        { label: "iPad Air", data: 18 }
    ];
    $scope.refreshData = function(){
        $scope.d0_1 = $scope.d0_2;
    };
    $scope.getRandomData = function() {
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
    };
    $scope.d4 = $scope.getRandomData();
    //End Chart

    $scope.jumlah = {};
    $scope.jumlah = {
        program: 0,
        pendapatan: 0,
        belanja: 0,
        pembiayaan: 0,
        transaksi_belanja: 0,
        transaksi_pendapatan: 0,
        rka_pendapatan: 0,
        rka_belanja: 0,
        rka_pembiayaan: 0,
        dpa_pendapatan: 0,
        dpa_belanja: 0,
        dpa_pembiayaan: 0
    };

    //Disable Controller Aksi
    $scope.disAksi = {
        btnDetail: false,
        btnEdit: false,
        btnDelete: false
    };

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

    //==========Visi
    //siapkan scope pagination data dan pencarian data
    $scope.visi_main = {
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

    dashboard_front.getJumlahDokumen()
        .success(function (data1) {
            $scope.jumlah.program = data1.program;
            $scope.jumlah.pendapatan = data1.pendapatan;
            $scope.jumlah.belanja = data1.belanja;
            $scope.jumlah.pembiayaan = data1.pembiayaan;
            $scope.jumlah.transaksi_belanja = data1.transaksi_belanja;
            $scope.jumlah.transaksi_pendapatan = data1.transaksi_pendapatan;
            $scope.jumlah.rka_pendapatan = data1.rka_pembiayaan;
            $scope.jumlah.rka_belanja = data1.rka_belanja;
            $scope.jumlah.rka_pembiayaan = data1.rka_pembiayaan;
            $scope.jumlah.dpa_pendapatan = data1.dpa_pembiayaan;
            $scope.jumlah.dpa_belanja = data1.dpa_belanja;
            $scope.jumlah.dpa_pembiayaan = data1.dpa_pembiayaan;
        });

    //get data
    $scope.visi_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        dashboard_front.getVisi($scope.visi_main.page)
            .success(function (data) {
                //result data
                $scope.visi = data.data;

                //set the current page
                $scope.visi_current_page = data.current_page;

                //set the last page
                $scope.visi_last_page = data.last_page;

                //set the data from
                $scope.visi_from = data.from;

                //set the data until to
                $scope.visi_to = data.to;

                //set the total result data
                $scope.visi_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);

                //Stop Loading
                $scope.done();
            })
            //Error handling
            .error(function (data) {
                $scope.redirect(data);
            });
    };

    //visi_refresh data
    $scope.visi_refreshData = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //panggil ajax data
        $scope.visi_getData();
    };

    //Navigasi halaman terakhir
    $scope.visi_lastPage = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //Set Current page to the last page
        $scope.visi_main.page = $scope.visi_last_page;

        //Get data
        $scope.visi_getData();
    };

    //navigasi halaman selanjutnya
    $scope.visi_nextPage = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 < halaman terakhir
        if ($scope.visi_main.page < $scope.visi_last_page) {

            //halaman saat ini ditambah increment++
            $scope.visi_main.page++
        }

        //panggil ajax data
        $scope.visi_getData();
    };

    //navigasi halaman sebelumnya
    $scope.visi_previousPage = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 > 1
        if ($scope.visi_main.page > 1) {
            //page dikurangi decrement --
            $scope.visi_main.page--
        }

        //panggil ajax data
        $scope.visi_getData();
    };

    //Navigasi halaman pertama
    $scope.visi_firstPage = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.visi_main.page = 1;

        //Get data
        $scope.visi_getData()
    };

    //==========Misi
    //siapkan scope pagination data dan pencarian data
    $scope.misi_main = {
        page: 1
    };

    //Disable Control Umum
    $scope.disUtama = {
        btnAdd: true,
        btnRefresh: true,
        txtCari: true,
        btnCari: true,
        btnPagging: true
    };

    //get data
    $scope.misi_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        dashboard_front.getMisi($scope.misi_main.page)
            .success(function (data) {
                //result data
                $scope.misi = data.data;

                //set the current page
                $scope.misi_current_page = data.current_page;

                //set the last page
                $scope.misi_last_page = data.last_page;

                //set the data from
                $scope.misi_from = data.from;

                //set the data until to
                $scope.misi_to = data.to;

                //set the total result data
                $scope.misi_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);

                //Stop loading
                $scope.done();
            })

            //Error handling
            .error(function (data) {
                $scope.redirect(data);
            });
    };

    //misi_refresh data
    $scope.misi_refreshData = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //panggil ajax data
        $scope.misi_getData();
    };

    //Navigasi halaman terakhir
    $scope.misi_lastPage = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //Set current page to the last page
        $scope.misi_main.page = $scope.misi_last_page;

        //Get data
        $scope.misi_getData();
    };

    //navigasi halaman selanjutnya
    $scope.misi_nextPage = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 < halaman terakhir
        if ($scope.misi_main.page < $scope.visi_last_page) {

            //halaman saat ini ditambah increment++
            $scope.misi_main.page++
        }
        //panggil ajax data
        $scope.misi_getData();
    };

    //navigasi halaman sebelumnya
    $scope.misi_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 > 1
        if ($scope.misi_main.page > 1) {
            //page dikurangi decrement --
            $scope.misi_main.page--
        }
        //panggil ajax data
        $scope.misi_getData();
    };

    //Navigasi halaman pertama
    $scope.misi_firstPage = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.misi_main.page = 1;

        $scope.misi_getData()
    };


    //====================RPJM Desa
    //siapkan scope pagination data dan pencarian data
    $scope.rpjmdes_main = {
        page: 1
    };

    //Disable Control Umum
    $scope.disUtama = {
        btnAdd: true,
        btnRefresh: true,
        txtCari: true,
        btnCari: true,
        btnPagging: true
    };

    //get data
    $scope.rpjmdes_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        dashboard_front.getRPJMDes($scope.rpjmdes_main.page)
            .success(function (data) {
                //result data
                $scope.rpjmdes = data.data;

                //set the current page
                $scope.rpjmdes_current_page = data.current_page;

                //set the last page
                $scope.rpjmdes_last_page = data.last_page;

                //set the data from
                $scope.rpjmdes_from = data.from;

                //set the data until to
                $scope.rpjmdes_to = data.to;

                //set the total result data
                $scope.rpjmdes_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);
                $scope.done();
            })
            .error(function (data) {
                $scope.redirect(data);
                $scope.done();
            });
    };

    //rpjmdes_refresh data
    $scope.rpjmdes_refreshData = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //panggil ajax data
        $scope.rpjmdes_getData();
    };

    //Navigasi halaman terakhir
    $scope.rpjmdes_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.rpjmdes_main.page = $scope.rpjmdes_last_page;

        $scope.rpjmdes_getData();
    };

    //navigasi halaman selanjutnya
    $scope.rpjmdes_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 < halaman terakhir
        if ($scope.rpjmdes_main.page < $scope.visi_last_page) {
            //halaman saat ini ditambah increment++
            $scope.rpjmdes_main.page++
        }
        //panggil ajax data
        $scope.rpjmdes_getData();
    };

    //navigasi halaman sebelumnya
    $scope.rpjmdes_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 > 1
        if ($scope.rpjmdes_main.page > 1) {
            //page dikurangi decrement --
            $scope.rpjmdes_main.page--
        }
        //panggil ajax data
        $scope.rpjmdes_getData();
    };

    //Navigasi halaman pertama
    $scope.rpjmdes_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.rpjmdes_main.page = 1;

        $scope.rpjmdes_getData()
    };


    //=====================RKP Desa
    //siapkan scope pagination data dan pencarian data
    $scope.rkpdes_main = {
        page: 1
    };

    //Disable Control Umum
    $scope.disUtama = {
        btnAdd: true,
        btnRefresh: true,
        txtCari: true,
        btnCari: true,
        btnPagging: true
    };

    //get data
    $scope.rkpdes_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        dashboard_front.getRKPDes($scope.rkpdes_main.page)
            .success(function (data) {
                //result data
                $scope.rkpdes = data.data;

                //set the current page
                $scope.rkpdes_current_page = data.current_page;

                //set the last page
                $scope.rkpdes_last_page = data.last_page;

                //set the data from
                $scope.rkpdes_from = data.from;

                //set the data until to
                $scope.rkpdes_to = data.to;

                //set the total result data
                $scope.rkpdes_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);
                $scope.done();
            })
            .error(function (data) {
                $scope.redirect(data);
            });
    };

    //rkpdes_refresh data
    $scope.rkpdes_refreshData = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //panggil ajax data
        $scope.rkpdes_getData();
    };

    //Navigasi halaman terakhir
    $scope.rkpdes_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.rkpdes_main.page = $scope.rkpdes_last_page;

        $scope.rkpdes_getData();
    };

    //navigasi halaman selanjutnya
    $scope.rkpdes_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 < halaman terakhir
        if ($scope.rkpdes_main.page < $scope.visi_last_page) {
            //halaman saat ini ditambah increment++
            $scope.rkpdes_main.page++
        }
        //panggil ajax data
        $scope.rkpdes_getData();
    };

    //navigasi halaman sebelumnya
    $scope.rkpdes_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 > 1
        if ($scope.rkpdes_main.page > 1) {
            //page dikurangi decrement --
            $scope.rkpdes_main.page--
        }
        //panggil ajax data
        $scope.rkpdes_getData();
    };

    //Navigasi halaman pertama
    $scope.rkpdes_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.rkpdes_main.page = 1;

        $scope.rkpdes_getData()
    };


    //=====================================Pendapatan
    //siapkan scope pagination data dan pencarian data
    $scope.pendapatan_main = {
        page: 1
    };

    //Disable Control Umum
    $scope.disUtama = {
        btnAdd: true,
        btnRefresh: true,
        txtCari: true,
        btnCari: true,
        btnPagging: true
    };

    //get data
    $scope.pendapatan_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        dashboard_front.getPendapatan($scope.pendapatan_main.page)
            .success(function (data) {
                //result data
                $scope.pendapatan = data.data;

                //set the current page
                $scope.pendapatan_current_page = data.current_page;

                //set the last page
                $scope.pendapatan_last_page = data.last_page;

                //set the data from
                $scope.pendapatan_from = data.from;

                //set the data until to
                $scope.pendapatan_to = data.to;

                //set the total result data
                $scope.pendapatan_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);
                $scope.done();
            })
            .error(function (data) {
                $scope.redirect(data);
                $scope.done();
            });
    };

    //pendapatan_refresh data
    $scope.pendapatan_refreshData = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //panggil ajax data
        $scope.pendapatan_getData();
    };

    //Navigasi halaman terakhir
    $scope.pendapatan_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.pendapatan_main.page = $scope.pendapatan_last_page;

        $scope.pendapatan_getData();
    };

    //navigasi halaman selanjutnya
    $scope.pendapatan_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 < halaman terakhir
        if ($scope.pendapatan_main.page < $scope.pendapatan_last_page) {
            //halaman saat ini ditambah increment++
            $scope.pendapatan_main.page++
        }
        //panggil ajax data
        $scope.pendapatan_getData();
    };

    //navigasi halaman sebelumnya
    $scope.pendapatan_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 > 1
        if ($scope.pendapatan_main.page > 1) {
            //page dikurangi decrement --
            $scope.pendapatan_main.page--
        }
        //panggil ajax data
        $scope.pendapatan_getData();
    };

    //Navigasi halaman pertama
    $scope.pendapatan_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.pendapatan_main.page = 1;

        $scope.pendapatan_getData()
    };


    //====================Belanja
    //siapkan scope pagination data dan pencarian data
    $scope.belanja_main = {
        page: 1
    };

    //Disable Control Umum
    $scope.disUtama = {
        btnAdd: true,
        btnRefresh: true,
        txtCari: true,
        btnCari: true,
        btnPagging: true
    };

    //get data
    $scope.belanja_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        dashboard_front.getBelanja($scope.belanja_main.page)
            .success(function (data) {
                //result data
                $scope.belanja = data.data;

                //set the current page
                $scope.belanja_current_page = data.current_page;

                //set the last page
                $scope.belanja_last_page = data.last_page;

                //set the data from
                $scope.belanja_from = data.from;

                //set the data until to
                $scope.belanja_to = data.to;

                //set the total result data
                $scope.belanja_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);
                $scope.done();
            })
            .error(function (data) {
                $scope.redirect(data);
                $scope.done();
            });
    };

    //belanja_refresh data
    $scope.belanja_refreshData = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //panggil ajax data
        $scope.belanja_getData();
    };

    //Navigasi halaman terakhir
    $scope.belanja_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.belanja_main.page = $scope.belanja_last_page;

        $scope.belanja_getData();
    };

    //navigasi halaman selanjutnya
    $scope.belanja_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 < halaman terakhir
        if ($scope.belanja_main.page < $scope.belanja_last_page) {
            //halaman saat ini ditambah increment++
            $scope.belanja_main.page++
        }
        //panggil ajax data
        $scope.belanja_getData();
    };

    //navigasi halaman sebelumnya
    $scope.belanja_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 > 1
        if ($scope.belanja_main.page > 1) {
            //page dikurangi decrement --
            $scope.belanja_main.page--
        }
        //panggil ajax data
        $scope.belanja_getData();
    };

    //Navigasi halaman pertama
    $scope.belanja_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.belanja_main.page = 1;

        $scope.belanja_getData()
    };

    //========================Pembiayaan
    //siapkan scope pagination data dan pencarian data
    $scope.pembiayaan_main = {
        page: 1
    };

    //Disable Control Umum
    $scope.disUtama = {
        btnAdd: true,
        btnRefresh: true,
        txtCari: true,
        btnCari: true,
        btnPagging: true
    };

    //get data
    $scope.pembiayaan_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        dashboard_front.getPembiayaan($scope.pembiayaan_main.page)
            .success(function (data) {
                //result data
                $scope.pembiayaan = data.data;

                //set the current page
                $scope.pembiayaan_current_page = data.current_page;

                //set the last page
                $scope.pembiayaan_last_page = data.last_page;

                //set the data from
                $scope.pembiayaan_from = data.from;

                //set the data until to
                $scope.pembiayaan_to = data.to;

                //set the total result data
                $scope.pembiayaan_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);
                $scope.done();
            })
            .error(function (data) {
                $scope.redirect(data);
                $scope.done();
            });
    };

    //pembiayaan_refresh data
    $scope.pembiayaan_refreshData = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //panggil ajax data
        $scope.pembiayaan_getData();
    };

    //Navigasi halaman terakhir
    $scope.pembiayaan_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.pembiayaan_main.page = $scope.pembiayaan_last_page;

        $scope.pembiayaan_getData();
    };

    //navigasi halaman selanjutnya
    $scope.pembiayaan_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 < halaman terakhir
        if ($scope.pembiayaan_main.page < $scope.pembiayaan_last_page) {
            //halaman saat ini ditambah increment++
            $scope.pembiayaan_main.page++
        }
        //panggil ajax data
        $scope.pembiayaan_getData();
    };

    //navigasi halaman sebelumnya
    $scope.pembiayaan_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 > 1
        if ($scope.pembiayaan_main.page > 1) {
            //page dikurangi decrement --
            $scope.pembiayaan_main.page--
        }
        //panggil ajax data
        $scope.pembiayaan_getData();
    };

    //Navigasi halaman pertama
    $scope.pembiayaan_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.pembiayaan_main.page = 1;

        $scope.pembiayaan_getData()
    };

    //========================Transaksi Pendapatan
    //siapkan scope pagination data dan pencarian data
    $scope.tranpendapatan_main = {
        page: 1
    };

    //Disable Control Umum
    $scope.disUtama = {
        btnAdd: true,
        btnRefresh: true,
        txtCari: true,
        btnCari: true,
        btnPagging: true
    };

    //get data
    $scope.tranpendapatan_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        dashboard_front.getTranPendapatan($scope.tranpendapatan_main.page)
            .success(function (data) {
                //result data
                $scope.tranpendapatan = data.data;

                //set the current page
                $scope.tranpendapatan_current_page = data.current_page;

                //set the last page
                $scope.tranpendapatan_last_page = data.last_page;

                //set the data from
                $scope.tranpendapatan_from = data.from;

                //set the data until to
                $scope.tranpendapatan_to = data.to;

                //set the total result data
                $scope.tranpendapatan_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);
                $scope.done();
            })
            .error(function (data) {
                $scope.redirect(data);
                $scope.done();
            });
    };

    //tranpendapatan_refresh data
    $scope.tranpendapatan_refreshData = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //panggil ajax data
        $scope.tranpendapatan_getData();
    };

    //Navigasi halaman terakhir
    $scope.tranpendapatan_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.tranpendapatan_main.page = $scope.tranpendapatan_last_page;

        $scope.tranpendapatan_getData();
    };

    //navigasi halaman selanjutnya
    $scope.tranpendapatan_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 < halaman terakhir
        if ($scope.tranpendapatan_main.page < $scope.tranpendapatan_last_page) {
            //halaman saat ini ditambah increment++
            $scope.tranpendapatan_main.page++
        }
        //panggil ajax data
        $scope.tranpendapatan_getData();
    };

    //navigasi halaman sebelumnya
    $scope.tranpendapatan_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 > 1
        if ($scope.tranpendapatan_main.page > 1) {
            //page dikurangi decrement --
            $scope.tranpendapatan_main.page--
        }
        //panggil ajax data
        $scope.tranpendapatan_getData();
    };

    //Navigasi halaman pertama
    $scope.tranpendapatan_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.tranpendapatan_main.page = 1;

        $scope.tranpendapatan_getData()
    };

    //========================Transaksi Belanja
    //siapkan scope pagination data dan pencarian data
    $scope.tranbelanja_main = {
        page: 1
    };

    //Disable Control Umum
    $scope.disUtama = {
        btnAdd: true,
        btnRefresh: true,
        txtCari: true,
        btnCari: true,
        btnPagging: true
    };

    //get data
    $scope.tranbelanja_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        dashboard_front.getTranBelanja($scope.tranbelanja_main.page)
            .success(function (data) {
                //result data
                $scope.tranbelanja = data.data;

                //set the current page
                $scope.tranbelanja_current_page = data.current_page;

                //set the last page
                $scope.tranbelanja_last_page = data.last_page;

                //set the data from
                $scope.tranbelanja_from = data.from;

                //set the data until to
                $scope.tranbelanja_to = data.to;

                //set the total result data
                $scope.tranbelanja_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);
                $scope.done();
            })
            .error(function (data) {
                $scope.redirect(data);
                $scope.done();
            });
    };

    //tranbelanja_refresh data
    $scope.tranbelanja_refreshData = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //panggil ajax data
        $scope.tranbelanja_getData();
    };

    //Navigasi halaman terakhir
    $scope.tranbelanja_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.tranbelanja_main.page = $scope.tranbelanja_last_page;

        $scope.tranbelanja_getData();
    };

    //navigasi halaman selanjutnya
    $scope.tranbelanja_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 < halaman terakhir
        if ($scope.tranbelanja_main.page < $scope.tranbelanja_last_page) {
            //halaman saat ini ditambah increment++
            $scope.tranbelanja_main.page++
        }
        //panggil ajax data
        $scope.tranbelanja_getData();
    };

    //navigasi halaman sebelumnya
    $scope.tranbelanja_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 > 1
        if ($scope.tranbelanja_main.page > 1) {
            //page dikurangi decrement --
            $scope.tranbelanja_main.page--
        }
        //panggil ajax data
        $scope.tranbelanja_getData();
    };

    //Navigasi halaman pertama
    $scope.tranbelanja_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.tranbelanja_main.page = 1;

        $scope.tranbelanja_getData()
    };
}]);