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
	
	tinyMCE.activeEditor.windowManager.open(
	{
		file: '[+kcf_url+]kcfinder/browse.php?opener=tinymce&type=' + type + '&langCode=[+lang_code+]',
		title: 'KCFinder',
		width: 700,
		height: 500,
		resizable: "yes",
		inline: "yes",
		close_previous: "no",
		popup_css: false
	},
	{
		window: win,
		input: field_name
	});
		return false;
}
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
</script>
