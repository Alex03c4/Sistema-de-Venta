$(document).ready(function () {
    $(".passNew2").on("input", function (e) {
        console.log("holas");
        pass1 = document.querySelector("#passNew").value;
        pass2 = document.querySelector("#passNew2").value;

        if (pass1 == pass2) { 
            $("#butomPass").removeAttr('disabled'); 
            document.getElementById("butomPass").classList.remove("bg-gray-400");
            document.getElementById("butomPass").classList.add("bg-indigo-600");

            document.getElementById("border").classList.remove("border-red-400");
            document.getElementById("border").classList.add("border-blue-400");
            document.getElementById("butomPass").classList.remove("disabled:opacity-50");          
        } else {
            $("#butomPass").attr('disabled','disabled');
            document.getElementById("butomPass").classList.remove("bg-indigo-600");
            document.getElementById("butomPass").classList.add("bg-gray-400");

            document.getElementById("border").classList.remove("border-blue-400");
            document.getElementById("border").classList.add("border-red-400");    
            document.getElementById("butomPass").classList.add("disabled:opacity-50");      
        } 
    });

});