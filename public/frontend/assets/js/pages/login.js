$(document).ready(function () {
    LoginController.init();
});

var LoginController = {
    init: function () {
        LoginController.scrollToID('.sign-inout-wrapper', 1000);
    },

    scrollToID: function (selector, speed) {
        var offSet = 50;
        var obj = $(selector);
        if (obj.length) {
            var offs = obj.offset();
            var targetOffset = offs.top - offSet;
            $('html,body').animate({scrollTop: targetOffset}, speed);
        }
    }
};