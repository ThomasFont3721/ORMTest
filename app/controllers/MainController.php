<?php
namespace controllers;

use Ajax\php\ubiquity\JsUtils;
use Ajax\semantic\html\elements\HtmlList;
use Ajax\service\JArray;
use models\Groupe;
use Ubiquity\controllers\auth\WithAuthTrait;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\USession;

/**
 * Controller Main
 * @property JsUtils $jquery
 * @route("Users", "automated"=>true)
 **/
class MainController extends ControllerBase{

	use WithAuthTrait;

	/**
	 * connexion
	 * @get("connect/{name}")
	 * @param String $name
	 * @return true si connecter
	 * @author Thomas FONTAINE--TUFFERY <thomas.fontaine@stat-sio-caen.info>
	 */
	public function connect($name)
	{
		USession::set('user', $name);
		echo('reussi conn');
		return true;
	}

	/**
	 * deconnexion
	 * @get("unconnect/{name}")
	 * @param String $name
	 * @return true si deconnecter
	 * @author Thomas FONTAINE--TUFFERY <thomas.fontaine@stat-sio-caen.info>
	 */
	public function deconnect($name)
	{
		if (USession::exists('user')) {
			$name =USession::get('user');
			USession::delete('user');
			echo('shoa'.$name);
		}
		else{
			echo "You don't be connected!"; 
		}
		return true;
	}

	public function index(){
		$groups=DAO::getAll(Groupe::class, '', ['organization', 'organization.users']);
		$dt=$this->jquery->semantic()->dataTable('dtGroup', Groupe::class, $groups);
		$dt->setFields(['id','name', 'organization', 'orgaUsers']);
		$dt->fieldAsLabel('organization', 'building');
		$dt->fieldAsLabel('name', 'users');
		$dt->setValueFunction('orgaUsers', function($v, $instance){
			$list = new HtmlList('', JArray::modelArray($instance->getOrganization()->getUsers()));
			$list->setDivided()->addIcon('user');
			return $list;
		});
		$this->jquery->getHref('a', '', ['historize'=>false, 'hasLoader'=>'internal']);
		$this->jquery->renderDefaultView();
	}

	protected function getAuthController(): AuthController
	{
		return new AuthController();
	}
}
