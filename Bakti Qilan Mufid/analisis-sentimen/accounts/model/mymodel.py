import pandas as pd
import re
import nltk
import numpy as np
import json
import matplotlib.pyplot as plt
import seaborn as sns
import joblib
from wordcloud import WordCloud
from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
from Sastrawi.StopWordRemover.StopWordRemoverFactory import StopWordRemoverFactory, StopWordRemover, ArrayDictionary


df = pd.read_csv('baktilabel.csv', sep=',' )

#membuat kamus
kamus_slang = open('slang_word.txt').read()
map_kamus_slang = {}
list_kamus_slang = []
for line in kamus_slang.split("\n"):
    if line != "":
        kamus = line.split("=")[0]
        kamus_luas = line.split("=")[1]
        list_kamus_slang.append(kamus)
        map_kamus_slang[kamus] = kamus_luas
list_kamus_slang = set(list_kamus_slang)

#memakai kamus
def perubahan_kata_slang(text):
    new_text = []
    for w in text.split():
        if w.upper() in list_kamus_slang:
            new_text.append(map_kamus_slang[w.upper()])
        else:
            new_text.append(w)
    return " ".join(new_text)

df['pesan'] = df['pesan'].apply(perubahan_kata_slang)


factory = StemmerFactory()
stemmer = factory.create_stemmer() 
stop_factory = StopWordRemoverFactory().get_stop_words()
more_stopword = ['dengan', 'ia', 'Aku','bahwa','oleh', 'memang', 'mendengar']
data = stop_factory + more_stopword
dictionary = ArrayDictionary(data)
stopwords = StopWordRemover(dictionary)


def prep(prep):
    #Konvert ke huruf kecil
    prep = prep.lower()
    #Konvert www.* atau https?://* ke URL
    prep = re.sub('((www\.[^\s]+)|(https?://[^\s]+))','URL',prep)
    #Menghapus tambahan space
    prep = re.sub('[\s]+', ' ', prep)
    #Hanya Huruf
    prep = re.sub("[^a-zA-Z]", " ", prep) 
    #Tokenisasi setiap kata
    token = nltk.word_tokenize(prep)
    #Stopword
    prep = [stopwords.remove(w) for w in token]
    #Stemming
    prep = [stemmer.stem(w) for w in prep]
    #menggabungkan kembali kata ke dalam satu string dengan dipisahkan spasi.
    return " ".join(prep)

df['clean'] = df['pesan'].apply(prep)



from sklearn.feature_extraction.text import TfidfVectorizer 
tf_idf_vectorizer = TfidfVectorizer(use_idf=True,ngram_range=(1,4))
final_vectorized_data = tf_idf_vectorizer.fit_transform(df['clean'])

final_vectorized_data

from sklearn.model_selection import train_test_split
y, levels = pd.factorize(df['label'])
X_train, X_test, y_train, y_test = train_test_split(final_vectorized_data, y,
                                                    test_size=0.15, random_state=56)  


from sklearn.naive_bayes import MultinomialNB  # Naive Bayes Classifier
from sklearn.pipeline import Pipeline
from sklearn.feature_extraction.text import TfidfVectorizer

model_naive = MultinomialNB().fit(X_train, y_train) 
predicted_naive = model_naive.predict(X_test)


from sklearn.metrics import accuracy_score

score_naive = accuracy_score(predicted_naive, y_test)

from sklearn.metrics import classification_report

#print("Accuracy with Naive-bayes Multinomial: ",score_naive)
#print(classification_report(y_test, predicted_naive, target_names=levels))

text_clf_nb = Pipeline([('tfidf', TfidfVectorizer(use_idf=True,ngram_range=(1,4))),
                     ('clf', MultinomialNB()),])
a = df['clean']
b = df['label']
text_clf_nb.fit(a, b)

import pickle
pickle.dump(text_clf_nb, open('my_model.sav', 'wb'))
#myreview = "maaf pak, saya yang salah"
#coba = "maaf pak sebelumnya, kok nama saya belum terabses ya ?"

#print(text_clf_nb.predict([myreview])) 
#print(text_clf_nb.predict([coba])) 

def prediksi(kalimat):
    import pickle
    x = [kalimat]
    text_clf_nb = pickle.load(open('my_model.sav', 'rb'))
    predictions = text_clf_nb.predict(x)
    print(predictions)

prediksi("maaf pak sebelumnya, kok nama saya belum terabses ya ?")