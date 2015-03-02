app.controller('modDeleteLokasi', ['$scope', 'lokasi', '$modalInstance', 'id', function ($scope, lokasi, $modalInstance, id) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.id = id;
    $scope.hasil = {
        class: '',
        msg: ''
    };

    //Jika diklik ok
    $scope.ok = function () {
        //Disable button
        $scope.process = true;

        lokasi.destroy(id)
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
                // TODO grab the error from server
            });
    };

    //Jika diklik batal
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modRincianLokasi', ['$scope', 'lokasi', '$modalInstance', 'id', function ($scope, lokasi, $modalInstance, id) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.id = id;
    $scope.isAjaxLoading = true;
    $scope.isAjaxLoaded = false;

    lokasi.show($scope.id)
        .success(function (data) {
            $scope.data = data;
            $scope.isAjaxLoading = false;
            $scope.isAjaxLoaded = true;
        });
    //Jika diklik batal
    $scope.ok = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('LokasiCtrl', ['$scope', 'lokasi', '$modal', '$stateParams', function ($scope, lokasi, $modal) {

    $scope.program_id = $scope.$stateParams.rpjmdes_program_id;
    $scope.inputData = {};
    $scope.objPejabatDesa = {};

    $scope.main = {
        page: 1,
        term: ''
    };

    $scope.detilrpjmdes = {};
    $scope.key = {};
    $scope.detilrpjmdes.pagu_anggaran = 0;
    $scope.detilrpjmdes.tahun_1 = 0;
    $scope.detilrpjmdes.tahun_2 = 0;
    $scope.detilrpjmdes.tahun_3 = 0;
    $scope.detilrpjmdes.tahun_4 = 0;
    $scope.detilrpjmdes.tahun_5 = 0;
    $scope.detilrpjmdes.tahun_6 = 0;

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

    lokasi.getrpjmdesprogram($scope.program_id)
        .success(function (data) {
            if (data._id == null) {
                window.location = "/front#/desa/rpjmdes/program";
            } else {
                $scope.detilrpjmdes = data;
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
            }
        });
    //init get data
    lokasi.get($scope.program_id, $scope.main.page, $scope.main.term)
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

            //Disable All Controller
            $scope.disConAksi(false);
            $scope.disConUmum(false);
        })
        .error(function (data) {
            $scope.done();
            $scope.redirect(data);
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

        lokasi.get($scope.program_id, $scope.main.page, $scope.main.term)
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

// button add on click
    $scope.add = function () {
        //Close Alert
        $scope.closeMe();

        //Disable controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.start();

        $scope.clearInput();

        lokasi.getPejabatDesa()
            .success(function (data) {
                if (data.length == 0) {
                    $scope.alertset.class = 'warning';
                    $scope.alertset.msg = {
                        msg: 'Data pelaksanan kegiatan tidak tersedia.'
                    };
                    $scope.done();
                    return false;
                }
                $scope.inputData.sasaran_satuan = "Orang";
                $scope.objPejabatDesa = data;
                $scope.inputData.pejabat_desa = $scope.objPejabatDesa[0];
                // set hidden the element
                $scope.formHidden = {
                    list: 'hidden',
                    alert: 'hidden',
                    add: '',
                    edit: 'hidden'
                };
                $scope.done();
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
        //
    };

// clear fill the textbox
    $scope.clearInput = function () {
        $scope.inputData._id = '';
        $scope.inputData = {};
        $scope.inputData.sasaran_satuan = "Orang";
        $scope.inputData.pejabat_desa = $scope.objPejabatDesa[0];
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

            //store
            $scope.inputData._token = $scope.csrf;
            $scope.inputData.pejabat_desa_id = $scope.inputData.pejabat_desa._id;
            $scope.inputData.rpjmdes_program_id = $scope.program_id;
            lokasi.store($scope.inputData)
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
                    }
                    //Set alert message
                    $scope.alertset.msg = data.message;
                    //Scroll to up
                    $scope.sup();

                    // Loading stop
                    $scope.done();

                    //Disable button
                    $scope.btnEksekusi = false;

                })
                .error(function (data) {
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

        lokasi.show(_id)
            .success(function (data) {
                $scope.inputData._id = _id;
                lokasi.getPejabatDesa()
                    .success(function (data1) {
                        $scope.objPejabatDesa = data1;
                        $scope.inputData.pejabat_desa = $scope.objPejabatDesa[findWithAttr($scope.objPejabatDesa, '_id', data.pejabat_desa_id)];

                        $scope.inputData.lokasi = data.lokasi;
                        $scope.inputData.sasaran_manfaat_laki = data.sasaran_manfaat_laki;
                        $scope.inputData.sasaran_manfaat_wanita = data.sasaran_manfaat_wanita;
                        $scope.inputData.sasaran_manfaat_artm = data.sasaran_manfaat_artm;
                        $scope.inputData.sasaran_satuan = data.sasaran_satuan;
                        $scope.inputData.volume1 = data.volume1;
                        $scope.inputData.volume2 = data.volume2;
                        $scope.inputData.volume3 = data.volume3;
                        $scope.inputData.satuan1 = data.satuan1;
                        $scope.inputData.satuan2 = data.satuan2;
                        $scope.inputData.satuan3 = data.satuan3;
                        $scope.inputData.harga_satuan = data.harga_satuan;

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
            $scope.inputData.rpjmdes_program_id = $scope.program_id;
            $scope.inputData.pejabat_desa_id = $scope.inputData.pejabat_desa._id;
            $scope.inputData._token = $scope.csrf;
            lokasi.update($scope.inputData)
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
                    }
                    //Set Alert message
                    $scope.alertset.msg = data.message;
                    //Scroll to up
                    $scope.sup();
                    //Stop Loading
                    $scope.done();
                    //Disable button
                    $scope.btnEksekusi = false;
                })
                .error(function (data) {
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

    $scope.setbidang = function () {
        $scope.loadAwal = true;
        $scope.objProgram = {};
        $scope.alert1 = false;
        lokasi.getlokasi($scope.inputData.kegiatan.bidang_id)
            .success(function (data) {
                if (data.length > 0) {
                    $scope.objProgram = data;
                    $scope.inputData.lokasi = $scope.objProgram[0];
                    $scope.loadAwal = false;
                } else {
                    $scope.alert1 = true;
                }
            })
    };

    //$Close alert
    $scope.closeMe = function () {
        $scope.formHidden.alert = 'hidden';
    };

    $scope.hapus = function (id) {
        //Close Alert
        $scope.formHidden.alert = 'hidden';

        var modalInstance = $modal.open({
            templateUrl: 'modDelete.html',
            controller: 'modDeleteLokasi',
            size: '',
            backdrop: 'static',
            resolve: {
                id: function () {
                    return id;
                }
            }
        });

        modalInstance.result.then(function (hasil) {
            $scope.alertset = {
                class: hasil.class,
                msg: hasil.msg
            };

            $scope.formHidden = {
                alert: '',
                list: '',
                add: 'hidden',
                edit: 'hidden'
            };
            $scope.setDelay();
            $scope.sup();
            $scope.refreshData();
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.rincian = function (id) {
        //Close Alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modRincianLokasi.html',
            controller: 'modRincianLokasi',
            size: '',
            backdrop: 'static',
            resolve: {
                id: function () {
                    return id;
                }
            }
        });

    };
}]);