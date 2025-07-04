<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// add admin options page
function vscf_menu_page() {
	add_options_page( esc_html__( 'VS Contact Form', 'very-simple-contact-form' ), esc_html__( 'VS Contact Form', 'very-simple-contact-form' ), 'manage_options', 'vscf', 'vscf_options_page' );
}
add_action( 'admin_menu', 'vscf_menu_page' );

// add admin settings and such
function vscf_admin_init() {
	// general section
	add_settings_section( 'vscf-general-section', esc_html__( 'General', 'very-simple-contact-form' ), '', 'vscf-general' );

	add_settings_field( 'vscf-field-1', esc_html__( 'Uninstall', 'very-simple-contact-form' ), 'vscf_field_callback_1', 'vscf-general', 'vscf-general-section' );
	register_setting( 'vscf-general-options', 'vscf-setting-1', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vscf-field-22', esc_html__( 'Email address', 'very-simple-contact-form' ), 'vscf_field_callback_22', 'vscf-general', 'vscf-general-section' );
	register_setting( 'vscf-general-options', 'vscf-setting-22', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-28', esc_html__( 'Email', 'very-simple-contact-form' ), 'vscf_field_callback_28', 'vscf-general', 'vscf-general-section' );
	register_setting( 'vscf-general-options', 'vscf-setting-28', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vscf-field-3', esc_html__( 'Email', 'very-simple-contact-form' ), 'vscf_field_callback_3', 'vscf-general', 'vscf-general-section' );
	register_setting( 'vscf-general-options', 'vscf-setting-3', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vscf-field-35', esc_html__( 'Subject', 'very-simple-contact-form' ), 'vscf_field_callback_35', 'vscf-general', 'vscf-general-section' );
	register_setting( 'vscf-general-options', 'vscf-setting-35', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-15', esc_html__( 'Subject', 'very-simple-contact-form' ), 'vscf_field_callback_15', 'vscf-general', 'vscf-general-section' );
	register_setting( 'vscf-general-options', 'vscf-setting-15', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-2', esc_html__( 'Submissions', 'very-simple-contact-form' ), 'vscf_field_callback_2', 'vscf-general', 'vscf-general-section' );
	register_setting( 'vscf-general-options', 'vscf-setting-2', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vscf-field-27', esc_html__( 'Labels', 'very-simple-contact-form' ), 'vscf_field_callback_27', 'vscf-general', 'vscf-general-section' );
	register_setting( 'vscf-general-options', 'vscf-setting-27', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vscf-field-32', esc_html__( 'Input', 'very-simple-contact-form' ), 'vscf_field_callback_32', 'vscf-general', 'vscf-general-section' );
	register_setting( 'vscf-general-options', 'vscf-setting-32', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-33', esc_html__( 'Textarea', 'very-simple-contact-form' ), 'vscf_field_callback_33', 'vscf-general', 'vscf-general-section' );
	register_setting( 'vscf-general-options', 'vscf-setting-33', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-19', esc_html__( 'Privacy', 'very-simple-contact-form' ), 'vscf_field_callback_19', 'vscf-general', 'vscf-general-section' );
	register_setting( 'vscf-general-options', 'vscf-setting-19', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vscf-field-21', esc_html__( 'Anchor', 'very-simple-contact-form' ), 'vscf_field_callback_21', 'vscf-general', 'vscf-general-section' );
	register_setting( 'vscf-general-options', 'vscf-setting-21', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vscf-field-34', esc_html__( 'Debugging', 'very-simple-contact-form' ), 'vscf_field_callback_34', 'vscf-general', 'vscf-general-section' );
	register_setting( 'vscf-general-options', 'vscf-setting-34', array( 'sanitize_callback' => 'sanitize_key' ) );

	// spam section
	add_settings_section( 'vscf-spam-section', esc_html__( 'Anti-spam', 'very-simple-contact-form' ), '', 'vscf-spam' );

	add_settings_field( 'vscf-field-29', esc_html__( 'Banned words', 'very-simple-contact-form' ), 'vscf_field_callback_29', 'vscf-spam', 'vscf-spam-section' );
	register_setting( 'vscf-spam-options', 'vscf-setting-29', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-30', esc_html__( 'Submissions', 'very-simple-contact-form' ), 'vscf_field_callback_30', 'vscf-spam', 'vscf-spam-section' );
	register_setting( 'vscf-spam-options', 'vscf-setting-30', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vscf-field-25', esc_html__( 'Links', 'very-simple-contact-form' ), 'vscf_field_callback_25', 'vscf-spam', 'vscf-spam-section' );
	register_setting( 'vscf-spam-options', 'vscf-setting-25', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-38', esc_html__( 'Submissions', 'very-simple-contact-form' ), 'vscf_field_callback_38', 'vscf-spam', 'vscf-spam-section' );
	register_setting( 'vscf-spam-options', 'vscf-setting-38', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vscf-field-36', esc_html__( 'Email address', 'very-simple-contact-form' ), 'vscf_field_callback_36', 'vscf-spam', 'vscf-spam-section' );
	register_setting( 'vscf-spam-options', 'vscf-setting-36', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-39', esc_html__( 'Submissions', 'very-simple-contact-form' ), 'vscf_field_callback_39', 'vscf-spam', 'vscf-spam-section' );
	register_setting( 'vscf-spam-options', 'vscf-setting-39', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vscf-field-40', esc_html__( 'Time trap', 'very-simple-contact-form' ), 'vscf_field_callback_40', 'vscf-spam', 'vscf-spam-section' );
	register_setting( 'vscf-spam-options', 'vscf-setting-40', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	// field section
	add_settings_section( 'vscf-field-section', esc_html__( 'Fields', 'very-simple-contact-form' ), '', 'vscf-field' );	

	add_settings_field( 'vscf-field-23', esc_html__( 'Subject', 'very-simple-contact-form' ), 'vscf_field_callback_23', 'vscf-field', 'vscf-field-section' );
	register_setting( 'vscf-field-options', 'vscf-setting-23', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vscf-field-24', esc_html__( 'Sum', 'very-simple-contact-form' ), 'vscf_field_callback_24', 'vscf-field', 'vscf-field-section' );
	register_setting( 'vscf-field-options', 'vscf-setting-24', array( 'sanitize_callback' => 'sanitize_key' ) );

	add_settings_field( 'vscf-field-4', esc_html__( 'Privacy', 'very-simple-contact-form' ), 'vscf_field_callback_4', 'vscf-field', 'vscf-field-section' );
	register_setting( 'vscf-field-options', 'vscf-setting-4', array( 'sanitize_callback' => 'sanitize_key' ) );	

	// label section
	add_settings_section( 'vscf-label-section', esc_html__( 'Labels', 'very-simple-contact-form' ), '', 'vscf-label' );

	add_settings_field( 'vscf-field-5', esc_html__( 'Name', 'very-simple-contact-form' ), 'vscf_field_callback_5', 'vscf-label', 'vscf-label-section' );
	register_setting( 'vscf-label-options', 'vscf-setting-5', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-6', esc_html__( 'Email address', 'very-simple-contact-form' ), 'vscf_field_callback_6', 'vscf-label', 'vscf-label-section' );
	register_setting( 'vscf-label-options', 'vscf-setting-6', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-7', esc_html__( 'Subject', 'very-simple-contact-form' ), 'vscf_field_callback_7', 'vscf-label', 'vscf-label-section' );
	register_setting( 'vscf-label-options', 'vscf-setting-7', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-9', esc_html__( 'Message', 'very-simple-contact-form' ), 'vscf_field_callback_9', 'vscf-label', 'vscf-label-section' );
	register_setting( 'vscf-label-options', 'vscf-setting-9', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-18', esc_html__( 'Privacy', 'very-simple-contact-form' ), 'vscf_field_callback_18', 'vscf-label', 'vscf-label-section' );
	register_setting( 'vscf-label-options', 'vscf-setting-18', array( 'sanitize_callback' => 'wp_kses_post' ) );

	add_settings_field( 'vscf-field-10', esc_html__( 'Submit', 'very-simple-contact-form' ), 'vscf_field_callback_10', 'vscf-label', 'vscf-label-section' );
	register_setting( 'vscf-label-options', 'vscf-setting-10', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-11', esc_html__( 'Name', 'very-simple-contact-form' ).' - '.esc_html__( 'Error', 'very-simple-contact-form' ), 'vscf_field_callback_11', 'vscf-label', 'vscf-label-section' );
	register_setting( 'vscf-label-options', 'vscf-setting-11', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-13', esc_html__( 'Email address', 'very-simple-contact-form' ).' - '.esc_html__( 'Error', 'very-simple-contact-form' ), 'vscf_field_callback_13', 'vscf-label', 'vscf-label-section' );
	register_setting( 'vscf-label-options', 'vscf-setting-13', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-20', esc_html__( 'Subject', 'very-simple-contact-form' ).' - '.esc_html__( 'Error', 'very-simple-contact-form' ), 'vscf_field_callback_20', 'vscf-label', 'vscf-label-section' );
	register_setting( 'vscf-label-options', 'vscf-setting-20', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-26', esc_html__( 'Sum', 'very-simple-contact-form' ).' - '.esc_html__( 'Error', 'very-simple-contact-form' ), 'vscf_field_callback_26', 'vscf-label', 'vscf-label-section' );
	register_setting( 'vscf-label-options', 'vscf-setting-26', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	add_settings_field( 'vscf-field-12', esc_html__( 'Message', 'very-simple-contact-form' ).' - '.esc_html__( 'Error', 'very-simple-contact-form' ), 'vscf_field_callback_12', 'vscf-label', 'vscf-label-section' );
	register_setting( 'vscf-label-options', 'vscf-setting-12', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	if ( ( get_option( 'vscf-setting-25' ) == 'disallow' ) || ( get_option( 'vscf-setting-25' ) == 'one' ) ) {
		add_settings_field( 'vscf-field-8', esc_html__( 'Message', 'very-simple-contact-form' ).' - '.esc_html__( 'Error', 'very-simple-contact-form' ), 'vscf_field_callback_8', 'vscf-label', 'vscf-label-section' );
		register_setting( 'vscf-label-options', 'vscf-setting-8', array( 'sanitize_callback' => 'sanitize_text_field' ) );
	}

	if ( get_option( 'vscf-setting-36' ) == 'disallow' ) {
		add_settings_field( 'vscf-field-37', esc_html__( 'Message', 'very-simple-contact-form' ).' - '.esc_html__( 'Error', 'very-simple-contact-form' ), 'vscf_field_callback_37', 'vscf-label', 'vscf-label-section' );
		register_setting( 'vscf-label-options', 'vscf-setting-37', array( 'sanitize_callback' => 'sanitize_text_field' ) );
	}

	add_settings_field( 'vscf-field-31', esc_html__( 'Banned words', 'very-simple-contact-form' ).' - '.esc_html__( 'Error', 'very-simple-contact-form' ), 'vscf_field_callback_31', 'vscf-label', 'vscf-label-section' );
	register_setting( 'vscf-label-options', 'vscf-setting-31', array( 'sanitize_callback' => 'sanitize_text_field' ) );	

	add_settings_field( 'vscf-field-14', esc_html__( 'Privacy', 'very-simple-contact-form' ).' - '.esc_html__( 'Error', 'very-simple-contact-form' ), 'vscf_field_callback_14', 'vscf-label', 'vscf-label-section' );
	register_setting( 'vscf-label-options', 'vscf-setting-14', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	// message section
	add_settings_section( 'vscf-message-section', esc_html__( 'Messages', 'very-simple-contact-form' ), '', 'vscf-message' );

	add_settings_field( 'vscf-field-16', esc_html__( 'Form', 'very-simple-contact-form' ), 'vscf_field_callback_16', 'vscf-message', 'vscf-message-section' );
	register_setting( 'vscf-message-options', 'vscf-setting-16', array( 'sanitize_callback' => 'wp_kses_post' ) );

	add_settings_field( 'vscf-field-17', esc_html__( 'Email', 'very-simple-contact-form' ), 'vscf_field_callback_17', 'vscf-message', 'vscf-message-section' );
	register_setting( 'vscf-message-options', 'vscf-setting-17', array( 'sanitize_callback' => 'wp_kses_post' ) );
}
add_action( 'admin_init', 'vscf_admin_init' );

// general section callbacks
function vscf_field_callback_1() {
	$value = get_option( 'vscf-setting-1' );
	?>
	<input type="hidden" name="vscf-setting-1" value="no">
	<label><input type="checkbox" name="vscf-setting-1" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Do not delete form submissions and settings when uninstalling plugin.', 'very-simple-contact-form' ); ?></label>
	<?php
}

function vscf_field_callback_22() {
	$placeholder = get_option( 'admin_email' );
	$value = get_option( 'vscf-setting-22' );
	?>
	<input type="text" size="40" name="vscf-setting-22" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php esc_html_e( 'Form submissions can be sent to a maximum of 5 email addresses.', 'very-simple-contact-form' ); ?></p>
	<p><?php esc_html_e( 'Use a comma to separate multiple email addresses.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_28() {
	$value = get_option( 'vscf-setting-28' );
	?>
	<input type="hidden" name="vscf-setting-28" value="no">
	<label><input type="checkbox" name="vscf-setting-28" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Disable email sending.', 'very-simple-contact-form' ); ?></label>
	<p><?php esc_html_e( 'Disable email sending if you only want to list form submissions in dashboard.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_3() {
	$value = get_option( 'vscf-setting-3' );
	?>
	<input type="hidden" name="vscf-setting-3" value="no">
	<label><input type="checkbox" name="vscf-setting-3" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Activate auto-reply email to sender.', 'very-simple-contact-form' ); ?></label>
	<?php
}

function vscf_field_callback_35() {
	$blog_name = htmlspecialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES );
	if ( get_option( 'vscf-setting-23' ) == 'yes' ) {
		$placeholder = $blog_name.' - '.__( 'Form submission', 'very-simple-contact-form' );
	} else {
		$placeholder = $blog_name.' - '.__( 'Subject from sender', 'very-simple-contact-form' );
	}
	$value = get_option( 'vscf-setting-35' );
	?>
	<input type="text" size="40" name="vscf-setting-35" maxlength="100" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php esc_html_e( 'Subject for the email.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_15() {
	$blog_name = htmlspecialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES );
	if ( get_option( 'vscf-setting-23' ) == 'yes' ) {
		$placeholder = $blog_name.' - '.__( 'Form submission', 'very-simple-contact-form' );
	} else {
		$placeholder = $blog_name.' - '.__( 'Subject from sender', 'very-simple-contact-form' );
	}
	$value = get_option( 'vscf-setting-15' );
	?>
	<input type="text" size="40" name="vscf-setting-15" maxlength="100" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php esc_html_e( 'Subject for the auto-reply email to sender.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_2() {
	$value = get_option( 'vscf-setting-2' );
	?>
	<input type="hidden" name="vscf-setting-2" value="no">
	<label><input type="checkbox" name="vscf-setting-2" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'List form submissions in dashboard.', 'very-simple-contact-form' ); ?></label>
	<?php
}

function vscf_field_callback_27() {
	$value = get_option( 'vscf-setting-27' );
	?>
	<input type="hidden" name="vscf-setting-27" value="no">
	<label><input type="checkbox" name="vscf-setting-27" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Hide labels and use placeholders instead.', 'very-simple-contact-form' ); ?></label>
	<p><?php esc_html_e( 'Labels remain available for screen readers.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_32() {
	$placeholder = '100';
	$value = get_option( 'vscf-setting-32' );
	?>
	<input type="number" min="10" size="40" name="vscf-setting-32" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php printf( esc_html__( 'Default value is %s.', 'very-simple-contact-form' ), '100' ); ?>
	<p><?php esc_html_e( 'Limit input by using the maxlength attribute.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_33() {
	$placeholder = '10000';
	$value = get_option( 'vscf-setting-33' );
	?>
	<input type="number" min="10" size="40" name="vscf-setting-33" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php printf( esc_html__( 'Default value is %s.', 'very-simple-contact-form' ), '10000' ); ?>
	<p><?php esc_html_e( 'Limit input by using the maxlength attribute.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_19() {
	$value = get_option( 'vscf-setting-19' );
	?>
	<input type="hidden" name="vscf-setting-19" value="no">
	<label><input type="checkbox" name="vscf-setting-19" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Disable collection of IP address.', 'very-simple-contact-form' ); ?></label>
	<?php
}

function vscf_field_callback_21() {
	$value = get_option( 'vscf-setting-21' );
	?>
	<input type="hidden" name="vscf-setting-21" value="no">
	<label><input type="checkbox" name="vscf-setting-21" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Scroll back to form position after submit.', 'very-simple-contact-form' ); ?></label>
	<?php
}

function vscf_field_callback_34() {
	$value = get_option( 'vscf-setting-34' );
	?>
	<input type="hidden" name="vscf-setting-34" value="no">
	<label><input type="checkbox" name="vscf-setting-34" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Display validation errors of anti-spam features.', 'very-simple-contact-form' ); ?></label>
	<p><?php esc_html_e( 'Errors are displayed underneath form after submit button is clicked.', 'very-simple-contact-form' ); ?></p>
	<?php
}

// spam section callbacks
function vscf_field_callback_29() {
	$value = get_option( 'vscf-setting-29' );
	?>
	<input type="text" size="40" name="vscf-setting-29" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php esc_html_e( 'Disallow banned words in form submissions.', 'very-simple-contact-form' ); ?></p>
	<p><?php esc_html_e( 'Use a comma to separate multiple words.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_30() {
	$value = get_option( 'vscf-setting-30' );
	?>
	<input type="hidden" name="vscf-setting-30" value="no">
	<label><input type="checkbox" name="vscf-setting-30" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Ignore form submissions with banned words.', 'very-simple-contact-form' ); ?></label>
	<p><?php esc_html_e( 'You can activate this if you receive a lot of spam.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_25() {
	$value = get_option( 'vscf-setting-25' );
	?>
	<select id="vscf-setting-25" name="vscf-setting-25">
		<option value="allow" <?php echo ( $value == 'allow' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Allow', 'very-simple-contact-form' ); ?></option>
		<option value="disallow" <?php echo ( $value == 'disallow' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Disallow', 'very-simple-contact-form' ); ?></option>
		<option value="one" <?php echo ( $value == 'one' ) ? 'selected' : ''; ?>><?php esc_html_e( 'One', 'very-simple-contact-form' ); ?></option>
	</select>
	<?php printf( esc_html__( 'Default value is %s.', 'very-simple-contact-form' ), esc_html__( 'Allow', 'very-simple-contact-form' ) ); ?>
	<p><?php esc_html_e( 'Allow or disallow links in Message field.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_38() {
	$value = get_option( 'vscf-setting-38' );
	?>
	<input type="hidden" name="vscf-setting-38" value="no">
	<label><input type="checkbox" name="vscf-setting-38" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Ignore form submissions if Message field does not accept links.', 'very-simple-contact-form' ); ?></label>
	<p><?php esc_html_e( 'You can activate this if you receive a lot of spam.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_36() {
	$value = get_option( 'vscf-setting-36' );
	?>
	<select id="vscf-setting-36" name="vscf-setting-36">
		<option value="allow" <?php echo ( $value == 'allow' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Allow', 'very-simple-contact-form' ); ?></option>
		<option value="disallow" <?php echo ( $value == 'disallow' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Disallow', 'very-simple-contact-form' ); ?></option>
	</select>
	<?php printf( esc_html__( 'Default value is %s.', 'very-simple-contact-form' ), esc_html__( 'Allow', 'very-simple-contact-form' ) ); ?>
	<p><?php esc_html_e( 'Allow or disallow email addresses in Message field.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_39() {
	$value = get_option( 'vscf-setting-39' );
	?>
	<input type="hidden" name="vscf-setting-39" value="no">
	<label><input type="checkbox" name="vscf-setting-39" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Ignore form submissions if Message field does not accept email addresses.', 'very-simple-contact-form' ); ?></label>
	<p><?php esc_html_e( 'You can activate this if you receive a lot of spam.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_40() {
	$placeholder = '5';
	$value = get_option( 'vscf-setting-40' );
	?>
	<input type="number" min="5" max="60" size="10" name="vscf-setting-40" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php printf( esc_html__( 'Default value is %s.', 'very-simple-contact-form' ), '5' ); ?>
	<p><?php esc_html_e( 'Minimum time in seconds between page load and form submission.', 'very-simple-contact-form' ); ?></p>
	<?php
}

// field section callbacks
function vscf_field_callback_23() {
	$value = get_option( 'vscf-setting-23' );
	?>
	<input type="hidden" name="vscf-setting-23" value="no">
	<label><input type="checkbox" name="vscf-setting-23" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Disable', 'very-simple-contact-form' ); ?></label>
	<?php
}

function vscf_field_callback_24() {
	$value = get_option( 'vscf-setting-24' );
	?>
	<input type="hidden" name="vscf-setting-24" value="no">
	<label><input type="checkbox" name="vscf-setting-24" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Disable', 'very-simple-contact-form' ); ?></label>
	<p><?php esc_html_e( 'This field is part of the anti-spam features.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_4() {
	$value = get_option( 'vscf-setting-4' );
	?>
	<input type="hidden" name="vscf-setting-4" value="no">
	<label><input type="checkbox" name="vscf-setting-4" <?php checked( esc_attr( $value ), 'yes' ); ?> value="yes"> <?php esc_html_e( 'Disable', 'very-simple-contact-form' ); ?></label>
	<?php
}

// label section callbacks
function vscf_field_callback_5() {
	$placeholder = __( 'Name', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-5' );
	?>
	<input type="text" size="40" name="vscf-setting-5" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vscf_field_callback_6() {
	$placeholder = __( 'Email', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-6' );
	?>
	<input type="text" size="40" name="vscf-setting-6" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vscf_field_callback_7() {
	$placeholder = __( 'Subject', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-7' );
	?>
	<input type="text" size="40" name="vscf-setting-7" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vscf_field_callback_9() {
	$placeholder = __( 'Message', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-9' );
	?>
	<input type="text" size="40" name="vscf-setting-9" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vscf_field_callback_18() {
	$placeholder = __( 'I consent to having this website collect my personal data via this form.', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-18' );
	?>
	<textarea name="vscf-setting-18" rows="5" cols="50" maxlength="500" style="min-width:50%;" placeholder="<?php echo esc_attr( $placeholder ); ?>"><?php echo wp_kses_post( $value ); ?></textarea>
	<p><?php esc_html_e( 'This field accepts HTML markup.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_10() {
	$placeholder = __( 'Submit', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-10' );
	?>
	<input type="text" size="40" name="vscf-setting-10" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vscf_field_callback_11() {
	$placeholder = __( 'Please enter at least 2 characters', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-11' );
	?>
	<input type="text" size="40" name="vscf-setting-11" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vscf_field_callback_13() {
	$placeholder = __( 'Please enter a valid email', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-13' );
	?>
	<input type="text" size="40" name="vscf-setting-13" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vscf_field_callback_20() {
	$placeholder = __( 'Please enter at least 2 characters', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-20' );
	?>
	<input type="text" size="40" name="vscf-setting-20" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vscf_field_callback_26() {
	$placeholder = __( 'Please enter the correct result', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-26' );
	?>
	<input type="text" size="40" name="vscf-setting-26" placeholder="<?php echo esc_attr( $placeholder ); ?>' value="<?php echo esc_attr( $value ); ?>' />
	<?php
}

function vscf_field_callback_12() {
	$placeholder = __( 'Please enter at least 10 characters', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-12' );
	?>
	<input type="text" size="40" name="vscf-setting-12" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vscf_field_callback_8() {
	$placeholder = __( 'Please remove links', 'very-simple-contact-form' );
	if ( get_option( 'vscf-setting-25' ) == 'one' ) {
		$label = __( 'More than 1 link is not allowed.', 'very-simple-contact-form' );
	} else {
		$label = __( 'Links are not allowed.', 'very-simple-contact-form' );
	}
	$value = get_option( 'vscf-setting-8' );
	?>
	<input type="text" size="40" name="vscf-setting-8" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php echo esc_html( $label ); ?></p>
	<?php
}

function vscf_field_callback_37() {
	$placeholder = __( 'Please remove email addresses', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-37' );
	?>
	<input type="text" size="40" name="vscf-setting-37" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<p><?php esc_html_e( 'Email addresses are not allowed.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_31() {
	$placeholder = __( 'Please remove banned words', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-31' );
	?>
	<input type="text" size="40" name="vscf-setting-31" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

function vscf_field_callback_14() {
	$placeholder = __( 'Please give your consent', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-14' );
	?>
	<input type="text" size="40" name="vscf-setting-14" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

// message section callbacks
function vscf_field_callback_16() {
	$placeholder = __( 'Thank you! You will receive a response as soon as possible.', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-16' );
	?>
	<textarea name="vscf-setting-16" rows="8" cols="50" maxlength="2000" style="min-width:50%;" placeholder="<?php echo esc_attr( $placeholder ); ?>"><?php echo wp_kses_post( $value ); ?></textarea>
	<p><?php esc_html_e( 'Displayed when sending succeeds.', 'very-simple-contact-form' ); ?></p>
	<p><?php esc_html_e( 'This field accepts HTML markup.', 'very-simple-contact-form' ); ?></p>
	<?php
}

function vscf_field_callback_17() {
	$placeholder = __( 'Thank you! You will receive a response as soon as possible.', 'very-simple-contact-form' );
	$value = get_option( 'vscf-setting-17' );
	?>
	<textarea name="vscf-setting-17" rows="8" cols="50" maxlength="2000" style="min-width:50%;" placeholder="<?php echo esc_attr( $placeholder ); ?>"><?php echo wp_kses_post( $value ); ?></textarea>
	<p><?php esc_html_e( 'Displayed in the auto-reply email to sender.', 'very-simple-contact-form' ); ?></p>
	<?php
}

// display admin options page
function vscf_options_page() {
?>
<div class="wrap">
	<h1><?php esc_html_e( 'VS Contact Form', 'very-simple-contact-form' ); ?></h1>
	<?php $active_tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'general_options'; ?>
	<h2 class="nav-tab-wrapper">
		<a href="?page=vscf&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'General', 'very-simple-contact-form' ); ?></a>
		<a href="?page=vscf&tab=spam_options" class="nav-tab <?php echo $active_tab == 'spam_options' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Anti-spam', 'very-simple-contact-form' ); ?></a>
		<a href="?page=vscf&tab=field_options" class="nav-tab <?php echo $active_tab == 'field_options' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Fields', 'very-simple-contact-form' ); ?></a>
		<a href="?page=vscf&tab=label_options" class="nav-tab <?php echo $active_tab == 'label_options' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Labels', 'very-simple-contact-form' ); ?></a>
		<a href="?page=vscf&tab=message_options" class="nav-tab <?php echo $active_tab == 'message_options' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Messages', 'very-simple-contact-form' ); ?></a>
	</h2>
	<form action="options.php" method="POST">
		<?php if ( $active_tab == 'general_options' ) {
			settings_fields( 'vscf-general-options' );
			do_settings_sections( 'vscf-general' );
		} elseif ( $active_tab == 'spam_options' ) {
			settings_fields( 'vscf-spam-options' );
			do_settings_sections( 'vscf-spam' );
		} elseif ( $active_tab == 'field_options' ) {
			settings_fields( 'vscf-field-options' );
			do_settings_sections( 'vscf-field' );
		} elseif ( $active_tab == 'label_options' ) {
			settings_fields( 'vscf-label-options' );
			do_settings_sections( 'vscf-label' );
		} else {
			settings_fields( 'vscf-message-options' );
			do_settings_sections( 'vscf-message' );
		}
		submit_button(); ?>
	</form>
	<p><?php esc_html_e( 'You can also use attributes to customize your contact form.', 'very-simple-contact-form' ); ?></p>
	<p><?php esc_html_e( 'For info and available attributes', 'very-simple-contact-form' ); ?> <?php echo '<a href="https://wordpress.org/plugins/very-simple-contact-form" rel="noopener noreferrer" target="_blank">'.esc_html__( 'click here', 'very-simple-contact-form' ).'</a>'; ?>.</p>
</div>
<?php
}
