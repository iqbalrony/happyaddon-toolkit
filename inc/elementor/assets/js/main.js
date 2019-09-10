'use strict';

(function ($, w) {
	var $window = $(w);

	$.fn.getHappySettings = function () {
		return this.data('happy-settings');
	};


	$window.on('elementor/frontend/init', function () {

		var InstaFeed = function ($scope) {
			var $insta = $scope.find('.instagram');
			var $username = $insta.data('username');
			// happy_localize.plugin_url
			console.log($username);

			function nFormatter(num) {
				if (num >= 1000000000) {
					return (num / 1000000000).toFixed(1).replace(/\.0$/, '') + 'G';
				}
				if (num >= 1000000) {
					return (num / 1000000).toFixed(1).replace(/\.0$/, '') + 'M';
				}
				if (num >= 1000) {
					return (num / 1000).toFixed(1).replace(/\.0$/, '') + 'K';
				}
				return num;
			}

			$.ajax({
				url: 'https://www.instagram.com/' + $username + '?__a=1',
				type: 'get',
				success: function (response) {
					console.log(response.data);

					$(".profile-pic").attr('src',response.graphql.user.profile_pic_url);
					$(".name").html(response.graphql.user.full_name);
					$(".biography").html(response.graphql.user.biography);
					$(".username").html(response.graphql.user.username);
					$(".number-of-posts").html(response.graphql.user.edge_owner_to_timeline_media.count);
					$(".followers").html(nFormatter(response.graphql.user.edge_followed_by.count));
					$(".following").html(nFormatter(response.graphql.user.edge_follow.count));

					var posts = response.graphql.user.edge_owner_to_timeline_media.edges;
					var count = response.graphql.user.edge_owner_to_timeline_media.count;
					var page_info = response.graphql.user.edge_owner_to_timeline_media.page_info.end_cursor;
					console.log(typeof page_info);
					var url, likes, comments;
					var posts_html = '';
					for(var i=0;i<posts.length;i++){
						url = posts[i].node.thumbnail_resources[0].src;
						likes = posts[i].node.edge_liked_by.count;
						comments = posts[i].node.edge_media_to_comment.count;
						posts_html += '<div class="post-item" style="background: #ddd;margin-bottom: 20px"><h2>Post No: '+i+'</h2><div class="post-image"><img src="'+url+'"></div><div class="likes">'+nFormatter(likes)+' Likes</div><div class="comments">'+nFormatter(comments)+' Comments</div></div>'
					}
					$(".posts").html(posts_html+page_info);

					//$insta.html(response.graphql.user.full_name);
				},
				error: function (error) {
					console.log(error.status);
				}
			});

		};

		elementorFrontend.hooks.addAction('frontend/element_ready/hpadn_instagram_Feed.default',
			InstaFeed
		);


	});

}(jQuery, window));
