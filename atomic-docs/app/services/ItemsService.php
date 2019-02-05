<?php

class ItemsService {



	public function prepareItems() {
		$list       = [];




		$category   = new CategoryModel(\Base::instance()->get('db'));
		$components = new ComponentModel(\Base::instance()->get('db'));

		$currentCat = \Base::instance()->get('PARAMS')['catId'];
		$currentSubCat = \Base::instance()->get('PARAMS')['catSubId'];



		/** @var CategoryModel[] parent categories $pc */
		$pc = $category->find( [ 'parentCatId IS NULL' ], [ 'order' => 'sort ASC' ] );

		foreach ( $pc as $cat ) {
			/** @var CategoryModel[] $cc */
			$cc      = $category->find( [ 'parentCatId = ?', $cat->categoryId ], [ 'order' => 'sort ASC' ] );
			$comp    = $components->find( [ 'categoryId = ?', $cat->categoryId ], [ 'order' => 'sort ASC' ] );

			$catLink = baseAlias('category', ['catId' => $cat->categoryId]);



			$subCats = [];
			foreach ( $cc ?: [] as $childCat ) {
				$childComp = $components->find( ['categoryId = ?', $childCat->categoryId ], [ 'order' => 'sort ASC' ] );

				$childCatLink = baseAlias('categorySub', ['catId' => $cat->categoryId, 'catSubId' => $childCat->categoryId]);


				$subCats[ $childCat->categoryId ] = [
					'category'   => $childCat,
					'components' => $childComp,
					'childCatLink' => $childCatLink,
				];
			}

			$list[ $cat->categoryId ] = [
				'category'      => $cat,
				'subcategories' => $subCats,
				'components'    => $comp,
				'catLink'    => $catLink,
			];
		}


		\Base::instance()->set('sideBarCats', $list);
		\Base::instance()->set('currentId', $currentCat);
		\Base::instance()->set('currentSubId', $currentSubCat);



		/*foreach ( $list as $l ) {
			var_dump( $l['category']->name );

			foreach ( $l['subcategories'] as $sub ) {
				var_dump( $sub['category']->name );

				foreach ( $sub['components'] as $subComp ) {
					var_dump( $subComp->name );
				}
			}

			foreach ( $l['components'] as $comp ) {
				var_dump( $comp->name );
			}
		}*/




	}






}