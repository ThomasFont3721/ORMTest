<?php
namespace controllers\crud\files;

use Ubiquity\controllers\crud\CRUDFiles;
 /**
 * Class CRUDUserFiles
 **/
class CRUDUserFiles extends CRUDFiles{
	public function getViewIndex(){
		return "CRUDUser/index.html";
	}

	public function getViewForm(){
		return "CRUDUser/form.html";
	}

	public function getViewDisplay(){
		return "CRUDUser/display.html";
	}


}
