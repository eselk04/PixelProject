document.addEventListener("DOMContentLoaded", function() {
    var searchButton = document.getElementById('searchbutton');

    
    searchButton.addEventListener("click", function() {
       
        var redirectUrl = "main.php?search="+ document.getElementById('search').value;

       
        window.location.href = redirectUrl;
    });
});
function toggleCategories() {
    var categoryList = document.getElementById('category-list');
    var icon = document.querySelector('.category-header i');

    if (categoryList.style.display === "none" || categoryList.style.display === "") {
        categoryList.style.display = "block";
        icon.classList.remove('fa-chevron-down');
        icon.classList.add('fa-chevron-up');
    } else {
        categoryList.style.display = "none";
        icon.classList.remove('fa-chevron-up');
        icon.classList.add('fa-chevron-down');
    }
}
