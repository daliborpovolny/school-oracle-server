<?php
$file = "/tmp/notes.txt";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $note = trim($_POST["note"] ?? "");
    if ($note !== "") {
        file_put_contents($file, $note . "\n", FILE_APPEND);
    }
}
$notes = @file($file, FILE_IGNORE_NEW_LINES);
?>
<!DOCTYPE html>
<html>
<head><title>Notes</title></head>
<body>
    <h1>Simple Notes</h1>
    <form method="post">
        <input type="text" name="note" placeholder="Write a note">
        <button type="submit">Add</button>
    </form>
    <ul>
        <?php foreach ($notes as $n): ?>
            <li><?= htmlspecialchars($n) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
