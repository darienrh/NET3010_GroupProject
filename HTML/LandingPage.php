<?php 
include 'header.php'; 
?>

    <!-- Image Slider on the home page -->

    <section class="landing-slider">
        <div class="slider-wrapper">
            <div class="slider">
                <img id="slide-1" src="images/RAM_wood_background.jpg" alt="GPU Image">
                <img id="slide-2" src="images/Mobo_concrete_background.jpg" alt="Micro_Processor">
                <img id="slide-3" src="images/Mouse_concrete_background.jpg" alt="PC">
            </div>
            <div class="slider-nav">
                <a href="#slide-1"></a>
                <a href="#slide-2"></a>
                <a href="#slide-3"></a>
            </div>
        </div>
    </section>
    <div class="hero">
        <div class="hero-content">
        <h1>Welcome to Gizmo Galaxy - The home of out of this world deals</h1>
        </div>
    </div>
    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-container">
            <div class="product">
                <h3>Product 1</h3>
                <p>$99.99</p>
                <img src="images/AIO_concrete_background.jpg" alt="Product 1">
            </div>
            <div class="product">
                <h3>Product 2</h3>
                <p>$129.99</p>
                <img src="images/RAM_white_background.jpg" alt="Product 2">
            </div>
            <div class="product">
                <h3>Product 3</h3>
                <p>$149.99</p>
                <img src="images/Fans_concrete_background.jpg" alt="Product 3">
            </div>
        </div>
    </section>
    <section class="about-us">
        <div class="about-container">
            <h4>Some info about the company</h4>
            <p>Background about us</p>
        </div>
    </section>
    
    <div id="price-display"></div>
    <script src="Java/api.js"></script>




    <?php include 'footer.php'; ?>

</body>
</html>