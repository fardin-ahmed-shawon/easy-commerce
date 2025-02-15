const products = [
    // Shirt
    {
        "id": "s1",
        "title": "Casual Cotton Shirt",
        "description": "A comfortable and stylish cotton shirt perfect for everyday wear.",
        "price": 1650,
        "main_category": "Men",
        "sub_category": "Shirt",
        "images": "img/products/mens/shirt/shirt1.jpg"
    },
    {
        "id": "s2",
        "title": "Striped Full Shirt",
        "description": "A stylish polo shirt with a striped design.",
        "price": 1470,
        "main_category": "Men",
        "sub_category": "Shirt",
        "images": "img/products/mens/shirt/shirt2.jpg"
    },    
    {
        "id": "s3",
        "title": "Athletic Fit Shirt",
        "description": "A sporty polo shirt designed for comfort and performance.",
        "price": 1399,
        "main_category": "Men",
        "sub_category": "Shirt",
        "images": "img/products/mens/shirt/shirt3.jpg"
    },
    // Pant
    {
        "id": "p1",
        "title": "Classic Chinos Pant",
        "description": "Comfortable and stylish chinos for everyday wear.",
        "price": 1999,
        "main_category": "Men",
        "sub_category": "Pant",
        "images": "img/products/mens/pant/pant1.jpg"
    },
    {
        "id": "p2",
        "title": "Denim Jeans Pant",
        "description": "Durable and fashionable jeans with a perfect fit.",
        "price": 2150,
        "main_category": "Men",
        "sub_category": "Pant",
        "images": "img/products/mens/pant/pant2.jpg"
    },
    {
        "id": "p3",
        "title": "Slim Fit Trousers Pant",
        "description": "A stylish and comfortable option for work and casual outings.",
        "price": 1750,
        "main_category": "Men",
        "sub_category": "Pant",
        "images": "img/products/mens/pant/pant3.jpg"
    },
    // Polo Shirt
    {
        "id": "ps1",
        "title": "Classic Polo Shirt",
        "description": "A timeless polo shirt made from breathable fabric.",
        "price": 2499,
        "main_category": "Men",
        "sub_category": "Poloshirt",
        "images": "img/products/mens/poloshirt/poloshirt1.jpg"
    },
    {
        "id": "ps2",
        "title": "Striped Polo Shirt",
        "description": "A stylish polo shirt with a striped design.",
        "price": 2750,
        "main_category": "Men",
        "sub_category": "Poloshirt",
        "images": "img/products/mens/poloshirt/poloshirt2.jpg"
    },
    {
        "id": "ps3",
        "title": "Athletic Fit Polo Shirt",
        "description": "A sporty polo shirt designed for comfort and performance.",
        "price": 1599,
        "main_category": "Men",
        "sub_category": "Poloshirt",
        "images": "img/products/mens/poloshirt/poloshirt3.jpg"
    },
    // Sweat Shirt
    {
        "id": "ss1",
        "title": "Classic Fit Sweat Shirt",
        "description": "A sporty sweat shirt designed for comfort and performance.",
        "price": 1250,
        "main_category": "Men",
        "sub_category": "Sweatshirt",
        "images": "img/products/mens/sweatshirt/sweat1.jpg"
    },
    {
        "id": "ss2",
        "title": "Striped Fit Sweat Shirt",
        "description": "A sporty sweat shirt designed for comfort and performance.",
        "price": 1370,
        "main_category": "Men",
        "sub_category": "Sweatshirt",
        "images": "img/products/mens/sweatshirt/sweat2.jpg"
    },
    {
        "id": "ss3",
        "title": "Athletic Fit Sweat Shirt",
        "description": "A sporty sweat shirt designed for comfort and performance.",
        "price": 1960,
        "main_category": "Men",
        "sub_category": "Sweatshirt",
        "images": "img/products/mens/sweatshirt/sweat3.jpg" 
    },
    // Hoodie
    {
        "id": "h1",
        "title": "Classic Fit Hoodie",
        "description": "A sporty hoodie designed for comfort and performance.",
        "price": 1199,
        "main_category": "Men",
        "sub_category": "Hoodie",
        "images": "img/products/mens/hoodie/hoody1.jpg" 
    },
    {
        "id": "h2",
        "title": "Striped Fit Hoodie",
        "description": "A sporty hoodie designed for comfort and performance.",
        "price": 1760,
        "main_category": "Men",
        "sub_category": "Hoodie",
        "images": "img/products/mens/hoodie/hoody2.jpg" 
    },
    {
        "id": "h3",
        "title": "Athletic Fit Hoodie",
        "description": "A sporty hoodie designed for comfort and performance.",
        "price": 1920,
        "main_category": "Men",
        "sub_category": "Hoodie",
        "images": "img/products/mens/hoodie/hoody3.jpg" 
    },
    // Jacket
    {
        "id": "j1",
        "title": "Classic Fit Jacket",
        "description": "A sporty jacket designed for comfort and performance.",
        "price": 3100,
        "main_category": "Men",
        "sub_category": "Jacket",
        "images": "img/products/mens/jacket/jacket1.jpg" 
    },
    {
        "id": "j2",
        "title": "Striped Fit Jacket",
        "description": "A sporty jacket designed for comfort and performance.",
        "price": 2560,
        "main_category": "Men",
        "sub_category": "Jacket",
        "images": "img/products/mens/jacket/jacket2.jpg" 
    },
    {
        "id": "j3",
        "title": "Athletic Fit Jacket",
        "description": "A sporty jacket designed for comfort and performance.",
        "price": 1265,
        "main_category": "Men",
        "sub_category": "Jacket",
        "images": "img/products/mens/jacket/jacket3.jpg" 
    },
    // Panjabi
    {
        "id": "pn1",
        "title": "Classic Fit Panjabi",
        "description": "A sporty panjabi designed for comfort and performance.",
        "price": 2999,
        "main_category": "Men",
        "sub_category": "Panjabi",
        "images": "img/products/mens/panjabi/panjabi1.jpg" 
    },
    {
        "id": "pn2",
        "title": "Striped Fit Panjabi",
        "description": "A sporty panjabi designed for comfort and performance.",
        "price": 1550,
        "main_category": "Men",
        "sub_category": "Panjabi",
        "images": "img/products/mens/panjabi/panjabi2.jpg" 
    },
    {
        "id": "pn3",
        "title": "Athletic Fit Panjabi",
        "description": "A sporty panjabi designed for comfort and performance.",
        "price": 2299,
        "main_category": "Men",
        "sub_category": "Panjabi",
        "images": "img/products/mens/panjabi/panjabi3.jpg" 
    },
    {
        "id": "tp1",
        "title": "Pastel Grace Embroidered Two Pcs",
        "description": "A comfortable and stylish tops.",
        "price": 1650,
        "main_category": "Women",
        "sub_category": "Tops",
        "images": "img/products/womens/tops/tops1.jpg"
    },
    {
        "id": "tp2",
        "title": "Navy Elegance Embroidered Two Pcs",
        "description": "A comfortable and stylish tops.",
        "price": 2790,
        "main_category": "Women",
        "sub_category": "Tops",
        "images": "img/products/womens/tops/tops2.jpg"
    },
    {
        "id": "tp3",
        "title": "Black Embroidered Two Pcs",
        "description": "A comfortable and stylish tops.",
        "price": 2250,
        "main_category": "Women",
        "sub_category": "Tops",
        "images": "img/products/womens/tops/tops3.jpg"
    },
    // Tops Long
    {
        "id": "tpl1",
        "title": "Printed Tops Long For Ladies",
        "description": "A comfortable and stylish tops long.",
        "price": 1650,
        "main_category": "Women",
        "sub_category": "Topslong",
        "images": "img/products/womens/topslong/topslong1.jpg"
    },
    {
        "id": "tpl2",
        "title": "Navy Elegance Tops Long For Ladies",
        "description": "A comfortable and stylish tops long.",
        "price": 2790,
        "main_category": "Women",
        "sub_category": "Topslong",
        "images": "img/products/womens/topslong/topslong2.jpg"
    },
    {
        "id": "tpl3",
        "title": "Black Embroidered Tops Long",
        "description": "A comfortable and stylish tops long.",
        "price": 2250,
        "main_category": "Women",
        "sub_category": "Topslong",
        "images": "img/products/womens/topslong/topslong3.jpg"
    },
    // Ladies Pant
    {
        "id": "lp1",
        "title": "Border Embroidered Ladies Pant",
        "description": "A comfortable and stylish ladies pant.",
        "price": 1399,
        "main_category": "Women",
        "sub_category": "Ladiespant",
        "images": "img/products/womens/ladiespant/ladiespant1.jpg"
    },
    {
        "id": "lp2",
        "title": "Printed Embodary Ladies Pant",
        "description": "A comfortable and stylish ladies pant.",
        "price": 2150,
        "main_category": "Women",
        "sub_category": "Ladiespant",
        "images": "img/products/womens/ladiespant/ladiespant2.jpg"
    },
    {
        "id": "lp3",
        "title": "Black Embroidered Printed Ladies Pant",
        "description": "A comfortable and stylish ladies pant.",
        "price": 1760,
        "main_category": "Women",
        "sub_category": "Ladiespant",
        "images": "img/products/womens/ladiespant/ladiespant3.jpg"
    }
]

