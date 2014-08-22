<?php
App::uses('Component', 'Controller');

class ImageToolsComponent extends Component {
	
	public $components = array('Session');

	//enable controller methods inside component
	public function startup(Controller $controller) {
		$this->Controller = $controller;
	}
	
	public function prepare($params) {		
		//capture url
		$params['redirect']['controller'] = $this->Controller->request->params['controller'];
		$params['redirect']['action'] = preg_replace('/^' . preg_quote('admin_', '/') . '/', '', $this->Controller->request->params['action']);
		$params['redirect']['pass'] = $this->Controller->request->params['pass'];
		$params['redirect']['admin'] = $this->Controller->request->params['admin'];
		//upload images
		$params['uploadedData'] = $this->uploadImages($params);
						
		//copy, resize, prepare crop
		$data = $this->process($params);
		
		//create session to preserve data
		$this->Session->delete('ImageTools.postData');
		$this->Session->write('ImageTools.postData', $data);
		
		if (array_key_exists('crop', $data)) {
			//go to cropper
			return $this->Controller->redirect(array(
				'controller' => 'ImageTools',
				'action' => 'crop',
				'admin' => false,
				'plugin' => 'ImageTools'
				)
			);
		} else {
			return $data;				
		}
	}
	
	public function uploadImages($params = array()) {
		//extract image column names
		$image_columns = array_keys($params['uploadImages']);
		//extract request data columns
		$request_columns = array_keys($params['requestData']);
		//extract images from request data
		$images = array_intersect($image_columns, $request_columns);
		
		foreach($params['requestData'] as $column => $value) {
			if (!in_array($column,$images)) {
				$non_image_column = $column;
				$non_image_value = $value;
			} else {
				foreach($value as $image) {
					if (isset($image['size']) && is_int($image['size']) && $image['size'] > 0) {	
						$data[] = array($non_image_column => $non_image_value, $column => $this->moveImage($image));
					}
				}
			}
		}
		return $data;
	}
	
	public function moveImage($data=NULL) {
		// Define a destination
		$targetFolder = "img/uploads"; // Relative to the root		
		$upload = array();
		if (!empty($data)) {
			$tempFile = $data['tmp_name'];
			$targetPath = $targetFolder;
			$ext = pathinfo($data['name'], PATHINFO_EXTENSION);
			$new_name	= uniqid() . '.' . $ext;
			$targetFile = rtrim($targetPath,'/') . '/' . $new_name;
			if (move_uploaded_file($tempFile,$targetFile)) {
				return $new_name;
			} else {
				throw new InternalErrorException('Failed to move uploaded file to it\'s destination folder.');
			}
		} else {
			return false;
		}
	}
	
	public function process($data) {
		foreach($data['uploadImages'] as $column => $params) {
			foreach($params as $param => $value) {
				//check if any image should be duplicated
				if ($param == 'source') {
					$copied_filename = $this->copyImage($data['uploadedData'][$value]);
					if ($copied_filename) {
						$data['uploadedData'][$column] = $copied_filename;	
					}
				}
				//resize images
				if ($param == 'resize') {
					foreach($data['uploadedData'][$column] as $image) {
						$this->resizeImage($image, $value);
					}
				}
				//prepare crop params
				if ($param == 'crop') {
					$data['crop'][$column]['filename'] = $data['uploadedData'][$column];
					foreach($value as $property => $val) {
						$data['crop'][$column][$property] = $val;
					}
				}		
			}
		}
		return $data;		
	}

	public function cropImage(array $data=NULL) {
		$source = 'img/uploads/'.$data['ImageTool']["filename"];
		$x1 = !empty($data['ImageTool']["x1"]) ? $data['ImageTool']["x1"] : 0;
		$y1 = !empty($data['ImageTool']["y1"]) ? $data['ImageTool']["y1"] : 0;
		$w = !empty($data['ImageTool']["w"]) ? $data['ImageTool']["w"] : $data['ImageTool']["width"];
		$h = !empty($data['ImageTool']["h"]) ? $data['ImageTool']["h"] : $data['ImageTool']["height"];
		$width = $data['ImageTool']["width"];
		$height = $data['ImageTool']["height"];		
		$scale = $width/$w;
		$cropped = $this->cropIt($destination=$source,$source,$w,$h,$x1,$y1,$scale);
		return true;
	}
	
