app.controller('modVerifikasiDPAPembiayaan', ['$scope', 'organisasi_detil', '$modalInstance', 'id', 'token', function ($scope, organisasi_detil, $modalInstance, id, token) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.id = id;
    $scope.token = token;
    $scope.hasil = {
        class: '',
        msg: ''
    };

    //Jika diklik ok
    $scope.ok = function () {
        //Disable button
        $scope.process = true;

        $scope.param = {};
        $scope.param.id = $scope.id;
        $scope.param.is_finish = 1;
        $scope.param._token = $scope.token;

        organisasi_detil.setPembiayaanVerifikasi($scope.param)
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
                //TODO grab the error from server
            });
    };

    //Jika diklik batal
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modVerifikasiDPABelanja', ['$scope', 'organisasi_detil', '$modalInstance', 'id', 'token', function ($scope, organisasi_detil, $modalInstance, id, token) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.id = id;
    $scope.token = token;
    $scope.hasil = {
        class: '',
        msg: ''
    };

    //Jika diklik ok
    $scope.ok = function () {
        //Disable button
        $scope.process = true;

        $scope.param = {};
        $scope.param.id = $scope.id;
        $scope.param.is_finish = 1;
        $scope.param._token = $scope.token;

        organisasi_detil.setBelanjaVerifikasi($scope.param)
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
                //TODO grab the error from server
            });
    };

    //Jika diklik batal
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modVerifikasiDPAPendapatan', ['$scope', 'organisasi_detil', '$modalInstance', 'id', 'token', function ($scope, organisasi_detil, $modalInstance, id, token) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.id = id;
    $scope.token = token;
    $scope.hasil = {
        class: '',
        msg: ''
    };

    //Jika diklik ok
    $scope.ok = function () {
        //Disable button
        $scope.process = true;

        $scope.param = {};
        $scope.param.id = $scope.id;
        $scope.param.is_finish = 1;
        $scope.param._token = $scope.token;

        organisasi_detil.setPendapatanVerifikasi($scope.param)
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
                //TODO grab the error from server
            });
    };

    //Jika diklik batal
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modVerifikasiRPJMDesProgramDesa', ['$scope', 'organisasi_detil', '$modalInstance', 'id', 'token', function ($scope, organisasi_detil, $modalInstance, id, token) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.id = id;
    $scope.token = token;
    $scope.hasil = {
        class: '',
        msg: ''
    };

    //Jika diklik ok
    $scope.ok = function () {
        //Disable button
        $scope.process = true;
        $scope.param = {};
        $scope.param = {
            cmd: 'finish',
            rpjmdes_program_id: $scope.id,
            _token: $scope.token
        };

        organisasi_detil.setProgram($scope.param)
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
                $scope.redirect(data)
            });
    };

    //Jika diklik batal
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modTolakRPJMDesProgramDesa', ['$scope', 'organisasi_detil', '$modalInstance', 'token', 'program', function ($scope, organisasi_detil, $modalInstance, token, program) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.param = {};
    $scope.token = token;
    $scope.rpjmdes_program = program.kegiatan.program.program;
    $scope.hasil = {
        class: '',
        msg: ''
    };

    //Jika diklik ok
    $scope.ok = function () {
        //Disable button
        $scope.process = true;
        $scope.param.cmd = 'reject';
        $scope.param.rpjmdes_program_id = program._id;
        $scope.param._token = $scope.token;

        organisasi_detil.setProgram($scope.param)
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
                $scope.redirect(data)
            });
    };

//Jika diklik batal
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modRevisiRPJMDesProgramDesa', ['$scope', 'organisasi_detil', '$modalInstance', 'token', 'program', function ($scope, organisasi_detil, $modalInstance, token, program) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.param = {};
    $scope.token = token;
    $scope.rpjmdes_program = program.kegiatan.program.program;
    $scope.hasil = {
        class: '',
        msg: ''
    };

    //Jika diklik ok
    $scope.ok = function () {
        //Disable button
        $scope.process = true;
        $scope.param.cmd = 'revisi';
        $scope.param.rpjmdes_program_id = program._id;
        $scope.param._token = $scope.token;

        organisasi_detil.setProgram($scope.param)
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
                $scope.redirect(data)
            });
    };

//Jika diklik batal
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modEditRKPDesDesa', ['$scope', 'organisasi_detil', '$modalInstance', 'token', 'id', function ($scope, organisasi_detil, $modalInstance, token, id) {

    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.param = {};
    $scope.hasil = {
        class: '',
        msg: ''
    };

    //Jika diklik ok
    $scope.ok = function () {
        //Disable button
        $scope.process = true;
        $scope.param.cmd = 'edit';
        $scope.param.rkpdes_id = id;
        $scope.param._token = token;

        organisasi_detil.setRKPDes($scope.param)
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
                $scope.redirect(data)
            });
    };

