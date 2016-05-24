
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

            vm.disableBuzzer = function () {
                if (vm.allPlayersWhoBuzzed.length > 0)
                    return true;
            };

            vm.broadcastToAllPlayersInGame = function () {
                $http.get('buzz');
            };

            vm.enabledness = function () {
                if (vm.disableBuzzer()) {
                    return 'buzzer-disabled';
                }
            };

            vm.getFirstPlayerWhoBuzzedIn = function () {
                var min = Number.POSITIVE_INFINITY;

                var firstPlayerWhoBuzzed = null;

                if(vm.allPlayersWhoBuzzed.length > 1) {
                    _.each(vm.allPlayersWhoBuzzed, function (player) {
                        var timestamp = parseInt(player.last_buzz.slice(player.last_buzz.length - 12));
                        console.log(player.name + ': ' + timestamp);
                        if (timestamp < min) {
                            min = player;
                            firstPlayerWhoBuzzed = player;
                        }
                    });
                    vm.firstPlayerWhoBuzzed = firstPlayerWhoBuzzed;
                } else {
                    vm.firstPlayerWhoBuzzed = vm.allPlayersWhoBuzzed[0];
                }
            };
        });
}());
