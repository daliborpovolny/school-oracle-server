<!DOCTYPE html>
<html>
<head><title>Simple Form</title></head>
<body>
    <form method="post">
        <label>Your name:</label>
        <input type="text" name="name" required>
        <button type="submit">Say Hi</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = htmlspecialchars($_POST["name"]);
        echo "<h2>Hello, $name!</h2>";
    }
    ?>
</body>
</html>
