app.controller('ProgramCtrl', ['$scope', 'program', '$stateParams', function ($scope, program) {

    $scope.alert1 = false;

    $scope.inputData = {};

    $scope.objMasalah = {};
    $scope.objProgram = {};
    $scope.objPejabatDesa = {};
    $scope.objSumberDana = {};
    $scope.objSifat = [
        {_id: 1, nama: 'Baru'},
        {_id: 2, nama: 'Lanjutan'},
        {_id: 3, nama: 'Rehab'},
        {_id: 4, nama: 'Perluasan'}
    ];

    $scope.inputData.cbsifat = $scope.objSifat[0];

    $scope.loadAwal = true;

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
        add: 'hidden',
        edit: 'hidden',
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
    program.get($scope.main.page, $scope.main.term)
        .success(function (data) {

            //Hide loading
            $scope.isFirstLoading = false;
            $scope.isFirstLoaded = true;

            // result data
            $scope.program = data.data;

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
        .error(function(data){
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

        program.get($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.program = data.data;

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
            .error(function(data){
                $scope.done();
                $scope.redirect(data);
            })
    };

// button add on click
    $scope.add = function () {
        //Close Alert
        $scope.closeMe();

        $scope.start();
        $scope.loadAwal = false;
        //Disable controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);
        $scope.inputData.cbsifat = $scope.objSifat[0];
        program.getmasalah()
            .success(function (data) {
                $scope.objMasalah = data;
                $scope.inputData.masalah = $scope.objMasalah[0];
                $scope.inputData.masalah_id = $scope.objMasalah[0]._id;

                program.getprogram($scope.inputData.masalah.bidang_id)
                    .success(function (data1) {
                        $scope.objProgram = data1;
                        $scope.inputData.program = $scope.objProgram[0];

                        program.getpejabat()
                            .success(function (data2) {
                                $scope.objPejabatDesa = data2;
                                $scope.inputData.pejabat_desa = $scope.objPejabatDesa[0];
                            });

                        program.getsumberdana()
                            .success(function (data3) {
                                $scope.objSumberDana = data3;
                                $scope.inputData.sumber_dana = $scope.objSumberDana[0];
                            });

                        $scope.done();
                        // set hidden the element
                        $scope.formHidden = {
                            list: 'hidden',
                            alert: 'hidden',
                            add: '',
                            edit: 'hidden'
                        };
                    });
            })
            .error(function (dat) {

            });
    };

// button back on click
    $scope.back = function () {
        $scope.getData();

        // set hidden the element
        $scope.formHidden = {
            list: '',
            alert: 'hidden',
            add: 'hidden',
            edit: 'hidden'
        };

        // set first inputbox focused
        $scope.getFocus = true;
        $scope.clearInput();
    };

// clear fill the textbox
    $scope.clearInput = function () {
        $scope.main.term = '';
        $scope.main.page = 1;
        $scope.inputData._id = '';
        $scope.inputData.tolok_ukur = '';
        $scope.inputData.indikator = '';
        $scope.inputData.satuan = '';
        $scope.inputData.target = '';
        $scope.inputData.pagu_anggaran = '';
        $scope.inputData.waktu = '';
        $scope.inputData.sasaran = '';
        $scope.inputData.lokasi = '';
    };

// submit data
    $scope.submitData = function (back) {
        //Close Alert
        $scope.closeMe();

        // cek apakah validasi sudah benar
        if ($scope.addForm.$valid) {
            //Start Loading
            $scope.start();

            //Disable button
            $scope.btnEksekusi = true;

            $scope.success = '';
            $scope.msg = '';
            // store

            $scope.inputData._token = $scope.csrf;
            $scope.inputData.masalah_id = $scope.inputData.masalah._id;
            $scope.inputData.program_id = $scope.inputData.program._id;
            $scope.inputData.masalah_id = $scope.inputData.masalah._id;
            $scope.inputData.pejabat_desa_id = $scope.inputData.pejabat_desa._id;
            $scope.inputData.sumber_dana_id = $scope.inputData.sumber_dana._id;
            $scope.inputData.sifat = $scope.inputData.cbsifat._id;

            program.store($scope.inputData)
                .success(function (data) {
                    if (data.success == true) {
                        $scope.alertset = {
                            class: 'success'
                        };

                        //Jika simpan dan kembali
                        if (back == 1) {
                            $scope.formHidden = {
                                alert: '',
                                list: '',
                                add: 'hidden',
                                edit: 'hidden'
                            };
                            // set delay
                            $scope.clearInput();
                            $scope.setDelay(1);
                            $scope.refreshData();
                        } else {
                            $scope.formHidden = {
                                alert: '',
                                list: 'hidden',
                                add: '',
                                edit: 'hidden'
                            };
                            // set delay
                            $scope.clearInput();
                            $scope.setDelay(0);
                        }
                    } else {
                        $scope.alertset = {
                            class: 'danger'
                        };

                        $scope.formHidden = {
                            alert: '',
                            list: 'hidden',
                            add: '',
                            edit: 'hidden'
                        };
                        // set delay
                        $scope.setDelay(0);
                    }
                    //Scroll to up
                    $scope.sup();

                    // Loading stop
                    $scope.done();

                    //Disable button
                    $scope.btnEksekusi = false;

                })
                .error(function(data){
                    $scope.done();
                    $scope.redirect(data);
                })
        }
    };

// edit data yang akan ditampilkan ke form
    $scope.edit = function (_id) {
        //Close Alert
        $scope.closeMe();

        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        program.show(_id)
            .success(function (data) {
                program.getmasalah()
                    .success(function (data1) {
                        $scope.objMasalah = data1;
                        $scope.inputData.masalah = $scope.objMasalah[findWithAttr($scope.objMasalah, '_id', data.masalah_id)];

                        program.getprogram($scope.inputData.masalah.bidang_id)
                            .success(function (data2) {
                                $scope.objProgram = data2;
                                $scope.inputData.program = $scope.objProgram[findWithAttr($scope.objProgram, '_id', data.program_id)];

                                program.getpejabat()
                                    .success(function (data3) {
                                        $scope.objPejabatDesa = data3;
                                        $scope.inputData.pejabat_desa = $scope.objPejabatDesa[findWithAttr($scope.objPejabatDesa, '_id', data.pejabat_desa_id)];

                                        program.getsumberdana()
                                            .success(function (data4) {
                                                $scope.objSumberDana = data4;
                                                $scope.inputData.sumber_dana = $scope.objSumberDana[findWithAttr($scope.objSumberDana, '_id', data.sumber_dana_id)];

                                                // fill the textbox
                                                $scope.inputData._id = _id;
                                                $scope.inputData.lokasi = data.lokasi;
                                                $scope.inputData.sasaran = data.sasaran;
                                                $scope.inputData.waktu = data.waktu;
                                                $scope.inputData.pagu_anggaran = data.pagu_anggaran;
                                                $scope.inputData.target = data.target;
                                                $scope.inputData.satuan = data.satuan;
                                                $scope.inputData.cbsifat = $scope.objSifat[findWithAttr($scope.objSifat,'_id',data.sifat)];
                                                $scope.inputData.indikator = data.indikator;
                                                $scope.inputData.tolok_ukur = data.tolok_ukur;

                                                // set hidden the element
                                                $scope.formHidden = {
                                                    list: 'hidden',
                                                    alert: 'hidden',
                                                    add: 'hidden',
                                                    edit: ''
                                                };

                                                // Stop loading
                                                $scope.done();

                                            })
                                    })
                            });
                    });
            });
    };

// update data
    $scope.updateData = function () {
        // cek apakah validasi sudah benar
        if ($scope.editForm.$valid) {
            //Start Loading
            $scope.start();
            //Disable button
            $scope.btnEksekusi = true;
            // store
            $scope.success = '';
            $scope.msg = '';
            $scope.inputData._token = $scope.csrf;
            program.update($scope.inputData)
                .success(function (data) {
                    if (data.success == true) {
                        $scope.alertset = {
                            class: 'success'
                        };

                        $scope.formHidden = {
                            list: '',
                            alert: '',
                            add: 'hidden',
                            edit: 'hidden'
                        };
                        // set delay
                        $scope.refreshData();
                        $scope.setDelay();
                    } else {
                        $scope.alertset = {
                            class: 'danger'
                        };



                        $scope.formHidden = {
                            list: 'hidden',
                            alert: '',
                            add: 'hidden',
                            edit: ''
                        };
                        $scope.setDelay();
                        //todo redirect if xss dtected
                        //$scope.changeRoute('login');
                    }
                    //Scroll to up
                    $scope.sup();

                    //Stop Loading
                    $scope.done();
                    //Disable button
                    $scope.btnEksekusi = false;
                })
                .error(function(data){
                    $scope.done();
                    $scope.redirect(data);
                })
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

        // clear the textbox
        $scope.clearInput();

        // panggil ajax data
        $scope.getData();
    };

//Hapus data
    $scope.hapus = function (_id) {
        //Close Alert
        $scope.closeMe();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        //Start loading
        $scope.start();
        program.destroy(_id)
            .success(function (data) {
                if (data.success == true) {
                    $scope.alertset = {
                        class: 'success'
                    };

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

                //Scroll to up
                $scope.sup();

                // set delay
                $scope.setDelay(1);
            })
            .error(function (data) {
                // TODO grab the error from server
            });
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

    $scope.setbidang = function () {
        $scope.loadAwal = true;
        $scope.objProgram = {};
        $scope.alert1 = false;
        program.getprogram($scope.inputData.masalah.bidang_id)
            .success(function (data) {
                if (data.length > 0) {
                    $scope.objProgram = data;
                    $scope.inputData.program = $scope.objProgram[0];
                    $scope.loadAwal = false;
                } else {
                    $scope.alert1 = true;
                }
            })
    }
}]);