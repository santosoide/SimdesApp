app.controller('modCetakRKA', ['$scope', '$modalInstance', 'menu', function ($scope, $modalInstance, menu) {

    //Inisialisasi variabel
    $scope.menu = menu;

    //Jika diklik batal
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('RKABelanjaCtrl', ['$scope', 'rkabelanja', '$modal', '$stateParams', function ($scope, rkabelanja, $modal) {

    $scope.cetakData = function () {
        var modalInstance = $modal.open({
            templateUrl: 'modCetak.html',
            controller: 'modCetakRKA',
            backdrop: 'static',
            size: '',
            resolve: {
                menu: function () {
                    return 'rka';
                }
            }
        })
    };

    $scope.inputData = {};

    $scope.alert1 = false;
    $scope.alert2 = false;
    $scope.alert3 = false;

    //Disable Combo Kelompok
    $scope.loadKelompok = true;
    $scope.loadJenis = true;
    $scope.loadObyek = true;

    $scope.objKelompok = {};
    $scope.objJenis = {};
    $scope.objObyek = {};
    $scope.objRincian = {};

    // siapkan scope pagination data dan pencarian data
    $scope.main = {
        page: 1,
        term: ''
    };

    //Init loading
    $scope.isFirstLoading = true;
    $scope.isFirstLoaded = false;

    // hidden element
    $scope.formHidden = {
        list: '',
        alert: 'hidden',
        validation: 'hidden'
    };

    //Disable Control Umum
    $scope.disUtama = {
        btnAdd: true,
        btnRefresh: true,
        txtCari: true,
        btnCari: true,
        btnPagging: true
    };

    //Disable Control Aksi
    $scope.disAksi = {
        btnDetail: false,
        btnEdit: false,
        btnDelete: false
    };

    //Disable Control Eksekusi
    $scope.btnEksekusi = false;

    // Class Alert
    $scope.alertset = {
        class: 'success',
        msg: {}
    };

    //init get data
    rkabelanja.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            //Hide loading
            $scope.isFirstLoading = false;
            $scope.isFirstLoaded = true;

            // result data
            $scope.rkabelanja = data.data;

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

            //Disable All Controller
            $scope.disConAksi(false);
            $scope.disConUmum(false)
        })
        .error(function (data) {
            $scope.done();
            $scope.redirect(data);
        });

    function findWithAttr(array, attr, value) {
        for (var i = 0; i < array.length; i += 1) {
            if (array[i][attr] === value) {
                return i;
            }
        }
    }

// refresh data
    $scope.setDelay = function () {
        // set timeout 3 seconds
        window.setTimeout(function () {
            $scope.$apply(function () {
                if ($scope.formHidden.alert == 'hidden') {
                    return false;
                }
                $scope.formHidden.alert = "hidden";
            });
        }, 5000);
    };

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

// Enable or Disable Aksi controller
    $scope.disConAksi = function (opt) {
        if (opt == true) { //Disable Controller
            $scope.disAksi = {
                btnDetail: true,
                btnEdit: true,
                btnDelete: true
            };
        } else { //Enable controller
            $scope.disAksi = {
                btnDetail: false,
                btnEdit: false,
                btnDelete: false
            };
        }
    };

// get data
    $scope.getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        rkabelanja.get($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.rkabelanja = data.data;

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
                $scope.disConAksi(false);
            })
            .error(function (data) {
                $scope.done();
                $scope.redirect(data);
            })
    };

    //UnSet RKA
    $scope.rka = function (id) {
        //Close Alert
        $scope.closeMe();
        //Start Ajax Loading
        $scope.start();
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.inputData._id = id;
        $scope.inputData.is_rka = 0;
        $scope.inputData._token = $scope.csrf;
        rkabelanja.setrka($scope.inputData)
            .success(function (data) {
                if (data.success == true) {
                    $scope.alertset = {
                        class: 'success'
                    };
                    // set delay
                    $scope.setDelay(1);
                } else {
                    $scope.alertset = {
                        class: 'danger'
                    };

                }
                $scope.refreshData();
                $scope.formHidden = {
                    list: '',
                    alert: '',
                    add: 'hidden',
                    edit: 'hidden'
                };
                //Set Alert message
                $scope.alertset.msg = data.message;
                //Scroll to up
                $scope.sup();
                //Start Ajax Loading
                $scope.done();
                //Disable All Controller
                $scope.disConUmum(false);
                $scope.disConAksi(false);
            })
            .error(function (data) {
                $scope.done();
                $scope.redirect(data);
            })
    };

    //Set DPA
    $scope.dpa = function (id) {
        //Close Alert
        $scope.closeMe();
        //Start Ajax Loading
        $scope.start();
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.inputData._id = id;
        $scope.inputData.is_dpa = 1;
        $scope.inputData._token = $scope.csrf;
        rkabelanja.setdpa($scope.inputData)
            .success(function (data) {
                if (data.success == true) {
                    $scope.alertset = {
                        class: 'success'
                    };
                    // set delay
                    $scope.setDelay(1);
                } else {
                    $scope.alertset = {
                        class: 'danger'
                    };
                }
                $scope.refreshData();
                $scope.formHidden = {
                    list: '',
                    alert: '',
                    add: 'hidden',
                    edit: 'hidden'
                };
                //Set Alert message
                $scope.alertset.msg = data.message;
                //Scroll to up
                $scope.sup();
                //Start Ajax Loading
                $scope.done();
                //Disable All Controller
                $scope.disConUmum(false);
                $scope.disConAksi(false);
            })
            .error(function (data) {
                $scope.done();
                $scope.redirect(data);
            })
    };
//Navigasi halaman terakhir
    $scope.lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.main.page = $scope.last_page;

        $scope.getData();
    };

//navigasi halaman selanjutnya
    $scope.nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 < halaman terakhir
        if ($scope.main.page < $scope.last_page) {
            // halaman saat ini ditambah increment++
            $scope.main.page++
        }
        // panggil ajax data
        $scope.getData();
    };

//navigasi halaman sebelumnya
    $scope.previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 > 1
        if ($scope.main.page > 1) {
            // page dikurangi decrement --
            $scope.main.page--
        }
        // panggil ajax data
        $scope.getData();
    };

//Navigasi halaman pertama
    $scope.firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.main.page = 1;

        $scope.getData()
    };

// refresh data
    $scope.refreshData = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // panggil ajax data
        $scope.getData();
    };

//Cari Data
    $scope.cari = function () {
        //Close Alert
        $scope.closeMe();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.main.page = 1;
        $scope.getData();

    };

    //Close Alert
    $scope.closeMe = function () {
        $scope.formHidden.alert = 'hidden';
    }
}]);