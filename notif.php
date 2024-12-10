<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F0E6D2;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #ecddbd;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
        }

        .notifications-title {
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .notifications-title .bell {
            margin-left: 10px;
            font-size: 20px;
        }

        .notification {
            background-color: white;
            border-left: 5px solid #4CAF50;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification-header .username {
            font-weight: bold;
            color: #A8D5BA;
        }

        .notification-header .time {
            font-size: 12px;
            color: #75ad8c;
        }

        .notification-body {
            font-size: 14px;
            color: #A8D5BA;
            margin-top: 5px;
        }

        .notification-footer {
            margin-top: 10px;
            font-size: 12px;
            color: #75ad8c;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>BiblioSmart</h2>
    </div>
    <div class="container">
        <div class="notifications-title">
            <span>Notifications</span>
            <span class="bell">🔔</span>
        </div>

    <script>
        // Function to simulate receiving new notifications dynamically
        setTimeout(function() {
            const notificationsDiv = document.getElementById('notifications');
            
            // Create a new notification dynamically
            const newNotification = document.createElement('div');
            newNotification.classList.add('notification');
            newNotification.innerHTML = `
                <div class="notification-header">
                    <span class="username">New User</span>
                    <span class="time">Just now</span>
                </div>
                <div class="notification-body">
                    commented on your post
                </div>
                <div class="notification-footer">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </div>
            `;
            
            notificationsDiv.prepend(newNotification); // Add the new notification at the top
        }, 5000); // Add a new notification after 5 seconds
    </script>
</body>
</html>
