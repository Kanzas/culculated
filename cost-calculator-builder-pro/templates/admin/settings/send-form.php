<div class="ccb-grid-box" v-if="showContactForm">
	<div class="container">
		<div class="row ccb-p-t-15">
			<div class="col">
				<span class="ccb-tab-title"><?php esc_html_e( 'Order Form', 'cost-calculator-builder-pro' ); ?></span>
			</div>
		</div>
		<div class="row ccb-p-t-20 ccb-p-t-10">
			<div class="col">
				<div class="list-header">
					<div class="ccb-switch">
						<input type="checkbox" v-model="settingsField.formFields.accessEmail"/>
						<label></label>
					</div>
					<h6 class="ccb-heading-5"><?php esc_html_e( 'Enable Order Form', 'cost-calculator-builder-pro' ); ?></h6>
				</div>
			</div>
		</div>
		<div class="ccb-settings-property" v-if="settingsField.formFields.accessEmail">
			<div class="row ccb-p-t-15" v-if="extended">
				<div class="col-12">
					<div class="ccb-extended-general">
						<span class="ccb-heading-4 ccb-bold"><?php esc_html_e( 'Global settings applied', 'cost-calculator-builder-pro' ); ?></span>
						<span class="ccb-extended-general-description ccb-default-title ccb-light"><?php esc_html_e( 'If you want to set up a specific calculator, please go to Settings → Email and turn off the setting “Apply for all calculators”', 'cost-calculator-builder-pro' ); ?></span>
						<span class="ccb-extended-general-action">
							<a href="<?php echo esc_url( get_admin_url() . 'admin.php?page=cost_calculator_builder&tab=settings&option=email' ); ?>" class="ccb-button ccb-href success"><?php esc_html_e( 'Go to Settings', 'cost-calculator-builder-pro' ); ?></a>
						</span>
					</div>
				</div>
			</div>
			<div class="row ccb-p-t-20">
				<div class="col col-4">
					<div class="ccb-select-box">
						<span class="ccb-select-label"><?php esc_html_e( 'Select Form', 'cost-calculator-builder-pro' ); ?></span>
						<div class="ccb-select-wrapper">
							<i class="ccb-icon-Path-3485 ccb-select-arrow"></i>
							<select class="ccb-select" v-model="settingsField.formFields.contactFormId">
								<option value="" selected><?php esc_html_e( 'Default', 'cost-calculator-builder-pro' ); ?></option>
								<option v-for="(value, index) in $store.getters.getForms" :key="index" :value="value['id']">{{ value['title'] }}</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col col-4" v-if="settingsField.formFields.contactFormId" :class="{disabled: generalSettings.form_fields.use_in_all}">
					<div class="ccb-input-wrapper">
						<span class="ccb-input-label"><?php esc_html_e( 'Open Form Button Text', 'cost-calculator-builder-pro' ); ?></span>
						<input type="text" v-model="settingsField.formFields.openModalBtnText" placeholder="<?php esc_attr_e( 'Enter button text', 'cost-calculator-builder-pro' ); ?>">
					</div>
				</div>
				<template v-else>
					<div class="col-4" :class="{disabled: extended}">
						<div class="ccb-input-wrapper">
							<span class="ccb-input-label"><?php esc_html_e( 'Order Notification Email', 'cost-calculator-builder-pro' ); ?></span>
							<input type="email" v-model="settingsField.formFields.adminEmailAddress" placeholder="<?php esc_attr_e( 'Enter your email', 'cost-calculator-builder-pro' ); ?>">
						</div>
					</div>
					<?php do_action( 'ccb_contact_form_settings_add_email_fields' ); ?>	
					<div class="col-4" :class="{disabled: extended}">
						<div class="ccb-input-wrapper">
							<span class="ccb-input-label"><?php esc_html_e( 'Subject', 'cost-calculator-builder-pro' ); ?></span>
							<input type="text" v-model="settingsField.formFields.emailSubject" placeholder="<?php esc_attr_e( 'Enter subject', 'cost-calculator-builder-pro' ); ?>">
						</div>
					</div>
				</template>
			</div>
			<div class="row ccb-p-t-15" v-if="!settingsField.formFields.contactFormId">
				<div class="col-4" :class="{disabled: extended}">
					<div class="ccb-input-wrapper">
						<span class="ccb-input-label"><?php esc_html_e( 'Open Form Button Text', 'cost-calculator-builder-pro' ); ?></span>
						<input type="text" v-model="settingsField.formFields.openModalBtnText" placeholder="<?php esc_attr_e( 'Enter button text', 'cost-calculator-builder-pro' ); ?>">
					</div>
				</div>
				<div class="col-4" :class="{disabled: extended}">
					<div class="ccb-input-wrapper">
						<span class="ccb-input-label"><?php esc_html_e( 'Submit Button Text', 'cost-calculator-builder-pro' ); ?></span>
						<input type="text" v-model="settingsField.formFields.submitBtnText" placeholder="<?php esc_attr_e( 'Enter button text', 'cost-calculator-builder-pro' ); ?>">
					</div>
				</div>
			</div>
			<div class="row ccb-p-t-15" v-if="settingsField.formFields.contactFormId">
				<div class="col-12">
					<div class="ccb-input-wrapper">
						<span class="ccb-input-label"><?php esc_html_e( 'Contact Form Content', 'cost-calculator-builder-pro' ); ?></span>
						<textarea v-model="settingsField.formFields.body" placeholder="<?php esc_attr_e( 'Enter content', 'cost-calculator-builder-pro' ); ?>"></textarea>
					</div>
					<span class="ccb-field-description">[ccb-total-0] <?php esc_html_e( 'will be changed into total', 'cost-calculator-builder-pro' ); ?></span>
				</div>
			</div>
			<div class="row ccb-p-t-15">
				<div class="col-9">
					<span class="ccb-field-title">
						<?php esc_html_e( 'Total Field Element', 'cost-calculator-builder-pro' ); ?>
					</span>
					<span class="ccb-field-totals">
						<label class="ccb-field-totals-item ccb-default-title" v-for="formula in getFormulaFields" :for="'contact_' + formula.idx">{{ formula.title | to-short-description }}</label>
					</span>
					<div class="ccb-select-box">
						<div class="multiselect">
							<span v-if="formulas.length > 0 && formulas.length <= 3" class="anchor ccb-heading-5 ccb-light-3 ccb-selected" @click.prevent="multiselectShow(event)">
								<span class="selected-payment" v-for="formula in formulas">
									{{ formula.title | to-short-input  }}
									<i class="ccb-icon-close" @click.self="removeIdx( formula )" :class="{'settings-item-disabled': getTotalsIdx.length === 1 && getTotalsIdx.includes(+formula.idx)}"></i>
								</span>
							</span>
							<span v-else-if="formulas.length > 0 && formulas.length > 3" class="anchor ccb-heading-5 ccb-light ccb-selected" @click.prevent="multiselectShow(event)">
								{{ formulas.length }} <?php esc_attr_e( 'totals selected', 'cost-calculator-builder-pro' ); ?>
							</span>
							<span v-else class="anchor ccb-heading-5 ccb-light-3" @click.prevent="multiselectShow(event)">
								<?php esc_html_e( 'Select totals', 'cost-calculator-builder-pro' ); ?>
							</span>
							<ul class="items row-list settings-list totals">
								<li class="option-item settings-item" v-for="formula in getFormulaFields" :class="{'settings-item-disabled': getTotalsIdx.length === 1 && getTotalsIdx.includes(+formula.idx)}" @click="(e) => autoSelect(e, formula)">
									<input :id="'contact_' + formula.idx" :checked="getTotalsIdx.includes(+formula.idx)" name="contactTotals" class="index" type="checkbox" @change="multiselectChooseTotals(formula)"/>
									<label :for="'contact_' + formula.idx" class="ccb-heading-5">{{ formula.title | to-short }}</label>
								</li>
							</ul>
							<input name="options" type="hidden" />
						</div>
					</div>
				</div>
			</div>
			<div class="row ccb-p-t-20">
				<div class="col-12">
					<div class="ccb-captcha-wrapper">
						<div class="list-header">
							<div class="ccb-switch">
								<input type="checkbox" v-model="settingsField.recaptcha.enable"/>
								<label></label>
							</div>
							<h6 class="ccb-heading-5"><?php esc_html_e( 'Captcha by Google to prevent bots', 'cost-calculator-builder-pro' ); ?><span style="opacity: 0.5"> (Optional)</span></h6>
						</div>

						<div class="captcha-extended" v-if="settingsField.recaptcha.enable && getCaptchaInfo" style="margin-top: 20px">
							<div class="captcha-extended__icon-box">
								<i class="ccb-icon-Path-3484"></i>
							</div>
							<div class="captcha-extended__text-box">
								<span class="captcha-extended__title"><?php esc_html_e( 'Captcha key has been added.', 'cost-calculator-builder-pro' ); ?></span>
								<a class="captcha-extended__link" target="_blank" href="<?php echo esc_url( get_admin_url() . 'admin.php?page=cost_calculator_builder&tab=settings&option=captcha' ); ?>"><?php esc_html_e( 'Captcha setting', 'cost-calculator-builder-pro' ); ?></a>
							</div>
						</div>
						<div class="captcha-extended warning" v-if="settingsField.recaptcha.enable && !getCaptchaInfo" style="margin-top: 20px">
							<div class="captcha-extended__icon-box">
								<i class="ccb-icon-Path-3367"></i>
							</div>
							<div class="captcha-extended__text-box">
								<span class="captcha-extended__title"><?php esc_html_e( 'It works only if you add Recaptcha key to Global settings', 'cost-calculator-builder-pro' ); ?></span>
								<a class="captcha-extended__link" target="_blank" href="<?php echo esc_url( get_admin_url() . 'admin.php?page=cost_calculator_builder&tab=settings&option=captcha' ); ?>"><?php esc_html_e( 'Add Captcha key', 'cost-calculator-builder-pro' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="ccb-grid-box">
	<div class="ccb-settings-property" :class="{'ccb-settings-disabled': !settingsField.formFields.accessEmail}">
		<div class="container">
			<div class="row ccb-p-t-15">
				<div class="col">
					<span class="ccb-tab-title"><?php esc_html_e( 'Payment Gateways', 'cost-calculator-builder-pro' ); ?></span>
				</div>
			</div>
			<div class="row ccb-p-t-20">
				<div class="col">
					<div class="list-header">
						<div class="ccb-switch">
							<input type="checkbox" v-model="settingsField.formFields.payment"/>
							<label></label>
						</div>
						<h6 class="ccb-heading-5"><?php esc_html_e( 'Payment Gateways', 'cost-calculator-builder-pro' ); ?></h6>
					</div>
				</div>
			</div>
			<div class="row ccb-p-t-20" v-if="settingsField.formFields.payment">
				<div class="col-12">
					<div class="ccb-payments-getaway">
						<div class="ccb-field-title"><?php esc_html_e( 'Payment Gateways', 'cost-calculator-builder-pro' ); ?></div>
						<div class="ccb-payments">
							<label class="ccb-checkboxes" v-for="payment in getPayments" :key="payment.slug" :class="{disabled: payment.disabled}">
								<input type="checkbox" :checked="getValues.includes(payment.slug)" @change="toggleGateways" :value="payment.slug">
								<span class="ccb-checkboxes-label">{{ payment.name }}</span>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
