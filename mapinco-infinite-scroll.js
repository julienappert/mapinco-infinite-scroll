jQuery(function($) {
	if(typeof mapinscroll != 'undefined'){
		var iasOptions = {
				 container: mapinscroll.container,
				 item: mapinscroll.item,
				 pagination: mapinscroll.pagination,
				 next:	mapinscroll.next,
				 negativeMargin:	mapinscroll.negativeMargin
			};	
		var ias = $.ias(iasOptions);
	 	ias.extension(new IASTriggerExtension({
	 		offset: parseInt(mapinscroll.offset),
	 		html: mapinscroll.more
	 	}));	
	 	
   	ias.extension(new IASSpinnerExtension({
   		html:	mapinscroll.spinner
   	}));
   	ias.extension(new IASNoneLeftExtension({
   		html:	mapinscroll.noneLeft
   	}));
		ias.extension(new IASPagingExtension()); 
		ias.extension(new IASHistoryExtension());

		jQuery.ias().on('pageChange', function(pageNum, scrollOffset, url) {
			console.log(url);
			if(typeof pageTracker != 'undefined'){
				pageTracker._trackPageview(url);
			}
		});	 	
	 			
	}

});
