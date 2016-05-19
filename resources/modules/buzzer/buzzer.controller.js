
(function () {

    'use strict';

    angular.module('jeopardyApp')
        .controller('buzzerController', function ($scope, $http) {

            var vm = this;
            vm.playerWhoBuzzed = null;
            
            vm.pusher = new Pusher('4792c6294d140acf74ba');
            console.log(vm.pusher);
            vm.pusherChannel = vm.pusher.subscribe('buzzer-channel');

            vm.pusherChannel.bind('App\\Events\\PlayerHitBuzzer', function (buzzEvent) {
                vm.playerWhoBuzzed = buzzEvent.user;
                $scope.$apply();
            });

            vm.broadcastToAllPlayersInGame = function () {
                $http.get('buzz');
            };
        });
}());
