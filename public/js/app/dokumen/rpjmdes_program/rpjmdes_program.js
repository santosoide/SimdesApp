app.controller('modDetilRPJMDesProgram', ['$scope', 'rpjmdes_program', '$modalInstance', 'id', function ($scope, rpjmdes_program, $modalInstance, id) {
    $scope.convertToRupiah = function (angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return rupiah.split('', rupiah.length - 1).reverse().join('');
    };
    $scope.detil = {};
    $scope.detil = {
        'pagu_anggaran': 0,
        'harga_satuan': 0
    };
    $scope.id = id;
    $scope.isAjaxLoading = true;
    $scope.isAjaxLoaded = false;
//Enable button
    $scope.process = false;

    rpjmdes_program.getProgramDetil($scope.id)
        .success(function (data) {
            $scope.detil = data;
            $scope.isAjaxLoading = false;
            $scope.isAjaxLoaded = true;
        });
//Jika diklik ok
    $scope.ok = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modVerifikasiRPJMDesProgram', ['$scope', 'rpjmdes_program', '$modalInstance', 'id', 'token', function ($scope, rpjmdes_program, $modalInstance, id, token) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.token = token;
    $scope.hasil = {
        class: '',
        msg: ''
    };

    //Jika diklik ok
    $scope.ok = function () {
        //Disable button
        $scope.process = true;
        $scope.param = {};
        $scope.param.cmd = 'finish';
        $scope.param.rpjmdes_program_id = id;
        $scope.param._token = $scope.token;

        rpjmdes_program.setProgram($scope.param)
            .success(function (data) {
                if (data.success == true) {
                    $scope.hasil.class = "success";
                } else {
                    $scope.hasil.class = "danger";
                }
                $scope.hasil.msg = data.message;
                $modalInstance.close($scope.hasil);

                //Enable button
                $scope.process = false;
            })
            .error(function (data) {
                $scope.redirect(data)
            });
    };

    //Jika diklik batal
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modTolakRPJMDesProgram', ['$scope', 'rpjmdes_program', '$modalInstance', 'token', 'program', function ($scope, rpjmdes_program, $modalInstance, token, program) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.param = {};
    $scope.token = token;
    $scope.rpjmdes_program = program.kegiatan.program.program;
    $scope.hasil = {
        class: '',
        msg: ''
    };

    //Jika diklik ok
    $scope.ok = function () {
        //Disable button
        $scope.process = true;
        $scope.param.cmd = 'reject';
        $scope.param.rpjmdes_program_id = program._id;
        $scope.param._token = $scope.token;

        rpjmdes_program.setProgram($scope.param)
            .success(function (data) {
                if (data.success == true) {
                    $scope.hasil.class = "success";
                } else {
                    $scope.hasil.class = "danger";
                }
                $scope.hasil.msg = data.message;
                $modalInstance.close($scope.hasil);

                //Enable button
                $scope.process = false;
            })
            .error(function (data) {
                $scope.redirect(data)
            });
    };

//Jika diklik batal
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modRevisiRPJMDesProgram', ['$scope', 'rpjmdes_program', '$modalInstance', 'token', 'program', function ($scope, rpjmdes_program, $modalInstance, token, program) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.param = {};
    $scope.token = token;
    $scope.rpjmdes_program = program.kegiatan.program.program;
    $scope.hasil = {
        class: '',
        msg: ''
    };

    //Jika diklik ok
    $scope.ok = function () {
        //Disable button
        $scope.process = true;
        $scope.param.cmd = 'revisi';
        $scope.param.rpjmdes_program_id = program._id;
        $scope.param._token = $scope.token;

        rpjmdes_program.setProgram($scope.param)
            .success(function (data) {
                if (data.success == true) {
                    $scope.hasil.class = "success";
                } else {
                    $scope.hasil.class = "danger";
                }
                $scope.hasil.msg = data.message;
                $modalInstance.close($scope.hasil);

                //Enable button
                $scope.process = false;
            })
            .error(function (data) {
                $scope.redirect(data)
            });
    };

//Jika diklik batal
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('RPJMDesProgramCtrl', ['$scope', 'rpjmdes_program', '$modal', '$stateParams', function ($scope, rpjmdes_program, $modal) {

    $scope.inputData = {};

    //siapkan scope pagination data dan pencarian data
    $scope.main = {
        page: 1,
        term: ''
    };

    //Init loading
    $scope.isFirstLoading = true;
    $scope.isFirstLoaded = false;

    $scope.aShow = 'hidden';
    $scope.unfinished = true;

    //Disable Control Umum
    $scope.disUtama = {
        btnRefresh: true,
        txtCari: true,
        btnCari: true,
        btnPagging: true
    };

    //Disable Control Aksi
    $scope.disAksi = {
        btnVerifikasi: false
    };

    //Disable Control Eksekusi
    $scope.btnEksekusi = false;

    //init get data
    rpjmdes_program.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            //Hide loading
            $scope.isFirstLoading = false;
            $scope.isFirstLoaded = true;

            //result data
            $scope.rpjmdes_program = data.data;

            //set the current page
            $scope.current_page = data.current_page;

            //set the last page
            $scope.last_page = data.last_page;

            //set the data from
            $scope.from = data.from;

            //set the data until to
            $scope.to = data.to;

            //set the total result data
            $scope.total = data.total;

            //Disable All Controller
            $scope.disConAksi(false);
            $scope.disConUmum(false)
        })
        .error(function (data) {
            $scope.redirect(data);
        });

//refresh data
    $scope.setDelay = function (back) {
        //set timeout 3 seconds
        window.setTimeout(function () {
            $scope.$apply(function () {
                if ($scope.aShow == 'hidden') {
                    return false;
                }
                $scope.aShow = "hidden";
            });
        }, 5000);
    };

//Enable or Disable Contoller Umum
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

//Enable or Disable Aksi controller
    $scope.disConAksi = function (opt) {
        if (opt == true) { //Disable Controller
            $scope.disAksi = {
                btnVerifikasi: true
            };
        } else { //Enable controller
            $scope.disAksi = {
                btnVerifikasi: false
            };
        }
    };

//get data
    $scope.getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        if ($scope.unfinished == true) {
            rpjmdes_program.get($scope.main.page, $scope.main.term)

                .success(function (data) {
                    //result data
                    $scope.rpjmdes_program = data.data;

                    //set the current page
                    $scope.current_page = data.current_page;

                    //set the last page
                    $scope.last_page = data.last_page;

                    //set the data from
                    $scope.from = data.from;

                    //set the data until to
                    $scope.to = data.to;

                    //set the total result data
                    $scope.total = data.total;

                    $scope.done();

                    //Disable All Controller
                    $scope.disConUmum(false);
                    $scope.disConAksi(false);
                })
                .error(function (data) {
                    $scope.redirect(data);
                });
        } else {
            rpjmdes_program.getFinished($scope.main.page, $scope.main.term)

                .success(function (data) {
                    //result data
                    $scope.rpjmdes_program = data.data;

                    //set the current page
                    $scope.current_page = data.current_page;

                    //set the last page
                    $scope.last_page = data.last_page;

                    //set the data from
                    $scope.from = data.from;

                    //set the data until to
                    $scope.to = data.to;

                    //set the total result data
                    $scope.total = data.total;

                    $scope.done();

                    //Disable All Controller
                    $scope.disConUmum(false);
                    $scope.disConAksi(false);
                })
                .error(function (data) {
                    $scope.redirect(data);
                });
        }
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

        //jika page = 1 < halaman terakhir
        if ($scope.main.page < $scope.last_page) {
            //halaman saat ini ditambah increment++
            $scope.main.page++
        }
        //panggil ajax data
        $scope.getData();
    };

//navigasi halaman sebelumnya
    $scope.previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //jika page = 1 > 1
        if ($scope.main.page > 1) {
            //page dikurangi decrement --
            $scope.main.page--
        }
        //panggil ajax data
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

//refresh data
    $scope.refreshData = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //panggil ajax data
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
        $scope.aShow = 'hidden';
    };

    //Tampil Modal Detail RPJM Desa
    $scope.program_rincian = function (id) {
        var modalInstance = $modal.open({
            templateUrl: 'modDetailProgram.html',
            controller: 'modDetilRPJMDesProgram',
            size: '',
            backdrop: 'static',
            resolve: {
                id: function () {
                    return id;
                }
            }
        });
    };

    $scope.program_verifikasi = function (id) {
        //Close alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modVerifikasi.html',
            controller: 'modVerifikasiRPJMDesProgram',
            size: '',
            backdrop: 'static',
            resolve: {
                id: function () {
                    return id;
                },
                token: function () {
                    return $scope.csrf;
                }
            }
        });

        modalInstance.result.then(function (hasil) {
            $scope.aClass = hasil.class;
            $scope.aMsg = hasil.msg;
            $scope.aShow = '';
            $scope.setDelay();
            $scope.sup();
            $scope.getData();
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.program_tolak = function (program) {
        //Close Alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modTolak.html',
            controller: 'modTolakRPJMDesProgram',
            size: '',
            backdrop: 'static',
            resolve: {
                program: function () {
                    return program;
                },
                token: function () {
                    return $scope.csrf;
                }
            }
        });

        modalInstance.result.then(function (hasil) {
            $scope.aClass = hasil.class;
            $scope.aMsg = hasil.msg;
            $scope.aShow = '';
            $scope.setDelay();
            $scope.sup();
            $scope.getData();
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.program_revisi = function (program) {
        //Close Alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modRevisi.html',
            controller: 'modRevisiRPJMDesProgram',
            size: '',
            backdrop: 'static',
            resolve: {
                program: function () {
                    return program;
                },
                token: function () {
                    return $scope.csrf;
                }
            }
        });

        modalInstance.result.then(function (hasil) {
            $scope.aClass = hasil.class;
            $scope.aMsg = hasil.msg;
            $scope.aShow = '';
            $scope.setDelay();
            $scope.sup();
            $scope.getData();
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

}]);