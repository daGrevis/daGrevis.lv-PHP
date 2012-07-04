from django.db import models
from django.template.defaultfilters import slugify

class ArticleManager(models.Manager):
    def get_all_published_articles(self):
        return Article.objects.filter(is_published=True).order_by('-id').all()

class Article(models.Model):
    is_published = models.BooleanField(default=True)
    title = models.CharField(max_length=255)
    slug = models.SlugField(max_length=255, blank=True)
    content = models.TextField(max_length=65535)
    created = models.DateTimeField(auto_now_add=True)
    last_updated = models.DateTimeField(auto_now=True)

    objects = ArticleManager()

    def __unicode__(self):
        return self.title

    def save(self, *args, **kwargs):
        if self.slug == '':
            self.slug = slugify(self.title)
        super(Article, self).save(*args, **kwargs)
