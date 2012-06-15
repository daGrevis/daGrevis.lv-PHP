<?php

class Controller_Dashboard_Blog extends Controller_Template {

	function action_list() {

		$article = ORM::factory('Blog_Article');

		$articles = $article->get_articles();

		$this->view->articles = $articles;

	}

	function action_article() {

		$article_id = $this->request->param('id');

		$article = ORM::factory('Blog_Article', $article_id);
		
		if ($article_id && !$article->loaded()) {

			throw new HTTP_Exception_404("Not found!");

		}

		$tags = Model_Blog_Tag::get_tags_by_article_id($article_id);

		if ($this->request->method() === Request::POST) {

			if (!Security::check($this->request->post('csrf_token'))) {

				throw new HTTP_Exception_401("Bad token!");

			}

			$article->values(
				$this->request->post(),
				array(
					'title',
					'content',
					'show_time_of_last_edit',
					'is_published',
				)
			);

			$slug = $this->request->post('slug');

			if (!$article->loaded() || empty($slug)) {

				$article->slug = URL::title($article->title, '_');

			} else {

				$article->slug = $slug;

			}

			try {

				$article->save();

				Session::instance()->set('Article.success', true);

				$this->request->redirect('dashboard/blog/article/'.$article->id);

			} catch (ORM_Validation_Exception $exception) {

				$this->view->errors = $exception->errors('article');

			}

		}

		$this->view->success = Session::instance()->get_once('Article.success');

		$this->view->article = $article;
		$this->view->tags = $tags;

	}

	function action_delete() {

		$article_id = $this->request->param('id');
		$token = $this->request->param('id2');

		if (!Security::check($token)) {

			throw new HTTP_Exception_401("Bad token!");

		}

		if (!$article_id) {

			throw new HTTP_Exception_400("Article ID must be set!");

		}

		$article = ORM::factory('Blog_Article');

		$rows_affected = $article->blind_delete($article_id);
		
		if (!$rows_affected) {

			throw new HTTP_Exception_404("Not found!");

		}

		$this->request->redirect('dashboard/blog');
		
	}

}