$(document).ready(function(){
    $('.table').on('click', '.btn-destroy', function(event){
        var confirm = window.confirm('Tem certeza que deseja excluir a categoria?');

        if (!confirm) {
            event.preventDefault();
        };
    });
});
//# sourceMappingURL=categories.js.map