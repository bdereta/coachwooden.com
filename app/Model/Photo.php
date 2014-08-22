<?php
App::uses('AppModel', 'Model');
/**
 * Photo Model
 *
 * @property Album $Album
 */
class Photo extends AppModel {


/**
 * Upload Images
 *
 * Options:
 	 (1) Upload image (unmodified), 
	 (2) Upload and crop, 
	 (3) Upload and resize image, but only if the image is widder, higher dimensions that the set numbers
	 (4) Upload, resize, crop
 * @column string [required] - name of the corresponding database table column name ('image_large')
 * @label string  [optional] - if set, it will add a custom label next to the form file input field ('Select Large Image')
 * @source string [optional] - if set, column will reuse the image of another column ('image_large')
 * @resize array('width', 'height') [optional] - if set, the image will be resized if it's larger than the set width/height. You can set
 * @crop array('width', 'height') [optional] - if set, the image will be send to cropping after it's resized (if set)
 */
	
	public $uploadImages = array(
		//database field name
		'image' => array( 
			//use existing image source to create this image.
			//'source' => 'image_large', 
			'label' => 'Image',
			//upload multiple photos
			'multiple' => true,
			/*'resize' => array(
				'width' => 300, //max width - if image is less than set witdth, it will remain the same width
				'height' => 300, //max height  - if image is less than set height, it will remain the same height
			),
			'crop' => array(
				'width' => 800,
				'height' => 600		
			),*/
		),
	);
	
	public $validate = array(
		'image' => array(
			'file_type' => array('rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')), 'message' => 'Please supply a valid image.')
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Album' => array(
			'className' => 'Album',
			'foreignKey' => 'album_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
