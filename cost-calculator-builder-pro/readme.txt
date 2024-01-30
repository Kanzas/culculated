=== Cost Calculator Builder PRO ===

Contributors: StylemixThemes
Donate link: https://stylemixthemes.com/
Tags: cost calculator, calculator, calculator form builder
Requires at least: 4.6
Tested up to: 6.4
Stable tag: 3.1.49
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Changelog ==

= 3.1.49 =
 - Update: Added a setting to choose a range through unselectable days and calculate them in the Date picker element.
 - Update: Added a setting to add price for file uploads and sum prices for each file in the File upload element.
 - Update: Added a setting to hide price in Dropdown, Image dropdown, Image radio and Image checkbox elements of the calculator.
 - Update: Added tip on the "Add another" button at the maximum limit of group usage in the Repeater element.
 - Fixed: With the disabled “Sum up values in all fields” setting in Repeater is not displayed on the page, but it is displayed in Orders.
 - Fixed: In Orders, an order made by WooCommerce is not displayed because it has a formula equal to 0.
 - Fixed: With the Order form turned off, when paying via Stripe/PayPal, the ID is not sent to the mail.
 - Fixed: If different items have the same label, WooCheckout displays the quantity 0.

= 3.1.48 =
- Fixed: Calculations are carried out with the "Use formula for each repeatable collection" toggle in Repeater turned off.
- Fixed: When deleting a new filled block after Add new in Repeater, the filled Text field in all blocks is deleted.
- Fixed: In the email template in the Customer Info block some words are not translated via WPML and Loco.
- Fixed: Information about the order is not transferred to the mail for Contact information.
- Fixed: If the Formula element is not used, the Woocommerce Product cart shows 0 in price.

= 3.1.47 =
 - Fixed: Added the ability to edit the text of the "Close" button in Email Quote.
 - Fixed: When selecting a time in the Time Picker element, the extra distance appears at the bottom of the calculator in Preview, Appearance and Webpage.
 - Fixed: Fixed translation of some words into Spanish via the WPML plugin in the calculator.
 - Fixed: Item jumping occurs when adding via Drang & Drop in Repeater element.
 - Fixed: If the Open Form Button Text field is empty, a button without text will appear on the page if the field responsible for the button text in the Order form on the page is deleted.
 - Fixed: There is no order ID in the templates of emails sent to the user and admin when the Order form is off.

= 3.1.46 =
- Fixed: Minor bug fixes.

= 3.1.45 =
- Update: Added a setting to select whether to display Repeator element in Formula element when calculating.
- Fixed: After filling out the Order form Confirmation page will not open and the calculator page will remain.
- Fixed: When hiding Formula via Conditions actions Show/Hide, the calculation still takes place in Orders.
- Fixed: If you set the Date picker with Calculate cost per day turned off and without Formula element, it adds $1.

= 3.1.44 =
- Update: Added popup about deleting Repeated groups in the Repeater element.
- Update Woocommerce meta price will not be displayed in Text, Line, HTML, File upload, Date picker, Time picker, Formula and Repeater elements.
- Update: Now, when dragging already saved elements from/to Repeater, the element and Repeater edit window will not open.
- Update: Reduced the distance between elements with calculations inside Repeater.
- Update: Added text input to Condition for Find Element section.
- Update: Added saving the open/closed position of the Find element section in Conditions.
- Update: Repeater now applies in Horizontal box style.
- Update: Added setting to write text for sending email quotes successfully and email quotes failed.
- Fixed: Conditions from Input fields do not work if the unit in Range, Multi Range and Quantity fields is not 1.
- Fixed: The Submit button of the default form for Order form in global calculator settings is not editable.
- Fixed: Non-insertable element is inserted into Repeater.
- Fixed: Clicking the checkbox when selecting "Total Field Element" in the WooCheckout setting does not work.
- Fixed: Small bug fixes.

= 3.1.43 =
- New: Added new Repeater element.
- Fixed: Small bug fixes.

= 3.1.42 =
- Update: Added Is selected(label(s)) condition for the calculator.
- Update: Returned functionality of "Is selected(option)" condition.
- Fixed: Validation considers a domain invalid if it has more than 4 characters after the dot in the email.
- Fixed: The name of the Submit order button in Contact Form 7 does not change if you change it through the global settings of the calculator.
- In the Multi range element, no alert is generated if the Default value is less than the min value.

