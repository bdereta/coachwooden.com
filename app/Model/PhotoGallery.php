<?php
App::uses('AppModel', 'Model');
/**
 * PhotoGallery Model
 *
 */
class PhotoGallery extends AppModel {


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
		'image' => array( //database field name
			'label' => 'Image',
			'resize' => array(
				'width' => 1600, //max width - if image is less than set witdth, it will remain the same width
				'height' => 800, //max height  - if image is less than set height, it will remain the same height
			),
			'crop' => array(
				'width' => 1196,
				'height' => 746				
			),
		),
	);
	
	public $validate = array(
		'image' => array(
            'file_type' => array('rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')), 'message' => 'Please supply a valid image.'),
        ),
	);


}
