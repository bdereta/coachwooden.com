<?php
App::uses('AppController', 'Controller');


/*
* Used for CKEditor Upload 
* The admin has to be logged in to prevent anyone from uploading files to the server.
* The images will be uploaded to app/webroot/img/uploads/
*/
class FilesController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();	
		$this->Auth->deny();
	}
	
	public function upload() {
		
		$this->layout = 'ajax';
		
		$url		= NULL;
		$message	= NULL;
		$result		= false;
		
		if (isset($_FILES['upload']['name']) && !empty($_FILES['upload']['name'])) {
			
			$folder = "img/uploads";
			
			//check if the 'uploads' folder exists
			if (!file_exists($folder)) {
				//create folder if it doesn't exist
				mkdir($folder,775, true);
			}
				
			//process uploading file
			$url = 'img/uploads/'.time()."_".$_FILES['upload']['name'];
	
			//extensive suitability check before doing anything with the file…
			if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) ) {
				$message = "No file uploaded.";
			} else if ($_FILES['upload']["size"] == 0) {
				$message = "The file is of zero length.";
			} else {
				$message = "";
				$move = @move_uploaded_file($_FILES['upload']['tmp_name'], $url);
				if(!$move) {
					$message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
				}
				$url = "/".$url;
			}
			$result = true;
		}
		
		$this->set(compact('result','url','message'));
	}

}