= 3.1.41 =
 - Update: When selecting a payment method, if the Order form is turned off, Stripe or PayPal payment success messages now come for admin and customer.
 - Update: Added position setting (left, right, center) for Logo in Email Template.
 - Update: Now the placeholder Email logo is not displayed in the template if no logo is loaded.
 - Fixed: As for the Default Orders Form, the price in Orders of selected formulas is displayed.
 - Fixed: Price calculation for Stripe, Paypal, and Woocommerce payments is incorrect if there are multiple Formula items.

= 3.1.40 =
- Update: Added "Is selected with Options" condition for Checkbox and Toggle elements in the calculator.
- Fixed: When switching between old and new formula with calculations, values are not displayed unless saved.
- Fixed: With Contact Form 7 enabled, the Orders total always shows 0.

= 3.1.39 =
- Fixed: In Image Checkbox, Image Dropdown and Image Radio an image can not be inserted via URL.
- Fixed: Removed action in Conditions "Hide (leave in Total)" for Formula element.
- Fixed: When using a Separate page, the style was cached from another calculator and the color changed.
- Fixed: The "Add to cart" button when using WooCommerce was not disabled if the required element is not selected.

= 3.1.38 =
- Update: It is possible to make dates unavailable for selection in the Date Picker.
- Update: The date picker element now have an option to define 1 day price.
- Update: WooCommerce Stock can be used in the calculator.
- Fixed: Uploaded via upload file are not shown in Woocommerce orders.

= 3.1.37 =
- Fixed: HTML elements do not work in Header and Descriptions of Email Templates.
- Fixed: Minor bug fixes.

= 3.1.36 =
- Update: It is possible to make dates unavailable for selection in the Date Picker.
- Update: The date picker element now has the option to define 1 day price.
- Update: WooCommerce Stock can be used in the calculator.
- Update: Users can choose to include Zero Values in Orders, PDF Entries and Emails in calculator settings.
- Fixed: Required Field marker should be hidden if there is no Submit action on PDF and Send Quote since they do not create an order.
- Fixed: Parts of the page are blocked when the element settings window is open.
- Fixed: Uploaded via upload files are not shown in Woocommerce orders.
- Fixed: The total field is missing and appears after clicking or moving the cursor, and fields may be cropped afterward when Stripe is on.
- Fixed: Styles from Appearance are cached from other calculators.

= 3.1.35 =
- New: Added Version history for backup calculators after saving.
- Update: Added the ability to select the minimum interval for a gap in the Time picker element.
- Update: Added possibility to hide the left menu "Find Element" in Conditions.
- Fixed: With the Hidden by default setting enabled, if you set the condition to show datepicker in Conditions, Datepicker disappears from Preview after selecting a date during calculations.

= 3.1.34 =
- Update: Updated integration of calculator with Stripe

= 3.1.33 =
- Fixed: When formulas with if/else are summed together, the calculator does not load.
- Fixed: Small bug fixes.

= 3.1.32 =
- Fixed: Page selection should be mandatory item when Separate page and Custom Page in Confirmation page is selected.
- Fixed: Condition action Show does not work in all calculator elements.
- Fixed: Condition action Show does not work in calculations of Formula element.

= 3.1.31 =
- New: Added Confirmation Page to show to customers after calculations and ordering.
- Update: Made Value field for Radio, Image Radio, Dropdown, Image Dropdown optional.
- Update: Made it possible to select formulas to be displayed on email after calculations and ordering.
- Fixed: Datepicker does not work in the preview and appearance tab in the calculator builder.
- Fixed: The browser hangs when switching to Appearance/Condition in the calculator builder after enabling the Payment in the Contact form.

= 3.1.30 =
- Update: Added previews for some calculator element styles.
- Fixed: Small bug fixes.

= 3.1.29 =
- Update: Improved design and functionality of the Formula field.
- Update: New design and functionality of fields in the Create window
- Fixed: When clicking on the "+" the element is added twice to Conditions.
- Fixed: WooCommerce Add To Cart Form does not work when turning off this form on a product in the latest version of WooCommerce.
- Fixed: Fields are not displayed in Conditions if there is no name.
- Fixed: It was not possible to specify a date with the Date Picker in the Conditions.
- Fixed: Minor bug fixes.

= 3.1.28 =
- Update: Upgraded Design for Conditions
- Update: Canvas can be moved with the mouse via hold & drag in Conditions.
- Update: Elements in Conditions are added in the center of the canvas regardless of where the cursor is located.
- Fixed: All fields appear without a selected option when Select Any is selected

