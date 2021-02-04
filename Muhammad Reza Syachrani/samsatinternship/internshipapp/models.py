from __future__ import unicode_literals

from django.db import models
import django

# Create your models here.
class Data(models.Model):
    layanan = models.CharField(max_length=15, default=django.utils.timezone.now)
    jml_rd2 = models.IntegerField()
    jml_rd4 = models.IntegerField()
    jml_pdpt = models.BigIntegerField()

    def __str__(self):
        return f'{self.layanan} {self.jml_rd2} {self.jml_rd4} {self.jml_pdpt}'