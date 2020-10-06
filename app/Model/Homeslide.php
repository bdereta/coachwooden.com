<?php
App::uses('AppModel', 'Model');
/**
 * Homeslide Model
 *
 */
class Homeslide extends AppModel {


/**
 * Upload Images
 *
 */
	
	public $uploadImages = array(
		//database field name
		'image' => array( 
			'multiple' => false, //can only be used with resize (no cropping!)
			'label' => 'Image',
			//use existing image source to create this image.
			//'source' => 'sources_image_field_name', 
			//max width/height - if image is less than set width/height, it will remain the same width/height
			'resize' => array(	
				'width' => 1600, 
				'height' => 800, 
			),
			'crop' => array(
				'width' => 1196,
				'height' => 565				
			),
		),
	);
	
	public $validate = array(
		'image' => array(
			'file_type' => array('rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')), 'message' => 'Please supply a valid image.')
		),
	);
}
