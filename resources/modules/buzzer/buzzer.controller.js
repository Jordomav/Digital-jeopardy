
(function () {

    'use strict';

    angular.module('jeopardyApp')
        .controller('buzzerController', function ($scope, $http, $timeout) {

            var vm = this;
            vm.allPlayersWhoBuzzed = [];
            vm.firstPlayerWhoBuzzed = null;

            
            vm.pusher = new Pusher('4792c6294d140acf74ba');
            vm.pusherChannel = vm.pusher.subscribe('buzzer-channel');

            vm.pusherChannel.bind('App\\Events\\PlayerHitBuzzer', function (buzzEvent) {

                vm.allPlayersWhoBuzzed.push(buzzEvent.user);

                vm.disableBuzzer();
                $scope.$apply();
            });


            // TODO: make host controller that resets button for all players (when player answers incorrectly, and every
            // (todo cont...) time a new question is selected.
            var resetAllBuzzers = function(){};

            vm.disableBuzzer = function () {
                if (vm.allPlayersWhoBuzzed.length > 0)
                    return true;
            };

            vm.broadcastToAllPlayersInGame = function () {
                $http.get('buzz');
            };

            // Returns css class for gray buzzer to ng-class
            vm.enabledness = function () {
                if (vm.disableBuzzer() === true) {
                    return 'buzzer-disabled';
                }
            };

            vm.getFirstPlayerWhoBuzzedIn = function () {
                var min = Number.POSITIVE_INFINITY;

                var firstPlayerWhoBuzzed = null;

                if(vm.allPlayersWhoBuzzed.length > 1) {
                    _.each(vm.allPlayersWhoBuzzed, function (player) {
                        var timestamp = parseInt(player.last_buzz.slice(player.last_buzz.length - 12));
                        // console.log(player.name + ': ' + timestamp);
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
