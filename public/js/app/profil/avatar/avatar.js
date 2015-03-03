app.controller('GantiAvatarCtrl', ['$scope', 'avatar', '$modal', '$stateParams', function ($scope, avatar, $modal) {

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
        $scope.inputData.myImage = '';
        $scope.myImage = '';
        $scope.myCroppedImage = '';
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
            $scope.inputData.avatar = LZString.compress($scope.myImage);
            //alert($scope.inputData.avatar);
            //console.log($scope.inputData.avatar);
            avatar.update($scope.inputData)
                .success(function (data) {
                    if (data.success == true) {
                        $scope.alertset = {
                            class: 'success'
                        };
                        //Set alert dealy
                        $scope.setDelay();
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
    };

    $scope.myImage = '';
    $scope.myCroppedImage = '';
    $scope.cropType = "square";
    $scope.preview = false;

    var handleFileSelect = function (evt) {
        var file = evt.currentTarget.files[0];
        var reader = new FileReader();
        reader.onload = function (evt) {
            $scope.$apply(function ($scope) {
                $scope.myImage = evt.target.result;
                $scope.preview = true;
            });
        };
        reader.readAsDataURL(file);
    };
    angular.element(document.querySelector('#fileInput')).on('change', handleFileSelect);

}]);