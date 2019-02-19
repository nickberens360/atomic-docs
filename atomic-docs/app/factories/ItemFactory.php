<?php
/**
 * File: ItemFactory.php
 * Date: 2019-02-11
 * Time: 15:22
 *
 * @package atomicdocs.dev
 * @author Michael Dahlke <mdahlke@wisnet.com>
 */

class ItemFactory {

	/**
	 * ItemFactory constructor.
	 * @param ComponentModel|CategoryModel $item
	 */
	public function __construct($item) {
		return self::create($item);
	}

	public static function create($item) {
		$i = new Item();
		if ($item instanceof ComponentModel) {
			$i->id = $item->componentId;
			$i->name = $item->name;
			$i->link = baseAlias('category', ['catId' => $item->categoryId]);
			$i->slug = $item->slug;
			$i->type = 'component';
			$i->activeChild = 0;
			$i->sort = 0;
			$i->category = $item->categoryId;
			$i->componentLink = baseAlias('viewComponent', ['component' => $item->componentId]);
			$i->categoryLink = baseAlias('category', ['catId' => $item->categoryId]);
		}
		else if ($item instanceof CategoryModel) {
			$i->id = $item->categoryId;
			$i->parent = $item->parentCatId;
			$i->name = $item->name;
			$i->link = baseAlias('category', ['catId' => $item->categoryId]);
			$i->slug = $item->slug;
			$i->type = 'category';
			$i->activeChild = 0;
		}

		return $i;
	}
}
