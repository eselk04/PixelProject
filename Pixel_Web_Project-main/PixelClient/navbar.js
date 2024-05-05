document.addEventListener("DOMContentLoaded", function() {
    var searchButton = document.getElementById('searchbutton');

    
    searchButton.addEventListener("click", function() {
       
        var redirectUrl = "main.php?search="+ document.getElementById('search').value;

       
        window.location.href = redirectUrl;
    });
});