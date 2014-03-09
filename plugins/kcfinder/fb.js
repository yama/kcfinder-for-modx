<script type="text/javascript">
function openKCFinder(field_name, url, type, win)
{
	switch (type)
	{
		case "image":
			type = "images";
			break;
		case "media":
		case "qt":
		case "wmp":
		case "rmp":
			type = "media";
			break;
		case "shockwave":
		case "flash":
			type = "flash";
			break;
		case "file":
			type = "files";
			break;
		default:
			return false;
	}

	var dir;
	if(url.substr(0,'[+rb_url+]'.length)=='[+rb_url+]')
	{
		dir = url.substr('[+rb_url+]'.length);
	}
	else if(url.substr(0,1)==='/')
	{
		dir = url.substr(('[+base_url+]'+'[+rb_base_url+]').length);
	}
	else if(url!=false)
	{
		dir = url.substr('[+rb_base_url+]'.length);
	}
	else dir = type;
	
	if(dir!=type) dir = dir.substr(0,dir.lastIndexOf('/'));
	
	wm = tinyMCE.activeEditor.windowManager;
	wm.open(
	{
		file: '[+kcf_url+]kcfinder/browse.php?opener=tinymce&type=' + type + '&langCode=[+lang_code+]&dir=' + dir,
		title: 'KCFinder',
		width: 700,
		height: 500,
		resizable: "yes",
		inline: true,
		close_previous: "no",
		popup_css: false
	},
	{
		window: win,
		input: field_name
	});
		return false;
}
OpenServerBrowser = function(url, width, height ) {
	var iLeft = (screen.width  - width) / 2 ;
	var iTop  = (screen.height - height) / 2 ;

	var sOptions = 'toolbar=no,status=no,resizable=yes,dependent=yes' ;
	sOptions += ',width=' + width ;
	sOptions += ',height=' + height ;
	sOptions += ',left=' + iLeft ;
	sOptions += ',top=' + iTop ;

	var oWindow = window.open( url, 'KCFinder', sOptions ) ;
}

var lastImageCtrl;
var lastFileCtrl;

BrowseServer = function (ctrl) {
	lastImageCtrl = ctrl;
	var w = screen.width * 0.7;
	var h = screen.height * 0.7;
	OpenServerBrowser('[+kcf_url+]kcfinder/browse.php?type=images&langCode=[+lang_code+]', w, h);
}
BrowseFileServer = function (ctrl) {
	lastFileCtrl = ctrl;
	var w = screen.width * 0.7;
	var h = screen.height * 0.7;
	OpenServerBrowser('[+kcf_url+]kcfinder/browse.php?type=files&langCode=[+lang_code+]', w, h);
}
	SetUrl = function (url, width, height, alt)
	{
		if(lastFileCtrl) {
			var c = document.mutate[lastFileCtrl];
			if(c) c.value = url;
			lastFileCtrl = '';
		} else if(lastImageCtrl) {
			var c = document.mutate[lastImageCtrl];
			if(c) c.value = url;
			lastImageCtrl = '';
		} else {
			return;
		}
	}
</script>
