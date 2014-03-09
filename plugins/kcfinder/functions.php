<?php

class KCFINDER
{
	var $kcf_path;
	var $kcf_url;
	
	function KCFINDER($kcf_dir)
	{
		global $modx;
		
		$this->kcf_path = MODX_BASE_PATH . $kcf_dir;
		$this->kcf_url  = MODX_BASE_URL  . $kcf_dir;
		$_SESSION['kcf_upload_url'] = rtrim($modx->config['base_url'].$modx->config['rb_base_url'], '/');
		$_SESSION['kcf_upload_dir'] = rtrim($modx->config['rb_base_dir'], '/');
		$_SESSION['kcf_http_host']  = $this->getHost();
		$_SESSION['kcf_mce_path']   = $modx->config['base_url'] . 'assets/plugins/tinymce/jscripts/tiny_mce';
	}
	
	function getHost()
	{
		$host = $_SERVER['HTTP_HOST'];
		if(2 < count(explode(':',$host))) $host = substr($host,0,strrpos(':',$host));
		return $host;
	}
	
	function run()
	{
		global $modx;
		
		if($modx->event->name=='OnDocFormPrerender')
		{
		  global $ResourceManagerLoaded;
		  $ResourceManagerLoaded = true;
		}
		else
		{
			$js = file_get_contents($this->kcf_path . 'fb.js');
			$lang_code = $this->lang_code($modx->config['manager_language']);
			$js = str_replace('[+kcf_url+]',   $this->kcf_url,   $js);
			$js = str_replace('[+lang_code+]', $lang_code, $js);
			$js = str_replace('[+rb_url+]', $modx->config['site_url'].$modx->config['rb_base_url'], $js);
			$modx->event->output($js);
		}
		return;
	}
	
	function lang_code($manager_language)
	{
		switch($manager_language)
		{
			case 'bulgarian'             : $lc = 'bg'; break;
			case 'german'                : $lc = 'de'; break;
			case 'english'               :
			case 'english-british'       : $lc = 'en'; break;
			case 'francais'              :
			case 'francais-utf8'         : $lc = 'fr'; break;
			case 'italian'               : $lc = 'it'; break;
			case 'portuguese-br'         : $lc = 'pt-br'; break;
			case 'czech'                 : $lc = 'cs'; break;
			case 'russian'               :
			case 'russian-UTF8'          : $lc = 'ru'; break;
			case 'danish'                : $lc = 'da'; break;
			case 'spanish'               :
			case 'spanish-utf8'          : $lc = 'cs'; break;
			case 'persian'               : $lc = 'fa'; break;
			case 'nederlands'            :
			case 'nederlands-utf8'       : $lc = 'nl'; break;
			case 'polish'                :
			case 'polish-utf8'           : $lc = 'pl'; break;
			case 'portuguese'            : $lc = 'pt'; break;
			case 'chinese'               : $lc = 'zh-cn'; break;
			case 'japanese-utf8'         :
			case 'japanese-euc'          : $lc = 'ja'; break;
			default                      : $lc = 'en';
		}
		return $lc;
	}
}
