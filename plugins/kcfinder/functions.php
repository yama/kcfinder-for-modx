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
			case 'portuguese-br'         : $js_lang = 'pt-br'; break;
			case 'czech'                 : $js_lang = 'cs'; break;
			case 'russian'               :
			case 'russian-UTF8'          : $js_lang = 'ru'; break;
			case 'danish'                : $js_lang = 'da'; break;
			case 'spanish'               :
			case 'spanish-utf8'          : $js_lang = 'cs'; break;
			case 'persian'               : $js_lang = 'fa'; break;
			case 'nederlands'            :
			case 'nederlands-utf8'       : $js_lang = 'nl'; break;
			case 'polish'                :
			case 'polish-utf8'           : $js_lang = 'pl'; break;
			case 'portuguese'            : $js_lang = 'pt'; break;
			case 'chinese'               : $js_lang = 'zh-cn'; break;
			case 'japanese-utf8'         :
			case 'japanese-euc'          : $js_lang = 'ja'; break;
			default                      : $js_lang = 'en';
		}
		return $js_lang;
	}
}