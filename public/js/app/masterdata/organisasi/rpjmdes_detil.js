app.controller('modVerifikasiRPJMDesProgramLokasi', ['$scope', 'rpjmdes_detil', '$modalInstance', 'id', 'token', function ($scope, rpjmdes_detil, $modalInstance, id, token) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.id = id;
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
        $scope.param = {
            cmd: 'finish',
            rpjmdes_program_id: $scope.id,
            _token: $scope.token
        };

        rpjmdes_detil.setProgram($scope.param)
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
app.controller('modTolakRPJMDesProgramLokasi', ['$scope', 'rpjmdes_detil', '$modalInstance', 'token', 'program', function ($scope, rpjmdes_detil, $modalInstance, token, program) {

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

        rpjmdes_detil.setProgram($scope.param)
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
app.controller('modRevisiRPJMDesProgramLokasi', ['$scope', 'rpjmdes_detil', '$modalInstance', 'token', 'program', function ($scope, rpjmdes_detil, $modalInstance, token, program) {

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

        rpjmdes_detil.setProgram($scope.param)
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
app.controller('RPJMDesDetilCtrl', ['$scope', '$location', '$stateParams', 'rpjmdes_detil', '$modal', function ($scope, $location, $stateParams, rpjmdes_detil, $modal) {

    $scope.aClass = 'success';
    $scope.aMsg = {};
    $scope.aShow = 'hidden';
    $scope.data = {};
    $scope.data.pagu_anggaran = 0;
    $scope.data.tahun_1 = 0;
    $scope.data.tahun_2 = 0;
    $scope.data.tahun_3 = 0;
    $scope.data.tahun_4 = 0;
    $scope.data.tahun_5 = 0;
    $scope.data.tahun_6 = 0;
    $scope.btnEksekusi = true;
    $scope.rpjmdes_id = $stateParams.rpjmdes_id;
    $scope.organisasi_id = $stateParams.organisasi_id;
    $scope.key = {};

    $scope.main = {
        page: 1,
        term: ''
    };

    rpjmdes_detil.getDetil($scope.rpjmdes_id)
        .success(function (data) {
            $scope.data = data;
            $scope.btnEksekusi = false;
            if (data.is_finish == 1) {
                $scope.key.class = "info";
                $scope.key.key = "Proses";
            } else if (data.is_finish == 2) {
                $scope.key.class = "warning";
                $scope.key.key = "Revisi";
            } else if (data.is_finish == 3) {
                $scope.key.class = "success";
                $scope.key.key = "Final";
            } else if (data.is_finish == 4) {
                $scope.key.class = "danger";
                $scope.key.key = "Ditolak";
            }
        });

    rpjmdes_detil.getLokasi($scope.rpjmdes_id, $scope.organisasi_id)
        .success(function (data) {

            // result data
            $scope.lokasi = data.data;

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
        });

    $scope.getPelaksanaan = function (id) {
        switch (id) {
            case 0:
                return 'Swakelola';
                break;
            case 1:
                return 'Kerja sama antar desa';
                break;
            case 2:
                return 'Kerja sama pihak ketiga';
                break;
        }
    };

    $scope.convertToRupiah = function (angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return rupiah.split('', rupiah.length - 1).reverse().join('');
    };

    $scope.reLoadData = function () {
        rpjmdes_detil.getDetil($scope.rpjmdes_id)
            .success(function (data) {
                $scope.data = data;
                $scope.btnEksekusi = false;
                if (data.is_finish == 1) {
                    $scope.key.class = "info";
                    $scope.key.key = "Proses";
                } else if (data.is_finish == 2) {
                    $scope.key.class = "warning";
                    $scope.key.key = "Revisi";
                } else if (data.is_finish == 4) {
                    $scope.key.class = "danger";
                    $scope.key.key = "Ditolak";
                }
            });

        rpjmdes_detil.getLokasi($scope.rpjmdes_id, $scope.organisasi_id)
            .success(function (data) {

                // result data
                $scope.lokasi = data.data;

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
            });
    };

    //Close Alert
    $scope.closeMe = function () {
        $scope.aShow = 'hidden';
    };

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

    $scope.program_verifikasi = function (id) {
        //Close alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modVerifikasi.html',
            controller: 'modVerifikasiRPJMDesProgramLokasi',
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
            if (hasil.class == 'success') {
                $scope.reLoadData();
            }
            $scope.aClass = hasil.class;
            $scope.aMsg = hasil.msg;
            $scope.aShow = '';
            $scope.setDelay();
            $scope.sup();
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.program_tolak = function (program) {
        //Close Alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modTolak.html',
            controller: 'modTolakRPJMDesProgramLokasi',
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
            if (hasil.class == 'success') {
                $scope.reLoadData();
            }
            $scope.aClass = hasil.class;
            $scope.aMsg = hasil.msg;
            $scope.aShow = '';
            $scope.setDelay();
            $scope.sup();
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.program_revisi = function (program) {
        //Close Alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modRevisi.html',
            controller: 'modRevisiRPJMDesProgramLokasi',
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
            if (hasil.class == 'success') {
                $scope.reLoadData();
            }
            $scope.aClass = hasil.class;
            $scope.aMsg = hasil.msg;
            $scope.aShow = '';
            $scope.setDelay();
            $scope.sup();
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    //Navigasi halaman terakhir
    $scope.lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.main.page = $scope.last_page;

        $scope.reLoadData();
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
        $scope.reLoadData();
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
        $scope.reLoadData();
    };

//Navigasi halaman pertama
    $scope.firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.main.page = 1;

        $scope.reLoadData()
    };
}]);