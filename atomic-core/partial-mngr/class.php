<?php include 'config.php'; ?>

<?php

class scssFile
{
  private $fileName;
	
	public function setFileName($fileName)
	{
			$this->fileName = $fileName;
	}
	
	public function getFileName()
	{
			return $this->fileName;
	}
}


$data = $_POST["modName"];
$scssFile = new scssFile();
$scssFile->setFileName($data);
	
echo($scssFile->getFileName());


?>