= 3.1.27 =
- Fixed: In File Upload, if the Show in Grand Total setting is disabled, files are not sent.

= 3.1.26 =
- Update: Changed the logic of each element's settings.
- Update: Redesigned element settings.
- Fixed: The unit values can not be shown on the right.

= 3.1.25 =
- Update: Redesigned unit view for quantity element in the free version and multi range element in the pro version.
- Fixed: Minor bug fixes on Time Field.

= 3.1.24 =
- Fixed: Unset action should remove the field value from the total and from the field itself in Time Picker.

= 3.1.23 =
- New: Added Time Picker Element to the functionality

= 3.1.22 =
- Update: Added .dxf .dwg formats to the Supported list in File Upload.
- Update: Added translation into Italian of the builder.
- Fixed: When putting the Image Radio element as the second level, the element breaks the condition.
- Fixed: The word Price is not translated in Loco Translate for Image Radio and Image Checkbox.
- Fixed: The currency sign is not displayed in the Orders and Orders PDF.
- Fixed: Email Quote sends an empty PDF file after an order.
- Fixed: Small bug fixes.

= 3.1.21 =
- Update: Added default value for Checkbox and Toggle Fields.
- Fixed: Removed translation of unnecessary texts in Russian.
- Fixed: There was a bar overlapping on the right side in the orders section at a resolution lower than 1420.

= 3.1.20 =
- Fixed: Webp format does not work with Image dropdown, Radio and Checkbox.
- Fixed: The orders section takes the total with the smallest id.
- Fixed: Added new animations gif format support.
- Fixed: Corrected word hyphenation in Ukrainian.
- Fixed: Redesigned Composition display in Grand Total.
- Fixed: Form validation fails when Required status for Date Picker is enabled.

= 3.1.19 =
- Fixed: Content of Text Field is displayed in Total Summary.
- Fixed: Items hidden with Radio conditions retain their value and are displayed in Total.
- Fixed: The Date Picker element in Orders (PDF) displays 1 instead of the date.

= 3.1.18 =
- Update: Security update.

= 3.1.17 =
- Fixed: Date Picker adds 1 to the default total.
- Fixed: Hidden by Default fields reset Total.
- Fixed: The marker icon overlaps the price in Image radio.
- Fixed: Only one element with the same name is selected from the webhooks.

= 3.1.16 =
- New: Added an option to connect to third-party automation applications using webhooks.
- Update: Added editor to format the content of the Email template.
- Fixed: The "Default Vertical" style did not apply to Toggle and Radio elements.
- Fixed: The "Box with heading" style did not apply to the Checkbox element.

= 3.1.15 =
- Update: Added an option to change decimals through arrows in option values of the elements and in the Quantity field.
- Fixed: Uploaded files did not display in Orders when Contact 7 integration was used.
- Fixed: Wrong direction of Multi Range element in RTL.
- Fixed: The color of the SVG icons was changed in Image Radio and Image Checkbox elements with Box with icon style.
- Fixed: The value of the Text field did not appear in WooCommerce orders, Email and PDF Quote.
- Fixed: Hidden Elements displayed in PDF Quote and Email.
- Fixed: Long values in the Unit column were broken off in the middle.

= 3.1.14 =
- New: Added an option to display calculated units in the Grand Total section.

= 3.1.13 =
- Fixed: Date Picker was not visible while customizing the calculator appearance.
- Fixed: Hidden Formula elements were visible in Email and PDF Quote.
- Fixed: Calculations did not add to the cart with Woo Checkout and the loader was displayed.

= 3.1.12 =
- Fixed: Elements with zero values did not display in Emails, WooCommerce checkout, and Order details.
- Fixed: The "Payment methods" label was displayed in the PDF Quote when the Contact form was disabled.
- Fixed: Conditions did not copy to the translated version of the calculator with WPML.

= 3.1.11 =
- Fixed: The email template did not apply to users with Gmail.

= 3.1.10 =
- Update: Revised some texts on the plugin dashboard to improve clarity and user experience.
- Fixed: Changes on option values of duplicated elements affected to the original one.

= 3.1.9 =
- New: Option to assign several WooCommerce Categories to a single calculator for WooProducts.
- Update: Added the option to make any field required.
- Fixed: Hidden by default Formula elements were visible in PDF Quote and Order details.
- Fixed: The arrow of the Image Drop down field was not clickable.
- Fixed: Payment details were displayed in PDF Quote and Order details when Payment methods were disabled.

