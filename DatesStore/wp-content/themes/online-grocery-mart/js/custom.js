jQuery(document).ready(function () {
	window.online_grocery_mart_currentfocus=null;
  	online_grocery_mart_checkfocusdElement();
	var online_grocery_mart_body = document.querySelector('body');
	online_grocery_mart_body.addEventListener('keyup', online_grocery_mart_check_tab_press);
	var online_grocery_mart_gotoHome = false;
	var online_grocery_mart_gotoClose = false;
	window.online_grocery_mart_responsiveMenu=false;
 	function online_grocery_mart_checkfocusdElement(){
	 	if(window.online_grocery_mart_currentfocus=document.activeElement.className){
		 	window.online_grocery_mart_currentfocus=document.activeElement.className;
	 	}
 	}
 	function online_grocery_mart_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.online_grocery_mart_responsiveMenu){
			if (!e.shiftKey) {
				if(online_grocery_mart_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				online_grocery_mart_gotoHome = true;
			} else {
				online_grocery_mart_gotoHome = false;
			}

		}else{

			if(window.online_grocery_mart_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}
			}
		}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.online_grocery_mart_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.online_grocery_mart_responsiveMenu){
				if(online_grocery_mart_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					online_grocery_mart_gotoClose = true;
				} else {
					online_grocery_mart_gotoClose = false;
				}
			
			}else{

			if(window.online_grocery_mart_responsiveMenu){
			}
			}

			}
		}
		}
	 	online_grocery_mart_checkfocusdElement();
	}
});