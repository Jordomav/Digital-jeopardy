
(function () {

    'use strict';

    angular.module('jeopardyApp')
        .controller('buzzerController', function ($scope, $http) {

            var vm = this;
            vm.playerWhoBuzzed = null;
            vm.thisPlayer = null;

            var resetAllBuzzers = true;
            
            vm.pusher = new Pusher('4792c6294d140acf74ba');
            console.log(vm.pusher);
            vm.pusherChannel = vm.pusher.subscribe('buzzer-channel');

            vm.pusherChannel.bind('App\\Events\\PlayerHitBuzzer', function (buzzEvent) {

                resetAllBuzzers = false;

                vm.playerWhoBuzzed = buzzEvent.user;
                $scope.$apply();
            });

            vm.buttonDisabled = function (currentUser) {
                vm.thisPlayer = JSON.parse(currentUser);
                console.log(vm.thisPlayer);

                if ( !resetAllBuzzers ) {
                    return vm.playerWhoBuzzed !== vm.thisPlayer;
                }
            };

            vm.broadcastToAllPlayersInGame = function () {
                $http.get('buzz');
            };

            vm.enabledness = function (currentUser) {
                if (vm.buttonDisabled(currentUser)) {
                    return 'buzzer-disabled';
                }
            };
        });
}());
