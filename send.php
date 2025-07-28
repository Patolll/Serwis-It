<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    if (!$name || !$email || !$message) {
        echo "Wszystkie pola są wymagane i email musi być poprawny.";
        exit;
    }

    $to = "patryk_dmochowski@wp.pl"; // <--- tutaj wstaw adres docelowy
    $subject = "Nowa wiadomość z formularza kontaktowego";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Imię: $name\nEmail: $email\n\nWiadomość:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "Dziękujemy za wiadomość! Skontaktujemy się wkrótce.";
    } else {
        echo "Błąd podczas wysyłania wiadomości.";
    }
} else {
    header("Location: index.html");
    exit;
}
