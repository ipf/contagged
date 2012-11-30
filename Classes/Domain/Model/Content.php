<?php
namespace Sub\Contagged\Domain\Model;

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
 * Model for pages
 *
 */
class Content extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject {

	/**
	 * @var string
	 */
	protected $header;

	/**
	 * @var string
	 */
	protected $tags;

	/**
	 * @var \Sub\Contagged\Domain\Model\Term
	 */
	protected $terms;


	public function __construct() {
		$this->initializeStorageObjects();
	}

	public function initializeStorageObjects() {}

	/**
	 * @param string $tags
	 */
	public function setTags($tags) {
		$this->tags = $tags;
	}

	/**
	 * @return string
	 */
	public function getTags() {
		return $this->tags;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

}