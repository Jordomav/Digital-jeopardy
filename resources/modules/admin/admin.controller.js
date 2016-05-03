(function () {

    'use strict';

    angular.module('jeopardyApp')
        .controller('adminController', function () {

            var vm = this;
            
            vm.questionType = null;

            vm.setQuestionType = function (type) {
                vm.questionType = type;
            };

            vm.getQuestionType = function (question) {

                if (vm.questionType) {
                    return vm.questionType;
                }

                if (question) {
                    console.log(question);
                    question = JSON.parse(question);
                    if (_.has(question, 'question')) {
                        vm.questionType = 'text';
                    } else if (_.has(question, 'image')) {
                        vm.questionType = 'image';
                    }
                }

                return 'text';

            };
        });


}());
