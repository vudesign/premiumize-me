<?php

/**
 * This file is part of MetaModels/core.
 *
 * (c) 2012-2016 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package	   Movie Database
 * @subpackage MetaModels
 * @author     Andreas Isaak <info@andreas-isaak.de>
 * @author     Ingolf Steinhardt <info@e-spin.de>
 * @copyright  The MetaModels team.
 * @copyright  2012-2016 The MetaModels team.
 * @license    https://github.com/MetaModels/core/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

/**
 * CONFIG
 */
$GLOBALS['TL_CONFIG']['useAutoItem']                = true;
$GLOBALS['TL_CONFIG']['urlSuffix']                  = '';

/**
 * Backend modules
 */

array_insert($GLOBALS['BE_MOD'], 1, array
	(
		'vu_themen_config' => array
		(
			'companys' => array
			(
				'tables' => array('tl_companys','tl_companys_employees'),
			)
		)  
    ),'before'
);

// Load icon in Contao 4.2 backend
if ('BE' === TL_MODE) {
    if (version_compare(VERSION, '4.4', '<')) {
        $GLOBALS['TL_CSS'][] = 'system/modules/vu_themen_config/assets/backend.css';
    } else {
        $GLOBALS['TL_CSS'][] = 'bundles/vu/assets/backend_svg.css';
    }
}

// Front end modules
array_insert($GLOBALS['FE_MOD'], 1, array
(
	'companys' => array
	(		
		'employeeslist'   => 'Vu\Companys\Module\ModuleCompanysEmployeesList'
	)
));

/**
 * Register models
 */
$GLOBALS['TL_MODELS']['tl_companys'] = 'Vu\Companys\Model\Companys'; 
$GLOBALS['TL_MODELS']['tl_companys_employees'] = 'Vu\Companys\Model\CompanysEmployees'; 

/**
 * Form fields
 */
$GLOBALS['TL_FFL']['multiFieldData_select'] = 'FormMultiFielddataRadioMenu';
$GLOBALS['TL_FFL']['selectMenuWithImg'] = 'FormSelectMenuWithImgMenu';

/**
 * Backend form fields
 */
$GLOBALS['BE_FFL']['multiFieddataOptionWizard'] = 'MultiFieddataOptionWizard';
$GLOBALS['BE_FFL']['SelectMenuWithImgWizard'] = 'SelectMenuWithImgWizard';

 /**
 * INSERTTAG
 */
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('VUInsertTags', 'VUReplaceInsertTags');

 /**
 * Content elememts
 */
 $GLOBALS['TL_CTE']['kd_includefiles'] = array
(
	'kd_include_files' =>	'ContentIncludeFiles'
);

$GLOBALS['TL_HOOKS']['getPageLayout'][] = array('PageLayoutHook', 'AddFilesToPageLayout');