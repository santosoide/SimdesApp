app.controller('modDeleteKegiatan', ['$scope', 'kegiatan', '$modalInstance', 'id', function ($scope, kegiatan, $modalInstance, id) {

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

        kegiatan.destroy(id)
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
app.controller('kegiatanCtrl', ['$scope', 'kegiatan', '$modal', '$stateParams', function ($scope, kegiatan, $modal) {

    $scope.objKewenangan = {};
    $scope.objFungsi = {};
    $scope.objBidang = {};
    $scope.objProgram = {};

    $scope.inputData = {};

    $scope.alert1 = false;
    $scope.alert2 = false;
    $scope.alert3 = false;

    //Disable Combo Fungsi
    $scope.loadAwal = true;
    $scope.loadKewenangan = true;
    $scope.loadFungsi = true;
    $scope.loadProgram = true;

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

    function findWithAttr(array, attr, value) {
        for (var i = 0; i < array.length; i += 1) {
            if (array[i][attr] === value) {
                return i;
            }
        }
    }

    $scope.getKewenangan = function () {
        $scope.alert1 = false;
        $scope.alert2 = false;

        $scope.loadAwal = true;
        $scope.loadKewenangan = true;
        $scope.loadFungsi = true;
        $scope.loadProgram = true;

        $scope.objFungsi = {};
        $scope.inputData.fungsi_id = "";
        $scope.objProgram = {};
        $scope.objBidang = {};

        $scope.inputData.kode_rekening = "";

        if ($scope.inputData.kewenangan._id == '0') {
            $scope.inputData.kode_rekening = "";
            $scope.inputData.bidang_id = "";
            return false;
        }
        kegiatan.getfungsi($scope.inputData.kewenangan._id)
            .success(function (data) {
                if (data.length > 0) {
                    data.unshift({_id: 0, fungsi: 'Silahkan pilih fungsi', kode_rekening: 0});
                    $scope.objFungsi = data;
                    $scope.inputData.fungsi = $scope.objFungsi[0];
                    //$scope.inputData.fungsi_id = $scope.objFungsi[0]._id;
                    //$scope.getFungsi();
                    $scope.loadKewenangan = false;
                } else {
                    $scope.alert1 = true;
                }
            });
    };

    $scope.getFungsi = function () {
        $scope.alert2 = false;

        $scope.loadAwal = true;
        $scope.loadFungsi = true;
        $scope.loadProgram = true;

        $scope.objProgram = {};
        $scope.objBidang = {};

        $scope.inputData.kode_rekening = "";

        if ($scope.inputData.fungsi._id == '0') {
            $scope.inputData.kode_rekening = "";
            $scope.inputData.fungsi_id = "";
            return false;
        }

        kegiatan.getbidang($scope.inputData.fungsi._id)
            .success(function (data1) {
                if (data1.length > 0) {
                    data1.unshift({_id: 0, bidang: 'Silahkan pilih bidang', kode_rekening: 0});
                    $scope.objBidang = data1;
                    $scope.inputData.bidang = $scope.objBidang[0];
                    //$scope.inputData.bidang_id = $scope.objBidang[0]._id;
                    $scope.loadFungsi = false;
                    //$scope.inputData.kode_rekening = $scope.objBidang[0].kode_rekening + ".";
                    //$scope.getBidang();
                } else {
                    $scope.alert2 = true;
                }
            })
    };

    $scope.getBidang = function () {
        $scope.loadAwal = true;
        $scope.loadProgram = true;

        $scope.alert3 = false;

        $scope.objProgram = {};
        $scope.inputData.program_id = "";

        $scope.inputData.kode_rekening = "";

        if ($scope.inputData.bidang._id == '0') {
            $scope.inputData.kode_rekening = "";
            $scope.inputData.bidang_id = "";
            return false;
        }

        kegiatan.getprogram($scope.inputData.bidang._id)
            .success(function (data2) {
                if (data2.length > 0) {
                    data2.unshift({_id: 0, program: 'Silahkan pilih program', kode_rekening: 0});
                    $scope.objProgram = data2;
                    $scope.inputData.program = $scope.objProgram[0];
                    //$scope.inputData.program_id = $scope.objProgram[0]._id;
                    $scope.loadProgram = false;
                    //$scope.getProgram();
                } else {
                    $scope.alert3 = true;
                }
            });
    };

    $scope.getProgram = function () {
        if ($scope.inputData.program._id == '0') {
            $scope.loadAwal = true;
            $scope.inputData.kode_rekening = "";
            $scope.inputData.program_id = "";
            return false;
        }
        $scope.loadAwal = false;
        $scope.inputData.program_id = $scope.inputData.program._id;
        $scope.inputData.kode_rekening = $scope.inputData.program.kode_rekening + ".";
    };

    //init get data
    kegiatan.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            //Hide loading
            $scope.isFirstLoading = false;
            $scope.isFirstLoaded = true;

            // result data
            $scope.kegiatan = data.data;

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
            $scope.redirect(data);
        });

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

        kegiatan.get($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.kegiatan = data.data;

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
                $scope.redirect(data);
            });
    };

    // button add on click
    $scope.add = function () {
        //Close Alert
        $scope.closeMe();

        $scope.start();

        //Disable controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.loadKewenangan = true;
        $scope.loadAwal = true;
        $scope.loadFungsi = true;
        $scope.loadProgram = true;

        $scope.clearInput();

        kegiatan.getkewenangan()
            .success(function (data) {
                if (data.length == 0) {
                    $scope.alertset = {
                        class: 'warning',
                        msg: {
                            msg: 'Anda belum memiliki data kewenangan'
                        }
                    };
                    $scope.done();

                    $scope.disConUmum(false);
                    $scope.disConAksi(false);

                    $scope.formHidden.alert = "";
                    $scope.setDelay();
                    return false;
                }
                data.unshift({_id: 0, kewenangan: 'Silahkan pilih kewenangan', kode_rekening: 0});
                $scope.objKewenangan = data;
                $scope.inputData.kewenangan = $scope.objKewenangan[0];
                //$scope.inputData.kewenangan_id = $scope.objKewenangan[0]._id;
                $scope.done();
                // set hidden the element
                $scope.formHidden = {
                    list: 'hidden',
                    alert: 'hidden',
                    add: '',
                    edit: 'hidden'
                };


            })
            .error(function (data) {
                $scope.redirect(data);
            });

        $scope.inputData.kewenangan = $scope.objKewenangan[0];
        $scope.inputData.fungsi = $scope.objFungsi[0];
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
        $scope.objFungsi = {};
        $scope.objBidang = {};
        $scope.objProgram = {};
        $scope.inputData.kode_rekening = '';
        $scope.inputData.kegiatan = '';
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
            kegiatan.store($scope.inputData)
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
                    }
                    //Set alert message
                    $scope.alertset.msg = data.message;
                    //Scroll To Up
                    $scope.sup();
                    // Loading stop
                    $scope.done();

                    //Disable button
                    $scope.btnEksekusi = false;

                })
                .error(function (data) {
                    $scope.redirect(data);
                });
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

        kegiatan.show(_id)
            .success(function (data) {
                kegiatan.getkewenangan()
                    .success(function (data1) {
                        $scope.objKewenangan = data1;
                        $scope.inputData.kewenangan = $scope.objKewenangan[findWithAttr($scope.objKewenangan, '_id', data.program.bidang.fungsi.kewenangan._id)];
                        $scope.inputData.kewenangan_id = $scope.objKewenangan[findWithAttr($scope.objKewenangan, '_id', data.program.bidang.fungsi.kewenangan._id)]._id;

                        kegiatan.getfungsi($scope.objKewenangan[findWithAttr($scope.objKewenangan, '_id', data.program.bidang.fungsi.kewenangan._id)]._id)
                            .success(function (data2) {
                                $scope.loadKewenangan = false;
                                $scope.objFungsi = data2;
                                $scope.inputData.fungsi = $scope.objFungsi[findWithAttr($scope.objFungsi, '_id', data.program.bidang.fungsi._id)];
                                $scope.inputData.fungsi_id = $scope.objFungsi[findWithAttr($scope.objFungsi, '_id', data.program.bidang.fungsi_id)]._id;

                                kegiatan.getbidang($scope.objFungsi[findWithAttr($scope.objFungsi, '_id', data.program.bidang.fungsi._id)]._id)
                                    .success(function (data3) {
                                        $scope.loadFungsi = false;
                                        $scope.loadAwal = false;

                                        $scope.objBidang = data3;
                                        $scope.inputData.bidang = $scope.objBidang[findWithAttr($scope.objBidang, '_id', data.program.bidang._id)];
                                        $scope.inputData.bidang_id = $scope.objBidang[findWithAttr($scope.objBidang, '_id', data.program.bidang._id)]._id;

                                        kegiatan.getprogram($scope.objBidang[findWithAttr($scope.objBidang, '_id', data.program.bidang._id)]._id)
                                            .success(function (data4) {
                                                $scope.loadProgram = false;

                                                $scope.objProgram = data4;
                                                $scope.inputData.program = $scope.objProgram[findWithAttr($scope.objProgram, '_id', data.program._id)];
                                                $scope.inputData.program_id = $scope.objProgram[findWithAttr($scope.objProgram, '_id', data.program._id)]._id;

                                                $scope.inputData._id = _id;
                                                $scope.inputData.kode_rekening = data.kode_rekening;
                                                $scope.inputData.kegiatan = data.kegiatan;

                                                // set hidden the element
                                                $scope.formHidden = {
                                                    list: 'hidden',
                                                    alert: 'hidden',
                                                    add: 'hidden',
                                                    edit: ''
                                                };
                                                // Stop loading
                                                $scope.done();
                                            });

                                    });
                            })
                    });
            })
            .error(function (data) {
                $scope.redirect(data);
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
            kegiatan.update($scope.inputData)
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
                    //Scroll To Up
                    $scope.sup();
                    //Stop Loading
                    $scope.done();
                    //Disable button
                    $scope.btnEksekusi = false;
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

    //Close alert
    $scope.closeMe = function () {
        $scope.formHidden.alert = 'hidden';
    };

    $scope.hapus = function (id) {
        //Close Alert
        $scope.formHidden.alert = 'hidden';

        var modalInstance = $modal.open({
            templateUrl: 'modDelete.html',
            controller: 'modDeleteKegiatan',
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
}]);