<?php
/**
* @package AZ
* @subpackage AZ
 */

if(function_exists("register_field_group"))
{   

register_field_group(array (
		'id' => 'acf_home',
		'title' => 'Homepage',
		'fields' => array (
			array (
				'key' => 'subhead',
				'label' => 'Title Sub Header',
				'name' => 'title_sub_header_list',
				'type' => 'text',
				'default_value' => 'Homepage',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'valueList',
				'label' => 'Value Title',
				'name' => 'valuetitle',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'valueTitle',
						'label' => 'Value Prop Title',
						'name' => 'value_prop_title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => 'Title of Value',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					
					array (
						'key' => 'ValueParagraph',
						'label' => 'Value Prop Paragraph',
						'name' => 'value_prop_paragraph',
						'type' => 'text',
						'column_width' => '',
						'default_value' => 'Paragraph for Value Prop',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),

         

					array (
						'key' => 'ValueItem',
						'label' => 'Value Prop',
						'name' => 'valueProp',
						'type' => 'repeater',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'ValueName',
								'label' => 'Value Name',
								'name' => 'value_name',
								'type' => 'text',
								'column_width' => '',
								'default_value' => 'Title of Thing',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'ValueIcon',
								'label' => 'Service Icon',
								'name' => 'service_icon',
								'type' => 'select',
								'column_width' => '',
								'choices' => array (
                    'icon-home' => 'icon-home',
                    'icon-money' => 'icon-money',

                         	),
								'default_value' => 'icon-home',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'ValueDesc',
								'label' => 'Service Description',
								'name' => 'service_description',
								'type' => 'textarea',
								'column_width' => '',
								'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, esse, inventore, magnam et earum ducimus corrupti',
								'placeholder' => '',
								'maxlength' => '',
								'rows' => '',
								'formatting' => 'br',
							),
						),
						'row_min' => 0,
						'row_limit' => '',
						'layout' => 'row',
						'button_label' => 'Add Row',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Row',
			),

		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'pagetemplate/homepage.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'discussion',
				3 => 'comments',
				4 => 'revisions',
			   	5 => 'author',
				6 => 'format',
				7 => 'categories',
				8 => 'tags',
				9 => 'send-trackbacks',
			),
		),
		'menu_order' => 2,
	));

	    
    }   // end on file
?>