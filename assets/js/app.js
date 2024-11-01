const myModal = new HystModal({
	linkAttributeName: "data-hystmodal",
	trigger: "click",
	//afterClose: function(modal){
		//$('body').find('.plyr').remove();
		//alert('hello');
	//},
});
(function( $ ) {
	'use strict';
	$(function() {
		grid_player();
		grid_preview_init();
		grid_preview_closed();
	});
	window.grid_player = function(el){
		$('.player').each( function() {
			var el = $(this);
			const player = new Plyr(el, {
				controls:[],
				autoplay: true
			});
		}); 
			/*setTimeout(function(){
				//alert('fdgdf');
				var iframe = document.getElementsByTagName('iframe');
				iframe.addClass('test');
				var elmnt = iframe.contentWindow.document.getElementsByClassName("ytp-show-cards-title")[0];
				elmnt.style.display = "none";
			}, 3000);*/
	}
	
	window.grid_preview_init = function(el){
		$(document).on('click', '.videogate-detail-button', function (e) { 
			//alert('jjj');
			var _this = $(this);
			var id = _this.attr('data-id');
			$.ajax({
				type: "POST",
				url: videogate_vars.ajaxurl,
				data: { 'action': 'videogate_grid_modal', 'id': id},
				dataType: "html",
				success: function (response) {
					$('#videogate-modal-large').html(response);
					grid_player();
				}
			});
			/*const myModal = new HystModal({
				linkAttributeName: "data-hystmodal",
				trigger: "click",
			});*/
		});
		
			
	}
	window.grid_preview_closed = function(el){
		$(document).on('click', '.hystmodal__close', function (e) { 
			//alert('jjj');
			$(document).find('#videogate-grid-modal').remove();
		});
		
			
	}
})( jQuery );