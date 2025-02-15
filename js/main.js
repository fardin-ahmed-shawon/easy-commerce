// Menu bar open and close
const pages = document.getElementById('pages');

function openMenuBtn() {
    pages.style.left = '0';
}

function closeMenuBtn() {
    pages.style.left = '-100%';
}

// Search bar open and close
const searchBtn = document.querySelector('.search-icon');
const closeSearchBtn = document.querySelector('.search-close-icon');

const searchBox = document.querySelector('.mobile-search-box');

searchBtn.addEventListener('click', () => {
    searchBox.style.display = 'block';
    closeSearchBtn.style.display = 'block';
    searchBtn.style.display = 'none';
});

closeSearchBtn.addEventListener('click', ()=>{
    searchBox.style.display = 'none';
    closeSearchBtn.style.display = 'none';
    searchBtn.style.display = 'block';
});

// Cart Bar Open and Close
const cart = document.querySelector('.cart');

function openCartBar() {
    cart.style.right = '0';
}

function closeCartBar() {
    cart.style.right = '-100%';
}


/***************************************************/
/* Add new arrival products dynamically home page */

// Select the card container
const new_arrival_products = document.querySelector('.new-arrival-products');
var count_new = 0;

// Mapping Product Data
mens.map(item => {
    if (count_new < 5) {
        // Create the card element
        const card = document.createElement("div");
        card.className = "card";
        card.setAttribute("product-id", `${item.id}`);
        card.setAttribute("product-title", `${item.title}`);
        card.setAttribute("product-img", `${item.images}`);
        card.setAttribute("product-price", `${item.price}`);
        card.setAttribute("product-quantity", "1");
            
        // Insert Product data into the card
        card.innerHTML = `
            <img src="${item.images}" class="card-img-top" alt="...">
            <div class="card-body">
                <h6>${item.title}</h6>
                <p>${item.sub_category}</p>
                <h6>Tk. ${item.price}</h6>
                <button onclick="addToCart(this)" class="btn btn-outline-dark"><span>Add to Cart</span> <i class="ri-shopping-bag-line"></i></button>
                <button onclick="openProduct('${item.id}')" class="btn btn-dark"><span>Order Now</span> <i class="ri-shopping-cart-2-line"></i></button>
            </div>`;
            
        // Insert card into the product container
        new_arrival_products.appendChild(card);
        count_new++;
    } 
})
var count_new = 0;
womens.map(item => {
    if (count_new < 5) {
        // Create the card element
        const card = document.createElement("div");
        card.className = "card";
        card.setAttribute("product-id", `${item.id}`);
        card.setAttribute("product-title", `${item.title}`);
        card.setAttribute("product-img", `${item.images}`);
        card.setAttribute("product-price", `${item.price}`);
        card.setAttribute("product-quantity", "1");
            
        // Insert Product data into the card
        card.innerHTML = `
            <img src="${item.images}" class="card-img-top" alt="...">
            <div class="card-body">
                <h6>${item.title}</h6>
                <p>${item.sub_category}</p>
                <h6>Tk. ${item.price}</h6>
                <button onclick="addToCart(this)" class="btn btn-outline-dark"><span>Add to Cart</span> <i class="ri-shopping-bag-line"></i></button>
                <button onclick="openProduct('${item.id}')" class="btn btn-dark"><span>Order Now</span> <i class="ri-shopping-cart-2-line"></i></button>
            </div>`;
            
        // Insert card into the product container
        new_arrival_products.appendChild(card);
        count_new++;
    } 
})


/**************************************************/
/* Add Top selling products dynamically home page*/

// Select the card container
const top_selling_products = document.querySelector('.top-selling-products');
var count_top = 0;