= 3.1.8 =
- Fixed: Zero values of the Checkbox and Image Checkbox did not display in the PDF Quote.
- Fixed: Some letters did not display when PDF was generated in languages other than English.
- Fixed: Date Picker is overlapped on mobile view when the Two Columns Box Style is used.

= 3.1.7 =
- New: Personalized styles for Options of Toggle, Radio, Radio with Image, Checkbox, Checkbox With Image, DropDown, and DropDown With Image Fields.

= 3.1.6 =
- Update: Added option to disable Plugin branding in footer section for the Email template.

= 3.1.5 =
- New: Form Estimation Email Template has been added for easy personalization of outgoing emails.
- Update: Compatibility with WordPress 6.2.

= 3.1.4 =
- Update: Added global settings for Sender Email and Sender Name for outgoing emails.

= 3.1.3 =
- New: Conditions depending on the value of the Formula element.
- New: The Orders modal window will be closed when clicking on any area outside.
- Update: The Logic of the "is inferior" and "is superior" are changed for the Elements with Options, and the conditions should be set again.
- Fixed: The Uploaded file did not arrive in the WooCommerce orders.
- Fixed: Unpaid PayPal order displayed in Complete status.
- Fixed: The Value of the Hidden by Default Elements that was selected by the User was reset when they showed with Conditions.

= 3.1.2 =
- New: An allowed number of options to select is added for Image Checkbox field.
- New: The ability to add one WooCommerce product multiple times to the cart with different calculator options.
- New: The ability to stay on the page after adding a WooCommerce product to the cart to make a different calculation.
- Fixed: Submit button form Contact 7 did not apply accent color from Calculator Customizer.
- Fixed: The quantity field did not work with fractional numbers when the Hidden by default option was enabled.

= 3.1.1 =
- New: Option to make Total Summary Sticky is added to Grand total settings.
- Fixed: Global currency settings did not apply for the Currency symbol.

= 3.1.0 =
- New: Image Radio and Image Checkbox elements are added.
- Removed: "Not selected" option of reCaptcha was removed from global settings.
- Fixed: PayPal IPN History returned ERROR 500.
- Fixed: Incompatibility issues with PHP 8.

= 3.0.9 =
- New: Option to select the type of label for Dropdown with image field in Total.

= 3.0.8 =
- New: Added order creation date in Orders section.
- Fixed: Incorrect logic of WooCommerce Add To Cart toggle button in Calculator settings.

= 3.0.7 =
- New: Send PDF Quote form added.

= 3.0.6 =
- Fix: Get PDF button has not appeared before making payment using WooCoomerce checkout.
- Fix: The link of the attached file PDF invoice was redirected to the orders instead of downloading it.
- Fix: Selected values of the elements were reset, when conditions with the Checkbox and Toggle field is used.
- Fix: An error notice did not appear while making payment when the Grand Total was equal to 0.
- Fix: An empty notice appeared after a successful payment with Stripe.

= 3.0.5 =
- New: PDF Entries allow exporting the Total summary of calculations in a .pdf document.

= 3.0.4 =
- Fix: Emails from the default contact form were not translated.

= 3.0.3 =
- New: Quick premium support button in WP dashboard (for applying the issue tickets) and personal support account creation.

= 3.0.2 =
- Fix: File uploads are not displayed in WooCoommerce orders when WooCheckout is used.
- Fix: WooCoommerce orders are duplicated when WooCheckout is used.

= 3.0.1 =
- New: Select the Preloader icon through Calculator Appearance.
- Update: Added feedback button to the calculator dashboard to leave reviews.
- Fix: The Total summary was stretched when checkbox and toggle elements are used.

