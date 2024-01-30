<?php

/**
 * Plugin Name: Cost Calculator Builder PRO
 * Plugin URI: https://stylemixthemes.com/cost-calculator-plugin/
 * Description: WP Cost Calculator helps you to build any type of estimation forms on a few easy steps. The plugin offers its own calculation builder.
 * Author: Stylemix Themes
 * Author URI: https://stylemixthemes.com/
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: cost-calculator-builder-pro
 * Version: 3.1.51
 * Update URI: https://api.freemius.com
 */
define( 'CCB_PRO', __FILE__ );
define( 'CCB_PRO_PATH', dirname( __FILE__ ) );
define( 'CCB_PRO_URL', plugins_url( __FILE__ ) );

if ( !function_exists( 'ccb_fs' ) && file_exists( dirname( __FILE__ ) . '/freemius/start.php' ) ) {
    function ccb_fs()
    {
        global  $ccb_fs ;
        
        if ( !isset( $ccb_fs ) ) {
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $args = array(
                'id'              => '4532',
                'slug'            => 'cost-calculator-builder-pro',
                'premium_slug'    => 'cost-calculator-builder-pro',
                'type'            => 'plugin',
                'public_key'      => 'pk_663aa5b416d36cc2e85d6dff5f7b6',
                'is_premium'      => true,
                'is_premium_only' => true,
                'has_addons'      => false,
                'has_paid_plans'  => true,
                'has_affiliation' => 'all',
                'menu'            => array(
                'slug'       => 'cost_calculator_builder',
                'first-path' => 'admin.php?page=cost_calculator_builder',
                'support'    => false,
            ),
                'is_live'         => true,
            );
            if ( !defined( 'CALC_VERSION' ) && !empty($args['menu']['first-path']) ) {
                $args['menu']['first-path'] = 'plugins.php';
            }
            
        }
        
        return $ccb_fs;
    }
    
    
}

function ccb_verify()
{
    
    return true;
}

register_activation_hook( CCB_PRO, 'set_stm_admin_notification_ccb' );
if ( is_admin() ) {
    require_once CCB_PRO_PATH . '/includes/admin-notices/admin-notices.php';
}

if ( ccb_verify() ) {
    define( 'CCB_PRO_VERSION', '3.1.51' );
    add_action( 'plugins_loaded', function () {
        $ccb_installed = defined( 'CALC_VERSION' );
        
        if ( !$ccb_installed ) {
            
            if ( is_admin() ) {
                $init_data = array(
                    'notice_type'          => 'ccb-pro-notice',
                    'notice_logo'          => 'ccb.svg',
                    'notice_title'         => __( 'Please install Cost-Calculator-Builder from <a href="https://wordpress.org/plugins/cost-calculator-builder/">WordPress.org</a>', 'cost-calculator-builder-pro' ),
                    'notice_btn_one'       => 'https://wordpress.org/plugins/cost-calculator-builder/',
                    'notice_btn_one_title' => esc_html__( 'Install', 'cost-calculator-builder-pro' ),
                );
                stm_admin_notices_init( $init_data );
            }
            
            require_once CCB_PRO_PATH . '/templates/admin/wizard.php';
            // phpcs:ignore
        } else {
            require_once CCB_PRO_PATH . '/includes/functions.php';
            require_once CCB_PRO_PATH . '/includes/classes/CCBProTemplate.php';
            require_once CCB_PRO_PATH . '/includes/classes/CCBProSettings.php';
            require_once CCB_PRO_PATH . '/includes/classes/CCBProAjaxCallbacks.php';
            require_once CCB_PRO_PATH . '/includes/classes/CCBProAjaxActions.php';
            require_once CCB_PRO_PATH . '/includes/classes/CCBPayments.php';
            require_once CCB_PRO_PATH . '/includes/classes/payments/CCBPayPal.php';
            require_once CCB_PRO_PATH . '/includes/classes/payments/CCBStripe.php';
            require_once CCB_PRO_PATH . '/includes/classes/payments/CCBWooCheckout.php';
            require_once CCB_PRO_PATH . '/includes/classes/CCBInvoice.php';
            require_once CCB_PRO_PATH . '/includes/classes/CCBWooProducts.php';
            require_once CCB_PRO_PATH . '/includes/classes/CCBContactForm.php';
            require_once CCB_PRO_PATH . '/includes/classes/CCBWebhooks.php';
            require_once CCB_PRO_PATH . '/includes/classes/CCBWpHooks.php';
            require_once CCB_PRO_PATH . '/includes/init.php';
        }
    
    } );
}

if ( is_admin() ) {
    require_once CCB_PRO_PATH . '/includes/item-announcements.php';
}
if ( !function_exists( 'set_stm_admin_notification_ccb' ) ) {
    function set_stm_admin_notification_ccb()
    {
        
        if ( empty(get_option( 'calc_hint_skipped' )) ) {
            update_option( 'calc_allow_hint', '1' );
            update_option( 'calc_hint_skipped', array() );
        }
        
        //set rate us notice
        set_transient( 'stm_cost-calculator-builder_notice_setting', array(
            'show_time'   => time(),
            'step'        => 0,
            'prev_action' => '',
        ) );
    }

}

