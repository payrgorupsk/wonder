@extends('layouts.app')
@section('main')
<div class="col-md-7" >
    <div class="header-col header-col-center col-12 d-flex d-lg-none d-xl-none">


        <div class="kapee-ajax-search ajax-search-style-3 ajax-search-radius">
            <form method="get" class="searchform" action="https://kapee.presslayouts.com/">
                <input type="search" class="search-field" name="s" value="" placeholder="Search for products, categories, brands, sku..." autocomplete="off">
                <div class="search-categories">
                <select name="product_cat" id="product-cat-32078" class="categories-filter product_cat">
            <option value="">All Categories</option>
            <option class="level-0" value="accessories">Accessories</option>
            <option class="level-0" value="analog">Analog</option>
            <option class="level-0" value="anklets">Anklets</option>
            <option class="level-0" value="beauty-accessory">Beauty Accessory</option>
            <option class="level-0" value="belts">Belts</option>
            <option class="level-0" value="bracelets">Bracelets</option>
            <option class="level-0" value="casual-shoes">Casual Shoes</option>
            <option class="level-0" value="digital">Digital</option>
            <option class="level-0" value="dresses">Dresses</option>
            <option class="level-0" value="earrings">Earrings</option>
            <option class="level-0" value="electronics">Electronics</option>
            <option class="level-0" value="formal-shoes">Formal Shoes</option>
            <option class="level-0" value="handbags">Handbags</option>
            <option class="level-0" value="hats-caps">Hats &amp; Caps</option>
            <option class="level-0" value="jackets-coats">Jackets &amp; Coats</option>
            <option class="level-0" value="jeans">Jeans</option>
            <option class="level-0" value="women-jeans">Jeans</option>
            <option class="level-0" value="laptop-bag">Laptop Bag</option>
            <option class="level-0" value="leather">Leather</option>
            <option class="level-0" value="lingerie-nightwear">Lingerie &amp; Nightwear</option>
            <option class="level-0" value="luggage-travel">Luggage &amp; Travel</option>
            <option class="level-0" value="makeup-kit">Makeup Kit</option>
            <option class="level-0" value="necklaces">Necklaces</option>
            <option class="level-0" value="pearl-jewelry">Pearl Jewelry</option>
            <option class="level-0" value="sandals-floaters">Sandals &amp; Floaters</option>
            <option class="level-0" value="shirts">Shirts</option>
            <option class="level-0" value="shorts-skirts">Shorts &amp; Skirts</option>
            <option class="level-0" value="smart-analog">Smart Analog</option>
            <option class="level-0" value="smart-watches">Smart Watches</option>
            <option class="level-0" value="sneakers">Sneakers</option>
            <option class="level-0" value="socks">Socks</option>
            <option class="level-0" value="sunglasses">Sunglasses</option>
            <option class="level-0" value="t-shirts">T-Shirts</option>
            <option class="level-0" value="tops">Tops</option>
            <option class="level-0" value="trolley-bag">Trolley Bag</option>
            <option class="level-0" value="trousers-capris">Trousers &amp; Capris</option>
            <option class="level-0" value="men-wallet">Wallets</option>
            <option class="level-0" value="wallets">Wallets</option>
            <option class="level-0" value="watches">Watches</option>
        </select>
                </div>
                <button type="submit" class="search-submit">Search</button>
                <input type="hidden" name="post_type" value="product">
            </form>
            <div class="search-results-wrapper woocommerce"><div class="autocomplete-suggestions" style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div></div>

                    <div class="trending-search-results" style="display: none;">
                                        <div class="trending-search">
                                <ul>
                                    <li class="trending-title">Trending Search </li>
                                                                    <li class="item">
                                            <a href="https://kapee.presslayouts.com/product-category/accessories/"><span class="keyword">Accessories</span></a>
                                        </li>
                                                                    <li class="item">
                                            <a href="https://kapee.presslayouts.com/product-category/bags-backpacks/"><span class="keyword">Bags &amp; Backpacks</span></a>
                                        </li>
                                                                    <li class="item">
                                            <a href="https://kapee.presslayouts.com/product-category/men/"><span class="keyword">Men</span></a>
                                        </li>
                                                                    <li class="item">
                                            <a href="https://kapee.presslayouts.com/product-category/shoes/"><span class="keyword">Shoes</span></a>
                                        </li>
                                                                    <li class="item">
                                            <a href="https://kapee.presslayouts.com/product-category/women/"><span class="keyword">Women</span></a>
                                        </li>
                                                            </ul>
                            </div>
                                </div>
            </div>
                    </div>
</div>
@endsection
