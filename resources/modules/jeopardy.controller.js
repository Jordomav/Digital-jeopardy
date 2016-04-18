
(function()
{
    'use strict';

    angular.module('jeopardyApp')
        .controller('jeopardyController', function($http){

            var vm = this;

            vm.categories = [];

            vm.getCategories = function($http){
                return $http.get('')
            }
        })

}());