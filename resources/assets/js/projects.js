;(function($){
    'use strict';
    $(document).ready(function(){
        var $owner = $('#owner'),
            $categories = $('#categories'),
            $users = $('#users');

        $owner.select2();
        $categories.select2();
        $users.select2();
    });
})(window.jQuery);