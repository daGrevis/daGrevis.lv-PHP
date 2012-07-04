from django.shortcuts import render_to_response, get_object_or_404
from django.http import HttpResponsePermanentRedirect
from blog.models import Article

def index(request):
    articles = Article.objects.get_all_published_articles()
    return render_to_response(
        'blog/article_list.html',
        {'articles': articles}
    )

def article(request, id, slug):
    article = get_object_or_404(Article, pk=id, is_published=True)
    if slug == '' or slug != article.slug:
        return HttpResponsePermanentRedirect(article.slug)
    return render_to_response(
        'blog/article.html',
        {'article': article}
    )
