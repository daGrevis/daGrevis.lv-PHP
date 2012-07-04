from django.conf.urls import patterns, include, url

urlpatterns = patterns(
    'blog.views',
    url(r'^article/(?P<id>\d+)/(?P<slug>[-\w]*)$', 'article', name='article'),
    url(r'^$', 'index', name='index'),
)
