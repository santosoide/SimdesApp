app.controller('modDeleteOrganisasi', ['$scope', 'organisasi', '$modalInstance', 'id', function ($scope, organisasi, $modalInstance, id) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.id = id;
    $scope.hasil = {
        'class': '',
        'msg': {}
    };

    //Jika diklik ok
    $scope.ok = function () {
        //Disable button
        $scope.process = true;

        organisasi.destroy(id)
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
            });
    };

//Jika diklik batal
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('OrganisasiCtrl', ['$scope', 'organisasi', '$modal', '$stateParams', '$timeout', '$document', function ($scope, organisasi, $modal) {
    $scope.inputData = {};
    $scope.objKecamatan = {};
    $scope.objInstansi = [
        {nama: 'Pemerintah Desa'},
        {nama: 'Pemerintah Negeri'},
        {nama: 'Pemerintah Kampung'}
    ];

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
    $scope.aClass = 'success';
    $scope.aMsg = {};

    function findWithAttr(array, attr, value) {
        for (var i = 0; i < array.length; i += 1) {
            if (array[i][attr] === value) {
                return i;
            }
        }
    }

// init get data
    organisasi.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            //Hide loading
            $scope.isFirstLoading = false;
            $scope.isFirstLoaded = true;

            // result data
            $scope.organisasi = data.data;

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

        organisasi.get($scope.main.page, $scope.main.term)
            .success(function (data) {
                // result data
                $scope.organisasi = data.data;

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
            })
    };

// button add on click
    $scope.add = function () {
        //Hilangkan alert jika masih ada
        $scope.closeMe();

        //Disable controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);
        organisasi.getkecamatan()
            .success(function (datakec) {
                $scope.objKecamatan = datakec;
                $scope.inputData.cbkecamatan = $scope.objKecamatan[0];

                // clear the textbox
                $scope.clearInput();
                //Disable controller
                $scope.disConUmum(true);
                $scope.disConAksi(true);

                // set first inputbox focused
                $scope.getFocus = true;

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
        $scope.inputData.cbInstansi = $scope.objInstansi[0];
        $scope.inputData.kode_desa = '';
        $scope.inputData.alamat = '';
        $scope.inputData.no_telp = '';
        $scope.inputData.no_fax = '';
        $scope.inputData.website = '';
        $scope.inputData.desa = '';
        $scope.inputData.cbkecamatan = $scope.objKecamatan[0];
        $scope.inputData.kab = '';
        $scope.inputData.prov = '';
        $scope.inputData.email = '';
    };

// submit data
    $scope.submitData = function (back) {
        //Hilangkan alert
        $scope.closeMe();

        // cek apakah validasi sudah benar
        if ($scope.addForm.$valid) {
            //Start Loading
            $scope.start();

            //Disable button
            $scope.btnEksekusi = true;

            $scope.success = {};
            $scope.msg = '';
            // store

            $scope.inputData._token = $scope.csrf;
            $scope.inputData.nama = $scope.inputData.cbInstansi.nama;
            $scope.inputData.kec_id = $scope.inputData.cbkecamatan._id;
            organisasi.store($scope.inputData)
                .success(function (data) {
                    if (data.success == true) {
                        $scope.aClass = 'success';
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
                        $scope.aClass = 'danger';
                        $scope.formHidden = {
                            alert: '',
                            list: 'hidden',
                            add: '',
                            edit: 'hidden'
                        };
                    }

                    //Set Alert Message
                    $scope.aMsg = data.message;

                    //Scroll To Up
                    $scope.sup();

                    // Loading stop
                    $scope.done();
                    //Disable button
                    $scope.btnEksekusi = false;

                })
                .error(function (data) {
                    $scope.redirect(data);
                });
        }
    };

// edit data yang akan ditampilkan ke form
    $scope.edit = function (_id) {
        //Hilangkan alert
        $scope.closeMe();

        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        organisasi.show(_id)
            .success(function (data) {
                organisasi.getkecamatan()
                    .success(function (datakec) {
                        $scope.objKecamatan = datakec;
                        $scope.inputData.cbkecamatan = $scope.objKecamatan[findWithAttr($scope.objKecamatan, '_id', data.kec_id)];

                        $scope.inputData.cbInstansi = $scope.objInstansi[findWithAttr($scope.objInstansi, 'nama', data.nama)];
                        // fill the textbox
                        $scope.inputData._id = _id;
                        $scope.inputData.nama = data.nama;
                        $scope.inputData.kode_desa = data.kode_desa;
                        $scope.inputData.alamat = data.alamat;
                        $scope.inputData.no_telp = data.no_telp;
                        $scope.inputData.no_fax = data.no_fax;
                        $scope.inputData.website = data.website;
                        $scope.inputData.desa = data.desa;
                        $scope.inputData.kec = data.kec;
                        $scope.inputData.kab = data.kab;
                        $scope.inputData.prov = data.prov;
                        $scope.inputData.email = data.email;

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
            .error(function (data) {
                $scope.redirect(data);
            });
    };

// update data
    $scope.updateData = function () {
        //cek apakah validasi sudah benar
        if ($scope.editForm.$valid) {
            //Start Loading
            $scope.start();
            //Disable button
            $scope.btnEksekusi = true;
            // store
            $scope.success = {};
            $scope.msg = '';
            $scope.inputData._token = $scope.csrf;
            $scope.inputData.nama = $scope.inputData.cbInstansi.nama;
            $scope.inputData.kec_id = $scope.inputData.cbkecamatan._id;
            organisasi.update($scope.inputData)
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

                    //Scroll To Up
                    $scope.sup();

                    //Stop Loading
                    $scope.done();

                    //Disable button
                    $scope.btnEksekusi = false;
                })
                .error(function (data) {
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

    $scope.cari = function () {
        //Close Alert
        $scope.closeMe();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.main.page = 1;
        $scope.getData();
    };

    $scope.closeMe = function () {
        $scope.formHidden.alert = 'hidden';
    };

    $scope.hapus = function (id) {
        //Hilangkan Alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modDelete.html',
            controller: 'modDeleteOrganisasi',
            size: '',
            backdrop: 'static',
            resolve: {
                id: function () {
                    return id;
                }
            }
        });

        modalInstance.result.then(function (hasil) {
                $scope.aClass = hasil.class;
                $scope.aMsg = hasil.msg;
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
            }
        )
        ;
    };
}])
;