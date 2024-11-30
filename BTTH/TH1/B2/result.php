<?php
include 'config.php'; 


$query = "SELECT id, answer FROM questions";
$result = $conn->query($query);

$answers = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $answers[] = trim($row['answer']); 
}

$score = 0;
foreach ($_POST as $key => $userAnswer) {
    $questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT);
    if (isset($answers[$questionNumber - 1]) && $answers[$questionNumber - 1] === $userAnswer) {
        $score++;
    }
}

$totalQuestions = count($answers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Kết quả bài thi</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Kết quả bài thi</h1>
        <div class="alert alert-success text-center">
            Bạn trả lời đúng <strong><?= $score ?></strong> / <?= $totalQuestions ?> câu.
        </div>
        <div class="text-center">
            <a href="index.php" class="btn btn-primary">Làm lại</a>
        </div>
    </div>
</body>
</html>

