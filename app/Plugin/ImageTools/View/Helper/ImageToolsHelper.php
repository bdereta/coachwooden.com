<?php

class ImageToolsHelper extends AppHelper {	

	public $helpers = array('Form','Html');

	public function uploadImages($params = array(), $output = null) {
		if (!empty($params['uploadImages'])) {
			foreach($params['uploadImages'] as $fieldname=>$options){
				$input_options = array('type'=>'file');
				if (array_key_exists('label', $options)) {
					$input_options['label'] = 'Upload Image';
					$input_options['multiple'] = !empty($options['multiple']) ? true : NULL;
				}
				if (empty($options['source'])) {
					//display existing image
					if (!empty($params['model'])) { 
						if (isset($this->request->data[$params['model']][$fieldname]) && !empty($this->request->data[$params['model']][$fieldname])) {
							$output.= '<div class="input text"><label for="Preview">Current Image</label>';			
							$output.= $this->Html->Image('uploads/'.$this->request->data[$params['model']][$fieldname], array('width' => 200));
							$output.= '</div>';
						}
					}
					//upload files into array
					$fieldname = $fieldname.".";
					$output.= $this->Form->input($fieldname, $input_options);
				}
			}
		}
		return $output;
	}
}