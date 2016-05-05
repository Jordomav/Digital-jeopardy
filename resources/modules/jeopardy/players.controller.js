(function()
{
    'use strict';

    angular.module('jeopardyApp')
        .controller('playersController', function () {

            var socket = io();

            var vm = this;

            vm.users = [];

            socket.on('test-channel:UserSignedUp', function(data) {
                vm.users.push(data.username);
            });

});
}());


