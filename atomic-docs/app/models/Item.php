<?php
/**
 * File: Item.php
 * Date: 2019-02-11
 * Time: 15:15
 *
 * @package atomicdocs.dev
 * @author Michael Dahlke <mdahlke@wisnet.com>
 */

class Item {
	/** @var int */
	public $id;
	/** @var int */
	public $parent;
	/** @var string */
	public $name;
	/** @var string */
	public $link;
	/** @var string */
	public $slug;
	/** @var string */
	public $type;
	/** @var bool */
	public $active = false;
	/** @var bool */
	public $activeChild = false;
	/** @var int */
	public $sort = 0;
	/** @var int */
	public $category;
	/** @var string */
	public $componentLink;
	/** @var string */
	public $categoryLink;
	/** @var ComponentModel[] */
	public $comps = [];
	/** @var Items[] */
	public $children = [];

	public function __construct() {
	}

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}

	/**
	 * @param int $id
	 * @return Item
	 */
	public function setId(int $id): Item {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getParent(): int {
		return $this->parent;
	}

	/**
	 * @param int $parent
	 * @return Item
	 */
	public function setParent(int $parent): Item {
		$this->parent = $parent;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return Item
	 */
	public function setName(string $name): Item {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLink(): string {
		return $this->link;
	}

	/**
	 * @param string $link
	 * @return Item
	 */
	public function setLink(string $link): Item {
		$this->link = $link;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSlug(): string {
		return $this->slug;
	}

	/**
	 * @param string $slug
	 * @return Item
	 */
	public function setSlug(string $slug): Item {
		$this->slug = $slug;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getType(): string {
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return Item
	 */
	public function setType(string $type): Item {
		$this->type = $type;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isActive(): bool {
		return $this->active;
	}

	/**
	 * @param bool $active
	 * @return Item
	 */
	public function setActive(bool $active): Item {
		$this->active = $active;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isActiveChild(): bool {
		return $this->activeChild;
	}

	/**
	 * @param bool $activeChild
	 * @return Item
	 */
	public function setActiveChild(bool $activeChild): Item {
		$this->activeChild = $activeChild;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getSort(): int {
		return $this->sort;
	}

	/**
	 * @param int $sort
	 * @return Item
	 */
	public function setSort(int $sort): Item {
		$this->sort = $sort;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getCategory(): int {
		return $this->category;
	}

	/**
	 * @param int $category
	 * @return Item
	 */
	public function setCategory(int $category): Item {
		$this->category = $category;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getComponentLink(): string {
		return $this->componentLink;
	}

	/**
	 * @param string $componentLink
	 * @return Item
	 */
	public function setComponentLink(string $componentLink): Item {
		$this->componentLink = $componentLink;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCategoryLink(): string {
		return $this->categoryLink;
	}

	/**
	 * @param string $categoryLink
	 * @return Item
	 */
	public function setCategoryLink(string $categoryLink): Item {
		$this->categoryLink = $categoryLink;
		return $this;
	}

}
