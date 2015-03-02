app.controller('modKunciRKPDesCtrl', ['$scope', 'rkpdesdetil', '$modalInstance', 'id', 'token', function ($scope, rkpdesdetil, $modalInstance, id, token) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.hasil = {
        class: '',
        msg: ''
    };

    //Jika diklik ok
    $scope.ok = function () {
        //Disable button
        $scope.process = true;
        $scope.param = {};
        $scope.param.rkpdes_id = id;
        $scope.param.cmd = 'proses';
        $scope.param._token = token;
        rkpdesdetil.kunci($scope.param)
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
app.controller('modDeleteRKPDesDetil', ['$scope', 'rkpdesdetil', '$modalInstance', 'id', function ($scope, rkpdesdetil, $modalInstance, id) {

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

        rkpdesdetil.destroy(id)
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
app.controller('ModalLokasiRKPDesCtrl', ['$scope', 'rkpdesdetil', 'main', '$modalInstance', 'objLokasi', 'id', function ($scope, rkpdesdetil, main, $modalInstance, objLokasi, id) {
    $scope.selected = objLokasi;

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

    rkpdesdetil.getLokasi(id, $scope.main.page, $scope.main.term)
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

        rkpdesdetil.getLokasi($scope.main.page, $scope.main.term)
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
app.controller('ModDanaDesaRKPDesCtrl', ['$scope', 'rkpdesdetil', 'main', '$modalInstance', 'objDanaDesa', function ($scope, rkpdesdetil, main, $modalInstance, objDanaDesa) {
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

    rkpdesdetil.getDanaDesa($scope.main.page, $scope.main.term)
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

        rkpdesdetil.getDanaDesa($scope.main.page, $scope.main.term)
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
app.controller('modAlasanRKPDesCtrl', ['$scope', 'rkpdesdetil', '$modalInstance', 'id', function ($scope, rkpdesdetil, $modalInstance, id) {
    $scope.detil = {};
    $scope.isAjaxLoading = true;
    $scope.isAjaxLoaded = false;
    $scope.key = {};
//Enable button
    $scope.process = false;

    $scope.objPerubahan = [
        {nama: 'Peristiwa Khusus-Bencana Alam', id: 1},
        {nama: 'Peristiwa Khusus-Krisis Politik', id: 2},
        {nama: 'Peristiwa Khusus-Krisis Ekonomi', id: 3},
        {nama: 'Peristiwa Khusus-Kerusuhan Sosial Berpekepanjangan', id: 4},
        {nama: 'Kebijakan-Pemerintah', id: 5},
        {nama: 'Kebijakan-Pemerintah Provinsi', id: 6},
        {nama: 'Kebijakan-Pemerintah Kabupaten', id: 7}
    ];

    $scope.getPerubahan = function (id) {
        for (var i = 0; i < $scope.objPerubahan.length; i++) {
            if ($scope.objPerubahan[i].id === id) {
                return $scope.objPerubahan[i];
            }
        }
    };

    rkpdesdetil.show(id)
        .success(function (data) {
            $scope.detil = data;
            if (data.is_finish == 2) {
                $scope.key.class = "info";
                $scope.key.key = "Edit";
            } else if (data.is_finish == 3) {
                $scope.key.class = "warning";
                $scope.key.key = "Perubahan";
                $scope.key.keterangan = data.keterangan_reject;
            }
            $scope.isAjaxLoading = false;
            $scope.isAjaxLoaded = true;

        });
//Jika diklik ok
    $scope.ok = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('RKPDesDetilCtrl', ['$scope', 'rkpdesdetil', '$modal', '$stateParams', function ($scope, rkpdesdetil, $modal) {

    $scope.program_rpjmdes_id = $scope.$stateParams.program_id;
    $scope.detilprogram = {};
    $scope.alert1 = false;

    $scope.inputData = {};

    $scope.objSifat = [
        {id: 1, nama: 'Baru'},
        {id: 2, nama: 'Lanjutan'}
    ];
    $scope.objLokasi = {};
    $scope.objDanaDesa = {};
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

    rkpdesdetil.getrpjmdesprogram($scope.program_rpjmdes_id)
        .success(function (data) {
            if (data.is_finish != 3) {
                window.location = "/front#/desa/rkpdes";
                return false;
            }
            $scope.detilprogram = data;
        })
        .error(function (data) {
            $scope.done();
            $scope.redirect(data);
        });

    //init get data
    rkpdesdetil.get($scope.program_rpjmdes_id, $scope.main.page)
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
        .error(function (data) {
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

        rkpdesdetil.get($scope.program_rpjmdes_id, $scope.main.page)
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
            .error(function (data) {
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

        $scope.clearInput();
        $scope.formHidden = {
            list: 'hidden',
            alert: 'hidden',
            add: '',
            edit: 'hidden'
        };
        $scope.done();
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
        $scope.prevLokasi = '';
        $scope.objLokasi = {};
        $scope.prevDanaDesa = '';
        $scope.objDanaDesa = {};
        $scope.inputData.cbsifat = $scope.objSifat[0];
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
            $scope.inputData.rpjmdes_program_id = $scope.program_rpjmdes_id;
            $scope.inputData.lokasi_program_id = $scope.objLokasi._id;
            $scope.inputData.dana_desa_id = $scope.objDanaDesa._id;
            $scope.inputData.sifat = $scope.inputData.cbsifat.id;

            rkpdesdetil.store($scope.inputData)
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
                    //Set Alert Message
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

        rkpdesdetil.show(_id)
            .success(function (data) {

                rkpdesdetil.getLokasiDetil(data.lokasi._id)
                    .success(function (data1) {
                        $scope.objLokasi = data1;
                        $scope.prevLokasi = $scope.objLokasi.lokasi;
                    });
                rkpdesdetil.getDanaDesaDetil(data.dana_desa_id)
                    .success(function (data2) {
                        $scope.objDanaDesa = data2;
                        $scope.prevDanaDesa = $scope.objDanaDesa.sumberdana.sumber_dana + ' - ' + $scope.convertToRupiah($scope.objDanaDesa.sisa_anggaran);
                    });
                $scope.inputData.cbsifat = $scope.objSifat[findWithAttr($scope.objSifat, 'id', data.sifat)];
                $scope.inputData._id = _id;

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

// update data
    $scope.updateData = function () {
        // cek apakah validasi sudah benar
        if ($scope.editForm.$valid) {
            //Start Loading
            $scope.start();
            //Disable button
            $scope.btnEksekusi = true;
            // store
            $scope.inputData._token = $scope.csrf;
            $scope.inputData.rpjmdes_program_id = $scope.program_rpjmdes_id;
            $scope.inputData.lokasi_program_id = $scope.objLokasi._id;
            $scope.inputData.dana_desa_id = $scope.objDanaDesa._id;
            $scope.inputData.sifat = $scope.inputData.cbsifat.id;
            rkpdesdetil.update($scope.inputData)
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

    //Get Caption Sifat
    $scope.getSifat = function (id) {
        for (var i = 0; i < $scope.objSifat.length; i++) {
            if ($scope.objSifat[i].id === id) {
                return $scope.objSifat[i];
            }
        }
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
    };

    $scope.hapus = function (id) {
        //Close Alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modDelete.html',
            controller: 'modDeleteRKPDesDetil',
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

    $scope.kunci = function (id) {
        //Close Alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modKunci.html',
            controller: 'modKunciRKPDesCtrl',
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

    //Open modal Alokasi Dana
    $scope.prevLokasi = "";
    $scope.openLokasi = function () {
        var modalInstance = $modal.open({
            templateUrl: 'modLokasiRKPDes.html',
            controller: 'ModalLokasiRKPDesCtrl',
            size: 'lg',
            backdrop: 'static',
            resolve: {
                objLokasi: function () {
                    return $scope.objLokasi;
                },
                id: function () {
                    return $scope.program_rpjmdes_id;
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            $scope.objLokasi = selectedItem;
            $scope.prevLokasi = $scope.objLokasi.lokasi;
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.prevDanaDesa = "";
    $scope.openDanaDesa = function () {
        var modalInstance = $modal.open({
            templateUrl: 'modDanaDesa.html',
            controller: 'ModDanaDesaRKPDesCtrl',
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
            $scope.prevDanaDesa = $scope.objDanaDesa.sumberdana.sumber_dana + ' - ' + $scope.convertToRupiah($scope.objDanaDesa.sisa_anggaran);
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.alasan = function (id) {
        var modalInstance = $modal.open({
            templateUrl: 'modAlasanRKPDes.html',
            controller: 'modAlasanRKPDesCtrl',
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