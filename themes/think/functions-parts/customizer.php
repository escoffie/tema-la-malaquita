<?php

// Customizer & theme support

function think_theme_support()
{
	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'think_theme_support');

// Add custom fields to customizer
if (!function_exists('think_customizer_register')) :
	function think_customizer_register($wp_customize)
	{

		// Contact fields settings
		$wp_customize->add_setting('contact_email', array('default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'think_sanitize_email'));
		$wp_customize->add_setting('contact_phone', array('default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'think_sanitize_text'));
		$wp_customize->add_setting('contact_mobile', array('default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'think_sanitize_text'));
		$wp_customize->add_setting('contact_whatsapp', array('default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'think_sanitize_text'));
		$wp_customize->add_setting('contact_url', array('default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'think_sanitize_url'));
		$wp_customize->add_setting('contact_address', array('default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'think_sanitize_textarea'));
		$wp_customize->add_setting('contact_open', array('default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'think_sanitize_textarea'));

		// Contact fields section
		$wp_customize->add_section('contact_section', array(
			'title' => __('Datos de contacto', 'think'),
			'priority' => 30,
		));

		// Contact fields controls
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			'contact_email',
			array(
				'label' => __('Correo electrónico', 'think'),
				'section' => 'contact_section',
				'settings' => 'contact_email',
				'type' => 'email'
			)
		));

		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			'contact_phone',
			array(
				'label' => __('Teléfono', 'think'),
				'section' => 'contact_section',
				'settings' => 'contact_phone',
				'type' => 'text'
			)
		));

		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			'contact_mobile',
			array(
				'label' => __('Teléfono móvil', 'think'),
				'section' => 'contact_section',
				'settings' => 'contact_mobile',
				'type' => 'text'
			)
		));

		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			'contact_whatsapp',
			array(
				'label' => __('Whatsapp', 'think'),
				'section' => 'contact_section',
				'settings' => 'contact_whatsapp',
				'type' => 'text'
			)
		));

		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			'contact_url',
			array(
				'label' => __('URL de contacto', 'think'),
				'section' => 'contact_section',
				'settings' => 'contact_url',
				'type' => 'url'
			)
		));

		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			'contact_address',
			array(
				'label' => __('Dirección postal', 'think'),
				'section' => 'contact_section',
				'settings' => 'contact_address',
				'type' => 'textarea'
			)
		));

		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			'contact_open',
			array(
				'label' => __('Horario de atención', 'think'),
				'section' => 'contact_section',
				'settings' => 'contact_open',
				'type' => 'textarea'
			)
		));
	}
endif;
add_action('customize_register', 'think_customizer_register');

function encode_email($e)
{
	$output = '';
	for ($i = 0; $i < strlen($e); $i++) {
		$output .= '&#' . ord($e[$i]) . ';';
	}
	return $output;
}

function think_sanitize_email($url)
{
	return sanitize_email($url);
}

function think_sanitize_url($url)
{
	return esc_url_raw($url);
}

function think_sanitize_text($url)
{
	return sanitize_text_field($url);
}

function think_sanitize_textarea($url)
{
	return sanitize_textarea_field($url);
}

function contactShortcode($atts)
{
	$a = shortcode_atts(array(
		'type' => 'email',
		'fa-icon' => '',
		'content' => '',
		'text-only' => false,
	), $atts);
	$content = get_theme_mod('contact_' . $a['type']);
	if ($a['text-only']) {
		return $content;
	}
	if ($a['content'] != '') {
		$content = $a['content'];
	}
	if ($a['fa-icon'] != '') {
		$fa = '<i class="fa fa-fw fa-' . $a['fa-icon'] . '"></i> ';
	}
	if ($a['type'] == 'email') {
		return '<a href="mailto:' . encode_email(get_theme_mod('contact_' . $a['type'])) . '">' . $fa . encode_email($content) . '</a>';
	}
	if ($a['type'] == 'phone' or $a['type'] == 'mobile') {
		return '<a href="tel:' . get_theme_mod('contact_' . $a['type']) . '">' . $fa . $content . '</a>';
	}
	if ($a['type'] == 'whatsapp') {
		$newWindow = (wp_is_mobile()) ? '' : 'target="_blank"';
		return '<a ' . $newWindow . ' href="https://api.whatsapp.com/send?phone=' . preg_replace('/[^0-9]/', '', get_theme_mod('contact_' . $a['type'])) . '">' . $fa . $content . '</a>';
	}
	if ($a['type'] == 'url') {
		return '<a href="' . get_theme_mod('contact_' . $a['type']) . '" target="_blank">' . $fa . $content . '</a>';
	}
	return $fa . $content;
}

add_shortcode('think-contact', 'contactShortcode');
