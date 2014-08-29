<?php
App::uses('AppModel', 'Model');
/**
 * Book Model
 *
 */
class Book extends AppModel {


/**
 * Upload Images
 *
 */
	
	public $uploadImages = array(
		//database field name
		'image_large' => array( 
			'multiple' => false, //can only be used with resize (no cropping!)
			'label' => 'Image',
			//use existing image source to create this image.
			//'source' => 'sources_image_field_name', 
			//max width/height - if image is less than set width/height, it will remain the same width/height
			'resize' => array(	
				'width' => 1600, 
				'height' => 800, 
			),
		),
		'image_thumb' => array( //database field name
			'source' => 'image_large', //use image_large source to create this image.
			'resize' => array(
				'width' => 800, //max width - if image is less than set witdth, it will remain the same width
				'height' => 1200, //max height  - if image is less than set height, it will remain the same height
			),
			'crop' => array(
				'width' => 286,
				'height' => 425			
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
