<?php 
include 'header.php'; 
?>
<link rel="stylesheet" href="StyleSheet.css">

<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<!-- Image Slider on the home page -->

<section class="landing-slider">
    <div class="slider-wrapper">
        <div class="slider">
            <img id="slide-1" src="images/RAM_wood_background.jpg" alt="GPU Image">
            <img id="slide-2" src="images/Mobo_concrete_background.jpg" alt="Micro_Processor">
            <img id="slide-3" src=".images/Mouse_concrete_background.jpg" alt="PC">
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
            <p id="price-1">$99.99 CAD</p>
            <img src="images/AIO_concrete_background.jpg" alt="Product 1">
        </div>
        <div class="product">
            <h3>Product 2</h3>
            <p id="price-2">$129.99 CAD</p>
            <img src="images/RAM_white_background.jpg" alt="Product 2">
        </div>
        <div class="product">
            <h3>Product 3</h3>
            <p id="price-3">$149.99 CAD</p>
            <img src="images/Fans_concrete_background.jpg" alt="Product 3">
        </div>
    </div>
</section>
<section class="about-us">
    <div class="about-container">
        <h4>Some info about the company</h4>
        <p>Gizmo Galaxy is your one-stop shop for all things tech. We offer a wide range of products, from the latest gadgets to essential accessories. Our mission is to provide high-quality products at competitive prices, ensuring that you get the best value for your money.</p>
        <p>Background about us</p>
        <p>Gizmo Galaxy was founded in 2023 and this is so real by a group of tech enthusiasts who wanted to create a platform where customers could find the best deals on the latest technology. We are committed to providing excellent customer service and ensuring that our customers have a seamless shopping experience.</p>
        <p>Our team is dedicated to curating a selection of products that meet the highest standards of quality and performance. We work closely with our suppliers to ensure that we offer the latest and most innovative products on the market.</p>
    </div>
</section>

<div id="price-display"></div>
<script>
    const apiKey = 'f1bf8cbc09d740fb30ac1abf748724b9';
    const baseUrl = 'http://data.fixer.io/api/latest';

    async function fetchCurrencyRates() {
        try {
            const response = await fetch(`${baseUrl}?access_key=${apiKey}`);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const data = await response.json();
            if (data.success) {
                const rates = data.rates;
                const cadToUsd = rates.USD / rates.CAD;
                const cadToGbp = rates.GBP / rates.CAD;
                const cadToBtc = rates.BTC / rates.CAD;

                const prices = [
                    { id: 'price-1', cad: 99.99 },
                    { id: 'price-2', cad: 129.99 },
                    { id: 'price-3', cad: 149.99 }
                ];

                prices.forEach(price => {
                    const usd = (price.cad * cadToUsd).toFixed(2);
                    const gbp = (price.cad * cadToGbp).toFixed(2);
                    const btc = (price.cad * cadToBtc).toFixed(6);
                    document.getElementById(price.id).innerHTML = `
                        $${price.cad} CAD<br>
                        $${usd} USD<br>
                        £${gbp} GBP<br>
                        ₿${btc} BTC
                    `;
                });
            } else {
                console.error('Error fetching data:', data.error);
            }
        } catch (error) {
            console.error('Fetch error:', error);
        }
    }

    fetchCurrencyRates();
</script>

<?php include 'footer.php'; ?>

</body>
</html>