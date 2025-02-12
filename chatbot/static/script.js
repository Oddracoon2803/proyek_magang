function sendMessage() {
    let userInput = document.getElementById("user-input").value;
    if (userInput.trim() === "") return;

    let chatBox = document.getElementById("chat-box");

    // Tambahkan pesan user (di kanan dengan bubble)
    let userMessage = document.createElement("div");
    userMessage.classList.add("chat-message", "user");
    userMessage.innerHTML = `
        <div class="chat-bubble">${userInput}</div>
        <img src="${userIconPath}" alt="User">
    `;
    chatBox.appendChild(userMessage);

    // Kirim data ke server
    fetch("/get_response", {
        method: "POST",
        body: JSON.stringify({ message: userInput }),
        headers: { "Content-Type": "application/json" }
    })
        .then(response => response.json())
        .then(data => {
            let botMessage = document.createElement("div");
            botMessage.classList.add("chat-message", "bot");

            // Format response: Ganti \n dengan <br> dan **bold** menjadi <b>bold</b>
            let formattedResponse = formatText(data.response);

            botMessage.innerHTML = `
                <img src="${botIconPath}" alt="Bot">
                <div class="chat-bubble">${formattedResponse}</div>
            `;
            chatBox.appendChild(botMessage);

            // Auto-scroll ke bawah
            chatBox.scrollTop = chatBox.scrollHeight;
        });

    document.getElementById("user-input").value = "";
}

function handleKeyPress(event) {
    if (event.key === "Enter") {
        sendMessage();
    }
}

// Fungsi untuk mengganti \n dengan <br> dan **bold** dengan <b>bold</b>
function formatText(text) {
    return text
        .replace(/\n/g, '<br>') // Ganti baris baru dengan <br>
        .replace(/\*\*(.*?)\*\*/g, '<b>$1</b>') // Ganti **teks** dengan <b>teks</b>
        .replace(/(https?:\/\/[^\s]+)/g, '<a href="$1" target="_blank">$1</a>'); // Ganti URL menjadi tautan yang bisa diklik
}

let timeout;

function resetTimer() {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        location.reload();
    }, 120000);
}

// Event listener untuk mendeteksi aktivitas pengguna
document.addEventListener("mousemove", resetTimer);
document.addEventListener("keypress", resetTimer);
document.addEventListener("click", resetTimer);
document.addEventListener("scroll", resetTimer);

// Jalankan timer saat halaman dimuat
resetTimer();


