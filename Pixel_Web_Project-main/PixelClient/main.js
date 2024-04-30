const main=document.getElementById('main')
const sform=document.getElementById('sform')
const search=document.getElementById('search')


const src=document.querySelector('.src')
const btn=document.querySelector('.btn')


window.onload = function() {
   
    showProducts(laptopProducts);
};



btn.addEventListener('click',()=>{
    src.classList.toggle('active')
    search.focus()
})


 

 function getProducts(query){


    const filteredProducts = laptopProducts.filter(product =>
        product.name.toLowerCase().includes(query.toString().toLowerCase())
    );
    showProducts(filteredProducts);

    
    
}
 
 function showProducts(Products){
   
    main.innerHTML=''

    Products.forEach((product) => {
        const{name,price,description,image}=product

        const productEl=document.createElement('div')
        productEl.classList.add('product')

        productEl.innerHTML=`  
       
          
        `
        const productContainers = document.querySelectorAll(".product-container");




        main.appendChild(productEl)
    })
}

function getClassByRate(vote){ 
   
}

sform.addEventListener('submit',(e)=>{
    e.preventDefault()

    const searchTerm =search.value

    if(searchTerm && searchTerm!==''){
        getProducts(searchTerm)

        search.value=''
    }
    else{
        window.location.reload()
    }
})

