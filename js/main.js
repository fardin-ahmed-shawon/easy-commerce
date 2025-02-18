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

//-------------------------- Product Fetching Start From Here --------------------------------------

/***************************************************/
/* Add new arrival products dynamically home page */

// Fetch product data from the API
fetch('get_products.php')
    .then(response => response.json())
    .then(data => {
        const new_arrival_products = document.querySelector('.new-arrival-products');
        
        // Select Total Product
        // var count_new = 0;

        // Mapping Product Data
        const categories = [...new Set(data.map((item) => { return item }))];

        const displayItem = (items) => {
            new_arrival_products.innerHTML = items.map((item) => {
                return `
                    <div class="card" product-id="${item.id}" product-title="${item.title}" product-img="${item.image}" product-price="${item.price}" product-quantity="1">
                        <img src="${item.image}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6>${item.title}</h6>
                            <p>${item.sub_category}</p>
                            <h6>Tk. ${item.price}</h6>
                            <button onclick="addToCart(this)" class="btn btn-outline-dark"><span>Add to Cart</span> <i class="ri-shopping-bag-line"></i></button>
                            <button onclick="openProduct('${item.id}')" class="btn btn-dark"><span>Order Now</span> <i class="ri-shopping-cart-2-line"></i></button>
                        </div>
                    </div>`;
            }).join('');
        };

        displayItem(categories);
    })
    .catch(error => console.error('Error fetching products:', error));


/**************************************************/
/* Add Top selling products dynamically home page*/

// Fetch product data from the API
fetch('get_products.php')
    .then(response => response.json())
    .then(data => {
        const top_selling_products = document.querySelector('.top-selling-products');

        // Select Total Product
        // var count_top = 0;

        // Mapping Product Data
        const categories = [...new Set(data.map((item) => { return item }))];

        const displayItem = (items) => {
            top_selling_products.innerHTML = items.map((item) => {
                return `
                    <div class="card" product-id="${item.id}" product-title="${item.title}" product-img="${item.image}" product-price="${item.price}" product-quantity="1">
                        <img src="${item.image}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6>${item.title}</h6>
                            <p>${item.sub_category}</p>
                            <h6>Tk. ${item.price}</h6>
                            <button onclick="addToCart(this)" class="btn btn-outline-dark"><span>Add to Cart</span> <i class="ri-shopping-bag-line"></i></button>
                            <button onclick="openProduct('${item.id}')" class="btn btn-dark"><span>Order Now</span> <i class="ri-shopping-cart-2-line"></i></button>
                        </div>
                    </div>`;
            }).join('');
        };

        displayItem(categories);
    })
    .catch(error => console.error('Error fetching products:', error));


/*********************************************/
/* Add Men's products dynamically Home Page */

// Fetch product data from the API
fetch('get_products.php')
    .then(response => response.json())
    .then(data => {
        const mens_fashion_products = document.querySelector('.home-mens-fashion-products');

        // Mapping Product Data
        const categories = [...new Set(data.map((item) => { return item }))];

        const displayItem = (items) => {
            mens_fashion_products.innerHTML = items.map((item) => {
                return `
                    <div class="card" product-id="${item.id}" product-title="${item.title}" product-img="${item.image}" product-price="${item.price}" product-quantity="1">
                        <img src="${item.image}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6>${item.title}</h6>
                            <p>${item.sub_category}</p>
                            <h6>Tk. ${item.price}</h6>
                            <button onclick="addToCart(this)" class="btn btn-outline-dark"><span>Add to Cart</span> <i class="ri-shopping-bag-line"></i></button>
                            <button onclick="openProduct('${item.id}')" class="btn btn-dark"><span>Order Now</span> <i class="ri-shopping-cart-2-line"></i></button>
                        </div>
                    </div>`;
            }).join('');
        };

        displayItem(categories);
    })
    .catch(error => console.error('Error fetching products:', error));



/***********************************************/
/* Add women's products dynamically Home Page */

// Fetch product data from the API
fetch('get_products.php')
    .then(response => response.json())
    .then(data => {
        const womens_fashion_products = document.querySelector('.home-womens-fashion-products');

        // Mapping Product Data
        const categories = [...new Set(data.map((item) => { return item }))];

        const displayItem = (items) => {
            womens_fashion_products.innerHTML = items.map((item) => {
                return `
                    <div class="card" product-id="${item.id}" product-title="${item.title}" product-img="${item.image}" product-price="${item.price}" product-quantity="1">
                        <img src="${item.image}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6>${item.title}</h6>
                            <p>${item.sub_category}</p>
                            <h6>Tk. ${item.price}</h6>
                            <button onclick="addToCart(this)" class="btn btn-outline-dark"><span>Add to Cart</span> <i class="ri-shopping-bag-line"></i></button>
                            <button onclick="openProduct('${item.id}')" class="btn btn-dark"><span>Order Now</span> <i class="ri-shopping-cart-2-line"></i></button>
                        </div>
                    </div>`;
            }).join('');
        };

        displayItem(categories);
    })
    .catch(error => console.error('Error fetching products:', error));



//-------------------------- Other Functions --------------------------------------
function openProduct(id) {
    localStorage.setItem('selectedProductId', id);
    window.location.href = 'product.php';
}

// Product Page
function changeImage(imageSrc) {
    document.getElementById('main-image').src = imageSrc;
}