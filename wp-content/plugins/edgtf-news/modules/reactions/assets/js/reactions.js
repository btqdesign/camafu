(function($) {
	"use strict";

    var reactions = {};
    edgtf.modules.reactions = reactions;

    reactions.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
    	edgtfReactions();
    }

    function edgtfReactions() {
    	var reactions = $('.edgtf-news-reactions'),
    		postID = reactions.data('post-id');

    	if (reactions.length){
    		var reactionTerm = reactions.find('.edgtf-reaction');

    		reactionTerm.each(function () {
    			var thisReaction = $(this),
    				thisReactionValue = thisReaction.find('.edgtf-rt-value');

    			thisReaction.on('click', function (e) {
    				e.preventDefault();
    				e.stopPropagation();

    				var reactionSlug = thisReaction.data('reaction');

    				if (thisReaction.hasClass('reacted')){
    					return false;
    				}

    				var dataToPass = {
		                action: 'edgtf_news_reaction_update',
		                reaction_slug: reactionSlug,
		                post_ID: postID,
		            };

					$.ajax({
						type: 'POST',
						data: dataToPass,
						url: edgtfGlobalVars.vars.edgtfAjaxUrl,
						success: function (data) {
							thisReaction.addClass('reacted');
							var newValue = parseInt(thisReactionValue.text()) + 1;
							thisReactionValue.text(newValue);
						}
					});
    			});
    			
    		});
	    }
    }

})(jQuery);