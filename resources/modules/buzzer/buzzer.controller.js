
(function () {

    'use strict';

    angular.module('jeopardyApp')
        .controller('buzzerController', function ($scope, $http) {

            var vm = this;
            vm.playerWhoBuzzed = null;
            vm.thisPlayer = null;
            
            vm.pusher = new Pusher('4792c6294d140acf74ba');
            console.log(vm.pusher);
            vm.pusherChannel = vm.pusher.subscribe('buzzer-channel');

            vm.pusherChannel.bind('App\\Events\\PlayerHitBuzzer', function (buzzEvent) {
                vm.playerWhoBuzzed = buzzEvent.user;
                $scope.$apply();
            });

            vm.getThisPlayer = function () {
                
            }();

            vm.buttonDisabled = function () {
                console.log(vm.playerWhoBuzzed !== vm.thisPlayer);
                return vm.playerWhoBuzzed !== vm.thisPlayer;
            };

            vm.broadcastToAllPlayersInGame = function () {
                vm.thisPlayer = buzzEvent.user;
                $http.get('buzz');
            };
        });
}());
