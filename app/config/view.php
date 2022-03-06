<?php
class View{
	public $moduleName;

	public function render($fileName, $loadMaster = true){
		$contentFile = APP_PATH . '/app/' . $this->moduleName . '/views/' . $fileName .'.php';
		if ($loadMaster) {
			include_once APP_PATH . '/app/' . $this->moduleName . '/views/index.php';
		}else{
			include_once $contentFile;
		}
	} 
}