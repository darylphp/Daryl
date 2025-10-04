<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Hero Section -->
<section class="hero-section" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/hero-banner.png');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Enhance Your Suzuki Minivan Life</h1>
        <a href="#vehicle-selector" class="btn-primary btn-blue">FIND MY ACCESSORIES</a>
    </div>
</section>

<!-- Vehicle Selector Tool -->
<section id="vehicle-selector" class="vehicle-selector">
    <div class="selector-container">
        <select id="suzuki-model" name="suzuki-model">
            <option value="">Select Your Suzuki Model</option>
            <option value="apv">APV</option>
            <option value="every">Every</option>
            <option value="landy">Landy</option>
            <option value="carry">Carry</option>
            <option value="spacia">Spacia</option>
        </select>
        
        <select id="model-year" name="model-year">
            <option value="">Select Year</option>
            <?php for($year = 2025; $year >= 2000; $year--): ?>
                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
            <?php endfor; ?>
        </select>
        
        <button class="btn-primary btn-orange" onclick="showCompatibleAccessories()">SHOW COMPATIBLE ACCESSORIES</button>
    </div>
</section>

<!-- Featured Categories -->
<section class="featured-categories">
    <h2 class="section-title">Browse by Category</h2>
    <div class="categories-grid">
        <div class="category-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category-cargo.png" alt="Cargo & Storage" class="category-icon">
            <h3>Cargo & Storage</h3>
            <p>Maximize your van's storage space</p>
        </div>
        
        <div class="category-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category-interior.png" alt="Interior Comfort" class="category-icon">
            <h3>Interior Comfort</h3>
            <p>Upgrade your driving experience</p>
        </div>
        
        <div class="category-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category-exterior.png" alt="Exterior Styling" class="category-icon">
            <h3>Exterior Styling</h3>
            <p>Stand out on the road</p>
        </div>
        
        <div class="category-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category-performance.png" alt="Performance Upgrades" class="category-icon">
            <h3>Performance Upgrades</h3>
            <p>Boost power and efficiency</p>
        </div>
    </div>
</section>

<!-- Trust Builders -->
<section class="trust-builders">
    <h2 class="section-title">Why Shop With Us?</h2>
    <div class="trust-grid">
        <div class="trust-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-guarantee.png" alt="Guaranteed Fit" class="trust-icon">
            <h4>Guaranteed Fit</h4>
            <p>All accessories are guaranteed to fit your Suzuki model</p>
        </div>
        
        <div class="trust-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-shipping.png" alt="Free Shipping" class="trust-icon">
            <h4>Free Shipping</h4>
            <p>Enjoy free shipping on orders over $100</p>
        </div>
        
        <div class="trust-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-support.png" alt="Expert Support" class="trust-icon">
            <h4>Expert Support</h4>
            <p>Our team is here to help with any questions</p>
        </div>
        
        <div class="trust-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-secure.png" alt="Secure Payments" class="trust-icon">
            <h4>Secure Payments</h4>
            <p>Your payment information is always protected</p>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="featured-products">
    <h2 class="section-title">Featured Accessories</h2>
    <div class="products-grid">
        <div class="product-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product-1.png" alt="Roof Rack System" class="product-image">
            <div class="product-info">
                <h3 class="product-name">Premium Roof Rack System</h3>
                <p class="product-price">$299.99</p>
                <button class="btn-add-cart">Add to Cart</button>
            </div>
        </div>
        
        <div class="product-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product-2.png" alt="Seat Covers" class="product-image">
            <div class="product-info">
                <h3 class="product-name">Custom Fit Seat Covers</h3>
                <p class="product-price">$149.99</p>
                <button class="btn-add-cart">Add to Cart</button>
            </div>
        </div>
        
        <div class="product-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product-3.png" alt="Floor Mats" class="product-image">
            <div class="product-info">
                <h3 class="product-name">All-Weather Floor Mats</h3>
                <p class="product-price">$89.99</p>
                <button class="btn-add-cart">Add to Cart</button>
            </div>
        </div>
        
        <div class="product-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product-4.png" alt="LED Lights" class="product-image">
            <div class="product-info">
                <h3 class="product-name">LED Lighting Kit</h3>
                <p class="product-price">$199.99</p>
                <button class="btn-add-cart">Add to Cart</button>
            </div>
        </div>
    </div>
</section>

<!-- Blog Snippets -->
<section class="blog-snippets">
    <h2 class="section-title">Latest Guides & Articles</h2>
    <div class="blog-grid">
        <article class="blog-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-1.png" alt="Blog Post" class="blog-image">
            <div class="blog-content">
                <h3 class="blog-title">Top 5 Must-Have Suzuki APV Upgrades</h3>
                <p class="blog-excerpt">Discover the essential accessories that will transform your Suzuki APV into the ultimate utility vehicle.</p>
                <a href="#" class="read-more">Read More →</a>
            </div>
        </article>
        
        <article class="blog-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-2.png" alt="Blog Post" class="blog-image">
            <div class="blog-content">
                <h3 class="blog-title">Maximizing Your Every Van's Cargo Space</h3>
                <p class="blog-excerpt">Learn expert tips and tricks for organizing and maximizing the cargo capacity of your Suzuki Every.</p>
                <a href="#" class="read-more">Read More →</a>
            </div>
        </article>
        
        <article class="blog-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-3.png" alt="Blog Post" class="blog-image">
            <div class="blog-content">
                <h3 class="blog-title">Winter-Ready: Preparing Your Suzuki Minivan</h3>
                <p class="blog-excerpt">Essential accessories and maintenance tips to keep your Suzuki minivan running smoothly in cold weather.</p>
                <a href="#" class="read-more">Read More →</a>
            </div>
        </article>
    </div>
</section>

<script>
function showCompatibleAccessories() {
    const model = document.getElementById('suzuki-model').value;
    const year = document.getElementById('model-year').value;
    
    if(!model || !year) {
        alert('Please select both model and year');
        return;
    }
    
    // Redirect to shop page with filters
    window.location.href = '/shop?model=' + model + '&year=' + year;
}
</script>

<?php wp_footer(); ?>
</body>
</html>
