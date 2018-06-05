jQuery('.banner-slide').carousel()

// Instantiate the Bootstrap carousel
jQuery('#productCarousel').carousel({
  interval: false
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
jQuery('#productCarousel .item').each(function(){
  var next = jQuery(this).next();
  if (!next.length) {
    next = jQuery(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo(jQuery(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo(jQuery(this));
  } else {
  	jQuery(this).siblings(':first').children(':first-child').clone().appendTo(jQuery(this));
  }
});


jQuery('input:radio[name="gift_card"]').change(function(){
	if (jQuery(this).is(':checked')) {
		var gift_value = jQuery(this).siblings(".variations").find('.variation:first').val();
		jQuery(this).siblings(".variations").removeClass("hidden").parent().siblings().children('.variations').addClass('hidden');
		jQuery(this).siblings(".variations").find('.variation:first').attr('checked', true);
		jQuery('#field_giftcardname').val(gift_value);
		jQuery('#field_giftcardname').change();
	}
});
jQuery('input:radio[name="variation"]').change(function(){
	if (jQuery(this).is(':checked')) {
		var variation_value = jQuery(this).val();
		jQuery("form.frm-show-form").removeClass("hidden");
		jQuery('#field_giftcardname').val(variation_value);
		jQuery('#field_giftcardname').change();
	}
});

