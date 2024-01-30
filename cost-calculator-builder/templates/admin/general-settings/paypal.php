<div class="ccb-tab-container">
	<?php if ( ! defined( 'CCB_PRO' ) ) : ?>
		<settings-pro-banner
			title="<?php esc_html_e( 'PayPal', 'cost-calculator-builder' ); ?>"
			subtitle="<?php esc_html_e( 'Available in PRO version', 'cost-calculator-builder' ); ?>"
			text="<?php esc_html_e( 'Get payments with PayPal integration in Cost Calculator Pro.', 'cost-calculator-builder' ); ?>"
			link="https://stylemixthemes.com/cost-calculator-plugin/pricing/?utm_source=calcwpadmin&utm_medium=freetoprobutton&utm_campaign=global_settings_paypal"
			img="<?php echo esc_attr( CALC_URL . '/frontend/dist/img/pro-features/payment.webp' ); ?>"
			img-height="369px"
		/>
	<?php else : ?>
		<?php do_action( 'render-general-paypal' ); //phpcs:ignore ?>
	<?php endif; ?>
</div>
