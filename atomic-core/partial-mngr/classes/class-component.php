<?php
class component
{
	
	private $nameScss;
	private $dirNameScss;
	private $dirPathScss;
	
	private $nameComp;
	private $dirNameComp;
	private $dirPathComp;
	
	public function setNameScss($nameScss)
	{
			$this->nameScss = $nameScss;
	}
	public function getNameScss()
	{
			return $this->nameScss;
	}
	
	public function setDirNameScss($dirNameScss)
	{
			$this->dirNameScss = $dirNameScss;
	}
	public function getDirNameScss()
	{
			return $this->dirNameScss;
	}
	
	public function setDirPathScss($dirPathScss)
	{
			$this->dirPathScss = $dirPathScss;
	}
	public function getDirPathScss()
	{
			return $this->dirPathScss;
	}
	
	public function setNameComp($nameComp)
	{
			$this->nameComp = $nameComp;
	}
	public function getNameComp()
	{
			return $this->nameComp;
	}
	
	public function setDirNameComp($dirNameComp)
	{
			$this->dirNameComp = $dirNameComp;
	}
	public function getDirNameComp()
	{
			return $this->dirNameComp;
	}
	
	public function setDirPathComp($dirPathComp)
	{
			$this->dirPathComp = $dirPathComp;
	}
	public function getDirPathComp()
	{
			return $this->dirPathComp;
	}
	
}
?>