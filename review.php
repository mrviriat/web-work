<div class="container_CommentForm">
    <h2>Обратная связь</h2>

    <?php
    // Обработка отправки формы
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rating_form"])) {
        // Проверка наличия данных
        if (!empty($_POST['email']) && !empty($_POST['rating']) && !empty($_POST['comment'])) {
            // Проверка валидности email
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            if ($email) {
                // Остальные данные
                $rating = $_POST['rating'];
                $comment = $_POST['comment'];

                // Отправка email
                $to = "Kazak_EI_21@mf.grsu.by";
                $subject = "Обратная связь от пользователя";
                $message = "Email: $email\nОценка: $rating\nКомментарий: $comment";

                // Заголовки для отправки в формате HTML
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8\r\n";
                $headers .= "From: $email";

                // Отправка
                if (mail($to, $subject, $message, $headers)) {
                    echo '<p class="success_CommentForm">Спасибо за обратную связь!</p>';
                } else {
                    echo '<p class="error_CommentForm">Ошибка при отправке сообщения. Попробуйте позже.</p>';
                }
            } else {
                echo '<p class="error_CommentForm">Пожалуйста, введите корректный email.</p>';
            }
        } else {
            echo '<p class="error_CommentForm">Все поля формы обязательны для заполнения.</p>';
        }
    }
    ?>

    <!-- Форма обратной связи -->
    <form method="post" action="" class="form_CommentForm">
        <label for="email" class="label_CommentForm">Email:</label>
        <input type="email" name="email" required class="input_CommentForm">

        <label for="rating" class="label_CommentForm">Оценка работы сайта:</label>
        <input type="number" name="rating" min="1" max="5" required class="input_CommentForm">

        <label for="comment" class="label_CommentForm">Комментарий:</label>
        <textarea name="comment" rows="4" required class="textarea_CommentForm"></textarea>

        <button type="submit" name="rating_form" class="button_CommentForm">Отправить</button>
    </form>
</div>