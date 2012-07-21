//<?php
/**
 * KCFinder
 * 
 * web file manager
 *
 * @category 	plugin
 * @version 	2.51r1
 * @license 	http://www.opensource.org/licenses/gpl-2.0.php GNU Public License Version 2 (GPL2)
 * @internal	@events OnDocFormRender,OnDocFormPrerender
 * @internal	@modx_category Manager and Admin
 */
/* Add line tinymce plugin property custom config "file_browser_callback: 'openKCFinder'" */

$kcf_dir = 'assets/plugins/kcfinder/';
include_once(MODX_BASE_PATH . "{$kcf_dir}functions.php");
$kcf = new KCFINDER($kcf_dir);
$kcf->run();