	public function resizeImage($filename, array $dimensions=NULL) {
		$image['path'] = 'img/uploads/'.$filename;
		$image['max_width'] = isset($dimensions['width']) ? $dimensions['width'] : false; 
		$image['max_height'] = isset($dimensions['height']) ? $dimensions['height'] : false; 
		$image['info'] = getimagesize($image['path']);
		$image['orientation'] = ($image['info'][0] > $image['info'][1]) ? 'landscape' : 'portrait';
		if ($image['orientation'] == 'landscape') {
			//if max width is set and the original width is larger than max width
			if ($image['max_width'] && $image['info'][0] > $image['max_width']) {
				$image['ratio'] = $image['info'][0] / $image['info'][1];
				$image['final_width'] = $image['max_width'];
				$image['final_height'] = ceil($image['max_width'] / $image['ratio']);
				$this->resampleImage($image);
				
				//check if max_height is set and if the new image is bigger than max height
				$image['info'] = getimagesize($image['path']);
				if ($image['max_height'] && $image['info'][1] > $image['max_height']) {
					$image['ratio'] = $image['info'][1] / $image['info'][0];
					$image['final_width'] = ceil($image['max_height'] / $image['ratio']);
					$image['final_height'] = $image['max_height'];
					$this->resampleImage($image);
				}				
			}
		} else {
			//if max height is set and the original height is larger than max height
			if ($image['max_height'] && $image['info'][1] > $image['max_height']) {
				$image['ratio'] = $image['info'][1] / $image['info'][0];
				$image['final_width'] = ceil($image['max_height'] / $image['ratio']);
				$image['final_height'] = $image['max_height'];
				$this->resampleImage($image);
				
				//if max width is set and the original width is larger than max width
				$image['info'] = getimagesize($image['path']);
				if ($image['max_width'] && $image['info'][0] > $image['max_width']) {
					$image['ratio'] = $image['info'][0] / $image['info'][1];
					$image['final_width'] = $image['max_width'];
					$image['final_height'] = ceil($image['max_width'] / $image['ratio']);
					$this->resampleImage($image);
				}				
			}
		}
		return true;
	}
	
	public function copyImage($source) {
		$path = 'img/uploads/';
		$filename = pathinfo($source, PATHINFO_FILENAME);
		$ext = pathinfo($source, PATHINFO_EXTENSION);
		$target = $filename . '_cp.'. $ext;
		if (@copy($path.$source, $path.$target)) {
			return $target;
		} else {
			return false;	
		}
	}

	public function resampleImage($image) {
		
		$newImage = imagecreatetruecolor($image['final_width'],$image['final_height']);
		switch($image['info']['mime']) {
			case "image/gif":
				$source=imagecreatefromgif($image['path']); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image['path']); 
				break;
			case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image['path']); 
				break;
		}
		imagecopyresampled($newImage,$source,0,0,0,0,$image['final_width'],$image['final_height'],$image['info'][0],$image['info'][1]);
		switch($image['info']['mime']) {
			case "image/gif":
				imagegif($newImage,$image['path']); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				imagejpeg($newImage,$image['path'],100); 
				break;
			case "image/png":
			case "image/x-png":
				imagepng($newImage,$image['path']);  
				break;
		}
		return $image['path'];
	}
	
	private function cropIt($destination, $source, $width, $height, $start_width, $start_height, $scale){
		list($imagewidth, $imageheight, $imageType) = getimagesize($source);
		$imageType = image_type_to_mime_type($imageType);
		
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($source); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($source); 
				break;
			case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($source); 
				break;
		}
		imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
		switch($imageType) {
			case "image/gif":
				imagegif($newImage,$destination); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				imagejpeg($newImage,$destination,100); 
				break;
			case "image/png":
			case "image/x-png":
				imagepng($newImage,$destination);  
				break;
		}
		return $destination;
	}

	
}
	