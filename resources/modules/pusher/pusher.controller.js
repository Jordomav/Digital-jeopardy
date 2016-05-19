
(function () {

    'use strict';

    angular.module('jeopardyApp')
        .controller('pusherController', function ($scope) {

            var vm = this;
            
            vm.pusher = new Pusher('4792c6294d140acf74ba');
            console.log(vm.pusher);
            vm.pusherChannel = vm.pusher.subscribe('buzzer-channel');

            vm.pusherChannel.bind('App\\Events\\PlayerHitBuzzer', function (buzzEvent) {
                console.log('something just happened');
                vm.buzzEvents.push(buzzEvent);
                console.log(vm.buzzEvents);
                $scope.$apply();
            });
        });
}());
