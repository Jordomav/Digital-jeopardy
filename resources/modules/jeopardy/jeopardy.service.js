/**
 * Created by Neil Strain on 4/28/2016.
 */

(function () {

    'use strict';

    angular.module('jeopardyApp')
        .service('Jeopardy', function ($http) {

            var vm = this;

            vm.gameData = [];

            vm.init = function () {
                return getGameData()
                    .then(function successCallback(res) {
                        vm.gameData = res.data;
                    },
                        function errorCallback(err) {
                            alert('There was an error retrieving game data.');
                            console.log(err);
                        });
            };

            function getGameData() {
                return $http.get('get-categories');
            }


            vm.selectQuestion = function (question) {
                question.selected = true;

                Custombox.open({
                    target: '#modal',
                    effect: 'push'
                });
            };

            vm.returnToGameboard = function () {
                Custombox.close();
            };

        });


}());
