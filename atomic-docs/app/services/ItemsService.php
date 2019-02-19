<?php

class ItemsService {
	/** @var []|null */
	static $items = null;
	/** @var null|CategoryModel[] */
	static $allCategories = null;
	/** @var array */
	static $categories = [];
	/** @var array */
	static $components = [];
	/** @var ComponentModel */
	static $component;
	/** @var array */
	static $relationships = [];

	public function prepareItems($current = null, $reload = false) {
		if ($reload || self::$items === null) {
			$currentCat = $current ?? (int)\Base::instance()->get('PARAMS')['catId'];
			$new = $this->getCategoriesAsItems($currentCat);

			if (empty($new)) {
				return;
			}

			$items = $this->buildHierarchy($new);
			$this->hasActiveChild($items);
			self::$items = $items;

			\Base::instance()->set('sideBarCats', self::$items);
			\Base::instance()->set('currentId', $currentCat);
		}
	}

	/**
	 * @param null $current
	 * @param bool $reload
	 * @return Item[]
	 */
	public function getCategoriesAsItems($current = null, $reload = false) {
		if ($reload || empty(self::$allCategories)) {
			$category = new CategoryModel();
			/** @var CategoryModel[] parent categories $pc */
			$categories = $category->find(null, ['order' => 'sort ASC, parentCatId ASC']) ?: [];
			self::$allCategories = $categories;
		}
		$items = [];
		// rebuild the array to mainly get rid of all of the F3 fluff
		foreach (self::$allCategories as $cat) {
			$item = ItemFactory::create($cat);
			$active = ($cat->categoryId === $current) ? 1 : 0;
			$item->setActive($active);
			$items[] = $item;
		}

		return $items;
	}

	/**
	 * Build the category and component hierarchy
	 *
	 * @param Item[] $categories
	 * @param int $parent
	 * @param int $level
	 * @return Item[]
	 */
	public function buildHierarchy(array $categories, int $parent = 0, $level = 0, $active = null, $includeComponents = true): array {
		$tmp = [];

		if (empty($categories)) {
			return $tmp;
		}
		foreach ($categories as $cat) {
			// if this category's parent matches the current parent, then continue
			if ($cat->parent == $parent) {
				// recursively build the next child
				$children = $this->buildHierarchy($categories, $cat->id, $level++, $cat->active, $includeComponents);
				if ($includeComponents) {
					$components = new ComponentModel();

					$comps = [];
					// find all components for that category
					foreach ($components->find(['categoryId = ?', $cat->id], ['order' => 'sort ASC']) ?: [] as $sc) {
						/** @var ComponentModel $sc */
						$item = ItemFactory::create($sc);

						$comps[] = $item;
					}
					$cat->comps = $comps;
				}
				if ($children) {
					$cat->children = $children;
				}
				$tmp[] = $cat;
			}
		}
		return $tmp;
	}

	/**
	 * @TODO finish this up
	 * @param $items
	 * @return array
	 */
	//	public function flattenHierarchy($items) {
	//		$objTmp = [];
	//
	//		foreach ($items as $item) {
	//			$objTmp[] = $item;
	//			if (is_array($item->children)) {
	//				$this->flattenHierarchy($item->children);
	//				unset($item->children);
	//			}
	//		}
	//
	//		//		d('--------------');
	//		//		p($objTmp);
	//
	//		return $objTmp;
	//		array_walk_recursive($items, function (&$v, $k, &$t) {
	//			p($v);
	//			return $t[] = $v;
	//		}, $objTmp);
	//
	//		return $objTmp;
	//	}

	/**
	 * Traverse a hierarchy of items
	 * @param Item[] $items
	 * @param $callback
	 * @param bool $reversed
	 */
	public function traverseHierarchy($items, $callback, $reversed = false) {
		foreach ($items as $item) {
			if (!$reversed && is_callable($callback)) {
				$callback($item);
			}
			if (is_array($item->children)) {
				$this->traverseHierarchy($item->children, $callback, $reversed);
			}
			if ($reversed && is_callable($callback)) {
				$callback($item);
			}
		}
	}

	/**
	 * Checks items for active children
	 * This updates the items array in place
	 */
	private function hasActiveChild(&$items) {
		foreach ($items as $item) {
			if ($item->children) {
				$this->hasActiveChild($item->children);
			}
			if (array_search_associative($item, 'active', 1)) {
				$item->activeChild = 1;
				$item->active = 1;
			}
		}
	}

	/**
	 * Find all of the parents of a given category.
	 * This is inclusive of the current category
	 *
	 * @param Item[] $items
	 * @param int $id
	 * @return Item[]
	 */
	public function findParents($items, $id) {
		$parents = [];
		$parentIds = [];

		foreach ($items as $item) {
			if ($item->type === 'category' && ($item->id == $id || in_array($item->id, $parentIds))) {
				$parentIds[] = $item->parent;
				$parents[] = $item;
				if ($item->parent > 0) {
					$this->findParents($items, $item->parent);
				}
			}
		}

		return $parents;
	}

	/**
	 * Find all of the parents of a given category.
	 * This is inclusive of the current category
	 *
	 * @param Item[] $items
	 * @param int $id
	 * @return Item[]
	 */
	public function findChildren($items, $id) {
		$children = [];
		$childrenIds = [];

		foreach ($items as $item) {
			if ($item->children) {
				$this->hasActiveChild($item->children);
			}

			if ($item->id == $id || $item->parent == $id || in_array($item->parent, $childrenIds)) {
				$childrenIds[] = $item->parent;
				$children[] = $item;
				$item->activeChild = 1;
				$item->active = 1;
			}
		}

		return $children;
	}

}
