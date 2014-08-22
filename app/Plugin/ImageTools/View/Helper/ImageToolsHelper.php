<?php

class ImageToolsHelper extends AppHelper {	

	public $helpers = array('Form','Html');

	public function uploadImages($params = array(), $output = null) {
		if (!empty($params['uploadImages'])) {
			foreach($params['uploadImages'] as $fieldname=>$action){
				$options = array('type'=>'file');
				if (array_key_exists('label', $action)) {
					$options['label'] = 'Upload Image';	
				}
				if (!array_key_exists('source', $action)) {
					//display existing image
					if (array_key_exists('model',$params)) { 
						if (isset($this->request->data[$params['model']][$fieldname]) && !empty($this->request->data[$params['model']][$fieldname])) {
							$output.= '<div class="input text"><label for="Preview">Current Image</label>';			
							$output.= $this->Html->Image('uploads/'.$this->request->data[$params['model']][$fieldname], array('width' => 200));
							$output.= '</div>';
						}
					}
					$output.= $this->Form->input($fieldname, $options);
				}
			}
		}
		return $output;
	}
}