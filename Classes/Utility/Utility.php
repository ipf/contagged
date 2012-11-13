<?php
namespace Sub\Contagged\Utility;
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
 * Utility Class for Contagged
 *
 */
class Utility {

	/**
	 * Utility method to sort array items according to the (string) length of their "term" item
	 * Note: the sorting is descending
	 *
	 * @param array $a
	 * @param array $b
	 * @return integer +1 if term from a is shorter than b, -1 for the contrary, 0 in case of equality
	 */
	static public function sortTermsByDescendingLength($a, $b) {
		// Calculate length correctly by relying on t3lib_cs
		$aTermLength = $GLOBALS['TSFE']->csConvObj->strlen($GLOBALS['TSFE']->renderCharset, $a['term']);
		$bTermLength = $GLOBALS['TSFE']->csConvObj->strlen($GLOBALS['TSFE']->renderCharset, $b['term']);
		if ($aTermLength == $bTermLength) {
			return 0;
		} else {
			return ($aTermLength < $bTermLength) ? +1 : -1;
		}
	}
}