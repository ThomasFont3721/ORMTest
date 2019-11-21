<?php
namespace controllers;

use models\Organization;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\UResponse;
use Ubiquity\utils\http\USession;

/**
 * Controller OrgaController
 * @route("orgas", "automated"=>true)
 **/
class OrgaController extends ControllerBase{

	/**
	 * verif si user conn
	 *
	 * @param $action
	 * @return boolean
	 * @author Thomas FONTAINE--TUFFERY <thomas.fontaine@stat-sio-caen.info>
	 */
	public function isValid($action)
	{
		return USession::exists('user');
	}

	public function onInvalidControl()
	{
		UResponse::setResponseCode(404);
		echo "Vous n'etes pas connecter";
	}

	/**
	 * index
	 *
	 * @return void
	 * @author Thomas FONTAINE--TUFFERY <thomas.fontaine@stat-sio-caen.info>
	 */
	public function index(){
		$orgas = DAO::getAll(Organization::class);
		$this->loadView("OrgaController/index.html", \compact("orgas"));
	}
}
