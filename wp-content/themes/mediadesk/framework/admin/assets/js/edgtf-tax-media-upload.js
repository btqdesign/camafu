(function ($) {
	"use strict";
	
	$(document).ready(function () {
		edgtf_tax_media_upload('.edgtf-tax-media-add.button');
		edgtf_tax_media_remove('.edgtf-tax-media-remove.button');
	});
	
	// Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
	//remove all thumbs after edit/save taxonomy
	$(document).ajaxComplete(function (event, xhr, settings) {
		
		if(settings.data) {
			var queryStringArr = settings.data.split('&');
			
			if ($.inArray('action=add-tag', queryStringArr) !== -1) {
				var xml = xhr.responseXML,
					$response = $(xml).find('term_id').text();
				
				if ($response !== "") {
					// Clear the thumb image
					$('.edgtf-tax-image-wrapper').html('');
				}
			}
		}
	});
	
	function edgtf_tax_media_upload(button_class) {
		var _custom_media = true,
			_orig_send_attachment = wp.media.editor.send.attachment;
		
		$('body').on('click', button_class, function (e) {
			var $this = $(this),
				parent = $this.closest('.form-field');
			
			_custom_media = true;
			
			wp.media.editor.send.attachment = function (props, attachment) {
				if (_custom_media) {
					var attachment_url = attachment.sizes.thumbnail !== undefined ? attachment.sizes.thumbnail.url : attachment.sizes.full.url;
					
					parent.find('.edgtf-tax-custom-media-url').val(attachment.id);
					parent.find('.edgtf-tax-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
					parent.find('.edgtf-tax-image-wrapper .custom_media_image').attr('src', attachment_url).css('display', 'block');
				} else {
					return _orig_send_attachment.apply(button_class, [props, attachment]);
				}
			};
			
			wp.media.editor.open(button_class);
			
			return false;
		});
	}
	
	function edgtf_tax_media_remove(button_class) {
		$('body').on('click', button_class, function () {
			var $this = $(this),
				parent = $this.closest('.form-field'),
				image = parent.find('.edgtf-tax-custom-media-url');
			
			/** Make sure the user didn't hit the button by accident and they really mean to delete the image **/
			if (image.val() !== '' && confirm('Are you sure you want to delete this file?')) {
				var result = $.ajax({
					url: '/wp-admin/admin-ajax.php',
					type: 'GET',
					data: {
						action: 'mediadesk_edge_tax_del_image',
						term_id: $this.data('termid'),
						taxonomy: $this.data('taxonomy'),
						field_name: image.attr('name')
					},
					dataType: 'text'
				});
				
				result.success(function (data) {
					$('#edgtf-uploaded-image').remove();
				});
				
				result.fail(function (jqXHR, textStatus) {
					console.log("Request failed: " + textStatus);
				});
				
				image.val('');
				parent.find('.edgtf-tax-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
			}
		});
	}
	
})(jQuery);