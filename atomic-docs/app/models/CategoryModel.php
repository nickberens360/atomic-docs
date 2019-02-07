<?php


/**
 * Class CategoryModel
 *
 * @property int $categoryId
 * @property string name;
 * @property string slug;
 * @property int sort;
 * @property string description;
 * @property int parentCatId
 */
class CategoryModel extends DB\SQL\Mapper
{

    /** @var  ComponentModel[] */
    public $components = null;


    public function __construct(DB\SQL $db)
    {
        parent::__construct($db, 'category');

    }


    public function getById($id)
    {
        $this->load(array('categoryId=?', $id));
        return $this->query;
    }

    public function add()
    {
        $this->copyFrom('POST');
        $this->save();
    }

    public function edit($id)
    {
        $this->load(array('categoryId=?', $id));
        $this->copyFrom('POST');
        $this->update();
    }

    public function delete($id)
    {
        $this->load(array('categoryId=?', $id));
        $this->erase();
    }

    //create a function to get components of category


    /*public function getCatComps(){
        if($this->components == null){
            $components = new ComponentModel($this->db);
            $this->components = $components->find(['categoryId = ?', $this->categoryId]);
        }
        return $this->components;

    }*/

}