//Jika diklik batal
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modPerubahanRKPDesDesa', ['$scope', 'organisasi_detil', '$modalInstance', 'token', 'id', function ($scope, organisasi_detil, $modalInstance, token, id) {

    $scope.detil = id;
    //Enable button
    $scope.process = false;

    //Inisialisasi variabel
    $scope.param = {};
    $scope.hasil = {
        class: '',
        msg: ''
    };
    $scope.inputData = {};
    $scope.objPerubahan = [
        {nama: 'Peristiwa Khusus-Bencana Alam', id: 1},
        {nama: 'Peristiwa Khusus-Krisis Politik', id: 2},
        {nama: 'Peristiwa Khusus-Krisis Ekonomi', id: 3},
        {nama: 'Peristiwa Khusus-Kerusuhan Sosial Berpekepanjangan', id: 4},
        {nama: 'Kebijakan-Pemerintah', id: 5},
        {nama: 'Kebijakan-Pemerintah Provinsi', id: 6},
        {nama: 'Kebijakan-Pemerintah Kabupaten', id: 7}
    ];

    $scope.inputData.cbketerangan = $scope.objPerubahan[0];

    //Jika diklik ok
    $scope.ok = function () {
        //Disable button
        $scope.process = true;
        $scope.param.cmd = 'perubahan';
        $scope.param.rkpdes_id = $scope.detil._id;
        $scope.param.keterangan_sifat = $scope.inputData.cbketerangan.id;
        $scope.param._token = token;

        organisasi_detil.setRKPDes($scope.param)
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
                $scope.redirect(data)
            });
    };

