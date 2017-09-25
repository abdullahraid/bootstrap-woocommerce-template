<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.1.0
 */

if ( ! defined('ABSPATH')) {
	exit;
}

global $post, $product;

$attachment_ids = $product->get_gallery_image_ids();

if ($attachment_ids && has_post_thumbnail()) : ?>
    <div class="row mt-4 mb-4">
		<?php
		foreach ($attachment_ids as $attachment_id) :
			$full_size_image = wp_get_attachment_image_src($attachment_id, 'full');
			$thumbnail = wp_get_attachment_image_src($attachment_id, 'shop_thumbnail');
			$attributes = array (
				'title'                   => get_post_field('post_title', $attachment_id),
				'data-caption'            => get_post_field('post_excerpt', $attachment_id),
				'data-src'                => $full_size_image[0],
				'data-large_image'        => $full_size_image[0],
				'data-large_image_width'  => $full_size_image[1],
				'data-large_image_height' => $full_size_image[2],
				'class'                   => 'img-thumbnail'
			);
			?>
            <div data-thumb="<?php echo esc_url($thumbnail[0]); ?>"
                 class="col-4">
                <a href="<?php echo esc_url($full_size_image[0]); ?>">
					<?php echo wp_get_attachment_image($attachment_id, 'shop_single', false, $attributes); ?>
                </a>
            </div>
		<?php endforeach; ?>
    </div>
	<?php
endif;


