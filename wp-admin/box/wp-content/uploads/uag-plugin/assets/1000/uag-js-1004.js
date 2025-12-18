document.addEventListener("DOMContentLoaded", function(){ var ssLinksParent = document.querySelector( '.uagb-block-e65e63fc' );
ssLinksParent?.addEventListener( 'keyup', function ( e ) {
var link = e.target.closest( '.uagb-ss__link' );
if ( link && e.keyCode === 13 ) {
	handleSocialLinkClick( link );
}
});

ssLinksParent?.addEventListener( 'click', function ( e ) {
var link = e.target.closest( '.uagb-ss__link' );
if ( link ) {
	handleSocialLinkClick( link );
}
});

function handleSocialLinkClick( link ) {
var social_url = link.dataset.href;
var target = "";
if ( social_url == "mailto:?body=" ) {
	target = "_self";
}
var request_url = "";
if ( social_url.indexOf("/pin/create/link/?url=") !== -1 ) {
	request_url = social_url + encodeURIComponent( window.location.href ) + "&media=" + '';
} else {
	request_url = social_url + encodeURIComponent( window.location.href );
}
window.open( request_url, target );
}
window.addEventListener("DOMContentLoaded", function(){
	UAGBForms.init( {"block_id":"e05b0f4b","reCaptchaEnable":false,"reCaptchaType":"v2","reCaptchaSiteKeyV2":"","reCaptchaSecretKeyV2":"","reCaptchaSiteKeyV3":"","reCaptchaSecretKeyV3":"","afterSubmitToEmail":"abc@gmail.com","afterSubmitCcEmail":"","afterSubmitBccEmail":"","afterSubmitEmailSubject":"Env\u00edo del formulario","sendAfterSubmitEmail":true,"confirmationType":"message","hidereCaptchaBatch":false,"captchaMessage":"Por favor, completa el captcha de arriba.","confirmationUrl":""}, '.uagb-block-e05b0f4b', 1004 );
});
window.addEventListener("DOMContentLoaded", function(){
	UAGBForms.init( {"block_id":"6689db31","reCaptchaEnable":false,"reCaptchaType":"v2","reCaptchaSiteKeyV2":"","reCaptchaSecretKeyV2":"","reCaptchaSiteKeyV3":"","reCaptchaSecretKeyV3":"","afterSubmitToEmail":"abc@gmail.com","afterSubmitCcEmail":"","afterSubmitBccEmail":"","afterSubmitEmailSubject":"Env\u00edo del formulario","sendAfterSubmitEmail":true,"confirmationType":"message","hidereCaptchaBatch":false,"captchaMessage":"Por favor, completa el captcha de arriba.","confirmationUrl":""}, '.uagb-block-6689db31', 1004 );
});
 });