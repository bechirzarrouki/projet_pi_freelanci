<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Chat UI</title>
    <link rel="stylesheet" href="message.css">
    <style>
        .messenger-container { display: flex; height: 100vh; }
        .user-list { width: 25%; padding: 1rem; border-right: 1px solid #ccc; overflow-y: auto; }
        .chat-section { flex: 1; display: flex; flex-direction: column; }
        .chat-header, .chat-footer { padding: 1rem; border-bottom: 1px solid #ccc; }
        .chat-messages { flex: 1; padding: 1rem; overflow-y: auto; }
        .message { margin: 0.5rem 0; }
        .sent { text-align: right; }
        .received { text-align: left; }
        .message-actions button { margin-left: 0.5rem; }
    </style>
</head>
<body>

<div class="messenger-container">

    <!-- Liste des utilisateurs -->
    <div class="user-list">
        <h4>Utilisateurs</h4>
        <div class="user-item" onclick="startChat('Jean Dupont')">Jean Dupont</div>
        <div class="user-item" onclick="startChat('Claire Martin')">Claire Martin</div>
    </div>

    <!-- Section de chat -->
    <div class="chat-section">
        <div class="chat-header" id="chat-header">
            <span id="chat-title">Sélectionnez un utilisateur pour commencer</span>
        </div>

        <div class="chat-messages" id="chat-messages">
            <div class="empty-state">
                <p>Commencez une conversation</p>
            </div>
        </div>

        <div class="chat-footer">
            <input type="text" id="message-input" placeholder="Écrire un message..." disabled>
            <button id="send-message-button" disabled>Envoyer</button>
        </div>
    </div>

</div>

<!-- Lien vers le fichier JavaScript -->
<script src="message.js"></script>

</body>
</html>
