<?php
App::uses('AppModel', 'Model');
/**
 * AwardPhoto Model
 *
 */
class AwardPhoto extends AppModel {


/**
 * Upload Images
 *
 */
	
	public $uploadImages = array(
		//database field name
		'image_large' => array( 
			'multiple' => false, //can only be used with resize (no cropping!)
			//use existing image source to create this image.
			//'source' => 'sources_image_field_name', 
			//max width/height - if image is less than set width/height, it will remain the same width/height
			'resize' => array(	
				'width' => 1600, 
				'height' => 800, 
			),
		),
		'image_thumb' => array( 
			'multiple' => false, //can only be used with resize (no cropping!)
			'source' => 'image_large', //use image_large source to create this image.
			'label' => 'Image',
			//use existing image source to create this image.
			//'source' => 'sources_image_field_name', 
			//max width/height - if image is less than set width/height, it will remain the same width/height
			'resize' => array(	
				'width' => 1600, 
				'height' => 800, 
			),
			'crop' => array(
				'width' => 305,
				'height' => 254				
			),
		),
	);
	
	public $validate = array(
		'image_large' => array(
			'file_type' => array('rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')), 'message' => 'Please supply a valid image.')
		),
		'image_thumb' => array(
			'file_type' => array('rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')), 'message' => 'Please supply a valid image.')
		),
	);
}
