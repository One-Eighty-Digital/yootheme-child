
<?php // @codingStandardsIgnoreLine: No header please.

if ( 0 === $props['form'] ) {
	echo wp_kses( 'Please select a form', 'oe-forms' );
	return;
}

$hide_title = false;

$form = "[gravityform id=\"{$props['form']}\"]";
echo do_shortcode( $form );

