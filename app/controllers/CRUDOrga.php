<?php

namespace controllers;

/**
 * CRUD Controller CRUDOrga
 * @route("/org","inherited"=>true,"automated"=>true)
 **/
class CRUDOrga extends \Ubiquity\controllers\crud\CRUDController
{

	public function __construct()
	{
		parent::__construct();
		\Ubiquity\orm\DAO::start();
		$this->model = "models\\Organization";
	}

	public function index()
	{
		parent::index();
	}

	public function _getBaseRoute()
	{
		return '/org';
	}
}
