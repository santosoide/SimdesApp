app.controller('modDeleteUser2', ['$scope', 'user2', '$modalInstance', 'id', function ($scope, user2, $modalInstance, id) {

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

        user2.destroy(id)
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
app.controller('UserCtrl2', ['$scope', 'user2', '$modal', '$stateParams', function ($scope, user2, $modal) {

    $scope.inputData = {};

    $scope.objCombo = [
        {name: 'Administrator', id: 210, fid: 1},
        {name: 'Kepala BPMD', id: 220, fid: 2},
        {name: 'Pimpinan', id: 230, fid: 3},
        {name: 'SKPD-Adm. Pembangunan', id: 240, fid: 4},
        {name: 'SKPD-BAPEDA', id: 250, fid: 5},
        {name: 'SKPD-BPMD', id: 260, fid: 6},
        {name: 'SKPD-Fasilitator', id: 270, fid: 7},
        {name: 'SKPD-Hukum', id: 280, fid: 8},
        {name: 'SKPD-Inspektorat', id: 290, fid: 9},
        {name: 'SKPD-Keuangan Daerah', id: 300, fid: 10},
        {name: 'SKPD-Urusan', id: 310, fid: 11},
        {name: 'SKPD-Verifikasi', id: 320, fid: 12}
    ];
    $scope.inputData.cblevel = $scope.objCombo[0];

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
    user2.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            //Hide loading
            $scope.isFirstLoading = false;
            $scope.isFirstLoaded = true;

            // result data
            $scope.user = data.data;

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

        user2.get($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.user = data.data;

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

        $scope.inputData.cblevel = $scope.objCombo[0];
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
        $scope.inputData.email = "";
        $scope.inputData.password = "";
        $scope.inputData.password_confirmation = "";
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
            $scope.inputData.level = $scope.inputData.cblevel.fid;
            $scope.inputData._token = $scope.csrf;
            user2.store($scope.inputData)
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

        user2.show(_id)
            .success(function (data) {
                $scope.inputData.cblevel = $scope.objCombo[findWithAttr($scope.objCombo, 'id', parseInt(data.level))];

                // fill the textbox
                $scope.inputData._id = _id;
                $scope.inputData.nama = data.nama;
                $scope.inputData.email = data.email;
                $scope.inputData.is_active = data.is_active;
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
            $scope.inputData.level = $scope.inputData.cblevel.fid;
            user2.update($scope.inputData)
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

    //Close alert
    $scope.closeMe = function () {
        $scope.formHidden.alert = 'hidden';
    };

    $scope.hapus = function (id) {
        //Close Alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modDelete.html',
            controller: 'modDeleteUser2',
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