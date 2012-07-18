jQuery(document).ready(addAfterBodyScript);

function addAfterBodyScript() {
	var fb_app_id = '216944597824'; //this is default app id from the plugin author - Terry Tsang
		
	jQuery('body') 
    .prepend(
            "<div id='fb-root'></div>" //create this html
                    + "<script>(function(d, s, id){  var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return;   js = d.createElement(s); js.id = id; js.src = '//connect.facebook.net/en_GB/all.js#xfbml=1&appId=" + fb_app_id + "'; fjs.parentNode.insertBefore(js, fjs); } (document, 'script', 'facebook-jssdk')); </script>");
}