
window.addEventListener('DOMContentLoaded', onStartup);
document.addEventListener("DOMContentLoaded", function() {
    categoryList.style.display = "none";
    var searchButton = document.getElementById('searchbutton');

    searchButton.addEventListener("click", function() {
        var searchValue = document.getElementById('search').value;
        var targetUrl = new URL(window.location.origin + '/PixelProject-main/PixelProject/Pixel_Web_Project-main/PixelClient/main.php');
        var searchParams = targetUrl.searchParams;
        searchParams.set('search', searchValue);
        var newUrl = targetUrl.pathname + '?' + searchParams.toString();

        
        window.location.href = newUrl;
    });


    
});
function onStartup() {
    var categoryList = document.getElementById('category-list');
    var icon = document.querySelector('.category-header i');
    categoryList.style.display = "none";
   
    icon.addEventListener('click', toggleCategories);
    function toggleCategories() {
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
}
