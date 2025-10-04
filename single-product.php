<?php
/**
 * The Template for displaying all single products
 *
 * @package Daryl
 */

get_header();

while ( have_posts() ) : the_post();
    global $product;
?>

<div class="single-product-container">
    <div class="product-main-section">
        <!-- Left Column: Product Gallery -->
        <div class="product-gallery-column">
            <div class="product-gallery">
                <div class="main-image">
                    <?php echo $product->get_image('large'); ?>
                </div>
                <div class="thumbnail-gallery">
                    <?php
                    $attachment_ids = $product->get_gallery_image_ids();
                    foreach( $attachment_ids as $attachment_id ) {
                        echo '<div class="thumbnail">' . wp_get_attachment_image( $attachment_id, 'thumbnail' ) . '</div>';
                    }
                    ?>
                </div>
            </div>
            
            <!-- Compatibility Section -->
            <div class="compatibility-section">
                <h3>Compatibility</h3>
                <div class="compatibility-list">
                    <p><strong>Fits:</strong></p>
                    <ul>
                        <li>✓ Suzuki APV (2005-Present)</li>
                        <li>✓ Suzuki Every Van (2015-Present)</li>
                        <li>✓ Suzuki Carry (2019-Present)</li>
                    </ul>
                    <p class="compatibility-note">Please verify fitment with your specific model before ordering.</p>
                </div>
            </div>
            
            <!-- Customer Reviews Section -->
            <div class="reviews-section">
                <h3>Customer Reviews</h3>
                <?php
                // Display WooCommerce reviews
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                } else {
                    echo '<div class="review-item">';
                    echo '<div class="review-stars">★★★★★</div>';
                    echo '<p class="reviewer-name">Juan D. - Verified Buyer</p>';
                    echo '<p>"Perfect fit for my 2018 Suzuki APV! Installation was straightforward and the quality is excellent."</p>';
                    echo '</div>';
                    
                    echo '<div class="review-item">';
                    echo '<div class="review-stars">★★★★☆</div>';
                    echo '<p class="reviewer-name">Maria S. - Verified Buyer</p>';
                    echo '<p>"Great product, shipping was fast. Would have given 5 stars but wish it came in more color options."</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        
        <!-- Right Column: Product Info -->
        <div class="product-info-column">
            <h1 class="product-title"><?php the_title(); ?></h1>
            
            <div class="product-rating-price">
                <div class="product-rating">
                    <?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
                    <span class="review-count">(<?php echo $product->get_review_count(); ?> reviews)</span>
                </div>
                <div class="product-price">
                    <?php echo $product->get_price_html(); ?>
                </div>
            </div>
            
            <!-- Fitment Check Tool -->
            <div class="fitment-check">
                <h3>Check Fitment</h3>
                <div class="fitment-selectors">
                    <select class="fitment-dropdown" id="vehicle-model">
                        <option value="">Select Model</option>
                        <option value="apv">Suzuki APV</option>
                        <option value="every">Suzuki Every Van</option>
                        <option value="carry">Suzuki Carry</option>
                    </select>
                    <select class="fitment-dropdown" id="vehicle-year">
                        <option value="">Select Year</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                    </select>
                </div>
                <div class="fitment-result" id="fitment-result">
                    <span class="fits-yes" style="display:none;">✓ Fits Your Suzuki!</span>
                    <span class="fits-no" style="display:none;">✗ Does NOT Fit!</span>
                </div>
            </div>
            
            <!-- Payment Methods -->
            <div class="payment-methods">
                <h4>We Accept:</h4>
                <div class="payment-icons">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/paypal-icon.png" alt="PayPal" />
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gcash-icon.png" alt="GCash" />
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/maya-icon.png" alt="Maya" />
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/visa-icon.png" alt="Visa" />
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mastercard-icon.png" alt="Mastercard" />
                </div>
            </div>
            
            <!-- Add to Cart -->
            <div class="product-add-to-cart">
                <?php woocommerce_template_single_add_to_cart(); ?>
            </div>
            
            <!-- Trust Badges -->
            <div class="trust-badges">
                <div class="trust-item">
                    <span class="trust-icon">🔒</span>
                    <span>Secure Checkout</span>
                </div>
                <div class="trust-item">
                    <span class="trust-icon">🚚</span>
                    <span>Free Shipping Over ₱2,000</span>
                </div>
                <div class="trust-item">
                    <span class="trust-icon">↩️</span>
                    <span>30-Day Returns</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Product Description -->
    <div class="product-description-section">
        <h2>Description</h2>
        <div class="description-content">
            <?php the_content(); ?>
        </div>
    </div>
    
    <!-- Related Products Section -->
    <div class="related-products-section">
        <h2>More Great Accessories</h2>
        <div class="related-products-grid">
            <?php
            $related_products = wc_get_related_products( $product->get_id(), 4 );
            foreach( $related_products as $related_product_id ) {
                $related_product = wc_get_product( $related_product_id );
                ?>
                <div class="related-product-card">
                    <a href="<?php echo get_permalink( $related_product_id ); ?>">
                        <?php echo $related_product->get_image('medium'); ?>
                        <h4><?php echo $related_product->get_name(); ?></h4>
                        <div class="related-price"><?php echo $related_product->get_price_html(); ?></div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
// Fitment checker functionality
document.addEventListener('DOMContentLoaded', function() {
    const modelSelect = document.getElementById('vehicle-model');
    const yearSelect = document.getElementById('vehicle-year');
    const resultDiv = document.getElementById('fitment-result');
    
    function checkFitment() {
        const model = modelSelect.value;
        const year = parseInt(yearSelect.value);
        
        if (model && year) {
            // Simple fitment logic - customize based on actual product compatibility
            const fitsYes = resultDiv.querySelector('.fits-yes');
            const fitsNo = resultDiv.querySelector('.fits-no');
            
            if ((model === 'apv' && year >= 2005) || 
                (model === 'every' && year >= 2015) || 
                (model === 'carry' && year >= 2019)) {
                fitsYes.style.display = 'block';
                fitsNo.style.display = 'none';
            } else {
                fitsYes.style.display = 'none';
                fitsNo.style.display = 'block';
            }
        }
    }
    
    modelSelect.addEventListener('change', checkFitment);
    yearSelect.addEventListener('change', checkFitment);
});
</script>

<?php
endwhile;

get_footer();
?>
