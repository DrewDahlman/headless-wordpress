<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_5a566a8990b00',
	'title' => 'Content',
	'fields' => array (
		array (
			'key' => 'field_5a566ad0e0169',
			'label' => 'Destination',
			'name' => 'destination',
			'type' => 'text',
			'instructions' => 'When you upload the file your s3 bucket where would you like the file to go? ( example: data )',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5a566ae5e016a',
			'label' => 'Content',
			'name' => 'content',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 0,
			'layout' => 'block',
			'button_label' => '',
			'sub_fields' => array (
				array (
					'key' => 'field_5a566aede016b',
					'label' => 'File Name',
					'name' => 'file_name',
					'type' => 'text',
					'instructions' => 'The name of the file when it\'s uploaded.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5a566b0ee016c',
					'label' => 'Content',
					'name' => 'content',
					'type' => 'relationship',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array (
					),
					'taxonomy' => array (
					),
					'filters' => array (
						0 => 'search',
						1 => 'post_type',
					),
					'elements' => '',
					'min' => '',
					'max' => '',
					'return_format' => 'object',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'publish-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
?>