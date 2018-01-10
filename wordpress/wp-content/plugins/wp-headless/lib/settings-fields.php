<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_5a5665219203a',
	'title' => 'Content',
	'fields' => array (
		array (
			'key' => 'field_5a5665256b64e',
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
			'key' => 'field_5a5665476b64f',
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
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add Content',
			'sub_fields' => array (
				array (
					'key' => 'field_5a5665506b650',
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
					'key' => 'field_5a5665616b651',
					'label' => 'Content',
					'name' => 'content',
					'type' => 'relationship',
					'instructions' => 'Search through your content and select what content you want in your file.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array (
					),
					'filters' => array (
						0 => 'search',
						1 => 'post_type'
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