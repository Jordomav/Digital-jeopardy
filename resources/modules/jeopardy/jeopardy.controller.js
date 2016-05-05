
(function()
{
    'use strict';

    angular.module('jeopardyApp')
        .controller('jeopardyController', function($http, Jeopardy){
            
            var vm = this;
            
            vm.testing = 'hi hi hi';

            vm.gameData = [];
            vm.categories = [];

            renderGameboard();

            function renderGameboard() {
                Jeopardy.init()
                    .then( function () {
                        vm.gameData = Jeopardy.gameData;
                        populateCategories();
                    });
            }

            // Nest Questions inside of their associated categories so that we have a more intelligible object to
            // use in our view.
            function populateCategories() {

                _.forEach( vm.gameData.categories, function (category) {

                    category.questions = [];
                    var money = 100,
                        i = 1;

                    _.forEach(vm.gameData.questions, function (question) {

                        if (question.category_id === category._id) {

                            //Assign monetary value to each question
                            question.money = (money * i);

                            category.questions.push(question);
                            i++;
                        }
                    });

                    vm.categories.push(category);
                });
                console.log(vm.categories);
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
        });

}());