if ( is_admin() && get_option( 'ccb_version' ) !== false && version_compare( get_option( 'ccb_version' ), '2.2.5', '<' ) ) {
    $init_data = array(
        'notice_type'          => 'animate-circle-notice',
        'notice_logo'          => 'attent_circle.svg',
        'notice_title'         => esc_html__( 'Please update Cost Calculator Builder plugin!', 'cost-calculator-builder-pro' ),
        'notice_desc'          => esc_html__( 'Cost Calculator Builder plugin update required. We added new features, and need to update your plugin to the latest version!', 'cost-calculator-builder-pro' ),
        'notice_btn_one'       => admin_url( 'plugins.php' ),
        'notice_btn_one_title' => esc_html__( 'Update Plugin', 'cost-calculator-builder-pro' ),
    );
    stm_admin_notices_init( $init_data );
    return;
}

	if (!function_exists('woodev_plugin_admin_menu')){
		function woodev_plugin_admin_menu() {

			// add top menu item
			$icon = file_get_contents( dirname( __FILE__ ) . '/woodev_dashicon.svg' );

			add_menu_page(
				'WooDev',
				'WooDev',
				'manage_options',
				'woodev_plugin_license_slug',
				'woodev_plugin_license_page',
				'data:image/svg+xml;base64,' . base64_encode( $icon ) // Use the handle of the enqueued SVG file
			);

			add_submenu_page( 'woodev_plugin_license_slug', 'License', 'License', 'manage_options', 'woodev_plugin_license_slug', 'woodev_plugin_license_page' );
		}

		add_action( 'admin_menu', 'woodev_plugin_admin_menu' );
	}

	/*
	 * License form page content.
	 */
	if (!function_exists('woodev_plugin_license_page')) {
		function woodev_plugin_license_page() {

			echo woodev_plugin_license_page_script();

			// Get the list of installed plugins
			$installed_plugins = get_option( 'active_plugins' );

			// Loop through each installed plugin
			foreach ( $installed_plugins as $plugin ) {

				$plugin = explode( '/', $plugin );
				$plugin = $plugin[0];

				$plugin_path = WP_PLUGIN_DIR . '/' . $plugin;

				// Check if woodev.txt exists in the plugin directory
				$woodev_file_path = $plugin_path . '/woodev.txt';

				if (file_exists($woodev_file_path)) {
					// Dynamically generate and echo the shortcode
					$identifier = $plugin;
					$shortcode_title = str_replace( '-', '_', $plugin );
					$plugin = ucwords(str_replace( '-', ' ', $plugin ));

					echo do_shortcode( "[licensepage_{$shortcode_title}]" );
				}

			}

			echo woodev_plugin_license_page_style();
		}
	}

	if (!function_exists('woodev_plugin_license_page_style')){
		function woodev_plugin_license_page_style() {
			$style = '
         </div><style>
        .toplevel_page_woodev_plugin_license_slug img {
            padding: 9px;
        }
        #wpwrap {
            background: linear-gradient(to right, #6B46C1, #D6BCFA);
        }
        #footer-thankyou {
            color: white;
        }
        .license-header {
            display: flex;
            align-items: end;
            justify-content: space-between;
        }
        .thlm-error-notice {
            margin: 5px 0 5px 0;
        }
        .license-header img {
            max-width: 135px; /* Adjust the max-width as needed */
            margin-right: 1rem; /* Adjust the margin as needed */
        }
	</style>';

			return $style;
		}
	}

	if (!function_exists('woodev_plugin_license_page_script')) {
		function woodev_plugin_license_page_script() {
			$script = '<script src="https://cdn.tailwindcss.com">
            tailwind.config = {
                theme: {
                    extend: {
                        width: {
                            "35": "35%",
                            "45": "45%",
                        },
                        maxWidth: {
                            "70": "70%",
                            "90": "90%",
                        },
                        minWidth: {
                            "490": "490px",
                            "15rem": "15rem",
                        }
                    }
                }
            }
        </script>
        <div class="container mx-auto p-4">
        <div class="license-header md:max-w-[90%] xl:max-w-[90%] 2xl:max-w-[70%]">
            <h2 class="text-2xl mt-3 font-semibold ps-3 text-white">License Management</h2>
            <img src="https://woodev.net/wp-content/uploads/2023/08/woodev_logo_header.svg" alt="Logo">
        </div>';

			return $script;
		}
	}


	/*
	 * Filter to remove default license page (displayed under settings menu).
	 * Useful when custom page is used for license form.
	 */
	add_filter('woodev_enable_default_license_page', '__return_false');

	/*
 * Init license manager [CHANGE]
 */
function cost_calculator_builder_pro_init_woodev_license_manager() {
    $api_url = 'https://woodev.net/';

    // Get the basename of the current plugin file
    $current_plugin = plugin_basename( __FILE__ );

    $plugin_parts = explode( '/', $current_plugin );
    $plugin_title = $plugin_parts[0];

    $plugin_title = str_replace( array('-', '_'), ' ', $plugin_title );

    require_once( plugin_dir_path( __FILE__ ) . 'class-license-manager.php' );
    Cost_Calculator_Builder_Pro_Woodev_License_Manager::instance( __FILE__, $api_url, 'plugin', ucwords( $plugin_title ) );
}

cost_calculator_builder_pro_init_woodev_license_manager();


	// Add your inline CSS styles to the admin head
	function add_inline_admin_styles_cost_calculator_builder_pro() {
		?>
		<style>
            .ccb-main-container .ccb-header .ccb-header-navigation a:nth-child(4) {
                display: none;
            }
		</style>
		<?php
	}

	// Enqueue your inline CSS styles
	add_action('admin_head', 'add_inline_admin_styles_cost_calculator_builder_pro');