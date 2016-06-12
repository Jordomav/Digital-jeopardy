
(function()
{
    'use strict';

    angular.module('jeopardyApp')
        .controller('jeopardyController', function($http, Jeopardy, Buzzer){
            
            var vm = this;

            vm.gameData = [];
            vm.categories = [];

            console.log(Buzzer);

            vm.setGame = function (id) {
                renderGameboard(id);
            };

            function renderGameboard(id) {
                Jeopardy.init(id)
                    .then( function () {
                        console.log(Jeopardy.gameData);
                        vm.gameData = Jeopardy.gameData.game;
                        populateCategories()
                    });
            }

            // Nest Questions inside of their associated categories so that we have a more intelligible object to
            // use in our view.
            function populateCategories() {

                _.forEach(vm.gameData.categories, function (category) {

                    var money = 100,
                        i = 1;

                    _.forEach(category.questions, function (question) {
                        
                        //Assign monetary value to each question
                        question.money = (money * i);
                        i++;
                    });

                    vm.categories.push(category);
                });
            }

            vm.selectQuestion = function (question) {
                vm.selectedQuestion = question;
                Jeopardy.selectQuestion(question);
            };

            vm.toggleShowAnswer = function () {
                vm.selectedQuestion.showAnswer = !(vm.selectedQuestion.showAnswer);
            };

            vm.returnToGameboard = function () {
                Jeopardy.returnToGameboard();
            };

            vm.buttonClick = function () {
                console.log('Hello');
            };


            vm.resetBuzzers = function () {
                console.log('reset from game controller');
            };
        });

}());