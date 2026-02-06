/* VS Contact Form scripts */

/* Form reset */
window.addEventListener("pageshow", function() {
	if(document.getElementById("vscf")) {
		document.getElementById("vscf").reset();
	}
});

/* Form anchor */
document.addEventListener("DOMContentLoaded", function() {
	if(document.getElementById("vscf-anchor")) {
		document.getElementById("vscf-anchor").scrollIntoView({behavior:"smooth",block:"center"});
	}
});
