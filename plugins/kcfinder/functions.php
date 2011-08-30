<?php

class KCFinder
{
	function get_kcf_lang($lang)
	{
		switch($lang)
		{
			case 'bulgarian'             : $js_lang = 'bg'; break;
			case 'german'                : $js_lang = 'de'; break;
			case 'english'               :
			case 'english-british'       : $js_lang = 'en'; break;
			case 'francais'              :
			case 'francais-utf8'         : $js_lang = 'fr'; break;
			case 'italian'               : $js_lang = 'it'; break;
			case 'japanese-utf8'         :
			case 'japanese-euc'          : $js_lang = 'ja'; break;
			default                      : $js_lang = 'en';
		}
		return $js_lang;
	}
}