<?php
$name = $_GET['name'] ?? 'Unknown';
$img = $_GET['img'] ?? 'https://i.pravatar.cc/150';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chat with <?php echo htmlspecialchars($name); ?></title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #ece5dd;
      display: flex;
      flex-direction: column;
      height: 100vh;
    }
    .chat-header {
      background: #075E54;
      color: white;
      padding: 15px;
      display: flex;
      align-items: center;
    }
    .chat-header img {
      border-radius: 50%;
      margin-right: 10px;
      width: 40px;
      height: 40px;
    }
    .chat-window {
      flex: 1;
      padding: 10px;
      overflow-y: scroll;
      display: flex;
      flex-direction: column;
    }
    .message {
      max-width: 60%;
      padding: 10px;
      margin: 5px 0;
      border-radius: 8px;
      animation: fadeIn 0.3s ease;
    }
    .sent {
      background: #dcf8c6;
      align-self: flex-end;
    }
    .received {
      background: white;
      align-self: flex-start;
    }
    .chat-input {
      display: flex;
      padding: 10px;
      background: #f0f0f0;
    }
    .chat-input input {
      flex: 1;
      padding: 10px;
      border: none;
      border-radius: 20px;
      margin-right: 10px;
      outline: none;
    }
    .chat-input button {
      background: #075E54;
      color: white;
      border: none;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      cursor: pointer;
      font-size: 16px;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(10px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>
  <div class="chat-header">
    <img src="<?php echo $img; ?>" alt="avatar">
    <div><?php echo htmlspecialchars($name); ?></div>
  </div>
  <div class="chat-window" id="chat-window">
    <div class="message received">Hello! How can I help you today?</div>
    <div class="message sent">Hi! I have a question.</div>
  </div>
  <div class="chat-input">
    <input type="text" id="message-input" placeholder="Type a message">
    <button onclick="sendMessage()">➤</button>
  </div>

  <script>
    function sendMessage() {
      const input = document.getElementById('message-input');
      const text = input.value.trim();
      if (text === '') return;

      const msg = document.createElement('div');
      msg.classList.add('message', 'sent');
      msg.textContent = text;

      const chatWindow = document.getElementById('chat-window');
      chatWindow.appendChild(msg);
      chatWindow.scrollTop = chatWindow.scrollHeight;
      input.value = '';
    }
  </script>
</body>
</html>
