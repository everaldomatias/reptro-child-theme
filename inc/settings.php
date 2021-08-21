<?php
/**
 * IMEP Settings
 */

class IMEP_Settings {
	private $imep_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'imep_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'imep_page_init' ) );
	}

	public function imep_add_plugin_page() {
		add_submenu_page(
			'themes.php',
			'IMEP', // page_title
			'IMEP', // menu_title
			'manage_options', // capability
			'imep', // menu_slug
			array( $this, 'imep_create_admin_page' ) // function
		);
	}

	public function imep_create_admin_page() {
		$this->imep_options = get_option( 'imep_option_name' ); ?>

		<div class="wrap">
			<h2>IMEP</h2>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'imep_option_group' );
					do_settings_sections( 'imep-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function imep_page_init() {
		register_setting(
			'imep_option_group', // option_group
			'imep_option_name', // option_name
			array( $this, 'imep_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'imep_setting_section', // id
			'Configurações IMEP', // title
			array( $this, 'imep_section_info' ), // callback
			'imep-admin' // page
		);

		add_settings_field(
			'token_pagsegurolightbox', // id
			'Token PagSeguroLightbox', // title
			array( $this, 'token_pagsegurolightbox_0_callback' ), // callback
			'imep-admin', // page
			'imep_setting_section' // section
		);
	}

	public function imep_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['token_pagsegurolightbox'] ) ) {
			$sanitary_values['token_pagsegurolightbox'] = sanitize_text_field( $input['token_pagsegurolightbox'] );
		}

		return $sanitary_values;
	}

	public function imep_section_info() {
		
	}

	public function token_pagsegurolightbox_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="imep_option_name[token_pagsegurolightbox]" id="token_pagsegurolightbox" value="%s">',
			isset( $this->imep_options['token_pagsegurolightbox'] ) ? esc_attr( $this->imep_options['token_pagsegurolightbox']) : ''
		);
	}

}
if ( is_admin() )
	$imep = new IMEP_Settings();

/* 
 * Retrieve this value with:
 * $imep_options = get_option( 'imep_option_name' ); // Array of All Options
 * $token_pagsegurolightbox = $imep_options['token_pagsegurolightbox']; // Token PagSeguroLightbox
 */
