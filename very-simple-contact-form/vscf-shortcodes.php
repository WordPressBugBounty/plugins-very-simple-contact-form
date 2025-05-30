<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// shortcode for page
function vscf_shortcode( $vscf_atts ) {
	// include variables
	include 'vscf-variables.php';

	// set form nonce
	$vscf_nonce_field = wp_nonce_field( 'vscf_nonce_action', 'vscf_nonce', true, false );

	// set name and id of submit button
	$submit_name = 'vscf_send_'.$rand_suffix.'';
	$submit_id = 'vscf_send';

	// set form class
	if ( empty( $vscf_atts['class'] ) ) {
		$custom_class = '';
	} else {
		$custom_class = ' '.$vscf_atts['class'];
	}
	$form_class = 'vscf-shortcode'.$custom_class.'';

	// processing form
	if ( isset( $_SERVER['REQUEST_METHOD'] ) && ( $_SERVER['REQUEST_METHOD'] == 'POST' ) && isset( $_POST['vscf_send_'.$rand_suffix.''] ) ) {
		// validate form nonce
		$value_nonce = sanitize_text_field( $_POST['vscf_nonce'] );
		if ( ! wp_verify_nonce( $value_nonce, 'vscf_nonce_action' ) ) {
			$error_class['form_nonce'] = true;
			$error = true;
		}
		// set input values
		if ( ( $disable_subject != 'yes' ) && isset( $_POST['vscf_subject_'.$rand_suffix.''] ) ) {
			$subject_value = $_POST['vscf_subject_'.$rand_suffix.''];
		} else {
			$subject_value = '';
		}
		if ( ( $disable_privacy != 'yes' ) && isset( $_POST['vscf_privacy_'.$rand_suffix.''] ) ) {
			$privacy_value = $_POST['vscf_privacy_'.$rand_suffix.''];
		} else {
			$privacy_value = '';
		}
		// sanitize input
		$post_data = array(
			'form_name' => sanitize_text_field( $_POST['vscf_name_'.$rand_suffix.''] ),
			'form_email' => sanitize_email( $_POST['vscf_email_'.$rand_suffix.''] ),
			'form_subject' => sanitize_text_field( $subject_value ),
			'form_sum' => sanitize_text_field( $_POST['vscf_sum_'.$rand_suffix.''] ),
			'form_message' => sanitize_textarea_field( $_POST['vscf_message_'.$rand_suffix.''] ),
			'form_privacy' => sanitize_key( $privacy_value ),
			'form_first_random' => sanitize_text_field( $_POST['vscf_first_random_'.$rand_suffix.''] ),
			'form_second_random' => sanitize_text_field( $_POST['vscf_second_random_'.$rand_suffix.''] ),
			'form_time' => sanitize_text_field( $_POST['vscf_time_'.$rand_suffix.''] )
		);

		// include validation
		include 'vscf-validate.php';

		// include sending and saving form submission
		include 'vscf-submission.php';
	}

	// include form
	include 'vscf-form.php';

	// after form validation
	if ( $sent == true ) {
		delete_transient( $transient_name );
		return '<script>window.location="'.vscf_redirect_success().'"</script>';
	} elseif ( $fail == true ) {
		delete_transient( $transient_name );
		return '<script>window.location="'.vscf_redirect_error().'"</script>';
	}

	// display form or the result of submission
	if ( isset( $_GET['vscf-sh'] ) ) {
		if ( sanitize_key( $_GET['vscf-sh'] ) == 'success' ) {
			return $anchor_begin.'<div class="vscf-info">'.wp_kses_post( wpautop( $thank_you_message ) ).'</div>'.$anchor_end;
		} elseif ( sanitize_key( $_GET['vscf-sh'] ) == 'fail' ) {
			return $anchor_begin.'<div class="vscf-info">'.esc_html__( 'Error: could not send form', 'very-simple-contact-form' ).'</div>'.$anchor_end;
		}
	} else {
		if ( $error == true ) {
			return $anchor_begin .$email_form. $anchor_end;
		} else {
			return $email_form;
		}
	}
}
add_shortcode( 'contact', 'vscf_shortcode' );

