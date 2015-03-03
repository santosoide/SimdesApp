app.controller('DUSCtrl', ['$scope', 'dus', '$modal', '$stateParams', '$timeout', '$document', function ($scope, dus, $location) {

    $scope.inputData = {};
    $scope.objKecamatan = {};

    // siapkan scope pagination data dan pencarian data
    $scope.main = {
        page: 1,
        term: ''
    };

    // hidden element
    $scope.formHidden = {
        alert: 'hidden',
        edit: '',
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
        msg: 'Alert sukses'
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
                $scope.formHidden.alert = "hidden";
            });
        }, 3000);
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

    // edit data yang akan ditampilkan ke form


    dus.show()
        .success(function (data) {
            // fill the textbox
            $scope.inputData._id = data._id;
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

            dus.getkecamatan()
                .success(function (datakec) {
                    $scope.objKecamatan = datakec;
                    $scope.inputData.cbkecamatan = $scope.objKecamatan[findWithAttr($scope.objKecamatan, '_id', data.kec_id)];
                });
            // set hidden the element
            $scope.formHidden = {
                alert: 'hidden',
                edit: ''
            };
            // Stop loading
            $scope.done();
        })
        .error(function (data) {
            $scope.redirect(data);
        });

    // update data
    $scope.updateData = function () {
        //Close Alert
        $scope.closeMe();
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
            $scope.inputData.kec_id = $scope.inputData.cbkecamatan._id;
            dus.update($scope.inputData)
                .success(function (data) {
                    if (data.success == true) {
                        $scope.alertset = {
                            class: 'success'
                        };
                        $scope.success = data.message;
                        $scope.formHidden = {
                            alert: '',
                            edit: ''
                        };
                        $scope.setDelay();
                    } else {
                        $scope.alertset = {
                            class: 'danger'
                        };
                        $scope.csrf = data.message;
                        $scope.success = data.message;

                        $scope.formHidden = {
                            alert: '',
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
                    $scope.redirect(data);
                });
        }
    };

    //CLose Alert
    $scope.closeMe = function () {
        $scope.formHidden.alert = 'hidden';
    }
}]);