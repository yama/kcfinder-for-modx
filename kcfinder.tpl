//<?php
/**
 * KCFinder
 * 
 * web file manager
 *
 * @category 	plugin
 * @version 	2.51
 * @license 	http://www.opensource.org/licenses/gpl-2.0.php GNU Public License Version 2 (GPL2)
 * @internal	@events OnDocFormRender, OnChunkFormRender
 * @internal	@modx_category Manager and Admin
 */

/* Add line tinymce plugin property custom config "file_browser_callback: 'openKCFinder'" */
$version  = '2.51';
$kcf_dir  = 'kcfinder';
$kcf_path = MODX_BASE_PATH . 'assets/plugins/' . $kcf_dir . '/';
$kcf_url  = MODX_BASE_URL  . 'assets/plugins/' . $kcf_dir . '/';
$modx_config_path = $modx->config['base_path'].'assets/cache/';
if(file_exists($modx_config_path.'kcf_config.php'))
{
  $timestamp_gconfig = filemtime($modx->config['base_path'].'assets/cache/siteCache.idx.php');
  $timestamp_kconfig = filemtime($modx_config_path.'kcf_config.php');
  if($timestamp_kconfig < $timestamp_gconfig)
  {
    unlink($modx_config_path.'kcf_config.php');
    $modx_config = var_export($modx->config,true);
    $modx_config = '<?php' . "\n" . '$config = ' . $modx_config . ";\n" . 'return $config;';
    file_put_contents($modx_config_path.'kcf_config.php', $modx_config);
  }
  else include_once($modx_config_path.'kcf_config.php');
}
else
{
  $modx_config = var_export($modx->config,true);
  $modx_config = '<?php' . "\n" . '$config = ' . $modx_config . ";\n" . 'return $config;';
  file_put_contents($modx_config_path.'kcf_config.php', $modx_config);
}
include_once($kcf_path . 'functions.php');
$kcf = new KCFinder($kcf_path . 'modx_config.inc', $modx_config);
$lang_code = $kcf->get_kcf_lang($modx->config['manager_language']);
$js = file_get_contents($kcf_path . 'fb.js');
$js = str_replace('[+kcf_url+]',   $kcf_url,   $js);
$js = str_replace('[+lang_code+]', $lang_code, $js);
$js = str_replace('[+version+]', $version, $js);
$modx->Event->output($js);