// shortcode for widget
function vscf_widget_shortcode( $vscf_atts ) {
	// include variables
	include 'vscf-variables.php';

	// set form nonce
	$vscf_nonce_field = wp_nonce_field( 'vscf_nonce_action', 'vscf_widget_nonce', true, false );

	// set name and id of submit button
	$submit_name = 'vscf_widget_send_'.$rand_suffix.'';
	$submit_id = 'vscf_widget_send';

	// set form class
	if ( empty( $vscf_atts['class'] ) ) {
		$custom_class = '';
	} else {
		$custom_class = ' '.$vscf_atts['class'];
	}
	$form_class = 'vscf-widget'.$custom_class.'';

	// processing form
	if ( isset( $_SERVER['REQUEST_METHOD'] ) && ( $_SERVER['REQUEST_METHOD'] == 'POST' ) && isset( $_POST['vscf_widget_send_'.$rand_suffix.''] ) ) {
		// validate form nonce
		$value_nonce = sanitize_text_field( $_POST['vscf_widget_nonce'] );
		if ( ! wp_verify_nonce( $value_nonce, 'vscf_nonce_action' ) ) {
			$error_class['form_nonce'] = true;
			$error = true;
		}
		// set input values
		if ( ( $disable_subject != 'yes' ) && isset( $_POST['vscf_subject_'.$rand_suffix.''] ) ) {
			$subject_value = $_POST['vscf_subject_'.$rand_suffix.''];
		} else {
			$subject_value = '';
		}
		if ( ( $disable_privacy != 'yes' ) && isset( $_POST['vscf_privacy_'.$rand_suffix.''] ) ) {
			$privacy_value = $_POST['vscf_privacy_'.$rand_suffix.''];
		} else {
			$privacy_value = '';
		}
		// sanitize input
		$post_data = array(
			'form_name' => sanitize_text_field( $_POST['vscf_name_'.$rand_suffix.''] ),
			'form_email' => sanitize_email( $_POST['vscf_email_'.$rand_suffix.''] ),
			'form_subject' => sanitize_text_field( $subject_value ),
			'form_sum' => sanitize_text_field( $_POST['vscf_sum_'.$rand_suffix.''] ),
			'form_message' => sanitize_textarea_field( $_POST['vscf_message_'.$rand_suffix.''] ),
			'form_privacy' => sanitize_key( $privacy_value ),
			'form_first_random' => sanitize_text_field( $_POST['vscf_first_random_'.$rand_suffix.''] ),
			'form_second_random' => sanitize_text_field( $_POST['vscf_second_random_'.$rand_suffix.''] ),
			'form_time' => sanitize_text_field( $_POST['vscf_time_'.$rand_suffix.''] )
		);

		// include validation
		include 'vscf-validate.php';

		// include sending and saving form submission
		include 'vscf-submission.php';
	}

	// include form
	include 'vscf-form.php';

	// after form validation
	if ( $sent == true ) {
		delete_transient( $transient_name );
		return '<script>window.location="'.vscf_widget_redirect_success().'"</script>';
	} elseif ( $fail == true ) {
		delete_transient( $transient_name );
		return '<script>window.location="'.vscf_widget_redirect_error().'"</script>';
	}

	// display form or the result of submission
	if ( isset( $_GET['vscf-wi'] ) ) {
		if ( sanitize_key( $_GET['vscf-wi'] ) == 'success' ) {
			return $anchor_begin.'<div class="vscf-info">'.wp_kses_post( wpautop( $thank_you_message ) ).'</div>'.$anchor_end;
		} elseif ( sanitize_key( $_GET['vscf-wi'] ) == 'fail' ) {
			return $anchor_begin.'<div class="vscf-info">'.esc_html__( 'Error: could not send form', 'very-simple-contact-form' ).'</div>'.$anchor_end;
		}
	} else {
		if ( $error == true ) {
			return $anchor_begin .$email_form. $anchor_end;
		} else {
			return $email_form;
		}
	}
}
add_shortcode( 'contact-widget', 'vscf_widget_shortcode' );
