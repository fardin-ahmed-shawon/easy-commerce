<!--==================================-->
<!--========== START NAVBAR ==========-->
<!--==================================-->
<nav id="home">
    <div class="container">
        <!-- Middle -->
        <div class="inner">
            <!-- Mobile Menu Button -->
            <div class="mobile-menu" id="mobile-menu-btn">
                <a href="#" onclick="openMenuBtn()">
                    <i class="ri-menu-2-line"></i>
                </a>
            </div>

            <div class="logo">
            <a href="index.php"><span>Logo.</span></a>
            </div>

            <div class="search-area">
                <div class="search-row dropdown">
                    <i class="ri-search-line"></i>
                    <input id="input-box" type="text" autofocus required placeholder="Search Your Product Here" autocomplete="off">
                    <div class="search-suggestions">
                        <!-- Suggested Product List -->
                    </div>
                </div>
                <div class="mobile-search-area">
                    <i class="ri-search-line search-icon"></i>
                    <i class="ri-close-fill search-close-icon"></i>
                </div>
            </div>

            <div class="btn-area">

                <div class="call">
                    <i class="ri-phone-line"></i>
                    <div class="txt-area">
                        <p class="bold-title">Online Shopping</p>
                        <p class="gray-title">+8801944667441</p>
                    </div>
                </div>

                <div class="cart-btn">
                    
                    <div class="cart-container">
                        <div onclick="openCartBar()" class="cart-icon"><i class="ri-shopping-cart-2-line"></i></div>
                        <div class="cart-counter top-cart-counter">0</div>
                    </div>
                    
                    <div class="txt-area">
                        <p class="bold-title">Cart</p>
                        <p class="gray-title"><span class="top-total-price">Tk 0.00</span></p>
                    </div>
                </div>

                <div class="login-btn" onclick="window.location.href='registration.php'">
                    <i class="ri-user-line"></i>
                    <div class="txt-area">
                        <p class="bold-title">Account</p>
                        <p class="gray-title">Login/Signup</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom -->
        <div class="pages" id="pages">
            <div>
                <div class="hide-menu" id="mobile-menu-btn">
                    <br>
                    <a href="#" onclick="closeMenuBtn()">
                        <i class="ri-menu-3-line"></i>
                    </a>
                    <!-- Logo -->
                    <div>
                        <a href="index.php"><span class="bold-title">LOGO</span></a>
                    </div>
                </div>
                <hr>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(1)" class="dropdown-btn">Men's Fashion<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content1">
                                <a href="#">T-Shirt</a>
                                <a href="#">Shirt</a>
                                <a href="#">Jacket</a>
                                <a href="#">Pant</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(2)" class="dropdown-btn">Women's Fashion<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content2">
                                <a href="#">Tops</a>
                                <a href="#">Selowar Kamij</a>
                                <a href="#">Geans</a>
                                <a href="#">Bags</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(3)" class="dropdown-btn">Kids<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content3">
                                <a href="#">Kids item 1</a>
                                <a href="#">Kids item 2</a>
                                <a href="#">Kids item 3</a>
                                <a href="#">Kids item 4</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(4)" class="dropdown-btn">Gadgets & Electronics<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content4">
                                <a href="#">Gadgets item 1</a>
                                <a href="#">Gadgets item 2</a>
                                <a href="#">Gadgetss item 3</a>
                                <a href="#">Gadgets item 4</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(5)" class="dropdown-btn">Cosmetics<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content5">
                                <a href="#">Cosmetics item 1</a>
                                <a href="#">Cosmetics item 2</a>
                                <a href="#">Cosmetics item 3</a>
                                <a href="#">Cosmetics item 4</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(6)" class="dropdown-btn">Health & Beauty<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content6">
                                <a href="#">Beauty item 1</a>
                                <a href="#">Beauty item 2</a>
                                <a href="#">Beauty item 3</a>
                                <a href="#">Beauty item 4</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(7)" class="dropdown-btn">Home & Living<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content7">
                                <a href="#">Home item 1</a>
                                <a href="#">Home item 2</a>
                                <a href="#">Home item 3</a>
                                <a href="#">Home item 4</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(8)" class="dropdown-btn">Kitchen<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content8">
                                <a href="#">Kitchen item 1</a>
                                <a href="#">Kitchen item 2</a>
                                <a href="#">Kitchen item 3</a>
                                <a href="#">Kitchen item 4</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Search Bar For Mobile -->
        <div class="mobile-search-box">
            <input id="input-box-mobile" type="text" autofocus required placeholder="Search Your Product Here" autocomplete="off">
            <div class="search-suggestions-mobile">
                <!-- Suggested Product List -->
            </div>
        </div>
    </div>
</nav>
<!--==================================-->
<!--============ END NAVBAR ==========-->
<!--==================================-->