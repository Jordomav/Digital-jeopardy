
(function () {

    'use strict';

    angular.module('jeopardyApp')
        .controller('buzzerController', function ($scope, $http, $timeout) {

            var vm = this;
            vm.allPlayersWhoBuzzed = [];
            vm.firstPlayerWhoBuzzed = null;
            vm.thisPlayer = null;
            vm.thisGameJoinCode = null;

            vm.init = function (thisPlayer, thisGameJoinCode) {
                console.log(thisPlayer, thisGameJoinCode);
                vm.thisPlayer = JSON.parse(thisPlayer);
                vm.thisGameJoinCode = thisGameJoinCode;
            };

            
            vm.pusher = new Pusher('4792c6294d140acf74ba'); // Pusher app key
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




            // TODO: make host controller that resets button for all players (when player answers incorrectly, and every
            // (todo cont...) time a new question is selected.
            var resetAllBuzzers = function () {};

            vm.disableBuzzer = function () {
                if (vm.allPlayersWhoBuzzed.length > 0)
                    return true;
            };

            // TODO: We need to broadcast this for the specific game the player is a part of.
            vm.broadcastToAllPlayersInGame = function () {
                $http.get('/buzz/' + vm.thisGameJoinCode);
            };

            // Returns css class for gray buzzer to ng-class
            vm.enabledness = function () {
                if (vm.disableBuzzer() === true) {
                    return 'buzzer-disabled';
                }
            };

            // TODO: pusher sometimes receives close events out of sequence. Figure out how to handle this.
            // (todo cont...) Also clean this crap up.
            vm.getFirstPlayerWhoBuzzedIn = function () {

                vm.firstPlayerWhoBuzzed = vm.allPlayersWhoBuzzed[0];

                // var min = Number.POSITIVE_INFINITY;

                // var firstPlayerWhoBuzzed = null;
                //
                // if(vm.allPlayersWhoBuzzed.length > 1) {
                //     firstPlayerWhoBuzzed = vm.allPlayersWhoBuzzed[0];

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
            };
        });
}());
