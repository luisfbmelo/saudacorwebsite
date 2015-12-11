(function(){

	$=jQuery.noConflict();

	// Search box
	var searchToggle = document.querySelectorAll('.search-toggle')[0];
	var searchBox = document.querySelectorAll('.search-form-container')[0];
	var searchInput = document.querySelectorAll('.search-input')[0];
		

	function _init(){
		_initSearchbox();

		// Placeholder for IE8
		$('input, textarea').placeholder();

		// Mixitup for Projects
		$('.mixitup-container').mixItUp();
	}


	function _initSearchbox(){
		

		if (searchToggle.addEventListener) {
		    searchToggle.addEventListener("click", searchToggleEvent, false);
		}
		else {
		    searchToggle.attachEvent("onclick", searchToggleEvent);
		}
	}

	function searchToggleEvent(){
		if (searchBox.className.indexOf(' active') > 0){
			searchToggle.className=searchToggle.className.replace(' active','');
			searchBox.className=searchBox.className.replace(' active','');
		}else{
			searchToggle.className += ' active';
			searchBox.className += ' active';
		}
	}

	_init();
})()