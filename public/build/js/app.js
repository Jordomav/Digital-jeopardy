!function(){"use strict";angular.module("jeopardyApp",["ngTouch"])}(),function(){"use strict";angular.module("jeopardyApp").controller("adminController",function(){var e=this;e.questionType=null,e.setQuestionType=function(t){e.questionType=t},e.getQuestionType=function(t){return e.questionType?e.questionType:(t&&(console.log(t),t=JSON.parse(t),_.has(t,"question")?e.questionType="text":_.has(t,"image")&&(e.questionType="image")),"text")}})}(),function(){"use strict";angular.module("jeopardyApp").controller("buzzerController",["$scope","$http",function(e,t){var n=this;n.playerWhoBuzzed=null,n.thisPlayer=null;var o=!0;n.pusher=new Pusher("4792c6294d140acf74ba"),console.log(n.pusher),n.pusherChannel=n.pusher.subscribe("buzzer-channel"),n.pusherChannel.bind("App\\Events\\PlayerHitBuzzer",function(t){o=!1,n.playerWhoBuzzed=t.user,e.$apply()}),n.buttonDisabled=function(e){return n.thisPlayer=JSON.parse(e),console.log(n.thisPlayer),o?void 0:n.playerWhoBuzzed!==n.thisPlayer},n.broadcastToAllPlayersInGame=function(){t.get("buzz")},n.enabledness=function(e){return n.buttonDisabled(e)?"buzzer-disabled":void 0}}])}(),function(){"use strict";angular.module("jeopardyApp").controller("jeopardyController",["$http","Jeopardy",function(e,t){function n(){t.init().then(function(){r.gameData=t.gameData,o()})}function o(){_.forEach(r.gameData.categories,function(e){e.questions=[];var t=100,n=1;_.forEach(r.gameData.questions,function(o){o.category_id===e._id&&(o.money=t*n,e.questions.push(o),n++)}),r.categories.push(e)}),console.log(r.categories)}var r=this;r.testing="hi hi hi",r.gameData=[],r.categories=[],n(),r.selectQuestion=function(e){r.selectedQuestion=e,t.selectQuestion(e)},r.toggleShowAnswer=function(){r.selectedQuestion.showAnswer=!r.selectedQuestion.showAnswer},r.returnToGameboard=function(){t.returnToGameboard()},r.buttonClick=function(){console.log("Hello")}}])}(),function(){"use strict";angular.module("jeopardyApp").service("Jeopardy",["$http",function(e){function t(){return e.get("get-categories")}var n=this;n.gameData=[],n.init=function(){return t().then(function(e){n.gameData=e.data},function(e){alert("There was an error retrieving game data."),console.log(e)})},n.selectQuestion=function(e){e.selected=!0,Custombox.open({target:"#modal",effect:"push"})},n.returnToGameboard=function(){Custombox.close()}}])}();
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImplb3BhcmR5LmFwcC5qcyIsImFkbWluL2FkbWluLmNvbnRyb2xsZXIuanMiLCJidXp6ZXIvYnV6emVyLmNvbnRyb2xsZXIuanMiLCJqZW9wYXJkeS9qZW9wYXJkeS5jb250cm9sbGVyLmpzIiwiamVvcGFyZHkvamVvcGFyZHkuc2VydmljZS5qcyJdLCJuYW1lcyI6WyJhbmd1bGFyIiwibW9kdWxlIiwiY29udHJvbGxlciIsInZtIiwidGhpcyIsInF1ZXN0aW9uVHlwZSIsInNldFF1ZXN0aW9uVHlwZSIsInR5cGUiLCJnZXRRdWVzdGlvblR5cGUiLCJxdWVzdGlvbiIsImNvbnNvbGUiLCJsb2ciLCJKU09OIiwicGFyc2UiLCJfIiwiaGFzIiwiJHNjb3BlIiwiJGh0dHAiLCJwbGF5ZXJXaG9CdXp6ZWQiLCJ0aGlzUGxheWVyIiwicmVzZXRBbGxCdXp6ZXJzIiwicHVzaGVyIiwiUHVzaGVyIiwicHVzaGVyQ2hhbm5lbCIsInN1YnNjcmliZSIsImJpbmQiLCJidXp6RXZlbnQiLCJ1c2VyIiwiJGFwcGx5IiwiYnV0dG9uRGlzYWJsZWQiLCJjdXJyZW50VXNlciIsImJyb2FkY2FzdFRvQWxsUGxheWVyc0luR2FtZSIsImdldCIsImVuYWJsZWRuZXNzIiwiSmVvcGFyZHkiLCJyZW5kZXJHYW1lYm9hcmQiLCJpbml0IiwidGhlbiIsImdhbWVEYXRhIiwicG9wdWxhdGVDYXRlZ29yaWVzIiwiZm9yRWFjaCIsImNhdGVnb3JpZXMiLCJjYXRlZ29yeSIsInF1ZXN0aW9ucyIsIm1vbmV5IiwiaSIsImNhdGVnb3J5X2lkIiwiX2lkIiwicHVzaCIsInRlc3RpbmciLCJzZWxlY3RRdWVzdGlvbiIsInNlbGVjdGVkUXVlc3Rpb24iLCJ0b2dnbGVTaG93QW5zd2VyIiwic2hvd0Fuc3dlciIsInJldHVyblRvR2FtZWJvYXJkIiwiYnV0dG9uQ2xpY2siLCJzZXJ2aWNlIiwiZ2V0R2FtZURhdGEiLCJyZXMiLCJkYXRhIiwiZXJyIiwiYWxlcnQiLCJzZWxlY3RlZCIsIkN1c3RvbWJv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QW1DLFNBQUFvQixFQUFBQyxNQUVBLFNBQUFDLEdBQ0FDLE1BQUEsNENBQ0FuRCxRQUFBQyxJQUFBaUQsTUFTQXpELEVBQUErQyxlQUFBLFNBQUF6QyxHQUNBQSxFQUFBcUQsVUFBQSxFQUVBQyxVQUFBQyxNQUNBQyxPQUFBLFNBQ0FDLE9BQUEsVUFJQS9ELEVBQUFtRCxrQkFBQSxXQUNBUyxVQUFBSSIsImZpbGUiOiJhcHAuanMiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24oKVxyXG57XHJcbiAgICAndXNlIHN0cmljdCc7XHJcblxyXG4gICAgYW5ndWxhci5tb2R1bGUoJ2plb3BhcmR5QXBwJywgWyduZ1RvdWNoJ10pO1xyXG5cclxufSgpKTsiLCIoZnVuY3Rpb24gKCkge1xyXG5cclxuICAgICd1c2Ugc3RyaWN0JztcclxuXHJcbiAgICBhbmd1bGFyLm1vZHVsZSgnamVvcGFyZHlBcHAnKVxyXG4gICAgICAgIC5jb250cm9sbGVyKCdhZG1pbkNvbnRyb2xsZXInLCBmdW5jdGlvbiAoKSB7XHJcblxyXG4gICAgICAgICAgICB2YXIgdm0gPSB0aGlzO1xyXG4gICAgICAgICAgICBcclxuICAgICAgICAgICAgdm0ucXVlc3Rpb25UeXBlID0gbnVsbDtcclxuXHJcbiAgICAgICAgICAgIHZtLnNldFF1ZXN0aW9uVHlwZSA9IGZ1bmN0aW9uICh0eXBlKSB7XHJcbiAgICAgICAgICAgICAgICB2bS5xdWVzdGlvblR5cGUgPSB0eXBlO1xyXG4gICAgICAgICAgICB9O1xyXG5cclxuICAgICAgICAgICAgdm0uZ2V0UXVlc3Rpb25UeXBlID0gZnVuY3Rpb24gKHF1ZXN0aW9uKSB7XHJcblxyXG4gICAgICAgICAgICAgICAgaWYgKHZtLnF1ZXN0aW9uVHlwZSkge1xyXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiB2bS5xdWVzdGlvblR5cGU7XHJcbiAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgaWYgKHF1ZXN0aW9uKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2cocXVlc3Rpb24pO1xyXG4gICAgICAgICAgICAgICAgICAgIHF1ZXN0aW9uID0gSlNPTi5wYXJzZShxdWVzdGlvbik7XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKF8uaGFzKHF1ZXN0aW9uLCAncXVlc3Rpb24nKSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2bS5xdWVzdGlvblR5cGUgPSAndGV4dCc7XHJcbiAgICAgICAgICAgICAgICAgICAgfSBlbHNlIGlmIChfLmhhcyhxdWVzdGlvbiwgJ2ltYWdlJykpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdm0ucXVlc3Rpb25UeXBlID0gJ2ltYWdlJztcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgcmV0dXJuICd0ZXh0JztcclxuXHJcbiAgICAgICAgICAgIH07XHJcbiAgICAgICAgfSk7XHJcblxyXG5cclxufSgpKTtcclxuIiwiXHJcbihmdW5jdGlvbiAoKSB7XHJcblxyXG4gICAgJ3VzZSBzdHJpY3QnO1xyXG5cclxuICAgIGFuZ3VsYXIubW9kdWxlKCdqZW9wYXJkeUFwcCcpXHJcbiAgICAgICAgLmNvbnRyb2xsZXIoJ2J1enplckNvbnRyb2xsZXInLCBmdW5jdGlvbiAoJHNjb3BlLCAkaHR0cCkge1xyXG5cclxuICAgICAgICAgICAgdmFyIHZtID0gdGhpcztcclxuICAgICAgICAgICAgdm0ucGxheWVyV2hvQnV6emVkID0gbnVsbDtcclxuICAgICAgICAgICAgdm0udGhpc1BsYXllciA9IG51bGw7XHJcblxyXG4gICAgICAgICAgICB2YXIgcmVzZXRBbGxCdXp6ZXJzID0gdHJ1ZTtcclxuICAgICAgICAgICAgXHJcbiAgICAgICAgICAgIHZtLnB1c2hlciA9IG5ldyBQdXNoZXIoJzQ3OTJjNjI5NGQxNDBhY2Y3NGJhJyk7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKHZtLnB1c2hlcik7XHJcbiAgICAgICAgICAgIHZtLnB1c2hlckNoYW5uZWwgPSB2bS5wdXNoZXIuc3Vic2NyaWJlKCdidXp6ZXItY2hhbm5lbCcpO1xyXG5cclxuICAgICAgICAgICAgdm0ucHVzaGVyQ2hhbm5lbC5iaW5kKCdBcHBcXFxcRXZlbnRzXFxcXFBsYXllckhpdEJ1enplcicsIGZ1bmN0aW9uIChidXp6RXZlbnQpIHtcclxuXHJcbiAgICAgICAgICAgICAgICByZXNldEFsbEJ1enplcnMgPSBmYWxzZTtcclxuXHJcbiAgICAgICAgICAgICAgICB2bS5wbGF5ZXJXaG9CdXp6ZWQgPSBidXp6RXZlbnQudXNlcjtcclxuICAgICAgICAgICAgICAgICRzY29wZS4kYXBwbHkoKTtcclxuICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICB2bS5idXR0b25EaXNhYmxlZCA9IGZ1bmN0aW9uIChjdXJyZW50VXNlcikge1xyXG4gICAgICAgICAgICAgICAgdm0udGhpc1BsYXllciA9IEpTT04ucGFyc2UoY3VycmVudFVzZXIpO1xyXG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2codm0udGhpc1BsYXllcik7XHJcblxyXG4gICAgICAgICAgICAgICAgaWYgKCAhcmVzZXRBbGxCdXp6ZXJzICkge1xyXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiB2bS5wbGF5ZXJXaG9CdXp6ZWQgIT09IHZtLnRoaXNQbGF5ZXI7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH07XHJcblxyXG4gICAgICAgICAgICB2bS5icm9hZGNhc3RUb0FsbFBsYXllcnNJbkdhbWUgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAkaHR0cC5nZXQoJ2J1enonKTtcclxuICAgICAgICAgICAgfTtcclxuXHJcbiAgICAgICAgICAgIHZtLmVuYWJsZWRuZXNzID0gZnVuY3Rpb24gKGN1cnJlbnRVc2VyKSB7XHJcbiAgICAgICAgICAgICAgICBpZiAodm0uYnV0dG9uRGlzYWJsZWQoY3VycmVudFVzZXIpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuICdidXp6ZXItZGlzYWJsZWQnO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9O1xyXG4gICAgICAgIH0pO1xyXG59KCkpO1xyXG4iLCJcclxuKGZ1bmN0aW9uKClcclxue1xyXG4gICAgJ3VzZSBzdHJpY3QnO1xyXG5cclxuICAgIGFuZ3VsYXIubW9kdWxlKCdqZW9wYXJkeUFwcCcpXHJcbiAgICAgICAgLmNvbnRyb2xsZXIoJ2plb3BhcmR5Q29udHJvbGxlcicsIGZ1bmN0aW9uKCRodHRwLCBKZW9wYXJkeSl7XHJcbiAgICAgICAgICAgIFxyXG4gICAgICAgICAgICB2YXIgdm0gPSB0aGlzO1xyXG4gICAgICAgICAgICBcclxuICAgICAgICAgICAgdm0udGVzdGluZyA9ICdoaSBoaSBoaSc7XHJcblxyXG4gICAgICAgICAgICB2bS5nYW1lRGF0YSA9IFtdO1xyXG4gICAgICAgICAgICB2bS5jYXRlZ29yaWVzID0gW107XHJcblxyXG4gICAgICAgICAgICByZW5kZXJHYW1lYm9hcmQoKTtcclxuXHJcbiAgICAgICAgICAgIGZ1bmN0aW9uIHJlbmRlckdhbWVib2FyZCgpIHtcclxuICAgICAgICAgICAgICAgIEplb3BhcmR5LmluaXQoKVxyXG4gICAgICAgICAgICAgICAgICAgIC50aGVuKCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZtLmdhbWVEYXRhID0gSmVvcGFyZHkuZ2FtZURhdGE7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHBvcHVsYXRlQ2F0ZWdvcmllcygpO1xyXG4gICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAvLyBOZXN0IFF1ZXN0aW9ucyBpbnNpZGUgb2YgdGhlaXIgYXNzb2NpYXRlZCBjYXRlZ29yaWVzIHNvIHRoYXQgd2UgaGF2ZSBhIG1vcmUgaW50ZWxsaWdpYmxlIG9iamVjdCB0b1xyXG4gICAgICAgICAgICAvLyB1c2UgaW4gb3VyIHZpZXcuXHJcbiAgICAgICAgICAgIGZ1bmN0aW9uIHBvcHVsYXRlQ2F0ZWdvcmllcygpIHtcclxuXHJcbiAgICAgICAgICAgICAgICBfLmZvckVhY2goIHZtLmdhbWVEYXRhLmNhdGVnb3JpZXMsIGZ1bmN0aW9uIChjYXRlZ29yeSkge1xyXG5cclxuICAgICAgICAgICAgICAgICAgICBjYXRlZ29yeS5xdWVzdGlvbnMgPSBbXTtcclxuICAgICAgICAgICAgICAgICAgICB2YXIgbW9uZXkgPSAxMDAsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGkgPSAxO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICBfLmZvckVhY2godm0uZ2FtZURhdGEucXVlc3Rpb25zLCBmdW5jdGlvbiAocXVlc3Rpb24pIHtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChxdWVzdGlvbi5jYXRlZ29yeV9pZCA9PT0gY2F0ZWdvcnkuX2lkKSB7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLy9Bc3NpZ24gbW9uZXRhcnkgdmFsdWUgdG8gZWFjaCBxdWVzdGlvblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcXVlc3Rpb24ubW9uZXkgPSAobW9uZXkgKiBpKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjYXRlZ29yeS5xdWVzdGlvbnMucHVzaChxdWVzdGlvbik7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpKys7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgdm0uY2F0ZWdvcmllcy5wdXNoKGNhdGVnb3J5KTtcclxuICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2codm0uY2F0ZWdvcmllcyk7XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIHZtLnNlbGVjdFF1ZXN0aW9uID0gZnVuY3Rpb24gKHF1ZXN0aW9uKSB7XHJcbiAgICAgICAgICAgICAgICB2bS5zZWxlY3RlZFF1ZXN0aW9uID0gcXVlc3Rpb247XHJcbiAgICAgICAgICAgICAgICBKZW9wYXJkeS5zZWxlY3RRdWVzdGlvbihxdWVzdGlvbik7XHJcbiAgICAgICAgICAgIH07XHJcblxyXG4gICAgICAgICAgICB2bS50b2dnbGVTaG93QW5zd2VyID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgdm0uc2VsZWN0ZWRRdWVzdGlvbi5zaG93QW5zd2VyID0gISh2bS5zZWxlY3RlZFF1ZXN0aW9uLnNob3dBbnN3ZXIpO1xyXG4gICAgICAgICAgICB9O1xyXG5cclxuICAgICAgICAgICAgdm0ucmV0dXJuVG9HYW1lYm9hcmQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICBKZW9wYXJkeS5yZXR1cm5Ub0dhbWVib2FyZCgpO1xyXG4gICAgICAgICAgICB9O1xyXG5cclxuICAgICAgICAgICAgdm0uYnV0dG9uQ2xpY2sgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZygnSGVsbG8nKTtcclxuICAgICAgICAgICAgfTtcclxuICAgICAgICB9KTtcclxuXHJcbn0oKSk7IiwiLyoqXHJcbiAqIENyZWF0ZWQgYnkgTmVpbCBTdHJhaW4gb24gNC8yOC8yMDE2LlxyXG4gKi9cclxuXHJcbihmdW5jdGlvbiAoKSB7XHJcblxyXG4gICAgJ3VzZSBzdHJpY3QnO1xyXG5cclxuICAgIGFuZ3VsYXIubW9kdWxlKCdqZW9wYXJkeUFwcCcpXHJcbiAgICAgICAgLnNlcnZpY2UoJ0plb3BhcmR5JywgZnVuY3Rpb24gKCRodHRwKSB7XHJcblxyXG4gICAgICAgICAgICB2YXIgdm0gPSB0aGlzO1xyXG5cclxuICAgICAgICAgICAgdm0uZ2FtZURhdGEgPSBbXTtcclxuXHJcbiAgICAgICAgICAgIHZtLmluaXQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICByZXR1cm4gZ2V0R2FtZURhdGEoKVxyXG4gICAgICAgICAgICAgICAgICAgIC50aGVuKGZ1bmN0aW9uIHN1Y2Nlc3NDYWxsYmFjayhyZXMpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdm0uZ2FtZURhdGEgPSByZXMuZGF0YTtcclxuICAgICAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBmdW5jdGlvbiBlcnJvckNhbGxiYWNrKGVycikge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYWxlcnQoJ1RoZXJlIHdhcyBhbiBlcnJvciByZXRyaWV2aW5nIGdhbWUgZGF0YS4nKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGVycik7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICB9O1xyXG5cclxuICAgICAgICAgICAgZnVuY3Rpb24gZ2V0R2FtZURhdGEoKSB7XHJcbiAgICAgICAgICAgICAgICByZXR1cm4gJGh0dHAuZ2V0KCdnZXQtY2F0ZWdvcmllcycpO1xyXG4gICAgICAgICAgICB9XHJcblxyXG5cclxuICAgICAgICAgICAgdm0uc2VsZWN0UXVlc3Rpb24gPSBmdW5jdGlvbiAocXVlc3Rpb24pIHtcclxuICAgICAgICAgICAgICAgIHF1ZXN0aW9uLnNlbGVjdGVkID0gdHJ1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICBDdXN0b21ib3gub3Blbih7XHJcbiAgICAgICAgICAgICAgICAgICAgdGFyZ2V0OiAnI21vZGFsJyxcclxuICAgICAgICAgICAgICAgICAgICBlZmZlY3Q6ICdwdXNoJ1xyXG4gICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIH07XHJcblxyXG4gICAgICAgICAgICB2bS5yZXR1cm5Ub0dhbWVib2FyZCA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgIEN1c3RvbWJveC5jbG9zZSgpO1xyXG4gICAgICAgICAgICB9O1xyXG5cclxuICAgICAgICB9KTtcclxuXHJcblxyXG59KCkpO1xyXG4iXSwic291cmNlUm9vdCI6Ii9zb3VyY2UvIn0=
