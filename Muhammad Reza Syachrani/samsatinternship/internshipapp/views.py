# -*- coding: utf-8 -*-
from __future__ import unicode_literals

import csv, io
from django.shortcuts import render, redirect, get_object_or_404
from django.views.generic import TemplateView
from django.contrib.auth import authenticate, login, logout
from django.contrib.auth.models import User
from django.contrib import messages
from django.contrib.auth.decorators import login_required
from internshipapp.models import Data
from sklearn.preprocessing import MinMaxScaler
from django.shortcuts import render 
import pandas as pd
import json 
import joblib
from sklearn.metrics import accuracy_score
import numpy as np
from .utils import get_plot1, get_plot2, get_plot3, get_plot4

# Create your views here.

class IndexView(TemplateView):
	template_name = 'index.html'

@login_required(login_url='login_u')
def index(request):
	context = {
		'page_title': 'SAMSAT MATARAM',
	}
	
	return render(request, 'index.html', context)


def loginView(request):
	context = {
		'page_title':'LOGIN',
	}
	user = None
	if request.method == "POST":
		
		username_login = request.POST.get('username')
		password_login = request.POST.get('password')
		
		user = authenticate(request, username=username_login, password=password_login)

		if user is not None:
			login(request, user)
			Data.objects.all().delete()
			return redirect('index')
		else:
			messages.info(request, 'Invalid Username or Password')
			return redirect('login_u')
		
	return render(request, 'login.html', context)

def registrasiView(request):

	if request.method == 'POST':

		email_reg = request.POST.get('email_address')
		username_reg = request.POST.get('username_reg')
		password_reg = request.POST.get('password_reg')
		password_regc = request.POST.get('password_regc')

		if password_reg==password_regc:
			if User.objects.filter(username=username_reg).exists():
				messages.info(request, 'Username Taken')
				return redirect('register')
			elif User.objects.filter(email=email_reg).exists():
				messages.info(request, 'Email Taken')
				return redirect('register')
			else:
				user = User.objects.create_user(username=username_reg, password=password_reg, email=email_reg)
				user.save();
				print('user created')
				messages.info(request, 'Account Created!')
				return redirect('register')
		else:
			messages.info(request, 'password not matching..')
			return redirect('register')
		return redirect('register')
		
	else:
		 return render(request,'register.html')
    
def logoutView(request):
	context = {
		'page_title':'logout'
	}

	if request.method == "POST":
		if request.POST["logout"] == "Submit":
			logout(request)

		return redirect('login_u')	


	return render(request, 'index.html', context)

@login_required(login_url='login_u')
def uploadData(request):

	template = "upload.html"

	if request.method == "GET":
		return render(request, template)

	csv_file = request.FILES['file']

	if csv_file == request.FILES['file']:
		Data.objects.all().delete()

	if not csv_file.name.endswith('.csv'):
		messages.error(request, 'This is not a csv file')

	data_set = csv_file.read().decode('UTF-8')
	io_string = io.StringIO(data_set)
	next(io_string)
	for column in csv.reader(io_string, delimiter=',', quotechar="|"):
		_, created = Data.objects.update_or_create(

			layanan=column[0],
			jml_rd4=column[1],
			jml_rd2=column[2],
			jml_pdpt=column[3]
		)
	context = {}
		
	return render(request, template, context)

@login_required(login_url='login_u')
def showData(request):
	all_data = Data.objects.all
	return render(request, 'table.html', {'all':all_data,'page_title':'TABLE'})

@login_required(login_url='login_u')
def klasifikasi(request):
	if request.method == 'POST':
		dt = Data.objects.all()
		if not dt:	
			return render(request, 'klasifikasi.html')
		else:
			data_jml = [{"JumlahRoda2":x.jml_rd2,"JumlahRoda4":x.jml_rd4,"JumlahPendapatan":x.jml_pdpt} for x in dt]
			full = [{"Layanan":x.layanan,"JumlahRoda2":x.jml_rd2,"JumlahRoda4":x.jml_rd4,"JumlahPendapatan":x.jml_pdpt} for x in dt]
			df = pd.DataFrame(data_jml)
			df_full = pd.DataFrame(full)
			scaler = MinMaxScaler()
			data_norm = scaler.fit_transform(df)
			df_norm = pd.DataFrame(data_norm)

			print(df_norm)

			nb = joblib.load('model_nb2.sav')

			kls_nb = nb.predict(df_norm)
			df_full['label'] = kls_nb
			print(dt)
			samling1 = df_full[df_full.Layanan == 'SAMLING 1']
			samling2 = df_full[df_full.Layanan == 'SAMLING 2']
			samling3 = df_full[df_full.Layanan == 'SAMLING 3']
			samling4 = df_full[df_full.Layanan == 'SAMLING 4']

			x1 = np.count_nonzero(samling1 == 0)
			y1 = np.count_nonzero(samling1 == 1)
			x2 = np.count_nonzero(samling2 == 0)
			y2 = np.count_nonzero(samling2 == 1)
			x3 = np.count_nonzero(samling3 == 0)
			y3 = np.count_nonzero(samling3 == 1)
			x4 = np.count_nonzero(samling4 == 0)
			y4 = np.count_nonzero(samling4 == 1)
			
			chart = get_plot1(x1,y1)
			chart2 = get_plot2(x2,y2)
			chart3 = get_plot3(x3,y3)
			chart4 = get_plot4(x4,y4)


		context = {
			'kls':kls_nb,
			'chart':chart,
			'chart2':chart2,
			'chart3':chart3,
			'chart4':chart4,
			'page_title':'KLASIFIKASI'
			}

		return render(request, 'klasifikasi.html', context)
	else:
		return render(request, 'klasifikasi.html', {'page_title':'KLASIFIKASI'})