// Generate keywords array from product titles
let keywords = products.map(product => product.title);

const resultBoxDesktop = document.querySelector(".search-suggestions");
const inputBoxDesktop = document.getElementById("input-box");

const resultBoxMobile = document.querySelector(".search-suggestions-mobile");
const inputBoxMobile = document.getElementById("input-box-mobile");

function handleSearch(inputBox, resultBox) {
    inputBox.onkeyup = function() {
        let result = [];
        let input = inputBox.value;
        if (input.length) {
            result = products.filter((product) => {
                return product.title.toLowerCase().includes(input.toLowerCase());
            });
        }
        display(result, resultBox);
    }
}

function display(result, resultBox) {
    if (result.length) {
        const content = result.map((item) => {
            return `
                <div>
                    <a class="dropdown-item" href="#" onclick="openProduct('${item.id}', '${item.title}')">
                        <img class="suggestion-left" src="${item.images}" alt="${item.title}" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                        <span class="suggestion-mid">${item.title}</span>
                        <span class="suggestion-right" style="float: right;">Tk. ${item.price}</span>
                    </a>
                </div>`;
        }).join('');
        resultBox.innerHTML = content;
        resultBox.style.display = 'block';
    } else {
        resultBox.innerHTML = '';
        resultBox.style.display = 'none';
    }
}

function openProduct(id, title) {
    // Store the product ID and title in localStorage or pass them as query parameters
    localStorage.setItem('selectedProductId', id);
    localStorage.setItem('selectedProductTitle', title);
    window.location.href = 'product.php';
}

// Initialize search handlers for both desktop and mobile
handleSearch(inputBoxDesktop, resultBoxDesktop);
handleSearch(inputBoxMobile, resultBoxMobile);