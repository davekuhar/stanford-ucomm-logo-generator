jQuery(document).ready(function(){
	
	jQuery('input[name=unit-1-line]').on('keyup', function(){
		jQuery('div.unit-1-line-text').html(jQuery(this).val());
	});

	jQuery('input[name=unit-2-line]').on('keyup', function(){
		jQuery('div.unit-2-line-text').html(jQuery(this).val());
	});

	jQuery('input[name=level]').on('keyup', function(){
		jQuery('div.level-text').html(jQuery(this).val());
	});

});

document.onreadystatechange = function() {
            if (document.readyState !== "complete") { 
                document.querySelector( 
                  "body").style.visibility = "hidden"; 
                document.querySelector( 
                  "#loader").style.visibility = "visible"; 
            } else { 
                document.querySelector( 
                  "#loader").style.display = "none"; 
                document.querySelector( 
                  "body").style.visibility = "visible"; 
            } 
        };