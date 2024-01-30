<?php
/**
 * @file
 * Cost-date-picker component's template
 */

$get_date_format = get_option( 'date_format' );
$lang            = get_bloginfo( 'language' );
?>
<div :style="additionalCss" class="calc-item ccb-field calc-repeater" :class="{rtl: rtlClass('<?php echo esc_attr( $lang ); ?>'),required: $store.getters.isUnused(repeaterField), [additionalCss.additionalStyles]: additionalCss.additionalStyles}" :data-id="repeaterField.alias" v-if="showRepeater">
	<div class="calc-repeater-wrapper" :class="['calc_' + repeaterField.alias, {'calc-field-disabled': getStep === 'finish'}]" v-for="(element, idx) in groupedElements">
		<div class="calc-item__title ccb-repeater-field" :data-index="idx">
			<span @click="() => collapse(idx)" >
				<i class="ccb-icon-Path-3514"></i>
				{{ repeaterField.label }}
				<span class="is-pro" v-if="isPro">
					<span class="pro-tooltip">
						PRO
						<span class="pro-tooltiptext">Feature Available <br> in Pro Version</span>
					</span>
				</span>
			</span>
		</div>
		<div class="calc-repeater-fields" :data-index="idx">
			<template v-for="field in element">
				<component
					format="<?php esc_attr( $get_date_format ); ?>"
					text-days="<?php esc_attr_e( 'days', 'cost-calculator-builder-pro' ); ?>"
					v-if="groupedFields[idx][field.alias]"
					:is="field._tag"
					:id="id"
					:index="idx"
					:field="field"
					:files="groupedFields[idx][field.alias].files"
					:converter="currencyFormat"
					v-model="groupedFields[idx][field.alias].value"
					v-on:change="change"
					v-on:[field._event]="change"
					v-on:condition-apply="renderCondition"
					:key="cancelUpdate(field.alias) ? field.alias : updateKey"
				>
				</component>
			</template>

			<div class="calc-buttons">
				<div class="calc-repeater-actions">
					<button class="calc-btn-action default-with-border danger" @click="() => removeRepeater(idx)" :class="{'is-disabled': groupedElements.length === 1}">
						<i class="ccb-icon-Trash-filled" style="font-weight: 700 !important;"></i>
						<span v-if="repeaterField.removeButtonLabel">{{ repeaterField.removeButtonLabel | to-short }}</span>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="calc-buttons">
		<div class="calc-repeater-actions">
			<button @click="addRepeater" class="calc-btn-action success-with-border is-bold" v-if="groupedElements.length < getLimit">
				<i class="ccb-icon-Add-Plus-Circle"></i>
				<span v-if="repeaterField.addButtonLabel">{{ repeaterField.addButtonLabel | to-short }}</span>
			</button>

			<span class="ccb-default-hint ccb-right" v-else>
				<button class="is-disabled calc-btn-action success-with-border is-bold">
					<i class="ccb-icon-Add-Plus-Circle"></i>
					<span v-if="repeaterField.addButtonLabel">{{ repeaterField.addButtonLabel | to-short }}</span>
				</button>
				<span class="ccb-checkbox-hint__content"><?php esc_html_e( 'You\'ve reached maximum limit of adding new fields', 'cost-calculator-builder-pro' ); ?></span>
			</span>
		</div>
	</div>
</div>