= 3.0.0 =
[Meet All-New Cost Calculator 3.0](https://stylemixthemes.com/wp/something-big-is-coming-meet-all-new-cost-calculator/)
* NEW: Cost Calculator Frontend UI was completely redesigned
* NEW: Redesigned and optimized Admin Dashboard
* NEW: Optimal navigation. Calculators list, orders, settings, and your accounts will be displayed in a horizontal panel.
* NEW: New calculator builder focused on a better user experience.
* NEW: Manage all points of the Contact Form in one place.
* NEW: Global settings for Payment Gateways.

= 2.2.8 =
- fixed: PayPal payment type didn’t work if the calculator’s fields contained more than 256 figures and symbols
- fixed: Drop Down with Image Field and File Upload Field were untranslatable
- fixed: Contact form was not submitted if any element's title had quotation marks
- fixed: Relevant notification to configure Calculator’s Settings
- fixed: Total Field issue with Stripe, PayPal and WooCommerce payments

= 2.2.7 =
- updated: Compatibility with WordPress 6.0
- fixed: Inappropriate load of graphical elements on "Contact Us" page

= 2.2.6 =
- updated: Security update

= 2.2.5 =
- fixed: Order can be created with empty custom fields, which have Required status
- fixed: WooCommerce Meta types in WooProducts Settings do not work with Quantity Custom Filed
- fixed: The confirmation text does not appear  after resending the message (when Send Form Feature is configured)
- fixed: 'This Filed is Required' notification is duplicated, when custom field with Required status is empty
- fixed: Badge "DELETED" appears on all calculator (Calculator Name Column) in Orders section
- fixed: Bug with Stripe payments
- fixed: After sending a message by using Send Form feature,  empty text area comes to email

= 2.2.4 =
- fixed: PayPal calculator field (set max 6)

= 2.2.3 =
- new: File Upload Custom Element
- new: Image Dropdown Custom Element
- fixed: Counters do not work on Image Dropdown Custom Element
- fixed: Keep the ID transaction from PayPal and Stripe
- fixed: Payments table not is separated from Orders Table (in database)
- fixed: Correct processing of PayPal and Stripe callbacks (if paid by the user, change the status of the order to complete with the date of payment)

= 2.2.2 =
- updated: You can choose multiple payment options in the form.
- fixed: WooCommerce cart data bug

= 2.2.1 =
- new: Show WooCommerce as third payment type if enabled
- new: "Show" action for hidden fields in Conditions
- new: Or/And logic for Condition added
- updated: Show multirange start and end values in Orders
- fixed: Correct calendar dropdown when date picker is at the bottom of the page
- fixed: Order details for WooCommerce orders
- fixed: Correct dropdown calendar translation
- fixed: Show cart data for all devices

= 2.2.0 =
- new: Order details section added in the dashboard
- new: PayPal feedback for payment status in order details
- new: Default contact form automatic usage with integrated payments methods (Stripe, PayPal)
- updated: Default contact form settings moved to separate section
- fixed: Minor bugs with Contact Form 7 plugin
- fixed: Datefield appearance in WooCommerce order details
- fixed: Required fields if option value equal to 0

= 2.1.9 =
- added: Date picker custom styles setup
- added: Wordpress date format for datepicker
- updated: Custom date picker
- updated: Date picker custom styles
- updated: Wordpress format for datepicker field
- updated: New date picker integrated
- updated:Refactoring of the conditions logic
- updated: Checkbox and toggles functionality updated
- new: Condition actions - Select Option, Select Option and Disable, Set date, Set date and disable, Set period , Set period and disable  added
- new: Can set period for date picker with range and multi range fields
- fixed: The elements removed from calculator stayed in condition section
- fixed: Required fields validation

= 2.1.8 =
- updated: Required option to Datepicker field
- added: Admin notifications

= 2.1.7 =
- fixed: Calculator displaying in WooCommerce if the product is out of stock
- fixed: Paypal currency symbol on redirect to Paypal checkout.
- fixed: The number of days is not counted for Date Picker field.
- fixed: Calculator title is not displayed in WooCommerce cart.

= 2.1.6 =
- fixed: Date format on Email.
- fixed: Captcha v2 does not work.
- fixed: Export/Import Calculators Condition bug.
- fixed: Multi-range is not displaying for Second Calculator on the same page.

= 2.1.5 =
- fixed: WooCommerce Cart Product Settings

= 2.1.4 =
- new: WooCommerce Products feature added
- fixed: WooCommerce Cart Product Variation bug

= 2.1.3 =
- fixed: Calendar Datepicker issue on Safari
- fixed: Deleting Calculator Product from Cart issue

= 2.1.2 =
- upd: Compatibility with Wordpress 5.7
- fixed: PayPal redirect issue
- fixed: Contact Form after submit bugs
- fixed: WooCommerce conflict when multiple Users add item to the cart at the same time

= 2.1.1 =
- Security update

= 2.1.0 =
- new: Hover effect settings added for Submit button (Customizer)
- fixed: Datepciker OK button appearance
- fixed: Condition link appearance in dashboard
- fixed: Set value action delay (Conditional system)
- fixed: HTML & Line elements disappear after set conditions to these elements
- fixed: Toggle to Drop Down condition bug
- fixed: Stripe 'Public key' typo

= 2.0.10 =
- upd: Watermark 'Powered by Stylemix' is not visible when Pro plugin activated
