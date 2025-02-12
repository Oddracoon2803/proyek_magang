from flask import Flask, render_template, request, jsonify
import tensorflow as tf
import numpy as np
import json
import pickle
import random
import re
from tensorflow.keras.preprocessing.sequence import pad_sequences
from Sastrawi.Stemmer.StemmerFactory import StemmerFactory

app = Flask(__name__)

# Load tokenizer & label encoder
with open("models/tokenizer.pkl", "rb") as file:
    tokenizer = pickle.load(file)

with open("models/label_encoder.pkl", "rb") as file:
    label_encoder = pickle.load(file)

with open("dataset/intents.JSON", "r", encoding="utf-8") as file:
    intents = json.load(file)

# Load trained model
model = tf.keras.models.load_model("models/question_classifier.h5")

# Inisialisasi stemmer Sastrawi
factory = StemmerFactory()
stemmer = factory.create_stemmer()

# Fungsi preprocessing input
def preprocess_text(text):
    text = text.lower()
    text = re.sub(r"[^\w\s]", "", text)  # Menghapus tanda baca
    text = stemmer.stem(text)  # Stemming dengan Sastrawi
    return text

# Fungsi chatbot untuk memprediksi jawaban
def chatbot_response(text):
    text = preprocess_text(text)
    sequence = tokenizer.texts_to_sequences([text])
    padded_sequence = pad_sequences(sequence, maxlen=20, padding="post")
    
    # Prediksi kelas pertanyaan
    prediction = model.predict(padded_sequence)
    predicted_class = np.argmax(prediction)
    tag = label_encoder.inverse_transform([predicted_class])[0]
    
    # Ambil respon dari dataset
    for intent in intents["intents"]:
        if intent["tag"] == tag:
            return random.choice(intent["responses"])
    return "Maaf, saya tidak mengerti."

@app.route("/")
def home():
    return render_template("index.html")

@app.route("/get_response", methods=["POST"])
def get_response():
    user_input = request.json["message"]
    bot_reply = chatbot_response(user_input)
    return jsonify({"response": bot_reply})

if __name__ == "__main__":
    app.run(debug=True)
