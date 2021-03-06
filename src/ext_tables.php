<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

// tt_content add fileds
$tempColumns = Array (
	"tx_shscoutnetkalender_ids" => Array (		
		"exclude" => 1,		
		"label" => "LLL:EXT:sh_scoutnet_kalender/locallang_db.xml:tt_content.tx_shscoutnetkalender_ids",		
		"config" => Array (
			"type" => "input",	
			"size" => "30",	
			"checkbox" => "",	
			"eval" => "required,trim,nospace",
		)
	),
	"tx_shscoutnetkalender_optids" => Array (		
		"exclude" => 1,		
		"label" => "LLL:EXT:sh_scoutnet_kalender/locallang_db.xml:tt_content.tx_shscoutnetkalender_optids",		
		"config" => Array (
			"type" => "input",	
			"size" => "30",	
			"checkbox" => "",	
			"eval" => "trim,nospace",
		)
	),
	"tx_shscoutnetkalender_kat_ids" => Array (		
		"exclude" => 1,		
		"label" => "LLL:EXT:sh_scoutnet_kalender/locallang_db.xml:tt_content.tx_shscoutnetkalender_kat_ids",		
		"config" => Array (
			"type" => "input",	
			"size" => "30",	
			"checkbox" => "",	
			"eval" => "trim,nospace",
		)
	),
	"tx_shscoutnetkalender_stufen_ids" => Array (		
		"exclude" => 1,		
		"label" => "LLL:EXT:sh_scoutnet_kalender/locallang_db.xml:tt_content.tx_shscoutnetkalender_stufen_ids",		
		"config" => Array (
			"type" => "input",	
			"size" => "30",	
			"checkbox" => "",	
			"eval" => "trim,nospace",
		)
	),
);


t3lib_div::loadTCA("tt_content");
t3lib_extMgm::addTCAcolumns("tt_content",$tempColumns,1);

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='tx_shscoutnetkalender_ids,tx_shscoutnetkalender_optids,tx_shscoutnetkalender_kat_ids,tx_shscoutnetkalender_stufen_ids';

// be_user fileds
$tempColumns = Array (
	'tx_shscoutnetkalender_scoutnet_username' => Array (		
		'exclude' => 1,		
		'label' => 'LLL:EXT:sh_scoutnet_kalender/locallang_db.xml:be_users.tx_shscoutnetkalender_scoutnet_username',
		'config' => Array (
			'type' => 'input',
			'size' => '255',
		)
	),
	'tx_shscoutnetkalender_scoutnet_apikey' => Array (		
		'exclude' => 1,		
		'label' => 'LLL:EXT:sh_scoutnet_kalender/locallang_db.xml:be_users.tx_shscoutnetkalender_scoutnet_apikey',
		'config' => Array (
			'type' => 'input',
			'size' => '255',
		)
	),
);


t3lib_div::loadTCA('be_users');
t3lib_extMgm::addTCAcolumns('be_users',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes('be_users','--div--;LLL:EXT:sh_scoutnet_kalender/locallang_db.xml:be_users.tx_shscoutnetkalender_scounet_tab, tx_shscoutnetkalender_scoutnet_username, tx_shscoutnetkalender_scoutnet_apikey');


// add plugins
t3lib_extMgm::addPlugin(Array('LLL:EXT:sh_scoutnet_kalender/locallang_db.xml:tt_content.list_type_pi1', $_EXTKEY.'_pi1'),'list_type');
t3lib_extMgm::addStaticFile($_EXTKEY,"pi1/static/","Scoutnet calendar");


// add backend user modul
if (TYPO3_MODE == 'BE') {
	$TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["tx_shscoutnetkalender_pi1_wizicon"] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_shscoutnetkalender_pi1_wizicon.php';

	t3lib_extMgm::addModulePath('scoutnet_kalender', t3lib_extMgm::extPath($_EXTKEY) . 'user_scoutnet/');
	t3lib_extMgm::addModule('user','scoutnet', '', t3lib_extMgm::extPath($_EXTKEY) . 'user_scoutnet/');

//	$GLOBALS['TYPO3_CONF_VARS']['BE']['AJAX']['Taskcenter::saveCollapseState']      = 'EXT:taskcenter/classes/class.tx_taskcenter_status.php:tx_taskcenter_status->saveCollapseState';
//	$GLOBALS['TYPO3_CONF_VARS']['BE']['AJAX']['Taskcenter::saveSortingState']       = 'EXT:taskcenter/classes/class.tx_taskcenter_status.php:tx_taskcenter_status->saveSortingState';
}



?>
