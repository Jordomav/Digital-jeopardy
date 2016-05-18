
(function () {

    'use strict';

    angular.module('jeopardyApp')
        .controller('pusherController', function () {

            var vm = this;

            vm.buzzEvents = [];

            vm.pusher = new Pusher('4792c6294d140acf74ba');
            vm.pusherChannel = pusher.subscribe('buzzer-channel');

            vm.pusherChannel.bind('\App\Events\PlayerHitBuzzer', function(buzz) {
                self.users.push(buzz.buzzEvents);
            });
        });

}());
