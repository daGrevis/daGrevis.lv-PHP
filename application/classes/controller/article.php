<?php

class Controller_Article extends Controller_Template {

	function action_list() {

		$article = ORM::factory('Blog_Article');

		$count = $article->get_count_of_published_articles();

		$pagination = new Pagination(array(
			'total_items' => $count,
			'items_per_page' => 10,
			'view' => 'pagination',
		));

		$articles = $article->get_all_published_articles($pagination->get_limit(), $pagination->get_offset());

		$this->view->articles = $articles;
		$this->view->pagination = $pagination->render();

	}

	function action_view() {

		$article_id = $this->request->param('id');
		$slug = $this->request->param('slug');

		if (!$article_id) {

			throw new HTTP_Exception_400("Article ID must be set!");

		}

		$article = ORM::factory('Blog_Article', $article_id);

		if (!$article->loaded() || !$article->is_published) { // Also shows 404 error when article is not pusblished yet...

			throw new HTTP_Exception_404("Not found!");

		}

		if (!$slug || $slug !== $article->slug) {

			$this->request->redirect('article/'.$article->id.'/'.$article->slug, 301);

		}

		$this->view->article = $article;
		$this->title = $article->title;

	}

}