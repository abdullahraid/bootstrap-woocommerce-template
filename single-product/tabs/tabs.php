<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>
 
	<div class="woocommerce-tabs">
        <ul class="nav nav-tabs" role="tablist" id="productTab">
			<?php
			reset($tabs);
			$firstWooTab = key($tabs);
			foreach ( $tabs as $key => $tab ) :
            ?>
				<li class="nav-item">
					<a class="nav-link <?php echo $key === $firstWooTab ? 'active' : ''; ?>" id="<?php echo esc_attr( $key ); ?>-tab" data-toggle="tab" href="#<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
        <div class="tab-content pt-4 pb-4" id="productTabContent">
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<div class="tab-pane <?php echo $key === $firstWooTab ? 'active show' : ''; ?>" id="<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $key ); ?>-tab">
				<?php call_user_func( $tab['callback'], $key, $tab ); ?>
			</div>
		<?php endforeach; ?>
        </div>
	</div>

<?php endif; ?>
