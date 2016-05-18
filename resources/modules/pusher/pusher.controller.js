
(function () {

    'use strict';

    angular.module('jeopardyApp')
        .controller('pusherController', function () {

            var vm = this;

            vm.pusher = new Pusher('4792c6294d140acf74ba');
            vm.pusherChannel = pusher.subscribe('buzzer-channel');
            vm.buzzEvents = [];
        });

}());
