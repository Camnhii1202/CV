<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CV Cá nhân</title>
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="../public/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body>
    <?php
    if (isset($data)) {
        extract($data);
    }
    require_once $view;
    ?>

    <div id="toast" class="toast hidden">
        <span id="toast-message"></span>
    </div>

    <script>
        function showToast(message, type = "success") {
            const toast = document.getElementById("toast");
            const toastMessage = document.getElementById("toast-message");

            // Set the message and type
            toastMessage.textContent = message || 'Thông báo';
            toast.className = `toast visible ${type}`;

            // Hide the toast after 3 seconds
            setTimeout(() => {
                toast.className = `toast hidden ${type}`;
            }, 3000);
        }
    </script>
</body>

</html>