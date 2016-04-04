( function($) {
	function toast(m){
		try{
			$(div).remove();
		}catch(E){}
		var div=document.createElement('div');
		$(div).css({
			'position': 'fixed',
			'left' : '0px',
			'bottom' : '25%',
			'padding': '5px',
			'background-color' : '#212121',
			'color' : '#fff',
			'-webkit-border-radius': '5px',
			'-moz-border-radius': '5px',
			'border-radius' : '5px'
		});
		$(div).text(m);
		$('html').append(div);
		setTimeout(function(){
			$(div).remove();
		},3000);
	}

})( jQuery );