//Jika diklik batal
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
}]);
app.controller('modDetilOrganisasiTransaksiBelanjaDetil', ['$scope', 'organisasi_detil', '$modalInstance', 'id', function ($scope, organisasi_detil, $modalInstance, id) {
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

    organisasi_detil.getDetilTransaksiBelanja($scope.id)
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
app.controller('OrganisasiDetilCtrl', ['$scope', '$location', '$stateParams', 'organisasi_detil', '$modal', function ($scope, $location, $stateParams, organisasi_detil, $modal) {

    //Tampil modal detil
    $scope.detil = function (id) {
        var modalInstance = $modal.open({
            templateUrl: 'modDetilBelanja.html',
            controller: 'modDetilOrganisasiTransaksiBelanjaDetil',
            size: '',
            backdrop: 'static',
            resolve: {
                id: function () {
                    return id;
                }
            }
        });
    };

    $scope.aClass = 'success';
    $scope.aMsg = {};
    $scope.aShow = 'hidden';

    $scope.organisasi_id = $stateParams.organisasi_id;

    $scope.desa = $stateParams.desa;

    // siapkan scope pagination data dan pencarian data
    //RPJM Desa
    $scope.visi_main = {
        page: 1,
        term: ''
    };
    $scope.misi_main = {
        page: 1,
        term: ''
    };
    $scope.program_main = {
        page: 1,
        term: ''
    };
    $scope.programTab = 1;

    $scope.rkpdes_main = {
        page: 1,
        term: ''
    };

    //DPA
    $scope.pendapatan_main = {
        page: 1,
        term: ''
    };
    $scope.pendapatanTab = 1;

    $scope.belanja_main = {
        page: 1,
        term: ''
    };
    $scope.belanjaTab = 1;

    $scope.pembiayaan_main = {
        page: 1,
        term: ''
    };
    $scope.pembiayaanTab = 1;

    //Transaksi
    //DPA
    $scope.tranpendapatan_main = {
        page: 1,
        term: ''
    };
    $scope.tranbelanja_main = {
        page: 1,
        term: ''
    };

    //Perangkat
    //Pejabat
    $scope.pejabat_desa_main = {
        page: 1,
        term: ''
    };
    //Pengguna
    $scope.pengguna_desa_main = {
        page: 1,
        term: ''
    };
    //Alokasi Dana
    $scope.dana_desa_main = {
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

    //Disable Control Eksekusi
    $scope.btnEksekusi = false;

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

    $scope.convertToRupiah = function (angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return rupiah.split('', rupiah.length - 1).reverse().join('');
    };

    //RPJM Desa
    // get data
    $scope.visi_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        organisasi_detil.getVisi($scope.organisasi_id, $scope.visi_main.page)
            .success(function (data) {
                // result data
                $scope.visi = data.data;

                // set the current page
                $scope.visi_current_page = data.current_page;

                // set the last page
                $scope.visi_last_page = data.last_page;

                // set the data from
                $scope.visi_from = data.from;

                // set the data until to
                $scope.visi_to = data.to;

                // set the total result data
                $scope.visi_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false)
            })
            .error(function (data) {
                $scope.redirect(data);
            });

        $scope.done();
    };

    //Klik Tab Misi
    $scope.misi_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        organisasi_detil.getMisi($scope.organisasi_id, $scope.misi_main.page)
            .success(function (data) {
                // result data
                $scope.misi = data.data;

                // set the current page
                $scope.misi_current_page = data.current_page;

                // set the last page
                $scope.misi_last_page = data.last_page;

                // set the data from
                $scope.misi_from = data.from;

                // set the data until to
                $scope.misi_to = data.to;

                // set the total result data
                $scope.misi_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false)
            })
            .error(function (data) {
                $scope.redirect(data);
            });

        $scope.done();
    };

    //Klik tab Progrsm
    $scope.program_getData = function (key) {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.programTab = key;

        if ($scope.programTab == 1) {
            organisasi_detil.getProgram($scope.organisasi_id, $scope.visi_main.page)
                .success(function (data) {
                    // result data
                    $scope.program = data.data;

                    // set the current page
                    $scope.program_current_page = data.current_page;

                    // set the last page
                    $scope.program_last_page = data.last_page;

                    // set the data from
                    $scope.program_from = data.from;

                    // set the data until to
                    $scope.program_to = data.to;

                    // set the total result data
                    $scope.program_total = data.total;

                    //Disable All Controller
                    $scope.disConAksi(false);
                    $scope.disConUmum(false);

                    //Stop loading
                    $scope.done();
                })
                .error(function (data) {
                    $scope.redirect(data);
                });
        } else if ($scope.programTab == 2) {
            organisasi_detil.getProgramProses($scope.organisasi_id, $scope.visi_main.page)
                .success(function (data) {
                    // result data
                    $scope.program = data.data;

                    // set the current page
                    $scope.program_current_page = data.current_page;

                    // set the last page
                    $scope.program_last_page = data.last_page;

                    // set the data from
                    $scope.program_from = data.from;

                    // set the data until to
                    $scope.program_to = data.to;

                    // set the total result data
                    $scope.program_total = data.total;

                    //Disable All Controller
                    $scope.disConAksi(false);
                    $scope.disConUmum(false);

                    //Stop loading
                    $scope.done();
                })
                .error(function (data) {
                    $scope.redirect(data);
                });
        } else if ($scope.programTab == 3) {
            organisasi_detil.getProgramFinal($scope.organisasi_id, $scope.visi_main.page)
                .success(function (data) {
                    // result data
                    $scope.program = data.data;

                    // set the current page
                    $scope.program_current_page = data.current_page;

                    // set the last page
                    $scope.program_last_page = data.last_page;

                    // set the data from
                    $scope.program_from = data.from;

                    // set the data until to
                    $scope.program_to = data.to;

                    // set the total result data
                    $scope.program_total = data.total;

                    //Disable All Controller
                    $scope.disConAksi(false);
                    $scope.disConUmum(false);

                    //Stop loading
                    $scope.done();
                })
                .error(function (data) {
                    $scope.redirect(data);
                });
        }
    };

    $scope.rkpdes_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        organisasi_detil.getRKPDes($scope.organisasi_id, $scope.visi_main.page)
            .success(function (data) {
                // result data
                $scope.rkpdes = data.data;

                // set the current page
                $scope.rkpdes_current_page = data.current_page;

                // set the last page
                $scope.rkpdes_last_page = data.last_page;

                // set the data from
                $scope.rkpdes_from = data.from;

                // set the data until to
                $scope.rkpdes_to = data.to;

                // set the total result data
                $scope.rkpdes_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);

                //Stop loading
                $scope.done();
            })
            .error(function (data) {
                $scope.redirect(data);
            });
    };

    //DPA
    // get data
    $scope.pendapatan_getData = function (key) {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.pendapatanTab = key;
        if ($scope.pendapatanTab == 1) {
            organisasi_detil.getPendapatan($scope.organisasi_id, $scope.pendapatan_main.page)
                .success(function (data) {
                    // result data
                    $scope.pendapatan = data.data;

                    // set the current page
                    $scope.pendapatan_current_page = data.current_page;

                    // set the last page
                    $scope.pendapatan_last_page = data.last_page;

                    // set the data from
                    $scope.pendapatan_from = data.from;

                    // set the data until to
                    $scope.pendapatan_to = data.to;

                    // set the total result data
                    $scope.pendapatan_total = data.total;

                    //Disable All Controller
                    $scope.disConAksi(false);
                    $scope.disConUmum(false);
                    $scope.done();
                })
                .error(function (data) {
                    $scope.redirect(data);
                    $scope.done();
                });
        } else if ($scope.pendapatanTab == 2) {
            organisasi_detil.getPendapatanProses($scope.organisasi_id, $scope.pendapatan_main.page)
                .success(function (data) {
                    // result data
                    $scope.pendapatan = data.data;

                    // set the current page
                    $scope.pendapatan_current_page = data.current_page;

                    // set the last page
                    $scope.pendapatan_last_page = data.last_page;

                    // set the data from
                    $scope.pendapatan_from = data.from;

                    // set the data until to
                    $scope.pendapatan_to = data.to;

                    // set the total result data
                    $scope.pendapatan_total = data.total;

                    //Disable All Controller
                    $scope.disConAksi(false);
                    $scope.disConUmum(false);
                    $scope.done();
                })
                .error(function (data) {
                    $scope.redirect(data);
                    $scope.done();
                });
        } else if ($scope.pendapatanTab == 3) {
            organisasi_detil.getPendapatanFinal($scope.organisasi_id, $scope.pendapatan_main.page)
                .success(function (data) {
                    // result data
                    $scope.pendapatan = data.data;

                    // set the current page
                    $scope.pendapatan_current_page = data.current_page;

                    // set the last page
                    $scope.pendapatan_last_page = data.last_page;

                    // set the data from
                    $scope.pendapatan_from = data.from;

                    // set the data until to
                    $scope.pendapatan_to = data.to;

                    // set the total result data
                    $scope.pendapatan_total = data.total;

                    //Disable All Controller
                    $scope.disConAksi(false);
                    $scope.disConUmum(false);
                    $scope.done();
                })
                .error(function (data) {
                    $scope.redirect(data);
                    $scope.done();
                });
        }
    };

    //Klik tab belanja
    $scope.belanja_getData = function (key) {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.belanjaTab = key;
        if ($scope.belanjaTab == 1) {
            organisasi_detil.getBelanja($scope.organisasi_id, $scope.belanja_main.page)
                .success(function (data) {
                    // result data
                    $scope.belanja = data.data;

                    // set the current page
                    $scope.belanja_current_page = data.current_page;

                    // set the last page
                    $scope.belanja_last_page = data.last_page;

                    // set the data from
                    $scope.belanja_from = data.from;

                    // set the data until to
                    $scope.belanja_to = data.to;

                    // set the total result data
                    $scope.belanja_total = data.total;

                    //Disable All Controller
                    $scope.disConAksi(false);
                    $scope.disConUmum(false);
                    $scope.done();
                })
                .error(function (data) {
                    $scope.redirect(data);
                    $scope.done();
                });
        } else if ($scope.belanjaTab == 2) {
            organisasi_detil.getBelanjaProses($scope.organisasi_id, $scope.belanja_main.page)
                .success(function (data) {
                    // result data
                    $scope.belanja = data.data;

                    // set the current page
                    $scope.belanja_current_page = data.current_page;

                    // set the last page
                    $scope.belanja_last_page = data.last_page;

                    // set the data from
                    $scope.belanja_from = data.from;

                    // set the data until to
                    $scope.belanja_to = data.to;

                    // set the total result data
                    $scope.belanja_total = data.total;

                    //Disable All Controller
                    $scope.disConAksi(false);
                    $scope.disConUmum(false);
                    $scope.done();
                })
                .error(function (data) {
                    $scope.redirect(data);
                    $scope.done();
                });
        } else if ($scope.belanjaTab == 3) {
            organisasi_detil.getBelanjaFinal($scope.organisasi_id, $scope.belanja_main.page)
                .success(function (data) {
                    // result data
                    $scope.belanja = data.data;

                    // set the current page
                    $scope.belanja_current_page = data.current_page;

                    // set the last page
                    $scope.belanja_last_page = data.last_page;

                    // set the data from
                    $scope.belanja_from = data.from;

                    // set the data until to
                    $scope.belanja_to = data.to;

                    // set the total result data
                    $scope.belanja_total = data.total;

                    //Disable All Controller
                    $scope.disConAksi(false);
                    $scope.disConUmum(false);
                    $scope.done();
                })
                .error(function (data) {
                    $scope.redirect(data);
                    $scope.done();
                });
        }
    };

    //Klik tab Pembiayaan
    $scope.pembiayaan_getData = function (key) {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.pembiayaanTab = key;
        if ($scope.pembiayaanTab == 1) {
            organisasi_detil.getPembiayaan($scope.organisasi_id, $scope.pembiayaan_main.page)
                .success(function (data) {
                    // result data
                    $scope.pembiayaan = data.data;

                    // set the current page
                    $scope.pembiayaan_current_page = data.current_page;

                    // set the last page
                    $scope.pembiayaan_last_page = data.last_page;

                    // set the data from
                    $scope.pembiayaan_from = data.from;

                    // set the data until to
                    $scope.pembiayaan_to = data.to;

                    // set the total result data
                    $scope.pembiayaan_total = data.total;

                    //Disable All Controller
                    $scope.disConAksi(false);
                    $scope.disConUmum(false);
                    $scope.done();
                })
                .error(function (data) {
                    $scope.redirect(data);
                    $scope.done();
                });
        } else if ($scope.pembiayaanTab == 2) {
            organisasi_detil.getPembiayaanProses($scope.organisasi_id, $scope.pembiayaan_main.page)
                .success(function (data) {
                    // result data
                    $scope.pembiayaan = data.data;

                    // set the current page
                    $scope.pembiayaan_current_page = data.current_page;

                    // set the last page
                    $scope.pembiayaan_last_page = data.last_page;

                    // set the data from
                    $scope.pembiayaan_from = data.from;

                    // set the data until to
                    $scope.pembiayaan_to = data.to;

                    // set the total result data
                    $scope.pembiayaan_total = data.total;

                    //Disable All Controller
                    $scope.disConAksi(false);
                    $scope.disConUmum(false);
                    $scope.done();
                })
                .error(function (data) {
                    $scope.redirect(data);
                    $scope.done();
                });
        } else if ($scope.pembiayaanTab == 3) {
            organisasi_detil.getPembiayaanFinal($scope.organisasi_id, $scope.pembiayaan_main.page)
                .success(function (data) {
                    // result data
                    $scope.pembiayaan = data.data;

                    // set the current page
                    $scope.pembiayaan_current_page = data.current_page;

                    // set the last page
                    $scope.pembiayaan_last_page = data.last_page;

                    // set the data from
                    $scope.pembiayaan_from = data.from;

                    // set the data until to
                    $scope.pembiayaan_to = data.to;

                    // set the total result data
                    $scope.pembiayaan_total = data.total;

                    //Disable All Controller
                    $scope.disConAksi(false);
                    $scope.disConUmum(false);
                    $scope.done();
                })
                .error(function (data) {
                    $scope.redirect(data);
                    $scope.done();
                });
        }
    };

    //Transaksi
    //Klik tab transaksi pendapatan
    $scope.tranpendapatan_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        organisasi_detil.getTranPendapatan($scope.organisasi_id, $scope.tranpendapatan_main.page)
            .success(function (data) {
                // result data
                $scope.tranpendapatan = data.data;

                // set the current page
                $scope.tranpendapatan_current_page = data.current_page;

                // set the last page
                $scope.tranpendapatan_last_page = data.last_page;

                // set the data from
                $scope.tranpendapatan_from = data.from;

                // set the data until to
                $scope.tranpendapatan_to = data.to;

                // set the total result data
                $scope.tranpendapatan_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);
                $scope.done();
            })
            .error(function (data) {
                $scope.redirect(data);
            });
    };

    //Klik tab transaksi belanja
    $scope.tranbelanja_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        organisasi_detil.getTranBelanja($scope.organisasi_id, $scope.tranbelanja_main.page)
            .success(function (data) {
                // result data
                $scope.tranbelanja = data.data;

                // set the current page
                $scope.tranbelanja_current_page = data.current_page;

                // set the last page
                $scope.tranbelanja_last_page = data.last_page;

                // set the data from
                $scope.tranbelanja_from = data.from;

                // set the data until to
                $scope.tranbelanja_to = data.to;

                // set the total result data
                $scope.tranbelanja_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);
                $scope.done();
            })
            .error(function (data) {
                $scope.redirect(data);
            });
    };

    // get data
    $scope.pejabat_desa_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        organisasi_detil.getPejabatDesa($scope.organisasi_id, $scope.pejabat_desa_main.page)
            .success(function (data) {
                // result data
                $scope.pejabat_desa = data.data;

                // set the current page
                $scope.pejabat_desa_current_page = data.current_page;

                // set the last page
                $scope.pejabat_desa_last_page = data.last_page;

                // set the data from
                $scope.pejabat_desa_from = data.from;

                // set the data until to
                $scope.pejabat_desa_to = data.to;

                // set the total result data
                $scope.pejabat_desa_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);
                $scope.done();
            })
            .error(function (data) {
                $scope.redirect(data);
            });
    };

    //Klik tab pengguna desa
    $scope.pengguna_desa_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        organisasi_detil.getPenggunaDesa($scope.organisasi_id, $scope.pengguna_desa_main.page)
            .success(function (data) {
                // result data
                $scope.pengguna_desa = data.data;

                // set the current page
                $scope.pengguna_desa_current_page = data.current_page;

                // set the last page
                $scope.pengguna_desa_last_page = data.last_page;

                // set the data from
                $scope.pengguna_desa_from = data.from;

                // set the data until to
                $scope.pengguna_desa_to = data.to;

                // set the total result data
                $scope.pengguna_desa_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);
                $scope.done();
            })
            .error(function (data) {
                $scope.redirect(data);
            });
    };

    //Klik Tab Alokasi Dana
    $scope.dana_desa_getData = function () {

        //Start loading
        $scope.start();

        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        organisasi_detil.getDanaDesa($scope.organisasi_id, $scope.dana_desa_main.page)
            .success(function (data) {
                // result data
                $scope.dana_desa = data.data;

                // set the current page
                $scope.dana_desa_current_page = data.current_page;

                // set the last page
                $scope.dana_desa_last_page = data.last_page;

                // set the data from
                $scope.dana_desa_from = data.from;

                // set the data until to
                $scope.dana_desa_to = data.to;

                // set the total result data
                $scope.dana_desa_total = data.total;

                //Disable All Controller
                $scope.disConAksi(false);
                $scope.disConUmum(false);
                $scope.done();
            })
            .error(function (data) {
                $scope.redirect(data);
            });
    };

    //Tab Visi
    //Navigasi halaman terakhir
    $scope.visi_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.visi_main.page = $scope.visi_last_page;

        $scope.visi_getData();
    };

    //navigasi halaman selanjutnya
    $scope.visi_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 < halaman terakhir
        if ($scope.visi_main.page < $scope.visi_last_page) {
            // halaman saat ini ditambah increment++
            $scope.visi_main.page++
        }
        // panggil ajax data
        $scope.visi_getData();
    };

    //navigasi halaman sebelumnya
    $scope.visi_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 > 1
        if ($scope.visi_main.page > 1) {
            // page dikurangi decrement --
            $scope.visi_main.page--
        }
        // panggil ajax data
        $scope.visi_getData();
    };

    //Navigasi halaman pertama
    $scope.visi_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.visi_main.page = 1;

        $scope.visi_getData()
    };

