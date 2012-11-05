<?php
namespace Sub\Contagged\Controller;
/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Ingo Pfennigstorf <pfennigstorf@sub-goettingen.de>
 *      Goettingen State Library
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

/**
 * Tag Controller for contagged extension
 */
class TermController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \Sub\Contagged\Domain\Repository\PageRepository
	 * @inject
	 */
	protected $pageRepository;

	/**
	 * @var \Sub\Contagged\Domain\Repository\TermRepository
	 * @inject
	 */
	protected $termRepository;

	/**
	 * Show all tags belonging to the current page
	 */
	public function pageAction() {
		$pageId = $GLOBALS['TSFE']->id;
		xdebug_break();
		$terms = $this->pageRepository->findByUid($pageId)->getTags();

		if (!empty($terms)) {
			$terms = self::splitTerms($terms);
			$this->view
					->assign('terms', $terms)
					->assign('listPages', $this->settings['listPages'])
			;
		}
	}

	/**
	 * Split the term string and return an array with the ids to link to them
	 *
	 * @param $terms
	 * @return array
	 */
	protected function splitTerms($terms) {

		$tags = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $terms);
		$tagCollection = array();
		foreach ($tags as $tag) {
			$tagIdentifier = array(
				'uid' => $this->termRepository->findByTitle($tag)->getFirst()->getUid(),
				'title' => ucfirst($tag)
			);
			array_push($tagCollection, $tagIdentifier);
		}
		return $tagCollection;
	}

}