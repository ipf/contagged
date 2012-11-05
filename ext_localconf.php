<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Sub.' . $_EXTKEY,
	'Pagetags',
	array(
		'Term' => 'page',
	)
);

t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_contagged_terms=1
');

t3lib_extMgm::addPItoST43($_EXTKEY, 'pi1/class.tx_contagged_pi1.php', '_pi1', 'list_type', 1);
?>