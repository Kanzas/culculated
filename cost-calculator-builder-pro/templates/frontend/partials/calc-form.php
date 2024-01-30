<?php $general_settings = get_option( 'ccb_general_settings' ); ?>
<div class="calc-form-wrapper <?php echo esc_attr( apply_filters( 'ccb_contact_form_style_class', '', $settings ) ); ?>">
	<div v-show="!open && formData.accessEmail && !close" class="calc-buttons <?php echo $general_settings['invoice']['emailButton'] && ! $general_settings['invoice']['showAfterPayment'] && $general_settings['invoice']['use_in_all'] ? esc_attr( 'pdf-enable' ) : ''; ?>">
		<button @click.prevent="toggleOpen" class="calc-btn-action ispro-wrapper success">
			<span v-if="formData.openModalBtnText">{{ formData.openModalBtnText | to-short }}</span>
			<span v-else="formData.openModalBtnText"><?php esc_html_e( 'Make order', 'cost-calculator-builder-pro' ); ?></span>
			<span class="is-pro">
				<span class="pro-tooltip">
					pro
					<span style="visibility: hidden;" class="pro-tooltiptext">Feature Available <br> in Pro Version</span>
				</span>
			</span>
		</button>
		<?php if ( isset( $general_settings['invoice']['showAfterPayment'] ) && ! $general_settings['invoice']['showAfterPayment'] && $general_settings['invoice']['use_in_all'] ) : ?>
			<button class="calc-btn-action" @click="getInvoice">
				<span><?php echo isset( $general_settings['invoice']['buttonText'] ) && ! empty( $general_settings['invoice']['buttonText'] ) ? esc_html( $general_settings['invoice']['buttonText'] ) : esc_html__( 'PDF Download', 'cost-calculator-builder-pro' ); ?></span>
				<div class="invoice-btn-loader"></div>
				<span class="is-pro">
					<span class="pro-tooltip">
						pro
						<span style="visibility: hidden;" class="pro-tooltiptext">Feature Available <br> in Pro Version</span>
					</span>
				</span>
			</button>
			<?php if ( isset( $general_settings['invoice']['emailButton'] ) && $general_settings['invoice']['emailButton'] ) : ?>
				<button class="calc-btn-action" @click="showSendPdf">
					<span><?php echo isset( $general_settings['invoice']['btnText'] ) && ! empty( $general_settings['invoice']['btnText'] ) ? esc_html( $general_settings['invoice']['btnText'] ) : esc_html__( 'Send Quote', 'cost-calculator-builder-pro' ); ?></span>
					<span class="is-pro">
						<span class="pro-tooltip">
								pro
							<span style="visibility: hidden;" class="pro-tooltiptext">Feature Available <br> in Pro Version</span>
						</span>
					</span>
				</button>
			<?php endif; ?>

		<?php endif; ?>
	</div>

	<div :class="['ccb-cf-wrap', {'disabled': loader}]" v-show="open && formData.accessEmail" style="position: relative">
		<div class="pro-border"></div>
		<span class="is-pro">
			<span class="pro-tooltip">
				pro
				<span style="visibility: hidden;" class="pro-tooltiptext">Feature Available <br> in Pro Version</span>
			</span>
		</span>

		<div class="ccb-contact-form7" v-if="formData.contactFormId && !getHideCalc">
			<?php
			echo do_shortcode( '[contact-form-7 id="' . $settings['formFields']['contactFormId'] . '"]' );
			?>
		</div>

		<div class="calc-form-wrapper" v-else-if="!showPayments">
			<div class="calc-default-form">
				<template v-if="!getHideCalc">
					<div class="calc-item ccb-field ccb-field-quantity" :class="{required: getRequiredMessage('name_field')}">
						<span :class="{active: getRequiredMessage('name_field')}" class="ccb-error-tip front default" v-text="getRequiredMessage('name_field')"></span>
						<div class="calc-item__title">
							<span><?php esc_html_e( 'Name', 'cost-calculator-builder-pro' ); ?></span>
							<span class="ccb-required-mark">*</span>
						</div>
						<div class="calc-input-wrapper ccb-field">
							<input type="text" v-model="sendFields[0].value" @input="clearRequired('name_field')" :disabled="loader" class="calc-input ccb-field ccb-appearance-field">
						</div>
					</div>

					<div class="calc-item ccb-field ccb-field-quantity" :class="{required: getRequiredMessage('email_field')}">
						<span :class="{active: getRequiredMessage('email_field')}" class="ccb-error-tip front default" v-text="getRequiredMessage('email_field')"></span>
						<div class="calc-item__title">
							<span><?php esc_html_e( 'Email', 'cost-calculator-builder-pro' ); ?></span>
							<span class="ccb-required-mark">*</span>
						</div>
						<div class="calc-input-wrapper ccb-field">
							<input type="email" v-model="sendFields[1].value" @input="clearRequired('email_field')" :disabled="loader" class="calc-input ccb-field ccb-appearance-field">
						</div>
					</div>

					<div class="calc-item ccb-field ccb-field-quantity" :class="{required: getRequiredMessage('phone_field')}">
						<span :class="{active: getRequiredMessage('phone_field')}" class="ccb-error-tip front default" v-text="getRequiredMessage('phone_field')"></span>
						<div class="calc-item__title">
							<span><?php esc_html_e( 'Phone', 'cost-calculator-builder-pro' ); ?></span>
							<span class="ccb-required-mark">*</span>
						</div>
						<div class="calc-input-wrapper ccb-field">
							<input type="number" :disabled="loader" v-model="sendFields[2].value" @input="clearRequired('phone_field')" class="calc-input ccb-field ccb-appearance-field">
						</div>
					</div>

					<div class="calc-item ccb-field ccb-field-quantity">
						<div class="calc-item__title">
							<span :class="{'require-fields': requires[3].required}"><?php esc_html_e( 'Message', 'cost-calculator-builder-pro' ); ?></span>
						</div>
						<div class="calc-input-wrapper ccb-field">
							<textarea v-model="sendFields[3].value" :disabled="loader" class="calc-input ccb-field ccb-appearance-field"></textarea>
						</div>
					</div>
					<?php do_action( 'ccb_contact_form_add_fields', $settings ); ?>
				</template>

				<div :id="getSettings.calc_id" class="g-rec" v-if="getSettings.recaptcha.enable"></div>

				<div v-if="loader" style="position: relative; min-height: 50px">
					<loader-wrapper :form="true" :idx="getPreloaderIdx" width="60px" height="60px" scale="0.8" :front="true"></loader-wrapper>
				</div>
				<div class="calc-buttons" v-else-if="!stripe && !loader">
					<?php do_action( 'ccb_contact_form_submit_action', $settings ); ?>
					<button class="calc-btn-action ispro-wrapper success <?php echo esc_attr( apply_filters( 'ccb_contact_form_submit_class', '', $settings ) ); ?>" :disabled="loader" @click.prevent="sendData">
						<span v-if="formData.submitBtnText">{{ formData.submitBtnText | to-short }}</span>
						<span v-else><?php esc_html_e( 'Submit order', 'cost-calculator-builder-pro' ); ?></span>
						<span class="is-pro">
							<span class="pro-tooltip">
								pro
								<span style="visibility: hidden;" class="pro-tooltiptext">Feature Available <br> in Pro Version</span>
							</span>
						</span>
					</button>
				</div>
			</div>
		</div>

		<form-payments v-if="showPayments" inline-template >
			<?php
			echo \cBuilder\Classes\CCBProTemplate::load( 'frontend/partials/calc-form-payments' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</form-payments>
	</div>
</div>
