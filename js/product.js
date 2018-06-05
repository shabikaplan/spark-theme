jQuery(document).ready(function(jQuery){
		jQuery('#etalage').etalage({
			thumb_image_width: 300,
			thumb_image_height: 400,

			show_hint: true,
			click_callback: function(image_anchor, instance_id){
				alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
			}
		});
		// This is for the dropdown list example:
		jQuery('.dropdownlist').change(function(){
			etalage_show( jQuery(this).find('option:selected').attr('class') );
		});
	
});