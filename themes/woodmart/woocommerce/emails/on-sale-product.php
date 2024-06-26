<?php
/**
 * Customer "back in stock" email
 *
 * @package XTS
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<p>
	<?php
	echo esc_html(
		sprintf(
			// translators: %s User login.
			__(
				'Hi, %s!',
				'woodmart'
			),
			$email->user->user_login
		)
	) . '\n';
	?>
</p>

<p>
	<?php esc_html_e( 'Products on your wishlist are on sale!', 'woodmart' ); ?>
</p>

<?php if ( $product_lists ) : ?>
	<?php $text_align = is_rtl() ? 'right' : 'left'; ?>

	<table class="td" cellspacing="0" cellpadding="6" style="width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; margin: 0 0 16px;" border="1">
		<thead>
		<tr>
			<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Products', 'woodmart' ); ?></th>
			<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"><?php esc_html_e( 'Price', 'woodmart' ); ?></th>
			<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;"></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ( $product_lists as $product ) : ?>
			<tr>
				<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?> vertical-align: middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; word-wrap:break-word;">
					<a href="<?php echo esc_url( $product->get_permalink() ); ?>" style="display: flex; align-items: center; border-bottom: none; text-decoration: none; flex-wrap: wrap;">
						<?php echo get_the_post_thumbnail( $product->get_id(), array( '70', '70' ), array( 'style' => 'margin-right: 15px; max-width:70px;' ) ); ?>
						<span>
							<?php echo esc_html( $product->get_title() ); ?>
						</span>
					</a>
				</td>
				<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;">
					<?php echo wp_kses( $product->get_price_html(), true ); ?>
				</td>
				<td class="td" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;">
					<?php $button_link = $product->is_type( 'simple' ) ? add_query_arg( 'add-to-cart', $product->get_id(), $product->get_permalink() ) : $product->get_permalink(); ?>
					<a style="display: inline-block; background-color: #ebe9eb; color: #515151; white-space: nowrap; padding: .618em 1em; border-radius: 3px; text-decoration: none;" href="<?php echo esc_url( $button_link ); ?>">
						<?php echo esc_html( $product->add_to_cart_text() ); ?>
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>

<p>
	<?php esc_html_e( 'We only have limited stock, so don\'t wait any longer, and take this chance to make it yours!', 'woodmart' ); ?>
</p>

<p>
	<small>
		<?php
		echo wp_kses(
			__( 'If you don\'t want to receive any further notification, please', 'woodmart' ) . ' <a href="' . woodmart_get_unsubscribe_link( $email->user->ID ) . '">' . __( 'unsubscribe', 'woodmart' ) . '</a>',
			true
		);
		?>
	</small>
</p>

<?php do_action( 'woocommerce_email_footer', $email ); ?>
