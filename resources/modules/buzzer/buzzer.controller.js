
(function () {

    'use strict';

    angular.module('jeopardyApp')
        .controller('buzzerController', function ($scope, $http, $timeout) {

            var vm = this;
            vm.allPlayersWhoBuzzed = [];
            vm.firstPlayerWhoBuzzed = null;

            vm.thisPlayer = null;

            // TODO: make host controller that resets button for all players (when player answers incorrectly, and every
            // (todo cont...) time a new question is selected.
            var resetAllBuzzers = true;
            
            vm.pusher = new Pusher('4792c6294d140acf74ba');
            vm.pusherChannel = vm.pusher.subscribe('buzzer-channel');

            vm.pusherChannel.bind('App\\Events\\PlayerHitBuzzer', function (buzzEvent) {

                resetAllBuzzers = false;

                console.log(parseInt(buzzEvent.user.updated_at));

                vm.allPlayersWhoBuzzed.push(buzzEvent.user);
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

            vm.getFirstPlayerWhoBuzzedIn = function () {
                var min = Number.POSITIVE_INFINITY;

                var firstPlayerWhoBuzzed = null;

                if(vm.allPlayersWhoBuzzed.length > 1) {
                    _.each(vm.allPlayersWhoBuzzed, function (player) {
                        console.log(player);
                        var timestamp = parseInt(player.last_buzz.slice(player.last_buzz.length - 12));
                        console.log(timestamp);
                        if (timestamp < min) {
                            min = player;
                            firstPlayerWhoBuzzed = player;
                        }
                    });
                    vm.firstPlayerWhoBuzzed = firstPlayerWhoBuzzed;
                    console.log(firstPlayerWhoBuzzed);
                } else {
                    vm.firstPlayerWhoBuzzed = vm.allPlayersWhoBuzzed[0];
                }

            };
        });
}());
