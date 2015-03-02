app.controller('GantiPasswordCtrl', ['$scope', 'password', '$modal', '$stateParams', function ($scope, password, $modal) {

    $scope.inputData = {};

    // hidden element
    $scope.formHidden = {
        alert: 'hidden',
        edit: ''
    };

    //Disable Control Eksekusi
    $scope.btnEksekusi = false;

    // Class Alert
    $scope.alertset = {
        class: 'success',
        msg: {}
    };

// refresh data
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

// clear fill the textbox
    $scope.clearInput = function () {
        $scope.inputData.password_lama = '';
        $scope.inputData.password_baru = '';
        $scope.inputData.password_baru2 = '';
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
            $scope.inputData._token = $scope.csrf;
            password.update($scope.inputData)
                .success(function (data) {
                    if (data.success == true) {
                        $scope.alertset = {
                            class: 'success'
                        };

                        //Clear form
                        $scope.clearInput();
                    } else {
                        $scope.alertset = {
                            class: 'danger'
                        };
                    }
                    //Set alert message
                    $scope.alertset.msg = data.message;
                    //Show alert
                    $scope.formHidden.alert = '';
                    //Set alert dealy
                    $scope.setDelay();
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

    //Close Alert
    $scope.closeMe = function () {
        $scope.formHidden.alert = 'hidden';
    }
}]);