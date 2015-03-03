app.controller('modDetilTransaksiKeluar', ['$scope', 'transaksi_keluar', '$modalInstance', 'id', function ($scope, transaksi_keluar, $modalInstance, id) {
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

    transaksi_keluar.show($scope.id)
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
app.controller('ModalDanaDesaTransaksiKeluarCtrl', ['$scope', 'transaksi_keluar', 'main', '$modalInstance', 'objDanaDesa', function ($scope, transaksi_keluar, main, $modalInstance, objDanaDesa) {
    $scope.selected = objDanaDesa;

    $scope.btnPilih = true;
    $scope.main = {
        page: 1,
        term: ''
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

    $scope.pilih = function (data) {
        $scope.selected = data;
        $scope.btnPilih = false;
    };

    $scope.convertToRupiah = function (angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return rupiah.split('', rupiah.length - 1).reverse().join('');
    };

    //Disable Control Eksekusi
    $scope.btnEksekusi = false;

    transaksi_keluar.getDanaDesa($scope.main.page, $scope.main.term)
        .success(function (data) {
            // result data
            $scope.dana_desa = data.data;

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

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        transaksi_keluar.getDanaDesa($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.satuan_harga = data.data;

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
                $scope.disConUmum(false);
                $scope.disConAksi(false);
            })
            .error(function (data) {
                $scope.done();
                $scope.redirect(data);
            })
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

        // panggil ajax data
        $scope.getData();
    };

    //Cari Data
    $scope.cari = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.main.page = 1;
        $scope.getData();
    };

    $scope.ok = function () {
        $modalInstance.close($scope.selected);
    };

    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modDeleteTransaksiKeluar', ['$scope', 'transaksi_keluar', '$modalInstance', 'id', function ($scope, transaksi_keluar, $modalInstance, id) {

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

        transaksi_keluar.destroy(id)
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
app.controller('ModalSSHCtrl', ['$scope', 'transaksi_keluar', '$modalInstance', 'ssh', function ($scope, transaksi_keluar, $modalInstance, ssh) {
    //$scope.ssh = ssh;
    $scope.selected = ssh;

    $scope.btnPilih = true;
    $scope.main = {
        page: 1,
        term: ''
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

    $scope.pilih = function (data) {
        $scope.selected = data;
        $scope.btnPilih = false;
    };

    //Disable Control Eksekusi
    $scope.btnEksekusi = false;

    transaksi_keluar.getSSH($scope.main.page, $scope.main.term)
        .success(function (data) {
            // result data
            $scope.satuan_harga = data.data;

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

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        transaksi_keluar.getSSH($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.satuan_harga = data.data;

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
                $scope.disConUmum(false);
                $scope.disConAksi(false);
            })
            .error(function (data) {
                $scope.done();
                $scope.redirect(data);
            })
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

        // panggil ajax data
        $scope.getData();
    };

    //Cari Data
    $scope.cari = function () {

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.main.page = 1;
        $scope.getData();
    };

    $scope.ok = function () {
        $modalInstance.close($scope.selected);
    };

    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('TransaksiKeluarCtrl', ['$scope', 'transaksi_keluar', '$modal', '$stateParams', function ($scope, transaksi_keluar, $modal) {
    //Tampil modal hapus
    $scope.hapus = function (id) {
        //Close Alert
        $scope.formHidden.alert = 'hidden';

        var modalInstance = $modal.open({
            templateUrl: 'modDelete.html',
            controller: 'modDeleteTransaksiKeluar',
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

    //Tampil modal detil
    $scope.detil = function (id) {
        var modalInstance = $modal.open({
            templateUrl: 'modDetilBelanja.html',
            controller: 'modDetilTransaksiKeluar',
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
    $scope.objBelanja = {};
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
    transaksi_keluar.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            //Hide loading
            $scope.isFirstLoading = false;
            $scope.isFirstLoaded = true;

            // result data
            $scope.transaksi_keluar = data.data;

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

        transaksi_keluar.get($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.transaksi_keluar = data.data;

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

        //Set default jumlah
        $scope.start();
        //Disable controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        transaksi_keluar.getBelanja()
            .success(function (data) {
                if (data.length == 0) {
                    $scope.alertset = {
                        class: 'warning',
                        msg: {
                            msg: 'Anda belum memiliki data belanja yang terverifikasi'
                        }
                    };
                    $scope.done();
                    $scope.disConUmum(false);
                    $scope.disConAksi(false);

                    $scope.formHidden.alert = "";
                    $scope.setDelay();
                    return false;
                }
                transaksi_keluar.getPejabatDesa()
                    .success(function (data1) {
                        if (data1.length == 0) {
                            $scope.alertset = {
                                class: 'warning',
                                msg: {
                                    msg: 'Anda belum memiliki data pejabat desa, silakan tambahkan terlebih dahulu!'
                                }
                            };
                            $scope.done();

                            $scope.disConUmum(false);
                            $scope.disConAksi(false);

                            $scope.formHidden.alert = "";
                            $scope.setDelay();
                            return false;
                        }
                        $scope.objBelanja = data;
                        $scope.inputData.cbbelanja = $scope.objBelanja[0];
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
        $scope.inputData.cbbelanja = $scope.objBelanja[0];
        $scope.inputData.cbpejabat = $scope.objPejabatDesa[0];
        $scope.inputData.belanja_id = "";
        $scope.inputData.belanja = "";
        $scope.inputData.kode_rekening = "";
        $scope.inputData.pejabat_desa_id = "";
        $scope.inputData.penerima = "";
        $scope.prev = "";
        $scope.ssh = {};
        $scope.prev2 = "";
        $scope.objDanaDesa = {};
        $scope.inputData.item = "";
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

            $scope.inputData.belanja_id = $scope.inputData.cbbelanja._id;
            $scope.inputData.belanja = $scope.inputData.cbbelanja.belanja;
            $scope.inputData.kode_rekening = $scope.inputData.cbbelanja.kode_rekening;

            $scope.inputData.standar_satuan_harga_id = $scope.ssh._id;
            $scope.inputData.harga = $scope.ssh.harga;
            $scope.inputData.real_harga = $scope.ssh.harga;
            $scope.inputData.kode_barang = $scope.ssh.kode_rekening;

            $scope.inputData.pejabat_desa_id = $scope.inputData.cbpejabat._id;
            $scope.inputData.penerima = $scope.inputData.cbpejabat.nama;

            $scope.inputData.dana_desa_id = $scope.objDanaDesa._id;

            $scope.inputData.jumlah = eval($scope.inputData.item * $scope.ssh.harga);

            $scope.inputData._token = $scope.csrf;
            transaksi_keluar.store($scope.inputData)
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

        transaksi_keluar.show(_id)
            .success(function (data) {
                transaksi_keluar.getBelanja()
                    .success(function (data1) {
                        transaksi_keluar.getPejabatDesa()
                            .success(function (data2) {
                                transaksi_keluar.getSSHDetil(data.standar_satuan_harga_id)
                                    .success(function (datay) {
                                        $scope.selected = datay;
                                        $scope.prev = $scope.selected.barang + ' - ' + $scope.selected.spesifikasi + ' - ' + $scope.selected.satuan + ' - ' + $scope.convertToRupiah($scope.selected.harga);
                                        $scope.ssh = datay;
                                    });
                                transaksi_keluar.getDanaDesaDetil(data.dana_desa_id)
                                    .success(function (data3) {
                                        $scope.objBelanja = data1;
                                        $scope.objPejabatDesa = data2;
                                        $scope.objDanaDesa = data3;

                                        $scope.prev2 = $scope.objDanaDesa.sumberdana.sumber_dana + " - " + $scope.convertToRupiah(data3.sisa_anggaran);
                                        $scope.inputData.cbbelanja = $scope.objBelanja[findWithAttr($scope.objBelanja, '_id', data.belanja_id)];
                                        $scope.inputData.cbpejabat = $scope.objPejabatDesa[findWithAttr($scope.objPejabatDesa, '_id', data.pejabat_desa_id)];

                                        // fill the textbox
                                        $scope.inputData._id = _id;

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
                                        $scope.inputData.item = data.item;

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
            $scope.inputData.belanja_id = $scope.inputData.cbbelanja._id;
            $scope.inputData.belanja = $scope.inputData.cbbelanja.belanja;
            $scope.inputData.kode_rekening = $scope.inputData.cbbelanja.kode_rekening;

            $scope.inputData.standar_satuan_harga_id = $scope.ssh._id;
            $scope.inputData.harga = $scope.ssh.harga;
            $scope.inputData.real_harga = $scope.ssh.harga;
            $scope.inputData.kode_barang = $scope.ssh.kode_rekening;

            $scope.inputData.pejabat_desa_id = $scope.inputData.cbpejabat._id;
            $scope.inputData.penerima = $scope.inputData.cbpejabat.nama;

            $scope.inputData.dana_desa_id = $scope.objDanaDesa._id;

            $scope.inputData.jumlah = eval($scope.inputData.item * $scope.ssh.harga);

            $scope.inputData._token = $scope.csrf;
            transaksi_keluar.update($scope.inputData)
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
                    //Setalert message
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

    //Open modal SSH
    $scope.prev = "";
    $scope.ssh = {};
    $scope.openModalSSH = function (size) {
        var modalInstance = $modal.open({
            templateUrl: 'modSSH.html',
            controller: 'ModalSSHCtrl',
            size: size,
            backdrop: 'static',
            resolve: {
                ssh: function () {
                    return $scope.ssh;
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            $scope.selected = selectedItem;
            $scope.ssh = $scope.selected;
            $scope.prev = $scope.selected.barang + ' - ' + $scope.selected.spesifikasi + ' - ' + $scope.selected.satuan + ' - ' + $scope.convertToRupiah($scope.selected.harga);
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    //Open modal Alokasi Dana
    $scope.prev2 = "";
    $scope.objDanaDesa = {};
    $scope.openModalDanaDesa = function () {
        var modalInstance = $modal.open({
            templateUrl: 'modDanaDesa.html',
            controller: 'ModalDanaDesaTransaksiKeluarCtrl',
            size: 'lg',
            backdrop: 'static',
            resolve: {
                objDanaDesa: function () {
                    return $scope.objDanaDesa;
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            $scope.objDanaDesa = selectedItem;
            $scope.prev2 = $scope.objDanaDesa.sumberdana.sumber_dana + ' - ' + $scope.convertToRupiah($scope.objDanaDesa.sisa_anggaran);
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    //CLose Alert
    $scope.closeMe = function () {
        $scope.formHidden.alert = 'hidden';
    }
}]);