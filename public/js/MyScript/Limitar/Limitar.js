$(".Limite8").on("keypress", function(event){
    if( $(this).val().length == 8){
        return false;
    }
});

$(".Limite20").on("keypress", function(event){
    if( $(this).val().length == 20){
        return false;
    }
});
