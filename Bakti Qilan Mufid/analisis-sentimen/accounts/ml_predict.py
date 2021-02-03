def prediksi(kalimat):
    import pickle
    x = [kalimat]
    text_clf_nb = pickle.load(open('my_model.sav', 'rb'))
    predictions = text_clf_nb.predict(x)
    prediction = ''.join(predictions)
    return(prediction)