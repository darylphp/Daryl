<?php
/**
 * The Template for displaying product archives, including the main shop page
 *
 * @package Daryl
 */

get_header(); ?>

<div class="shop-container">
    <!-- Left Sidebar - Category Filters -->
    <aside class="shop-sidebar">
        <div class="sidebar-section">
            <h3>Category</h3>
            <ul class="category-list">
                <li><a href="<?php echo get_term_link('exterior-car-accessories', 'product_cat'); ?>" class="category-item active">Exterior Car Accessories</a></li>
                <li><a href="<?php echo get_term_link('automotive-parts', 'product_cat'); ?>" class="category-item">Automotive Parts</a></li>
                <li><a href="<?php echo get_term_link('interior-car-accessories', 'product_cat'); ?>" class="category-item">Interior Car Accessories</a></li>
                <li><a href="<?php echo get_term_link('home-improvement', 'product_cat'); ?>" class="category-item">Home Improvement</a></li>
                <li><a href="<?php echo get_term_link('bath-body', 'product_cat'); ?>" class="category-item">Bath & Body</a></li>
            </ul>
        </div>
        
        <!-- Additional Filters -->
        <div class="sidebar-section">
            <h3>Price Range</h3>
            <div class="price-filter">
                <input type="number" placeholder="Min" class="price-input" />
                <span>-</span>
                <input type="number" placeholder="Max" class="price-input" />
                <button class="filter-btn">Apply</button>
            </div>
        </div>
        
        <div class="sidebar-section">
            <h3>Vehicle Model</h3>
            <ul class="filter-list">
                <li><label><input type="checkbox" /> Suzuki APV</label></li>
                <li><label><input type="checkbox" /> Suzuki Every</label></li>
                <li><label><input type="checkbox" /> Suzuki Carry</label></li>
                <li><label><input type="checkbox" /> Universal Fit</label></li>
            </ul>
        </div>
        
        <div class="sidebar-section">
            <h3>Availability</h3>
            <ul class="filter-list">
                <li><label><input type="checkbox" /> In Stock</label></li>
                <li><label><input type="checkbox" /> Pre-Order</label></li>
            </ul>
        </div>
    </aside>
    
    <!-- Main Product Grid -->
    <div class="shop-main">
        <div class="shop-header">
            <h1><?php woocommerce_page_title(); ?></h1>
            <div class="shop-controls">
                <select class="sort-dropdown">
                    <option>Sort by: Featured</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Newest First</option>
                    <option>Best Selling</option>
                </select>
            </div>
        </div>
        
        <?php if ( woocommerce_product_loop() ) : ?>
            <div class="products-grid">
                <?php
                while ( have_posts() ) : the_post();
                    global $product;
                ?>
                    <div class="product-card">
                        <div class="product-image">
                            <?php echo $product->get_image('medium'); ?>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?php the_title(); ?></h3>
                            <div class="product-rating">
                                <?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
                            </div>
                            <div class="product-price">
                                <?php echo $product->get_price_html(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="product-cta">Click here</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            
            <?php woocommerce_pagination(); ?>
            
        <?php else : ?>
            <p class="no-products">No products found.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
