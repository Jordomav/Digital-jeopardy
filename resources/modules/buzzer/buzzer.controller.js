
(function () {

    'use strict';

    angular.module('jeopardyApp')
        .controller('buzzerController', function ($scope, $http) {

            var vm = this;
            vm.allPlayersWhoBuzzed = [];
            vm.playerWhoBuzzed = null;

            vm.thisPlayer = null;

            // TODO: make host controller that resets button for all players (when player answers incorrectly, and every
            // (todo cont...) time a new question is selected.
            var resetAllBuzzers = true;
            
            vm.pusher = new Pusher('4792c6294d140acf74ba');
            vm.pusherChannel = vm.pusher.subscribe('buzzer-channel');

            vm.pusherChannel.bind('App\\Events\\PlayerHitBuzzer', function (buzzEvent) {

                resetAllBuzzers = false;

                vm.allPlayersWhoBuzzed.push(buzzEvent.user);
                vm.playerWhoBuzzed = vm.allPlayersWhoBuzzed[0];

                $scope.$apply();
            });

            vm.buttonDisabled = function (currentUser) {
                vm.thisPlayer = JSON.parse(currentUser);

                if ( !resetAllBuzzers ) {
                    return vm.allPlayersWhoBuzzed !== vm.thisPlayer;
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
