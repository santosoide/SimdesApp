app.controller('modDeleteBelanja', ['$scope', 'belanja', '$modalInstance', 'id', function ($scope, belanja, $modalInstance, id) {

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

        belanja.destroy(id)
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
app.controller('modRealisasiBelanja', ['$scope', 'belanja', '$modalInstance', 'id', 'jumlah', 'token', 'obj', function ($scope, belanja, $modalInstance, id, jumlah, token, obj) {
    $scope.jenismenu = "Belanja";

    $scope.id = id;
    $scope.jumlah = jumlah;
    $scope.token = token;
    $scope.obj = obj;

    $scope.showalert = "hidden";
    $scope.alertset = {
        class: 'success',
        msg: {}
    };

    $scope.inputData = {
        januari: $scope.obj.januari,
        februari: $scope.obj.februari,
        maret: $scope.obj.maret,
        april: $scope.obj.april,
        mei: $scope.obj.mei,
        juni: $scope.obj.juni,
        juli: $scope.obj.juli,
        agustus: $scope.obj.agustus,
        september: $scope.obj.september,
        oktober: $scope.obj.oktober,
        november: $scope.obj.november,
        desember: $scope.obj.desember
    };

    //Disable Control Eksekusi
    $scope.btnEksekusi = false;

    $scope.nrata = Math.floor(parseInt(jumlah) / 12);

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

    $scope.sup = function () {
        $(".top-modal").animate({
            scrollTop: 0
        }, "slow");
    };

    $scope.rata = function () {
        //alert($scope.nrata);
        $scope.inputData.januari = $scope.nrata;
        $scope.inputData.februari = $scope.nrata;
        $scope.inputData.maret = $scope.nrata;
        $scope.inputData.april = $scope.nrata;
        $scope.inputData.mei = $scope.nrata;
        $scope.inputData.juni = $scope.nrata;
        $scope.inputData.juli = $scope.nrata;
        $scope.inputData.agustus = $scope.nrata;
        $scope.inputData.september = $scope.nrata;
        $scope.inputData.oktober = $scope.nrata;
        $scope.inputData.november = $scope.nrata;
        $scope.inputData.desember = $scope.nrata;
        $scope.nsisa = parseInt(jumlah) - ($scope.nrata * 12)
    };

    $scope.submitData = function () {
        $scope.showalert = 'hidden';
        $scope.btnEksekusi = true;

        $scope.inputData._token = $scope.token;
        $scope.inputData._id = $scope.id;
        belanja.simpanpelaksanaan($scope.inputData)
            .success(function (data) {
                if (data.success == true) {
                    $scope.ok();
                } else {
                    $scope.alertset = {
                        class: 'danger',
                        msg: data.message
                    };


                    $scope.sup();
                    $scope.showalert = true;
                    $scope.btnEksekusi = false;
                }


            })
            .error(function (data) {
                $scope.done();
                $scope.redirect(data);
            })
    };

    //CLose alert
    $scope.closeMe = function () {
        $scope.showalert = 'hidden';
    };

    //belanja.
    $scope.ok = function () {
        $modalInstance.close($scope.message);
    };

    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('ModalInstanceCtrl', ['$scope', 'belanja', '$modalInstance', 'ssh', function ($scope, belanja, $modalInstance, ssh) {
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

    belanja.getssh($scope.main.page, $scope.main.term)
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

        belanja.getssh($scope.main.page, $scope.main.term)
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
app.controller('BelanjaCtrl', ['$scope', 'belanja', '$modal', '$stateParams', function ($scope, belanja, $modal) {

    $scope.prev = "";
    $scope.ssh = {};
    $scope.open = function (size) {
        var modalInstance = $modal.open({
            templateUrl: 'myModalContent.html',
            controller: 'ModalInstanceCtrl',
            size: size,
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

    $scope.inputData = {};

    $scope.alert1 = false;
    $scope.alert2 = false;
    $scope.alert3 = false;

    //Disable Combo Kelompok
    $scope.loadKelompok = true;
    $scope.loadJenis = true;
    $scope.loadObyek = true;

    $scope.objKelompok = {};
    $scope.objJenis = {};
    $scope.objObyek = {};
    $scope.objRKPDes = {};
    $scope.objSSH = {};

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
    belanja.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            //Hide loading
            $scope.isFirstLoading = false;
            $scope.isFirstLoaded = true;

            // result data
            $scope.belanja = data.data;

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

    $scope.sm = function () {
        $('#myModal').modal('show');
    };

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

        belanja.get($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.belanja = data.data;

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

        $scope.loadKelompok = true;
        $scope.loadJenis = true;
        $scope.loadObyek = true;

        $scope.objKelompok = {};
        $scope.objJenis = {};
        $scope.objObyek = {};
        $scope.objRKPDes = {};
        $scope.objSSH = {};

        $scope.alert1 = false;
        $scope.alert2 = false;
        $scope.alert3 = false;

        //Disable controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);
        belanja.getkelompok()
            .success(function (data) {
                data.unshift({_id: 0, kelompok: 'Silahkan pilih kelompok'});
                $scope.objKelompok = data;
                $scope.inputData.kelompok = $scope.objKelompok[0];

                var d = new Date();
                $scope.inputData.tahun = d.getFullYear();

                belanja.getrkpdes()
                    .success(function (data1) {
                        if (data1.length == 0) {
                            $scope.done();
                            $scope.alertset = {
                                class: 'warning',
                                msg: {
                                    'msg': 'Data RKP Desa belum ada!'
                                }
                            };

                            // set hidden the element
                            $scope.formHidden = {
                                list: '',
                                alert: '',
                                add: 'hidden',
                                edit: 'hidden'
                            };
                            $scope.disConUmum(false);
                            $scope.disConAksi(false);
                            $scope.setDelay();
                            return false;
                        }
                        $scope.objRKPDes = data1;
                        $scope.inputData.rkpdes = $scope.objRKPDes[0];

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

    $scope.setKelompok = function () {
        $scope.alert1 = false;
        $scope.alert2 = false;
        $scope.alert3 = false;

        $scope.loadKelompok = true;
        $scope.loadJenis = true;
        $scope.loadObyek = true;

        $scope.objJenis = {};
        $scope.objObyek = {};
        $scope.objRincian = {};

        if ($scope.inputData.kelompok._id == "") {
            return false;
        }

        belanja.getjenis($scope.inputData.kelompok._id)
            .success(function (data1) {
                if (data1.length > 0) {
                    data1.unshift({_id: 0, jenis: 'Silahkan pilih jenis'});
                    $scope.objJenis = data1;
                    $scope.inputData.jenis = $scope.objJenis[0];
                    $scope.loadKelompok = false;
                } else {
                    $scope.alert1 = true;
                }
            })
    };

    $scope.setJenis = function () {
        $scope.alert2 = false;
        $scope.alert3 = false;

        $scope.loadJenis = true;
        $scope.loadObyek = true;

        $scope.objObyek = {};
        $scope.objRincian = {};

        if ($scope.inputData.jenis._id == "") {
            return false;
        }

        belanja.getobyek($scope.inputData.jenis._id)
            .success(function (data2) {
                if (data2.length > 0) {
                    data2.unshift({_id: 0, obyek: 'Silahkan pilih obyek'});
                    $scope.objObyek = data2;
                    $scope.inputData.obyek = $scope.objObyek[0];
                    $scope.loadJenis = false;
                } else {
                    $scope.alert2 = true;
                }
            });
    };

    $scope.setObyek = function () {
        $scope.alert3 = false;

        $scope.loadObyek = true;

        $scope.objRincian = {};

        if ($scope.inputData.obyek._id == "") {
            return false;
        }

        belanja.getrincian($scope.inputData.obyek._id)
            .success(function (data3) {
                if (data3.length > 0) {
                    data3.unshift({_id: 0, rincian: 'Silahkan pilih Rincian'});
                    $scope.objRincian = data3;
                    $scope.inputData.rincian = $scope.objRincian[0];
                    $scope.loadObyek = false;
                } else {
                    $scope.alert3 = true;
                }
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
        $scope.inputData.kelompok = $scope.objKelompok[0];
        $scope.inputData.kelompok_id = "";
        $scope.inputData.jenis_id = "";
        $scope.inputData.obyek_id = "";
        $scope.inputData.rincian_id = "";
        $scope.inputData.volume1 = '';
        $scope.inputData.satuan1 = '';
        $scope.inputData.volume2 = '';
        $scope.inputData.satuan2 = '';
        $scope.inputData.volume3 = '';
        $scope.inputData.satuan3 = '';
        $scope.inputData.satuan_harga = '';
        $scope.objJenis = "";
        $scope.loadKelompok = true;
        $scope.alert1 = false;
        $scope.objObyek = "";
        $scope.loadJenis = true;
        $scope.alert3 = false;
        $scope.objRincian = "";
        $scope.loadObyek = true;

        $scope.selected = {};
        $scope.ssh = {};
        $scope.prev = "";

    };

    //Set RKA
    $scope.rka = function (id) {
        //Close Alert
        $scope.closeMe();
        //Start Ajax Loading
        $scope.start();
        //Disable controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.inputData._id = id;
        $scope.inputData.is_rka = 1;
        $scope.inputData._token = $scope.csrf;
        belanja.setrka($scope.inputData)
            .success(function (data) {
                if (data.success == true) {
                    $scope.alertset = {
                        class: 'success'
                    };

                    // set delay
                    $scope.setDelay();

                } else {
                    $scope.alertset = {
                        class: 'danger'
                    };
                }
                //Set Alert Message
                $scope.alertset.msg = data.message;
                $scope.refreshData();
                $scope.formHidden = {
                    list: '',
                    alert: '',
                    add: 'hidden',
                    edit: 'hidden'
                };

                //Scroll to up
                $scope.sup();
                //Start Ajax Loading
                $scope.done();
                //Disable controller
                $scope.disConUmum(false);
                $scope.disConAksi(false);
            })
            .error(function (data) {
                $scope.done();
                $scope.redirect(data);
            })
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
            $scope.inputData.kelompok_id = $scope.inputData.kelompok._id;
            if ($scope.loadKelompok == true) {
                $scope.inputData.jenis_id = 0;
            } else {
                $scope.inputData.jenis_id = $scope.inputData.jenis._id;
            }
            if ($scope.loadJenis == true) {
                $scope.inputData.obyek_id = 0;
            } else {
                $scope.inputData.obyek_id = $scope.inputData.obyek._id;
            }
            if ($scope.loadObyek == true) {
                $scope.inputData.rincian_id = 0;
            } else {
                $scope.inputData.rincian_id = $scope.inputData.rincian._id;
            }

            $scope.inputData.rkpdes_id = $scope.inputData.rkpdes._id;
            $scope.inputData.kegiatan = $scope.inputData.rkpdes.kewenangan_kegiatan.kegiatan;
            $scope.inputData.kegiatan_id = $scope.inputData.rkpdes.kewenangan_kegiatan._id;

            belanja.store($scope.inputData)
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

    $scope.fillform = function (data) {
        // fill the textbox
        $scope.inputData.tahun = data.tahun;
        $scope.inputData.volume1 = data.volume1;
        $scope.inputData.satuan1 = data.satuan1;
        $scope.inputData.volume2 = data.volume2;
        $scope.inputData.satuan2 = data.satuan2;
        $scope.inputData.volume3 = data.volume3;
        $scope.inputData.satuan3 = data.satuan3;
        $scope.inputData.satuan_harga = data.satuan_harga;
        // set hidden the element
        $scope.formHidden = {
            list: 'hidden',
            alert: 'hidden',
            add: 'hidden',
            edit: ''
        };

        // Stop loading
        $scope.done();
    };

// edit data yang akan ditampilkan ke form
    $scope.edit = function (_id) {
        //Close Alert
        $scope.closeMe();

        $scope.loadAwal = false;
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        belanja.show(_id)
            .success(function (data) {
                belanja.getrkpdes()
                    .success(function (datax) {
                        $scope.objRKPDes = datax;
                        $scope.inputData.rkpdes = $scope.objRKPDes[findWithAttr($scope.objRKPDes, '_id', data.rkpdes_id)];
                    });
                $scope.inputData._id = _id;
                belanja.getkelompok()
                    .success(function (data1) {
                        data1.unshift({_id: 0, kelompok: 'Silahkan pilih Kelompok'});
                        $scope.objKelompok = data1;
                        $scope.inputData.kelompok = $scope.objKelompok[findWithAttr($scope.objKelompok, '_id', data.kelompok_id)];
                        belanja.getjenis($scope.inputData.kelompok._id)
                            .success(function (data2) {
                                $scope.loadKelompok = false;
                                data2.unshift({_id: 0, jenis: 'Silahkan pilih Jenis'});
                                $scope.objJenis = data2;
                                if (data.jenis_id > 0) {
                                    $scope.inputData.jenis = $scope.objJenis[findWithAttr($scope.objJenis, '_id', data.jenis_id)];
                                    belanja.getobyek($scope.inputData.jenis._id)
                                        .success(function (data3) {
                                            $scope.loadJenis = false;
                                            data3.unshift({_id: 0, obyek: 'Silahkan pilih Obyek'});
                                            $scope.objObyek = data3;
                                            if (data.obyek_id > 0) {
                                                $scope.inputData.obyek = $scope.objObyek[findWithAttr($scope.objObyek, '_id', data.obyek_id)];
                                            } else {
                                                $scope.inputData.obyek = $scope.objObyek[0];
                                            }
                                            $scope.fillform(data);
                                        })
                                } else {
                                    $scope.inputData.jenis = $scope.objJenis[0];
                                    $scope.fillform(data);
                                }
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
            $scope.inputData.kelompok_id = $scope.inputData.kelompok._id;
            if ($scope.inputData.jenis._id > 0) {
                $scope.inputData.jenis_id = $scope.inputData.jenis._id;
                if ($scope.inputData.obyek._id > 0) {
                    $scope.inputData.obyek_id = $scope.inputData.obyek._id;
                }
            }
            $scope.inputData.rkpdes_id = $scope.inputData.rkpdes._id;
            $scope.inputData.kegiatan = $scope.inputData.rkpdes.kewenangan_kegiatan.kegiatan;
            $scope.inputData.kegiatan_id = $scope.inputData.rkpdes.kewenangan_kegiatan._id;
            $scope.inputData._token = $scope.csrf;

            belanja.update($scope.inputData)
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

    $scope.setbidang = function () {
        $scope.loadAwal = true;
        $scope.objBelanja = {};
        $scope.alert1 = false;
        belanja.getbelanja($scope.inputData.masalah.bidang_id)
            .success(function (data) {
                if (data.length > 0) {
                    $scope.objBelanja = data;
                    $scope.inputData.belanja = $scope.objBelanja[0];
                    $scope.loadAwal = false;
                } else {
                    $scope.alert1 = true;
                }
            })
    };

    //CLose alert
    $scope.closeMe = function () {
        $scope.formHidden.alert = 'hidden';
    };

    $scope.hapus = function (id) {
        //Close Alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modDelete.html',
            controller: 'modDeleteBelanja',
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

    $scope.pelaksanaan = function (id, jumlah, obj) {
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modRealisasi.html',
            controller: 'modRealisasiBelanja',
            size: '',
            backdrop: 'static',
            resolve: {
                id: function () {
                    return id;
                },
                jumlah: function () {
                    return jumlah;
                },
                token: function () {
                    return $scope.csrf;
                },
                obj: function () {
                    return obj;
                }
            }
        });

        modalInstance.result.then(function (message) {
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
    };
}]);
