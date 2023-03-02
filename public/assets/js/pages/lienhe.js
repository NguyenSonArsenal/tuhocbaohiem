$(document).ready(function () {
    LienheController.init();
});

var LienheController = {
    init: function () {
        LienheController.scrollToID('#container-lienhe', 1000);
        LienheController.scrollToFormContact('#container-contact', 1000);
    },

    scrollToID: function (selector, speed) {
        var offSet = 0;
        var obj = $(selector);
        if (obj.length) {
            var offs = obj.offset();
            var targetOffset = offs.top - offSet;
            $('html,body').animate({scrollTop: targetOffset}, speed);
        }
    },

    scrollToFormContact: function (selector, speed) {
        var offSet = 0;
        var obj = $(selector);
        if (obj.length) {
            var offs = obj.offset();
            var targetOffset = offs.top - offSet;
            $('html,body').animate({scrollTop: targetOffset}, speed);
        }
    }
};