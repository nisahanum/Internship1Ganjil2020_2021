import matplotlib.pyplot as plt
import matplotlib
import base64
from io import BytesIO

def get_graph():
    buffer = BytesIO()
    plt.savefig(buffer, format='png')
    buffer.seek(0)
    image_png = buffer.getvalue()
    graph = base64.b64encode(image_png)
    graph = graph.decode('utf-8')
    buffer.close()
    return graph

def get_plot1(x1,y1):
    label = ['Tidak Potensi', 'Potensi']
    jumlah = [x1,y1]
    
    plt.switch_backend('AGG')
    plt.figure(figsize=(8,4))
    plt.xticks(rotation=45)
    plt.title('Hasil Klasifikasi SAMLING 1')
    plt.bar(label,jumlah)
    plt.tight_layout()
    graph = get_graph()
    return graph

def get_plot2(x2,y2):
    label = ['Tidak Potensi', 'Potensi']
    jumlah = [x2,y2]
    
    plt.switch_backend('AGG')
    plt.figure(figsize=(8,4))
    plt.xticks(rotation=45)
    plt.title('Hasil Klasifikasi SAMLING 2')
    plt.bar(label,jumlah)
    plt.tight_layout()
    graph = get_graph()
    return graph

def get_plot3(x3,y3):
    label = ['Tidak Potensi', 'Potensi']
    jumlah = [x3,y3]
    
    plt.switch_backend('AGG')
    plt.figure(figsize=(8,4))
    plt.xticks(rotation=45)
    plt.title('Hasil Klasifikasi SAMLING 3')
    plt.bar(label,jumlah)
    plt.tight_layout()
    graph = get_graph()
    return graph

def get_plot4(x4,y4):
    label = ['Tidak Potensi', 'Potensi']
    jumlah = [x4,y4]
    
    plt.switch_backend('AGG')
    plt.figure(figsize=(8,4))
    plt.xticks(rotation=45)
    plt.title('Hasil Klasifikasi SAMLING 4')
    plt.bar(label,jumlah)
    plt.tight_layout()
    graph = get_graph()
    return graph