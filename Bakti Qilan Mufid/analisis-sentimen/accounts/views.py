from django.shortcuts import render, redirect
from django.contrib.auth import authenticate, login, logout
from django.contrib import messages
from django.contrib.auth.decorators import login_required

# Create your views here.
from .forms import RegisterForm
from .import ml_predict


def index(request):
    return render(request, 'accounts/index.html', {})

def registerUser(request):
    form = RegisterForm()
    if request.method == 'POST':
        form = RegisterForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('login')

    else:
        form = RegisterForm()
    return render(request, 'accounts/register.html', {'form':form})

def loginUser(request):
    if request.method == 'POST':
        username = request.POST.get('username')
        password = request.POST.get('password')

        if username and password:

            user = authenticate(username=username, password=password)

            if user is not None:
                login(request, user)
                return redirect('dashboard')
            else:
                messages.error(request, 'Username or Password is Incorrect')
        else:
            messages.error(request, 'Fill out all the fields')

    return render(request, 'accounts/login.html', {})

@login_required(login_url='login', redirect_field_name=None)
def home(request):
    return render(request, 'accounts/home.html', {})


@login_required(login_url='login', redirect_field_name=None)
def dashboard(request):
    
    if request.method == 'POST':
        kalimat = request.POST.get("kalimat")
        pred = ml_predict.prediksi(kalimat)
        if pred is not None:
            return render(request, 'accounts/dashboard.html', {'prediction':pred, 'kaaa':kalimat})
        

    return render(request, 'accounts/dashboard.html')
      

        

def logoutUser(request):
    logout(request)
    return redirect('index')


