<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<?php 
	$mov_subheading = get_post_meta($post->ID, 'mov_subheading', 1);
	$mov_price = get_post_meta($post->ID, 'mov_price', 1);
	$thumbnail = get_the_post_thumbnail($post->ID, array(250,250));
?>

	<li class="post-<?php echo $post->ID;?> product type-product status-publish purchasable product-type-simple">
		<a href="<?php echo get_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
			<?php if ($thumbnail) :
				echo $thumbnail;
			else:  ?>
				<img src="<?php echo home_url();?>/wp-content/plugins/woocommerce/assets/images/placeholder.png" alt="Placeholder" width="250" class="woocommerce-placeholder wp-post-image" height="250">
			<?php endif; ?>
			

			<h2 class="woocommerce-loop-product__title"><?php echo get_the_title(); ?></h2>
			
			<?php if( $mov_price ) { ?>
				<span class="woocommerce-Price-amount amount">
					<span class="woocommerce-Price-currencySymbol"><?php echo get_woocommerce_currency_symbol(); ?></span>
					<?php echo $mov_price; ?>
				</span>
			<?php } ?>


		</a>
		
	</li>

