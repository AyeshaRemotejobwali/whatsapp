<!DOCTYPE html>
<html>
<head>
  <title>WhatsApp Clone - Contacts</title>
  <style>
    body { font-family: 'Segoe UI', sans-serif; margin: 0; background: #ece5dd; }
    .header { background: #075e54; color: white; padding: 20px; font-size: 24px; text-align: center; }
    .contact-list { padding: 20px; }
    .contact { background: white; margin: 10px 0; padding: 10px; border-radius: 10px; cursor: pointer;
               display: flex; align-items: center; transition: transform 0.2s ease-in-out; }
    .contact:hover { transform: scale(1.02); }
    .avatar { width: 50px; height: 50px; border-radius: 50%; margin-right: 15px; }
    .name { font-size: 18px; color: #333; }
  </style>
</head>
<body>
  <div class="header">WhatsApp Clone</div>
  <div class="contact-list">
    <div class="contact" onclick="window.location.href='chat.php?name=Alice'">
      <img src="https://via.placeholder.com/50" class="avatar" />
      <div class="name">Alice</div>
    </div>
    <div class="contact" onclick="window.location.href='chat.php?name=Bob'">
      <img src="https://via.placeholder.com/50" class="avatar" />
      <div class="name">Bob</div>
    </div>
    <div class="contact" onclick="window.location.href='chat.php?name=Charlie'">
      <img src="https://via.placeholder.com/50" class="avatar" />
      <div class="name">Charlie</div>
    </div>
  </div>
</body>
</html>
