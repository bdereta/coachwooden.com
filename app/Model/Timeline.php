<?php
App::uses('AppModel', 'Model');
/**
 * Timeline Model
 *
 */
class Timeline extends AppModel {


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
				'width' => 341, 
				'height' => 351, 
			),
		),
	);
	
	public $validate = array(
		'image' => array(
			'file_type' => array('rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')), 'message' => 'Please supply a valid image.')
		),
	);
}
