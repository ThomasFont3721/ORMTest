<?php
namespace controllers\crud\viewers;

use Ubiquity\controllers\crud\viewers\ModelViewer;
 /**
 * Class CRUDUserViewer
 **/
class CRUDUserViewer extends ModelViewer{
	//use override/implement Methods
	
	
	protected function getDataTableRowButtons()
	{
		return ['delete', 'display', 'edit'];
	}
}
