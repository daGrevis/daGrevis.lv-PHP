$(function() {

	var $delete_article = $('.delete_article');

	if ($delete_article.length) {

		$delete_article.click(function() {

			return confirm("Do you really want to delete article?");

		});

	}

});