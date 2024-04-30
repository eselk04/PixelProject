document.addEventListener("DOMContentLoaded", function() {
    // searchbutton elementini seç
    var searchButton = document.getElementById('searchbutton');

    
    searchButton.addEventListener("click", function() {
       
        var redirectUrl = "main.php?search="+ document.getElementById('search').value;

        // Yönlendirme işlemi
        window.location.href = redirectUrl;
    });
});