//Tab Misi
    //Navigasi halaman terakhir
    $scope.misi_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.misi_main.page = $scope.misi_last_page;

        $scope.misi_getData();
    };

    //navigasi halaman selanjutnya
    $scope.misi_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 < halaman terakhir
        if ($scope.misi_main.page < $scope.misi_last_page) {
            // halaman saat ini ditambah increment++
            $scope.misi_main.page++
        }
        // panggil ajax data
        $scope.misi_getData();
    };

    //navigasi halaman sebelumnya
    $scope.misi_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 > 1
        if ($scope.misi_main.page > 1) {
            // page dikurangi decrement --
            $scope.misi_main.page--
        }
        // panggil ajax data
        $scope.misi_getData();
    };

    //Navigasi halaman pertama
    $scope.misi_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.misi_main.page = 1;

        $scope.misi_getData()
    };

    //Tab Program
    //Navigasi halaman terakhir
    $scope.program_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.program_main.page = $scope.program_last_page;

        $scope.program_getData();
    };

    //navigasi halaman selanjutnya
    $scope.program_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 < halaman terakhir
        if ($scope.program_main.page < $scope.program_last_page) {
            // halaman saat ini ditambah increment++
            $scope.program_main.page++
        }
        // panggil ajax data
        $scope.program_getData();
    };

    //navigasi halaman sebelumnya
    $scope.program_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 > 1
        if ($scope.program_main.page > 1) {
            // page dikurangi decrement --
            $scope.program_main.page--
        }
        // panggil ajax data
        $scope.program_getData();
    };

    //Navigasi halaman pertama
    $scope.program_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.program_main.page = 1;

        $scope.program_getData()
    };


    //Tab RKP Desa
    //Navigasi halaman terakhir
    $scope.rkpdes_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.rkpdes_main.page = $scope.rkpdes_last_page;

        $scope.rkpdes_getData();
    };

    //navigasi halaman selanjutnya
    $scope.rkpdes_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 < halaman terakhir
        if ($scope.rkpdes_main.page < $scope.rkpdes_last_page) {
            // halaman saat ini ditambah increment++
            $scope.rkpdes_main.page++
        }
        // panggil ajax data
        $scope.rkpdes_getData();
    };

    //navigasi halaman sebelumnya
    $scope.rkpdes_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 > 1
        if ($scope.rkpdes_main.page > 1) {
            // page dikurangi decrement --
            $scope.rkpdes_main.page--
        }
        // panggil ajax data
        $scope.rkpdes_getData();
    };

    //Navigasi halaman pertama
    $scope.rkpdes_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.rkpdes_main.page = 1;

        $scope.rkpdes_getData()
    };


    //Tab Pendapatan
    //Navigasi halaman terakhir
    $scope.pendapatan_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.pendapatan_main.page = $scope.pendapatan_last_page;

        $scope.pendapatan_getData();
    };

    //navigasi halaman selanjutnya
    $scope.pendapatan_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 < halaman terakhir
        if ($scope.pendapatan_main.page < $scope.pendapatan_last_page) {
            // halaman saat ini ditambah increment++
            $scope.pendapatan_main.page++
        }
        // panggil ajax data
        $scope.pendapatan_getData();
    };

    //navigasi halaman sebelumnya
    $scope.pendapatan_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 > 1
        if ($scope.pendapatan_main.page > 1) {
            // page dikurangi decrement --
            $scope.pendapatan_main.page--
        }
        // panggil ajax data
        $scope.pendapatan_getData();
    };

    //Navigasi halaman pertama
    $scope.pendapatan_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.pendapatan_main.page = 1;

        $scope.pendapatan_getData()
    };


    //Tab Belanja
    //Navigasi halaman terakhir
    $scope.belanja_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.belanja_main.page = $scope.belanja_last_page;

        $scope.belanja_getData();
    };

    //navigasi halaman selanjutnya
    $scope.belanja_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 < halaman terakhir
        if ($scope.belanja_main.page < $scope.belanja_last_page) {
            // halaman saat ini ditambah increment++
            $scope.belanja_main.page++
        }
        // panggil ajax data
        $scope.belanja_getData();
    };

    //navigasi halaman sebelumnya
    $scope.belanja_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 > 1
        if ($scope.belanja_main.page > 1) {
            // page dikurangi decrement --
            $scope.belanja_main.page--
        }
        // panggil ajax data
        $scope.belanja_getData();
    };

    //Navigasi halaman pertama
    $scope.belanja_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.belanja_main.page = 1;

        $scope.belanja_getData()
    };


    //Tab Pembiayaan
    //Navigasi halaman terakhir
    $scope.pembiayaan_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.pembiayaan_main.page = $scope.pembiayaan_last_page;

        $scope.pembiayaan_getData();
    };

    //navigasi halaman selanjutnya
    $scope.pembiayaan_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 < halaman terakhir
        if ($scope.pembiayaan_main.page < $scope.pembiayaan_last_page) {
            // halaman saat ini ditambah increment++
            $scope.pembiayaan_main.page++
        }
        // panggil ajax data
        $scope.pembiayaan_getData();
    };

    //navigasi halaman sebelumnya
    $scope.pembiayaan_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 > 1
        if ($scope.pembiayaan_main.page > 1) {
            // page dikurangi decrement --
            $scope.pembiayaan_main.page--
        }
        // panggil ajax data
        $scope.pembiayaan_getData();
    };

    //Navigasi halaman pertama
    $scope.pembiayaan_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.pembiayaan_main.page = 1;

        $scope.pembiayaan_getData()
    };


    //Tab Transaksi Pendapatan
    //Navigasi halaman terakhir
    $scope.tranpendapatan_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.tranpendapatan_main.page = $scope.tranpendapatan_last_page;

        $scope.tranpendapatan_getData();
    };

    //navigasi halaman selanjutnya
    $scope.tranpendapatan_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 < halaman terakhir
        if ($scope.tranpendapatan_main.page < $scope.tranpendapatan_last_page) {
            // halaman saat ini ditambah increment++
            $scope.tranpendapatan_main.page++
        }
        // panggil ajax data
        $scope.tranpendapatan_getData();
    };

    //navigasi halaman sebelumnya
    $scope.tranpendapatan_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 > 1
        if ($scope.tranpendapatan_main.page > 1) {
            // page dikurangi decrement --
            $scope.tranpendapatan_main.page--
        }
        // panggil ajax data
        $scope.tranpendapatan_getData();
    };

    //Navigasi halaman pertama
    $scope.tranpendapatan_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.tranpendapatan_main.page = 1;

        $scope.tranpendapatan_getData()
    };


    //Tab Transaksi Belanja
    //Navigasi halaman terakhir
    $scope.tranbelanja_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.tranbelanja_main.page = $scope.tranbelanja_last_page;

        $scope.tranbelanja_getData();
    };

    //navigasi halaman selanjutnya
    $scope.tranbelanja_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 < halaman terakhir
        if ($scope.tranbelanja_main.page < $scope.tranbelanja_last_page) {
            // halaman saat ini ditambah increment++
            $scope.tranbelanja_main.page++
        }
        // panggil ajax data
        $scope.tranbelanja_getData();
    };

    //navigasi halaman sebelumnya
    $scope.tranbelanja_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 > 1
        if ($scope.tranbelanja_main.page > 1) {
            // page dikurangi decrement --
            $scope.tranbelanja_main.page--
        }
        // panggil ajax data
        $scope.tranbelanja_getData();
    };

    //Navigasi halaman pertama
    $scope.tranbelanja_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.tranbelanja_main.page = 1;

        $scope.tranbelanja_getData()
    };


    //Tab Pejabat Desa
    //Navigasi halaman terakhir
    $scope.pejabat_desa_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.pejabat_desa_main.page = $scope.pejabat_desa_last_page;

        $scope.pejabat_desa_getData();
    };

    //navigasi halaman selanjutnya
    $scope.pejabat_desa_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 < halaman terakhir
        if ($scope.pejabat_desa_main.page < $scope.pejabat_desa_last_page) {
            // halaman saat ini ditambah increment++
            $scope.pejabat_desa_main.page++
        }
        // panggil ajax data
        $scope.pejabat_desa_getData();
    };

    //navigasi halaman sebelumnya
    $scope.pejabat_desa_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 > 1
        if ($scope.pejabat_desa_main.page > 1) {
            // page dikurangi decrement --
            $scope.pejabat_desa_main.page--
        }
        // panggil ajax data
        $scope.pejabat_desa_getData();
    };

    //Navigasi halaman pertama
    $scope.pejabat_desa_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.pejabat_desa_main.page = 1;

        $scope.pejabat_desa_getData()
    };


    //Tab Pengguna Desa
    //Navigasi halaman terakhir
    $scope.pengguna_desa_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.pengguna_desa_main.page = $scope.pengguna_desa_last_page;

        $scope.pengguna_desa_getData();
    };

    //navigasi halaman selanjutnya
    $scope.pengguna_desa_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 < halaman terakhir
        if ($scope.pengguna_desa_main.page < $scope.pengguna_desa_last_page) {
            // halaman saat ini ditambah increment++
            $scope.pengguna_desa_main.page++
        }
        // panggil ajax data
        $scope.pengguna_desa_getData();
    };

    //navigasi halaman sebelumnya
    $scope.pengguna_desa_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 > 1
        if ($scope.pengguna_desa_main.page > 1) {
            // page dikurangi decrement --
            $scope.pengguna_desa_main.page--
        }
        // panggil ajax data
        $scope.pengguna_desa_getData();
    };

    //Navigasi halaman pertama
    $scope.pengguna_desa_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.pengguna_desa_main.page = 1;

        $scope.pengguna_desa_getData()
    };


    //Tab Alokasi Dana
    //Navigasi halaman terakhir
    $scope.dana_desa_lastPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.dana_desa_main.page = $scope.dana_desa_last_page;

        $scope.dana_desa_getData();
    };

    //navigasi halaman selanjutnya
    $scope.dana_desa_nextPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 < halaman terakhir
        if ($scope.dana_desa_main.page < $scope.dana_desa_last_page) {
            // halaman saat ini ditambah increment++
            $scope.dana_desa_main.page++
        }
        // panggil ajax data
        $scope.dana_desa_getData();
    };

    //navigasi halaman sebelumnya
    $scope.dana_desa_previousPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        // jika page = 1 > 1
        if ($scope.dana_desa_main.page > 1) {
            // page dikurangi decrement --
            $scope.dana_desa_main.page--
        }
        // panggil ajax data
        $scope.dana_desa_getData();
    };

    //Navigasi halaman pertama
    $scope.dana_desa_firstPage = function () {
        //Disable All Controller
        $scope.disConUmum(true);
        $scope.disConAksi(true);

        $scope.dana_desa_main.page = 1;

        $scope.dana_desa_getData()
    };

    //Close Alert
    $scope.closeMe = function () {
        $scope.aShow = 'hidden';
    };

    //refresh data
    $scope.setDelay = function (back) {
        //set timeout 3 seconds
        window.setTimeout(function () {
            $scope.$apply(function () {
                if ($scope.aShow == 'hidden') {
                    return false;
                }
                $scope.aShow = "hidden";
            });
        }, 5000);
    };

    $scope.program_verifikasi = function (id) {
        //Close alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modVerifikasi.html',
            controller: 'modVerifikasiRPJMDesProgramDesa',
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
            $scope.aClass = hasil.class;
            $scope.aMsg = hasil.msg;
            $scope.aShow = '';
            $scope.setDelay();
            $scope.sup();
            $scope.program_getData($scope.programTab);
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.program_tolak = function (program) {
        //Close Alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modTolak.html',
            controller: 'modTolakRPJMDesProgramDesa',
            size: '',
            backdrop: 'static',
            resolve: {
                program: function () {
                    return program;
                },
                token: function () {
                    return $scope.csrf;
                }
            }
        });

        modalInstance.result.then(function (hasil) {
            $scope.aClass = hasil.class;
            $scope.aMsg = hasil.msg;
            $scope.aShow = '';
            $scope.setDelay();
            $scope.sup();
            $scope.program_getData($scope.programTab);
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.program_revisi = function (program) {
        //Close Alert
        $scope.closeMe();

        var modalInstance = $modal.open({
            templateUrl: 'modRevisi.html',
            controller: 'modRevisiRPJMDesProgramDesa',
            size: '',
            backdrop: 'static',
            resolve: {
                program: function () {
                    return program;
                },
                token: function () {
                    return $scope.csrf;
                }
            }
        });

        modalInstance.result.then(function (hasil) {
            $scope.aClass = hasil.class;
            $scope.aMsg = hasil.msg;
            $scope.aShow = '';
            $scope.setDelay();
            $scope.sup();
            $scope.program_getData($scope.programTab);
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.rkpdes_edit = function (id) {
        $scope.closeMe();
        var modalInstance = $modal.open({
            templateUrl: 'modEdit.html',
            controller: 'modEditRKPDesDesa',
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
            $scope.aClass = hasil.class;
            $scope.aMsg = hasil.msg;
            $scope.aShow = '';
            $scope.setDelay();
            $scope.sup();
            $scope.rkpdes_getData();
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.rkpdes_perubahan = function (id) {
        $scope.closeMe();
        var modalInstance = $modal.open({
            templateUrl: 'modPerubahan.html',
            controller: 'modPerubahanRKPDesDesa',
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
            $scope.aClass = hasil.class;
            $scope.aMsg = hasil.msg;
            $scope.aShow = '';
            $scope.setDelay();
            $scope.sup();
            $scope.rkpdes_getData();
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.pendapatan_verifikasi = function (id) {
        $scope.closeMe();
        var modalInstance = $modal.open({
            templateUrl: 'modVerifikasi.html',
            controller: 'modVerifikasiDPAPendapatan',
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
            $scope.aClass = hasil.class;
            $scope.aMsg = hasil.msg;
            $scope.aShow = '';
            $scope.setDelay();
            $scope.sup();
            $scope.pendapatan_getData($scope.pendapatanTab);
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.belanja_verifikasi = function (id) {
        $scope.closeMe();
        var modalInstance = $modal.open({
            templateUrl: 'modVerifikasi.html',
            controller: 'modVerifikasiDPABelanja',
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
            $scope.aClass = hasil.class;
            $scope.aMsg = hasil.msg;
            $scope.aShow = '';
            $scope.setDelay();
            $scope.sup();
            $scope.belanja_getData($scope.belanjaTab);
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.pembiayaan_verifikasi = function (id) {
        $scope.closeMe();
        var modalInstance = $modal.open({
            templateUrl: 'modVerifikasi.html',
            controller: 'modVerifikasiDPAPembiayaan',
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
            $scope.aClass = hasil.class;
            $scope.aMsg = hasil.msg;
            $scope.aShow = '';
            $scope.setDelay();
            $scope.sup();
            $scope.pembiayaan_getData($scope.pembiayaanTab);
        }, function () {
            //$log.info('Modal dismissed at: ' + new Date());
        });
    };
}]);