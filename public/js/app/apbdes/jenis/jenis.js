app.controller('modDeleteJenis', ['$scope', 'jenis', '$modalInstance', 'id', function ($scope, jenis, $modalInstance, id) {

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

        jenis.destroy(id)
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
app.controller('JenisCtrl', ['$scope', 'jenis', '$modal', '$stateParams', function ($scope, jenis, $modal) {

    $scope.objAkun = {};
    $scope.objKelompok = {};

    $scope.loadAwal = true;

    $scope.inputData = {};

    $scope.alert1 = false;
    //Disable Combo Kelompok
    $scope.loadAkun = true;

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

    function findWithAttr(array, attr, value) {
        for (var i = 0; i < array.length; i += 1) {
            if (array[i][attr] === value) {
                return i;
            }
        }
    }

    // Class Alert
    $scope.alertset = {
        class: 'success',
        msg: {}
    };

    $scope.getAkun = function () {

        $scope.alert1 = false;

        $scope.loadAwal = true;
        $scope.loadAkun = true;

        $scope.objKelompok = {};
        $scope.inputData.kelompok_id = "";
        $scope.inputData.kode_rekening = "";

        if ($scope.inputData.akun._id == '0') {
            $scope.inputData.kode_rekening = "";
            $scope.inputData.akun_id = "";
            return false;
        }
        jenis.getkelompok($scope.inputData.akun._id)
            .success(function (data) {
                if (data.length > 0) {
                    data.unshift({_id: 0, kelompok: 'Silahkan pilih kelompok', kode_rekening: 0});
                    $scope.objKelompok = data;
                    $scope.inputData.kelompok = $scope.objKelompok[0];
                    //$scope.inputData.kelompok_id = $scope.objKelompok[0]._id;

                    //$scope.inputData.kode_rekening = $scope.objKelompok[0].kode_rekening + ".";

                    $scope.loadAkun = false;
                    //$scope.loadAwal = false;
                } else {
                    $scope.alert1 = true;
                }
            })
            .error(function (data) {
                // Stop Loading
                $scope.done();
                $scope.redirect(data);
            });
    };

    $scope.getKelompok = function () {
        if ($scope.inputData.kelompok._id == '0') {
            $scope.loadAwal = true;
            $scope.inputData.kode_rekening = "";
            $scope.inputData.kelompok_id = "";
            return false;
        }
        $scope.loadAwal = false;
        $scope.inputData.kelompok_id = $scope.inputData.kelompok._id;
        $scope.inputData.kode_rekening = $scope.inputData.kelompok.kode_rekening + ".";
    };

    //init get data
    jenis.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            //Hide loading
            $scope.isFirstLoading = false;
            $scope.isFirstLoaded = true;

            $scope.jenis = data.data;

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

        jenis.get($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.jenis = data.data;

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

        $scope.inputData.status = "Debet";

        $scope.start();

        //Disable controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.loadAwal = true;
        $scope.loadAkun = true;


        jenis.getakun()
            .success(function (data) {
                if (data.length == 0) {
                    $scope.alertset = {
                        class: 'warning',
                        msg: {
                            msg: 'Anda belum memiliki data akun, silakan tambahkan terlebih dahulu!'
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
        $scope.inputData.jenis = '';
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
            jenis.store($scope.inputData)
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
                    // Stop Loading
                    $scope.done();
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
        $scope.loadAwal = false;

        jenis.show(_id)
            .success(function (data) {
                jenis.getakun()
                    .success(function (data1) {
                        $scope.objAkun = data1;
                        $scope.inputData.akun = $scope.objAkun[findWithAttr($scope.objAkun, '_id', data.kelompok.akun._id)];
                        $scope.inputData.akun_id = $scope.objAkun[findWithAttr($scope.objAkun, '_id', data.kelompok.akun._id)]._id;

                        jenis.getkelompok($scope.objAkun[findWithAttr($scope.objAkun, '_id', data.kelompok.akun._id)]._id)
                            .success(function (data2) {
                                $scope.loadAkun = false;
                                $scope.objKelompok = data2;
                                $scope.inputData.kelompok = $scope.objKelompok[findWithAttr($scope.objKelompok, '_id', data.kelompok_id)];
                                $scope.inputData.kelompok_id = $scope.objKelompok[findWithAttr($scope.objKelompok, '_id', data.kelompok_id)]._id;

                                $scope.inputData._id = _id;
                                $scope.inputData.kode_rekening = data.kode_rekening;
                                $scope.inputData.jenis = data.jenis;

                                $scope.inputData.status = data.status;
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
                    .error(function (data) {
                        $scope.redirect(data);
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
            jenis.update($scope.inputData)
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
                    // Stop loading
                    $scope.done();
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

    //hapus data
    $scope.hapus = function (id) {
        //Close Alert
        $scope.formHidden.alert = 'hidden';

        var modalInstance = $modal.open({
            templateUrl: 'modDelete.html',
            controller: 'modDeleteJenis',
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