// Mapping Product Data
mens.map(item => {
    if (count_top < 6) {
        // Create the card element
        const card = document.createElement("div");
        card.className = "card";
        card.setAttribute("product-id", `${item.id}`);
        card.setAttribute("product-title", `${item.title}`);
        card.setAttribute("product-img", `${item.images}`);
        card.setAttribute("product-price", `${item.price}`);
        card.setAttribute("product-quantity", "1");
            
        // Insert Product data into the card
        card.innerHTML = `
            <img src="${item.images}" class="card-img-top" alt="...">
            <div class="card-body">
                <h6>${item.title}</h6>
                <p>${item.sub_category}</p>
                <h6>Tk. ${item.price}</h6>
                <button onclick="addToCart(this)" class="btn btn-outline-dark"><span>Add to Cart</span> <i class="ri-shopping-bag-line"></i></button>
                <button onclick="openProduct('${item.id}')" class="btn btn-dark"><span>Order Now</span> <i class="ri-shopping-cart-2-line"></i></button>
            </div>`;
            
        // Insert card into the product container
        top_selling_products.appendChild(card);
        count_top++;
    }
})
var count_top = 0;
womens.map(item => {
    if (count_top < 6) {
        // Create the card element
        const card = document.createElement("div");
        card.className = "card";
        card.setAttribute("product-id", `${item.id}`);
        card.setAttribute("product-title", `${item.title}`);
        card.setAttribute("product-img", `${item.images}`);
        card.setAttribute("product-price", `${item.price}`);
        card.setAttribute("product-quantity", "1");
            
        // Insert Product data into the card
        card.innerHTML = `
            <img src="${item.images}" class="card-img-top" alt="...">
            <div class="card-body">
                <h6>${item.title}</h6>
                <p>${item.sub_category}</p>
                <h6>Tk. ${item.price}</h6>
                <button onclick="addToCart(this)" class="btn btn-outline-dark"><span>Add to Cart</span> <i class="ri-shopping-bag-line"></i></button>
                <button onclick="openProduct('${item.id}')" class="btn btn-dark"><span>Order Now</span> <i class="ri-shopping-cart-2-line"></i></button>
            </div>`;
            
        // Insert card into the product container
        top_selling_products.appendChild(card); 
        count_top++;
    }
})



/*********************************************/
/* Add Men's products dynamically Home Page */

// Select the card container
const mens_fashion_products = document.querySelector('.home-mens-fashion-products');

// Mapping Product Data
mens.map(item => {
    // Create the card element
    const card = document.createElement("div");
    card.className = "card";
    card.setAttribute("product-id", `${item.id}`);
    card.setAttribute("product-title", `${item.title}`);
    card.setAttribute("product-img", `${item.images}`);
    card.setAttribute("product-price", `${item.price}`);
    card.setAttribute("product-quantity", "1");
        
    // Insert Product data into the card
    card.innerHTML = `
        <img src="${item.images}" class="card-img-top" alt="...">
        <div class="card-body">
            <h6>${item.title}</h6>
            <p>${item.sub_category}</p>
            <h6>Tk. ${item.price}</h6>
            <button onclick="addToCart(this)" class="btn btn-outline-dark"><span>Add to Cart</span> <i class="ri-shopping-bag-line"></i></button>
            <button onclick="openProduct('${item.id}')" class="btn btn-dark"><span>Order Now</span> <i class="ri-shopping-cart-2-line"></i></button>
        </div>`;
        
    // Insert card into the product container
    mens_fashion_products.appendChild(card); 
})


/***********************************************/
/* Add women's products dynamically Home Page */

// Select the card container
const womens_fashion_products = document.querySelector('.home-womens-fashion-products');

// Mapping Product Data
womens.map(item => {
    // Create the card element
    const card = document.createElement("div");
    card.className = "card";
    card.setAttribute("product-id", `${item.id}`);
    card.setAttribute("product-title", `${item.title}`);
    card.setAttribute("product-img", `${item.images}`);
    card.setAttribute("product-price", `${item.price}`);
    card.setAttribute("product-quantity", "1");
        
    // Insert Product data into the card
    card.innerHTML = `
        <img src="${item.images}" class="card-img-top" alt="...">
        <div class="card-body">
            <h6>${item.title}</h6>
            <p>${item.sub_category}</p>
            <h6>Tk. ${item.price}</h6>
            <button onclick="addToCart(this)" class="btn btn-outline-dark"><span>Add to Cart</span> <i class="ri-shopping-bag-line"></i></button>
            <button onclick="openProduct('${item.id}')" class="btn btn-dark"><span>Order Now</span> <i class="ri-shopping-cart-2-line"></i></button>
        </div>`;
        
    // Insert card into the product container
    womens_fashion_products.appendChild(card); 
})

function openProduct(id) {
    localStorage.setItem('selectedProductId', id);
    window.location.href = 'product.php';
}


// Product Page
function changeImage(imageSrc) {
    document.getElementById('main-image').src = imageSrc;
}