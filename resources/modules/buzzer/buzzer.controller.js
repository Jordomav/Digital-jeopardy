
(function () {

    'use strict';

    angular.module('jeopardyApp')
        .controller('buzzerController', function ($scope, $http, $timeout) {

            var vm = this;
            vm.allPlayersWhoBuzzed = [];
            vm.firstPlayerWhoBuzzed = null;
            vm.thisPlayer = null;

            
            vm.pusher = new Pusher('4792c6294d140acf74ba');
            vm.pusherChannel = vm.pusher.subscribe('buzzer-channel');

            vm.pusherChannel.bind('App\\Events\\PlayerHitBuzzer', function (buzzEvent) {

                vm.allPlayersWhoBuzzed.push(buzzEvent.player);

                vm.disableBuzzer();
                $scope.$apply();
            });

            // Enable Pusher logs
            Pusher.log = function(message) {
                if (window.console && window.console.log) {
                    window.console.log(message);
                }
            };


            vm.init = function (thisPlayer) {
                vm.thisPlayer = JSON.parse(thisPlayer);
                console.log(vm.thisPlayer);
            };

            // TODO: make host controller that resets button for all players (when player answers incorrectly, and every
            // (todo cont...) time a new question is selected.
            var resetAllBuzzers = function () {};

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
                // var min = Number.POSITIVE_INFINITY;

                // var firstPlayerWhoBuzzed = null;
                //
                // if(vm.allPlayersWhoBuzzed.length > 1) {
                //     firstPlayerWhoBuzzed = vm.allPlayersWhoBuzzed[0];
                //
                //     //TODO: pusher sometimes receives close events out of sequence. Figure out how to handle this.
                //     // _.each(vm.allPlayersWhoBuzzed, function (player) {
                //     //     var timestamp = parseInt(player.last_buzz.slice(player.last_buzz.length - 12));
                //     //     console.log(player.name + ': ' + timestamp);
                //     //     if (timestamp < min) {
                //     //         min = timestamp;
                //     //         firstPlayerWhoBuzzed = player;
                //     //     }
                //     // });
                // } else {
                //     firstPlayerWhoBuzzed = vm.allPlayersWhoBuzzed[0];
                // }
                //
                // vm.firstPlayerWhoBuzzed = firstPlayerWhoBuzzed;

                vm.firstPlayerWhoBuzzed = vm.allPlayersWhoBuzzed[0];
            };
        });
}());
