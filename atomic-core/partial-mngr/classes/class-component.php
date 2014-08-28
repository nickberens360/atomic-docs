<?php
class component
{
	
	private $nameScss;
	private $dirPathScss;
	
	private $nameComp;
	private $dirPathComp;
	
	private $dirName;
	
	
	
	public function setNameScss($nameScss)
	{
			$this->nameScss = $nameScss.'.scss';
	}
	public function getNameScss()
	{
			return $this->nameScss;
	}
	
	
	public function setDirPathScss($dirPathScss)
	{
			$this->dirPathScss = '../../scss/'.$dirPathScss;
	}
	public function getDirPathScss()
	{
			return $this->dirPathScss;
	}
	
	
	
	public function setNameComp($nameComp)
	{
			$this->nameComp = $nameComp.'.php';
	}
	public function getNameComp()
	{
			return $this->nameComp;
	}
	
	
	public function setDirPathComp($dirPathComp)
	{
			$this->dirPathComp = '../../components/'.$dirPathComp;
	}
	public function getDirPathComp()
	{
			return $this->dirPathComp;
	}
	
	
	
	
	
	public function setDirName($dirName)
	{
			$this->dirName = $dirName;
	}
	public function getDirName()
	{
			return $this->dirName;
	}
	
}
?>