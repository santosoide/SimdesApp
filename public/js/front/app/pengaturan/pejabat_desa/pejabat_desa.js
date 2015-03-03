app.controller('modDeletePejabatDesa', ['$scope', 'pejabat_desa', '$modalInstance', 'id', function ($scope, pejabat_desa, $modalInstance, id) {

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

        pejabat_desa.destroy(id)
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
app.controller('PejabatDesaCtrl', ['$scope', 'pejabat_desa', '$modal', '$stateParams', function ($scope, pejabat_desa, $modal) {

    $scope.hapus = function (id) {
        //Close Alert
        $scope.formHidden.alert = 'hidden';

        var modalInstance = $modal.open({
            templateUrl: 'modDelete.html',
            controller: 'modDeletePejabatDesa',
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

    $scope.inputData = {};

    $scope.objFungsi = [
        {nama: 'Pemegang Kekuasaan Pengelolaan Keuangan Desa', id: '1'},
        {nama: 'Koordinator Pelaksana Teknis ', id: 2},
        {nama: 'Pelaksana Kegiatan', id: 3},
        {nama: 'Bendahara Desa', id: 4},
        {nama: 'Ketua Tim Penyusun RPJM Desa', id: 5}
    ];

    $scope.objCombo = [
        {nama: 'Kepala Desa', id: 1},
        {nama: 'Sekretaris Desa', id: 2},
        {nama: 'Kepala Urusan Keuangan', id: 3},
        {nama: 'Kepala Urusan', id: 4},
        {nama: 'Kepala Seksi-Bidang Pemerintahan', id: 5},
        {nama: 'Kepala Seksi-Bidang Pembangunan', id: 6},
        {nama: 'Kepala Seksi-Bidang Kemasyarakatan', id: 7},
        {nama: 'Kepala Seksi-Bidang Pemberdayaan', id: 8},
        {nama: 'Unsur Masyarakat Desa', id: 9}
    ];

    $scope.getFungsi = function (id) {
        for (var i = 0; i < $scope.objFungsi.length; i++) {
            if (parseInt($scope.objFungsi[i].id) === id) {
                return $scope.objFungsi[i];
            }
        }
    };

    $scope.getJabatan = function (id) {
        for (var i = 0; i < $scope.objCombo.length; i++) {
            if ($scope.objCombo[i].id === id) {
                return $scope.objCombo[i];
            }
        }
    };

    $scope.inputData.cbjabatan = $scope.objCombo[0];

    $scope.formHidden = {
        alert: 'hidden',
        list: '',
        add: 'hidden',
        edit: 'hidden'
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

    // siapkan scope pagination data dan pencarian data
    $scope.main = {
        page: 1,
        term: ''
    };

    //Init loading
    $scope.isFirstLoading = true;
    $scope.isFirstLoaded = false;

    function findWithAttr(array, attr, value) {
        for (var i = 0; i < array.length; i += 1) {
            if (array[i][attr] === value) {
                return i;
            }
        }
    }

    // init get data
    pejabat_desa.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            //Hide loading
            $scope.isFirstLoading = false;
            $scope.isFirstLoaded = true;

            // result data
            $scope.pejabat_desa = data.data;

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

    // Set Delay
    $scope.setDelay = function (back) {
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

    // Enable or Disable Contoller Umum
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

    //get data
    $scope.getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        pejabat_desa.get($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.pejabat_desa = data.data;

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

        // clear the textbox
        $scope.clearInput();

        //Disable controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.inputData.cbfungsi = $scope.objFungsi[0];
        $scope.inputData.cbjabatan = $scope.objCombo[0];
        // set first inputbox focused
        $scope.getFocus = true;

        // set hidden the element
        $scope.formHidden = {
            list: 'hidden',
            alert: 'hidden',
            add: '',
            edit: 'hidden'
        };
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

    //Clear form
    $scope.clearInput = function () {
        $scope.inputData.nama = "";
        $scope.inputData.cbfungsi = $scope.objFungsi[0];
        $scope.inputData.cbjabatan = $scope.objCombo[0];
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
            $scope.inputData.fungsi = $scope.inputData.cbfungsi.id;
            $scope.inputData.jabatan = $scope.inputData.cbjabatan.nama;
            $scope.inputData.level = $scope.inputData.cbjabatan.id;
            $scope.inputData._token = $scope.csrf;
            pejabat_desa.store($scope.inputData)
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
                            $scope.formHidden.add = "hidden";
                            $scope.formHidden.list = "";
                            $scope.refreshData();
                            $scope.setDelay();
                        } else {
                            $scope.formHidden = {
                                alert: '',
                                list: 'hidden',
                                add: '',
                                edit: 'hidden'
                            };
                            // set delay
                            $scope.clearInput();
                            $scope.setDelay();
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
                    // Stop Loading
                    $scope.done()
                });
        }
    };

    //edit data yang akan ditampilkan ke form
    $scope.edit = function (_id) {
        //Close Alert
        $scope.closeMe();

        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        pejabat_desa.show(_id)
            .success(function (data) {
                $scope.inputData.cbjabatan = $scope.objCombo[findWithAttr($scope.objCombo, 'id', parseInt(data.level))];
                $scope.inputData.cbfungsi = $scope.objFungsi[findWithAttr($scope.objFungsi, 'nama', data.fungsi)];
                // fill the textbox
                $scope.inputData._id = _id;
                $scope.inputData.nama = data.nama;
                $scope.formHidden = {
                    list: 'hidden',
                    alert: 'hidden',
                    add: 'hidden',
                    edit: ''
                };
                // Stop loading
                $scope.done();
            });
    };

    //update data
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
            $scope.inputData.fungsi = $scope.inputData.cbfungsi.id;
            $scope.inputData.jabatan = $scope.inputData.cbjabatan.nama;
            $scope.inputData.level = $scope.inputData.cbjabatan.id;

            pejabat_desa.update($scope.inputData)
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
                    //Set alert
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
                    $scope.redirect(data);
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

        $scope.getData()
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

    //refresh data
    $scope.refreshData = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // reset page  = 1
        $scope.main.page = 1;
        // reset term = ''
        $scope.main.term = '';
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
        $scope.formHidden.alert = 'hidden';
    }
}]);