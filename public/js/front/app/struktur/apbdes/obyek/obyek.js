app.controller('modDeleteObyek', ['$scope', 'obyek', '$modalInstance', 'id', function ($scope, obyek, $modalInstance, id) {

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

        obyek.destroy(id)
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
app.controller('ObyekCtrl', ['$scope', 'obyek', '$modal', '$stateParams', function ($scope, obyek, $modal) {

    $scope.objAkun = {};
    $scope.objKelompok = {};
    $scope.objJenis = {};

    $scope.inputData = {};

    $scope.alert1 = false;
    $scope.alert2 = false;

    //Disable Combo Kelompok
    $scope.loadAwal = true;
    $scope.loadAkun = true;
    $scope.loadKelompok = true;

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

    $scope.getAkun = function () {
        $scope.alert1 = false;
        $scope.alert2 = false;

        $scope.loadAwal = true;
        $scope.loadAkun = true;
        $scope.loadKelompok = true;

        $scope.objKelompok = {};
        $scope.inputData.kelompok_id = "";

        $scope.objJenis = {};

        $scope.inputData.kode_rekening = "";

        if ($scope.inputData.akun._id == '0') {
            $scope.inputData.kode_rekening = "";
            $scope.inputData.jenis_id = "";
            return false;
        }
        obyek.getkelompok($scope.inputData.akun._id)
            .success(function (data) {
                if (data.length > 0) {
                    data.unshift({_id: 0, kelompok: 'Silahkan pilih kelompok', kode_rekening: 0});
                    $scope.objKelompok = data;
                    $scope.inputData.kelompok = $scope.objKelompok[0];
                    //$scope.inputData.kelompok_id = $scope.objKelompok[0]._id;
                    //$scope.getKelompok();
                    $scope.loadAkun = false;
                } else {
                    $scope.alert1 = true;
                }
            });
    };

    $scope.getKelompok = function () {
        $scope.alert2 = false;

        $scope.loadAwal = true;
        $scope.loadKelompok = true;

        $scope.objJenis = {};

        $scope.inputData.kode_rekening = "";

        if ($scope.inputData.kelompok._id == '0') {
            $scope.inputData.kode_rekening = "";
            $scope.inputData.kelompok_id = "";
            return false;
        }

        obyek.getjenis($scope.inputData.kelompok._id)
            .success(function (data1) {
                if (data1.length > 0) {
                    data1.unshift({_id: 0, jenis: 'Silahkan pilih jenis', kode_rekening: 0});
                    $scope.objJenis = data1;
                    $scope.inputData.jenis = $scope.objJenis[0];
                    $scope.loadKelompok = false;
                } else {
                    $scope.alert2 = true;
                }
            })
    };

    $scope.getJenis = function () {
        if ($scope.inputData.jenis._id == '0') {
            $scope.loadAwal = true;
            $scope.inputData.kode_rekening = "";
            $scope.inputData.jenis_id = "";
            return false;
        }
        $scope.loadAwal = false;
        $scope.inputData.jenis_id = $scope.inputData.jenis._id;
        $scope.inputData.kode_rekening = $scope.inputData.jenis.kode_rekening + ".";
    };

    //init get data
    obyek.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            //Hide loading
            $scope.isFirstLoading = false;
            $scope.isFirstLoaded = true;

            // result data
            $scope.obyek = data.data;

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

        obyek.get($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.obyek = data.data;

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

        $scope.loadAkun = true;
        $scope.loadAwal = true;
        $scope.loadKelompok = true;

        obyek.getakun()
            .success(function (data) {
                if (data.length == 0) {
                    $scope.alertset = {
                        class: 'warning',
                        msg: {
                            msg: 'Anda belum memiliki data akun'
                        }
                    };
                    $scope.done();

                    $scope.disConUmum(false);
                    $scope.disConAksi(false);

                    $scope.formHidden.alert = "";
                    $scope.setDelay();
                    return false;
                }
                data.unshift({_id: 0, akun: 'Silahkan pilih akun', kode_rekening: 0});
                $scope.objAkun = data;
                $scope.inputData.akun = $scope.objAkun[0];
                //$scope.inputData.akun_id = $scope.objAkun[0]._id;

                $scope.done();

                // set hidden the element
                $scope.formHidden = {
                    list: 'hidden',
                    alert: 'hidden',
                    add: '',
                    edit: 'hidden'
                };
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
        $scope.inputData.kode_rekening = '';
        $scope.inputData.obyek = '';
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
            obyek.store($scope.inputData)
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
                    //Set Alert message
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
                    $scope.done()
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

        obyek.show(_id)
            .success(function (data) {
                obyek.getakun()
                    .success(function (data1) {
                        $scope.objAkun = data1;
                        $scope.inputData.akun = $scope.objAkun[findWithAttr($scope.objAkun, '_id', data.jenis.kelompok.akun._id)];
                        $scope.inputData.akun_id = $scope.objAkun[findWithAttr($scope.objAkun, '_id', data.jenis.kelompok.akun._id)]._id;

                        obyek.getkelompok($scope.objAkun[findWithAttr($scope.objAkun, '_id', data.jenis.kelompok.akun._id)]._id)
                            .success(function (data2) {
                                $scope.loadAkun = false;
                                $scope.objKelompok = data2;
                                $scope.inputData.kelompok = $scope.objKelompok[findWithAttr($scope.objKelompok, '_id', data.jenis.kelompok._id)];
                                $scope.inputData.kelompok_id = $scope.objKelompok[findWithAttr($scope.objKelompok, '_id', data.jenis.kelompok_id)]._id;

                                obyek.getjenis($scope.objKelompok[findWithAttr($scope.objKelompok, '_id', data.jenis.kelompok._id)]._id)
                                    .success(function (data3) {
                                        $scope.loadKelompok = false;
                                        $scope.loadAwal = false;
                                        $scope.objJenis = data3;
                                        $scope.inputData.jenis = $scope.objJenis[findWithAttr($scope.objJenis, '_id', data.jenis._id)];
                                        $scope.inputData.jenis_id = $scope.objJenis[findWithAttr($scope.objJenis, '_id', data.jenis._id)]._id;

                                        $scope.inputData._id = _id;
                                        $scope.inputData.kode_rekening = data.kode_rekening;
                                        $scope.inputData.obyek = data.obyek;

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
            obyek.update($scope.inputData)
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
                    //Set alert message
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
                    // Stop loading
                    $scope.done();
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

    //CLose Alert
    $scope.closeMe = function () {
        $scope.formHidden.alert = 'hidden';
    };

    $scope.hapus = function (id) {
        //Close Alert
        $scope.formHidden.alert = 'hidden';

        var modalInstance = $modal.open({
            templateUrl: 'modDelete.html',
            controller: 'modDeleteObyek',
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