# Generated by Django 3.1.5 on 2021-02-02 03:55

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('internshipapp', '0005_auto_20210202_0344'),
    ]

    operations = [
        migrations.RenameField(
            model_name='data',
            old_name='jml_rd2',
            new_name='jml_mbl',
        ),
        migrations.RenameField(
            model_name='data',
            old_name='jml_rd4',
            new_name='jml_mtr',
        ),
    ]
