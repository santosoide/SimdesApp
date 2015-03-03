app.controller('modPelaksanaanRPJMDes', ['$scope', 'rpjmdes_program', '$modalInstance', 'id', 'token', function ($scope, rpjmdes_program, $modalInstance, id, token) {

//Enable button
    $scope.showalert = 'hidden';
    $scope.process = true;
    $scope.isAjaxLoading = true;
    $scope.isAjaxLoaded = false;
    $scope.inputData = {};
    $scope.detail = {};
    rpjmdes_program.show(id)
        .success(function (data) {
            $scope.isAjaxLoading = false;
            $scope.isAjaxLoaded = true;
            $scope.process = false;
            $scope.detail = data;
            $scope.inputData.tahun_1 = data.tahun_1;
            $scope.inputData.tahun_2 = data.tahun_2;
            $scope.inputData.tahun_3 = data.tahun_3;
            $scope.inputData.tahun_4 = data.tahun_4;
            $scope.inputData.tahun_5 = data.tahun_5;
            $scope.inputData.tahun_6 = data.tahun_6;
        });

    $scope.rata = function () {
        $scope.nRata = $scope.detail.pagu_anggaran / 6;
        $scope.inputData.tahun_1 = $scope.nRata;
        $scope.inputData.tahun_2 = $scope.nRata;
        $scope.inputData.tahun_3 = $scope.nRata;
        $scope.inputData.tahun_4 = $scope.nRata;
        $scope.inputData.tahun_5 = $scope.nRata;
        $scope.inputData.tahun_6 = $scope.nRata;
        $scope.inputData.tahun_1 += $scope.detail.pagu_anggaran % 6;
    };

    $scope.submitData = function () {
        //Close Alert
        $scope.showalert = 'hidden';

        $scope.process = true;

        $scope.inputData._token = token;
        rpjmdes_program.simpanpelaksanaan($scope.inputData, id)
            .success(function (data) {
                if (data.success == true) {
                    $scope.ok();
                } else {
                    $scope.alertset = {
                        class: 'danger',
                        msg: data.message
                    };
                    $scope.showalert = '';
                    $scope.process = false;
                }
            }
        )
            .error(function (data) {
                $scope.done();
                $scope.redirect(data);
            })
    };

    $scope.closeMe = function () {
        $scope.showalert = 'hidden';
    };

    $scope.ok = function () {
        $modalInstance.close($scope.message);
    };

    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modRincianCtrl', ['$scope', 'rpjmdes_program', '$modalInstance', 'data', function ($scope, rpjmdes_program, $modalInstance, data) {
    $scope.detil = {};
    $scope.detil.pagu_anggaran = 0;
    $scope.detil.tahun_1 = 0;
    $scope.detil.tahun_2 = 0;
    $scope.detil.tahun_3 = 0;
    $scope.detil.tahun_4 = 0;
    $scope.detil.tahun_5 = 0;
    $scope.detil.tahun_6 = 0;
    $scope.data = data;
    $scope.isAjaxLoading = true;
    $scope.isAjaxLoaded = false;
    $scope.key = {};
//Enable button
    $scope.process = false;

    rpjmdes_program.show($scope.data)
        .success(function (dataAjax) {
            $scope.detil = dataAjax;
            if (data.is_finish == 2) {
                $scope.key.class = "warning";
                $scope.key.key = "Revisi";
                $scope.key.keterangan = dataAjax.keterangan_revisi;
            } else if (dataAjax.is_finish == 4) {
                $scope.key.class = "danger";
                $scope.key.key = "Ditolak";
                $scope.key.keterangan = dataAjax.keterangan_reject;
            }
            $scope.isAjaxLoading = false;
            $scope.isAjaxLoaded = true;
        });

    $scope.convertToRupiah = function (angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return rupiah.split('', rupiah.length - 1).reverse().join('');
    };

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
//Jika diklik ok
    $scope.ok = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modAlasanTolakCtrl', ['$scope', 'rpjmdes_program', '$modalInstance', 'data', function ($scope, rpjmdes_program, $modalInstance, data) {
    $scope.detil = {};
    $scope.data = data;
    $scope.isAjaxLoading = true;
    $scope.isAjaxLoaded = false;
    $scope.key = {};
//Enable button
    $scope.process = false;

    rpjmdes_program.show($scope.data)
        .success(function (data) {
            $scope.detil = data;
            if (data.is_finish == 2) {
                $scope.key.class = "warning";
                $scope.key.key = "Revisi";
                $scope.key.keterangan = data.keterangan_revisi;
            } else if (data.is_finish == 4) {
                $scope.key.class = "danger";
                $scope.key.key = "Ditolak";
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
app.controller('modDeleteRPJMDesProgram', ['$scope', 'rpjmdes_program', '$modalInstance', 'id', function ($scope, rpjmdes_program, $modalInstance, id) {

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

        rpjmdes_program.destroy(id)
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
app.controller('ModalDanaDesaCtrl', ['$scope', 'rpjmdes_program', 'main', '$modalInstance', 'objDanaDesa', function ($scope, rpjmdes_program, main, $modalInstance, objDanaDesa) {
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

    rpjmdes_program.getDanaDesa($scope.main.page, $scope.main.term)
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

        rpjmdes_program.getDanaDesa($scope.main.page, $scope.main.term)
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
app.controller('RPJMDesProgramCtrl', ['$scope', 'rpjmdes_program', '$modal', '$stateParams', function ($scope, rpjmdes_program, $modal) {

    $scope.alert1 = false;

    $scope.inputData = {};

    $scope.objKewenangan = {};
    $scope.objBidang = {};
    $scope.objProgram = {};
    $scope.objSumberDana = {};
    $scope.objKegiatan = {};
    $scope.objPelaksanaan = [
        {_id: 0, pelaksanaan: 'Swakelola'},
        {_id: 1, pelaksanaan: 'Kerja sama antar desa'},
        {_id: 2, pelaksanaan: 'Kerja sama pihak ketiga'}
    ];

    $scope.inputData.cbpelaksanaan = $scope.objPelaksanaan[0];

    $scope.loadBidang = true;
    $scope.loadProgram = true;
    $scope.loadKegiatan = true;

    $scope.aGetBidang = false;
    $scope.aGetProgram = false;
    $scope.aGetKegiatan = false;
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
    rpjmdes_program.get($scope.main.page, $scope.main.term)
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

    //Get Caption Pelaksanaan
    $scope.getPelaksanaan = function (id) {
        for (var i = 0; i < $scope.objPelaksanaan.length; i++) {
            if ($scope.objPelaksanaan[i]._id === id) {
                return $scope.objPelaksanaan[i];
            }
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

        rpjmdes_program.get($scope.main.page, $scope.main.term)
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
        $scope.inputData.cbpelaksanaan = $scope.objPelaksanaan[0];
        //Disable controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);
        rpjmdes_program.getkewenangan()
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
                data.unshift({_id: 0, kewenangan: 'Silahkan pilih kewenangan'});
                $scope.objKewenangan = data;
                $scope.inputData.kewenangan = $scope.objKewenangan[0];

                rpjmdes_program.getsumberdana()
                    .success(function (data1) {
                        $scope.objSumberDana = data1;
                        $scope.inputData.sumber_dana = $scope.objSumberDana[0];

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

                    })

            })
            .error(function (dat) {

            });
    };

    //Combo Kewenangan diganti
    $scope.setBidang = function () {
        $scope.objBidang = {};
        $scope.objProgram = {};
        $scope.objKegiatan = {};
        $scope.loadBidang = true;
        $scope.loadProgram = true;
        $scope.loadKegiatan = true;
        $scope.aGetBidang = false;
        $scope.aGetProgram = false;
        $scope.aGetKegiatan = false;
        if ($scope.inputData.kewenangan._id == 0) {
            return false;
        }
        rpjmdes_program.getbidang($scope.inputData.kewenangan._id)
            .success(function (data) {
                if (data.length > 0) {
                    data.unshift({_id: 0, bidang: 'Silahkan pilih bidang'});
                    $scope.objBidang = data;
                    $scope.inputData.bidang = $scope.objBidang[0];
                    $scope.loadBidang = false;
                } else {
                    $scope.aGetBidang = true;
                }
            })
    };

    //Combo Bidang diganti
    $scope.setProgram = function () {
        $scope.objProgram = {};
        $scope.objKegiatan = {};
        $scope.loadProgram = true;
        $scope.loadKegiatan = true;
        $scope.aGetProgram = false;
        $scope.aGetKegiatan = false;
        if ($scope.inputData.bidang._id == 0) {
            return false;
        }
        rpjmdes_program.getprogram($scope.inputData.bidang._id)
            .success(function (data) {
                if (data.length > 0) {
                    data.unshift({_id: 0, program: 'Silahkan pilih sub bidang'});
                    $scope.objProgram = data;
                    $scope.inputData.program = $scope.objProgram[0];
                    $scope.loadProgram = false;
                } else {
                    $scope.aGetProgram = true;
                }
            })
    };

    //Combo Sub Bidang diganti
    $scope.setKegiatan = function () {
        $scope.objKegiatan = {};
        $scope.loadKegiatan = true;
        $scope.aGetKegiatan = false;
        if ($scope.inputData.program._id == 0) {
            return false;
        }
        rpjmdes_program.getkegiatan($scope.inputData.program._id)
            .success(function (data) {
                if (data.length > 0) {
                    //data.unshift({_id: 0, kegiatan: 'Silahkan pilih kegiatan'});
                    $scope.objKegiatan = data;
                    $scope.inputData.kegiatan = $scope.objKegiatan[0];
                    $scope.loadKegiatan = false;
                } else {
                    $scope.aGetKegiatan = true;
                }
            })
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
        $scope.inputData = {};

        $scope.objBidang = {};
        $scope.objProgram = {};
        $scope.objKegiatan = {};
        $scope.inputData.kewenangan = $scope.objKewenangan[0];
        $scope.inputData.cbpelaksanaan = $scope.objPelaksanaan[0];
        $scope.inputData.sumber_dana = $scope.objSumberDana[0];

        $scope.loadBidang = true;
        $scope.loadProgram = true;
        $scope.loadKegiatan = true;

        $scope.aGetBidang = false;
        $scope.aGetProgram = false;
        $scope.aGetKegiatan = false;

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

            // store
            $scope.inputData._token = $scope.csrf;
            $scope.inputData.kegiatan_id = $scope.inputData.kegiatan._id;
            $scope.inputData.sumber_dana_id = $scope.inputData.sumber_dana._id;
            $scope.inputData.pelaksanaan = $scope.inputData.cbpelaksanaan._id;

            rpjmdes_program.store($scope.inputData)
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

        $scope.loadBidang = false;
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        rpjmdes_program.show(_id)
            .success(function (data) {
                rpjmdes_program.getkewenangan()
                    .success(function (data1) {
                        $scope.objKewenangan = data1;
                        $scope.inputData.kewenangan = $scope.objKewenangan[findWithAttr($scope.objKewenangan, '_id', data.kegiatan.program.bidang.kewenangan._id)];

                        rpjmdes_program.getbidang($scope.inputData.kewenangan._id)
                            .success(function (data2) {
                                $scope.objBidang = data2;
                                $scope.inputData.bidang = $scope.objBidang[findWithAttr($scope.objBidang, '_id', data.kegiatan.program.bidang._id)];
                                $scope.loadBidang = false;

                                rpjmdes_program.getprogram($scope.inputData.bidang._id)
                                    .success(function (data3) {
                                        $scope.objProgram = data3;
                                        $scope.inputData.program = $scope.objProgram[findWithAttr($scope.objProgram, '_id', data.kegiatan.program._id)];
                                        $scope.loadProgram = false;

                                        rpjmdes_program.getkegiatan($scope.inputData.program._id)
                                            .success(function (data4) {
                                                $scope.objKegiatan = data4;
                                                $scope.inputData.kegiatan = $scope.objKegiatan[findWithAttr($scope.objKegiatan, '_id', data.kegiatan._id)];
                                                $scope.loadKegiatan = false;

                                                rpjmdes_program.getsumberdana()
                                                    .success(function (data5) {
                                                        $scope.objSumberDana = data5;
                                                        $scope.inputData.sumber_dana = $scope.objSumberDana[findWithAttr($scope.objSumberDana, '_id', data.sumber_dana_id)];

                                                        // fill the textbox
                                                        $scope.inputData._id = _id;
                                                        $scope.inputData.cbpelaksanaan = $scope.objPelaksanaan[findWithAttr($scope.objPelaksanaan, '_id', parseInt(data.pelaksanaan, 10))];
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
            $scope.inputData.kegiatan_id = $scope.inputData.kegiatan._id;
            $scope.inputData.sumber_dana_id = $scope.inputData.sumber_dana._id;
            $scope.inputData.pelaksanaan = $scope.inputData.cbpelaksanaan._id;
            $scope.inputData._token = $scope.csrf;

            rpjmdes_program.update($scope.inputData)
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

    $scope.pelaksanaan = function (_id) {
        //Close Alert
        $scope.closeMe();

        $scope.inputEdit = {};
        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);
        $scope.inputEdit._token = $scope.csrf;
        $scope.inputEdit.rpjmdes_program_id = _id;
        rpjmdes_program.hitungpelaksanaan($scope.inputEdit)
            .success(function (data) {
                if (data.success == true) {
                    if (data.message.pagu_anggaran == 0) {
                        $scope.alertset = {
                            class: 'warning',
                            msg: {
                                msg: 'Silahkan masukkan data lokasi program'
                            }
                        };
                        $scope.formHidden.alert = '';
                    } else {
                        var modalInstance = $modal.open({
                            templateUrl: 'modPelaksanaan.html',
                            controller: 'modPelaksanaanRPJMDes',
                            size: '',
                            backdrop: 'static',
                            resolve: {
                                id: function () {
                                    return _id;
                                },
                                token: function () {
                                    return $scope.csrf;
                                }
                            }
                        });

                        modalInstance.result.then(function () {
                            $scope.alertset = {
                                class: 'success',
                                msg: {
                                    msg: 'Sukses: Set pelaksanaan berhasil'
                                }
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
                    }
                } else {
                    $scope.alertset = {
                        class: 'danger',
                        msg: data.message
                    };
                    $scope.formHidden.alert = '';
                }
                $scope.disConUmum(false);
                $scope.disConAksi(false);
                $scope.done();
            })
            .error(function (data) {
                $scope.done();
                $scope.redirect(data);
            })
    };

    $scope.request = function (_id) {
        //Close Alert
        $scope.closeMe();

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.param = {};
        $scope.param.rpjmdes_program_id = _id;
        $scope.param.cmd = 'proses';
        $scope.param._token = $scope.csrf;
        rpjmdes_program.request($scope.param)
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
                        list: '',
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
    };

    $scope.batal_request = function (_id) {
        //Close Alert
        $scope.closeMe();

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.param = {};
        $scope.param.rpjmdes_program_id = _id;
        $scope.param.cmd = '';
        $scope.param._token = $scope.csrf;
        rpjmdes_program.request($scope.param)
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
                        list: '',
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
    };

    $scope.alasan = function (data) {
        var modalInstance = $modal.open({
            templateUrl: 'modAlasanTolak.html',
            controller: 'modAlasanTolakCtrl',
            size: '',
            backdrop: 'static',
            resolve: {
                data: function () {
                    return data;
                }
            }
        });
    };

    $scope.rincian = function (data) {
        var modalInstance = $modal.open({
            templateUrl: 'modRincian.html',
            controller: 'modRincianCtrl',
            size: '',
            backdrop: 'static',
            resolve: {
                data: function () {
                    return data;
                }
            }
        });
    };

    //Open modal Alokasi Dana
    $scope.prev = "";
    $scope.objDanaDesa = {};
    $scope.openModalDanaDesa = function () {
        var modalInstance = $modal.open({
            templateUrl: 'modDanaDesa.html',
            controller: 'ModalDanaDesaCtrl',
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
            $scope.prev = $scope.objDanaDesa.sumberdana.sumber_dana + ' - ' + $scope.convertToRupiah($scope.objDanaDesa.sisa_anggaran);
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
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
            controller: 'modDeleteRPJMDesProgram',
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