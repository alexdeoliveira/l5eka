;(function($){
    'use strict';
    $(document).ready(function(){
        console.log('teste');
        var $owner = $('#owner'),
            $categories = $('#categories'),
            $users = $('#users');

        $owner.select2();
        $categories.select2();
        $users.select2();
    });
})(window.jQuery);
//# sourceMappingURL=projects.js.map