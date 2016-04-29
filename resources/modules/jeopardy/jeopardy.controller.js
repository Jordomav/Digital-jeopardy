(function()
{
    'use strict';

    angular.module('jeopardyApp')
        .controller('jeopardyController', function($http){

            var vm = this;

            vm.getCategories = function () {
                return $http.get('get-categories');
            };

        });
    
}());