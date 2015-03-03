app.controller('modDeletePembiayaan', ['$scope', 'pembiayaan', '$modalInstance', 'id', function ($scope, pembiayaan, $modalInstance, id) {

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

        pembiayaan.destroy(id)
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
app.controller('modRealisasiPembiayaan', ['$scope', 'pembiayaan', '$modalInstance', 'id', 'jumlah', 'token', 'obj', function ($scope, pembiayaan, $modalInstance, id, jumlah, token, obj) {

    $scope.jenismenu = "Pembiayaan";

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
        januari: parseInt($scope.obj.januari),
        februari: parseInt($scope.obj.februari),
        maret: parseInt($scope.obj.maret),
        april: parseInt($scope.obj.april),
        mei: parseInt($scope.obj.mei),
        juni: parseInt($scope.obj.juni),
        juli: parseInt($scope.obj.juli),
        agustus: parseInt($scope.obj.agustus),
        september: parseInt($scope.obj.september),
        oktober: parseInt($scope.obj.oktober),
        november: parseInt($scope.obj.november),
        desember: parseInt($scope.obj.desember)
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
        $scope.nsisa = parseInt(jumlah) - ($scope.nrata * 12);
        if ($scope.nsisa > 0) {
            $scope.inputData.januari = $scope.nrata + $scope.nsisa;
        }
    };

    $scope.submitData = function () {
        //Close Alert
        $scope.showalert = 'hidden';

        $scope.btnEksekusi = true;

        $scope.inputData._token = $scope.token;
        $scope.inputData._id = $scope.id;
        pembiayaan.simpanpelaksanaan($scope.inputData)
            .success(function (data) {
                if (data.success == true) {
                    $scope.ok();
                } else {
                    $scope.alertset = {
                        class: 'danger',
                        msg: data.message
                    };
                    $scope.sup();
                    $scope.showalert = '';
                    $scope.btnEksekusi = false;
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
//pembiayaan.
    $scope.ok = function () {
        $modalInstance.close($scope.message);
    };

    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('PembiayaanCtrl', ['$scope', 'pembiayaan', '$modal', '$stateParams', function ($scope, pembiayaan, $modal) {
    $scope.inputData = {};

    $scope.alert1 = false;
    $scope.alert2 = false;

    //Disable Combo Kelompok
    $scope.loadKelompok = true;
    $scope.loadJenis = true;
    $scope.loadObyek = true;

    $scope.objKelompok = {};
    $scope.objJenis = {};
    $scope.objObyek = {};

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
    pembiayaan.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            //Hide loading
            $scope.isFirstLoading = false;
            $scope.isFirstLoaded = true;

            // result data
            $scope.pembiayaan = data.data;

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

        pembiayaan.get($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.pembiayaan = data.data;

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

        $scope.alert1 = false;
        $scope.alert2 = false;

        //Disable controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);
        pembiayaan.getkelompok()
            .success(function (data) {
                data.unshift({_id: "", kelompok: 'Silahkan pilih kelompok'});
                $scope.objKelompok = data;
                $scope.inputData.kelompok = $scope.objKelompok[0];

                var d = new Date();
                $scope.inputData.tahun = d.getFullYear();

                $scope.done();
                // set hidden the element
                $scope.formHidden = {
                    list: 'hidden',
                    alert: 'hidden',
                    add: '',
                    edit: 'hidden'
                };
            })
            .error(function (dat) {

            });
    };

    $scope.setKelompok = function () {
        $scope.alert1 = false;
        $scope.alert2 = false;

        $scope.loadKelompok = true;
        $scope.loadJenis = true;
        $scope.loadObyek = true;

        $scope.objJenis = {};
        $scope.objObyek = {};

        if ($scope.inputData.kelompok._id == "") {
            return false;
        }

        pembiayaan.getjenis($scope.inputData.kelompok._id)
            .success(function (data1) {
                if (data1.length > 0) {
                    data1.unshift({_id: "", jenis: 'Silahkan pilih jenis'});
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

        $scope.loadJenis = true;
        $scope.loadObyek = true;

        $scope.objObyek = {};

        if ($scope.inputData.jenis._id == "") {
            return false;
        }

        pembiayaan.getobyek($scope.inputData.jenis._id)
            .success(function (data2) {
                if (data2.length > 0) {
                    data2.unshift({_id: "", obyek: 'Silahkan pilih obyek'});
                    $scope.objObyek = data2;
                    $scope.inputData.obyek = $scope.objObyek[0];
                    $scope.loadJenis = false;
                } else {
                    $scope.alert2 = true;
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
        $scope.inputData.kelompok_id = "";
        $scope.inputData.kelompok = $scope.objKelompok[0];
        $scope.loadKelompok = true;
        $scope.objJenis = {};
        $scope.inputData.jenis_id = "";
        $scope.loadJenis = true;
        $scope.objObyek = {};
        $scope.inputData.obyek_id = "";
        $scope.inputData.volume1 = '';
        $scope.inputData.satuan1 = '';
        $scope.inputData.volume2 = '';
        $scope.inputData.satuan2 = '';
        $scope.inputData.volume3 = '';
        $scope.inputData.satuan3 = '';
        $scope.inputData.satuan_harga = '';
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
        pembiayaan.setrka($scope.inputData)
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

            pembiayaan.store($scope.inputData)
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

        pembiayaan.show(_id)
            .success(function (data) {
                $scope.inputData._id = _id;
                pembiayaan.getkelompok()
                    .success(function (data1) {
                        data1.unshift({_id: "", kelompok: 'Silahkan pilih Kelompok'});
                        $scope.objKelompok = data1;
                        $scope.inputData.kelompok = $scope.objKelompok[findWithAttr($scope.objKelompok, '_id', data.kelompok_id)];
                        pembiayaan.getjenis($scope.inputData.kelompok._id)
                            .success(function (data2) {
                                $scope.loadKelompok = false;
                                data2.unshift({_id: "", jenis: 'Silahkan pilih Jenis'});
                                $scope.objJenis = data2;
                                if (data.jenis_id != 0) {
                                    $scope.inputData.jenis = $scope.objJenis[findWithAttr($scope.objJenis, '_id', data.jenis_id)];
                                } else {
                                    $scope.inputData.jenis = $scope.objJenis[0];
                                }
                                if (parseInt(data.jenis_id, 10) != 0) {
                                    pembiayaan.getobyek($scope.inputData.jenis._id)
                                        .success(function (data3) {
                                            $scope.loadJenis = false;
                                            data3.unshift({_id: "", obyek: 'Silahkan pilih Obyek'});
                                            $scope.objObyek = data3;
                                            if (data.obyek_id != 0) {
                                                $scope.inputData.obyek = $scope.objObyek[findWithAttr($scope.objObyek, '_id', data.obyek_id)];
                                            } else {
                                                $scope.inputData.obyek = $scope.objObyek[0];
                                            }
                                            $scope.fillform(data);
                                        }
                                    )
                                }
                                else {
                                    $scope.fillform(data);
                                }
                            });
                    });
            }
        )
        ;
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
            $scope.inputData._token = $scope.csrf;

            pembiayaan.update($scope.inputData)
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

//CLose alert
    $scope.closeMe = function () {
        $scope.formHidden.alert = 'hidden';
    };

    $scope.hapus = function (id) {
        //Close Alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modDelete.html',
            controller: 'modDeletePembiayaan',
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
            controller: 'modRealisasiPembiayaan',
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
    };
}])
;