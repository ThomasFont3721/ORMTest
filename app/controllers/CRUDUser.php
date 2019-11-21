<?php
namespace controllers;
use controllers\crud\datas\CRUDUserDatas;
use Ubiquity\controllers\crud\CRUDDatas;
use controllers\crud\viewers\CRUDUserViewer;
use Ubiquity\controllers\crud\viewers\ModelViewer;
use controllers\crud\events\CRUDUserEvents;
use Ubiquity\controllers\crud\CRUDEvents;
use controllers\crud\files\CRUDUserFiles;
use Ubiquity\controllers\crud\CRUDFiles;

 /**
 * CRUD Controller CRUDUser
 * @route("/use","inherited"=>true,"automated"=>true)
 **/
class CRUDUser extends \Ubiquity\controllers\crud\CRUDController{

	public function __construct(){
		parent::__construct();
		\Ubiquity\orm\DAO::start();
		$this->model="models\\User";
	}

	public function _getBaseRoute() {
		return '/use';
	}
	
	protected function getAdminData(): CRUDDatas{
		return new CRUDUserDatas($this);
	}

	protected function getModelViewer(): ModelViewer{
		return new CRUDUserViewer($this);
	}

	protected function getEvents(): CRUDEvents{
		return new CRUDUserEvents($this);
	}

	protected function getFiles(): CRUDFiles{
		return new CRUDUserFiles();
	}


}
