app.controller('modDetilTransaksiMasuk', ['$scope', 'transaksi_masuk', '$modalInstance', 'id', function ($scope, transaksi_masuk, $modalInstance, id) {
    $scope.convertToRupiah = function (angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return rupiah.split('', rupiah.length - 1).reverse().join('');
    };
    $scope.detil = {};
    $scope.detil = {
        'satuan_harga': {
            'harga': 0
        },
        'jumlah': 0

    };
    $scope.id = id;
    $scope.isAjaxLoading = true;
    $scope.isAjaxLoaded = false;
    //Enable button
    $scope.process = false;

    transaksi_masuk.show($scope.id)
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
app.controller('modDeleteTransaksiMasuk', ['$scope', 'transaksi_masuk', '$modalInstance', 'id', function ($scope, transaksi_masuk, $modalInstance, id) {

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

        transaksi_masuk.destroy(id)
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
app.controller('TransaksiMasukCtrl', ['$scope', 'transaksi_masuk', '$modal', '$stateParams', function ($scope, transaksi_masuk, $modal) {
    //Tampil modal detil
    $scope.detil = function (id) {
        var modalInstance = $modal.open({
            templateUrl: 'modDetilBeli.html',
            controller: 'modDetilTransaksiMasuk',
            size: '',
            backdrop: 'static',
            resolve: {
                id: function () {
                    return id;
                }
            }
        });
    };

    $scope.inputData = {};

    $scope.objPendapatan = {};
    $scope.objPejabatDesa = {};

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
    transaksi_masuk.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            //Hide loading
            $scope.isFirstLoading = false;
            $scope.isFirstLoaded = true;

            // result data
            $scope.transaksi_masuk = data.data;

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

    //Parsing tanggal
    $scope.parseDate = function (dt) {
        $scope.mydate = new Date(dt);
        return $scope.mydate.getDate() + " " + $scope.mydate.getMonth() + 1 + " " + $scope.mydate.getYear();
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

        transaksi_masuk.get($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.transaksi_masuk = data.data;

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

        //Set default date
        $scope.d = new Date();
        $scope.year = $scope.d.getFullYear();
        $scope.month = $scope.d.getMonth() + 1;
        $scope.day = $scope.d.getDate();
        if ($scope.month < 10) {
            $scope.month = "0" + $scope.month;
        }
        if ($scope.day < 10) {
            $scope.day = "0" + $scope.day;
        }
        $scope.inputData.tanggal = $scope.day + "-" + $scope.month + "-" + $scope.year;

        $scope.start();
        //Disable controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        transaksi_masuk.getPendapatan()
            .success(function (data) {
                if (data.length == 0) {
                    $scope.alertset = {
                        class: 'warning',
                        msg: {
                            msg: 'Anda belum memiliki data pendapatan yang terverifikasi'
                        }
                    };
                    $scope.done();

                    $scope.disConUmum(false);
                    $scope.disConAksi(false);

                    $scope.formHidden.alert = "";
                    $scope.setDelay();
                    return false;
                }
                transaksi_masuk.getPejabatDesa()
                    .success(function (data1) {
                        if (data1.length == 0) {
                            $scope.alertset = {
                                class: 'warning',
                                msg: {
                                    msg: 'Anda belum memiliki data pejabat desa, silahkan tambakan terlebih dahulu!'
                                }
                            };
                            $scope.done();

                            $scope.disConUmum(false);
                            $scope.disConAksi(false);

                            $scope.formHidden.alert = "";
                            $scope.setDelay();
                            return false;
                        }
                        $scope.objPendapatan = data;
                        $scope.inputData.cbpendapatan = $scope.objPendapatan[0];
                        $scope.objPejabatDesa = data1;
                        $scope.inputData.cbpejabat = $scope.objPejabatDesa[0];

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
        $scope.inputData.cbpendapatan = $scope.objPendapatan[0];
        $scope.inputData.cbpejabat = $scope.objPejabatDesa[0];
        $scope.inputData.pendapatan_id = "";
        $scope.inputData.pendapatan = "";
        $scope.inputData.kode_rekening = "";
        $scope.inputData.pejabat_desa_id = "";
        $scope.inputData.penerima = "";
        $scope.inputData.transaksi_masuk = '';
        $scope.inputData.nomor_bukti = '';
        $scope.inputData.jumlah = '';

        $scope.d = new Date();
        $scope.year = $scope.d.getFullYear();
        $scope.month = $scope.d.getMonth() + 1;
        if ($scope.month < 10) {
            $scope.month = "0" + $scope.month;
        }
        $scope.day = $scope.d.getDate();
        $scope.inputData.tanggal = $scope.day + "-" + $scope.month + "-" + $scope.year;
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
            //Parse if object is a date
            if ($scope.inputData.tanggal instanceof Date) {
                $scope.d = new Date();
                $scope.year = $scope.d.getFullYear();
                $scope.month = $scope.d.getMonth() + 1;
                $scope.day = $scope.d.getDate();
                if ($scope.month < 10) {
                    $scope.month = "0" + $scope.month;
                }
                if ($scope.day < 10) {
                    $scope.day = "0" + $scope.day;
                }
                $scope.inputData.tanggal = $scope.day + "-" + $scope.month + "-" + $scope.year;
            }

            $scope.inputData.pendapatan_id = $scope.inputData.cbpendapatan._id;
            $scope.inputData.pendapatan = $scope.inputData.cbpendapatan.pendapatan;
            $scope.inputData.kode_rekening = $scope.inputData.cbpendapatan.kode_rekening;
            $scope.inputData.pejabat_desa_id = $scope.inputData.cbpejabat._id;
            $scope.inputData.penerima = $scope.inputData.cbpejabat.nama;
            $scope.inputData._token = $scope.csrf;
            transaksi_masuk.store($scope.inputData)
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
                    //Set Aalert Message
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

        transaksi_masuk.show(_id)
            .success(function (data) {
                transaksi_masuk.getPendapatan()
                    .success(function (data1) {
                        transaksi_masuk.getPejabatDesa()
                            .success(function (data2) {
                                $scope.objPendapatan = data1;
                                $scope.objPejabatDesa = data2;

                                $scope.inputData.cbpendapatan = $scope.objPendapatan[findWithAttr($scope.objPendapatan, '_id', data.pendapatan_id)];
                                $scope.inputData.cbpejabat = $scope.objPejabatDesa[findWithAttr($scope.objPejabatDesa, '_id', data.pejabat_desa_id)];

                                // fill the textbox
                                $scope.inputData._id = _id;
                                $scope.inputData.transaksi_masuk = data.transaksi_masuk;
                                //$scope.dtgl = new Date(data.tanggal);

                                //Parse if object is a date
                                if (data.tanggal instanceof Date) {
                                    $scope.d = new Date($scope.inputData.tanggal);
                                    $scope.year = $scope.d.getFullYear();
                                    $scope.month = $scope.d.getMonth() + 1;
                                    if ($scope.month < 10) {
                                        $scope.month = "0" + $scope.month;
                                    }
                                    $scope.day = $scope.d.getDate();
                                    $scope.inputData.tanggal = $scope.day + "-" + $scope.month + "-" + $scope.year;
                                } else {
                                    $scope.inputData.tanggal = data.tanggal;
                                }

                                //$scope.inputData.tanggal = $scope.dtgl.getDate() + "-" + $scope.dtgl.getMonth() + 1 + "-" + $scope.dtgl.getYear();
                                $scope.inputData.nomor_bukti = data.nomor_bukti;
                                $scope.inputData.jumlah = data.jumlah;

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
            $scope.success = '';
            $scope.msg = '';
            // store
            //Parse if object is a date
            if ($scope.inputData.tanggal instanceof Date) {
                $scope.d = new Date();
                $scope.year = $scope.d.getFullYear();
                $scope.month = $scope.d.getMonth() + 1;
                $scope.day = $scope.d.getDate();
                if ($scope.month < 10) {
                    $scope.month = "0" + $scope.month;
                }
                if ($scope.day < 10) {
                    $scope.day = "0" + $scope.day;
                }
                $scope.inputData.tanggal = $scope.day + "-" + $scope.month + "-" + $scope.year;
            }
            $scope.inputData.pendapatan_id = $scope.inputData.cbpendapatan._id;
            $scope.inputData.pendapatan = $scope.inputData.cbpendapatan.pendapatan;
            $scope.inputData.kode_rekening = $scope.inputData.cbpendapatan.kode_rekening;
            $scope.inputData.pejabat_desa_id = $scope.inputData.cbpejabat._id;
            $scope.inputData.penerima = $scope.inputData.cbpejabat.nama;
            $scope.inputData._token = $scope.csrf;
            transaksi_masuk.update($scope.inputData)
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

    $scope.clear = function () {
        $scope.inputData.tanggal = null;
    };

    // Disable weekend selection
    $scope.disabled = function (date, mode) {
        return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
    };

    $scope.toggleMin = function () {
        $scope.minDate = $scope.minDate ? null : new Date();
    };
    $scope.toggleMin();

    $scope.open = function ($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened = true;
    };

    $scope.dateOptions = {
        formatYear: 'yy',
        startingDay: 1,
        class: 'datepicker'
    };

    $scope.initDate = new Date('2016-15-20');
    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
    $scope.format = $scope.formats[0];
    //End of datepicker

    //CLose Alert
    $scope.closeMe = function () {
        $scope.formHidden.alert = 'hidden';
    };

    //Tampil Modal delete
    $scope.hapus = function (id) {
        //Close Alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modDelete.html',
            controller: 'modDeleteTransaksiMasuk',
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