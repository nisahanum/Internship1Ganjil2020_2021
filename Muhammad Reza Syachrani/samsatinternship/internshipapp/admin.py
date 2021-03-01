# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.contrib import admin
from import_export.admin import ImportExportModelAdmin
from internshipapp.models import Data


# Register your models here.
@admin.register(Data)
class Data1(ImportExportModelAdmin):
    list_display = ('layanan', 'jml_rd2','jml_rd4','jml_pdpt')