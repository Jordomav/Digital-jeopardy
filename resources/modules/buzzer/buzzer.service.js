
(function () {

    'use strict';

    angular.module('jeopardyApp')
        .service('Buzzer', function ($http) {

            var vm = this;

            vm.resetBuzzers = function (joinCode) {
                $http.get('/reset-buzzer/' + joinCode);
            };


        });
}());
