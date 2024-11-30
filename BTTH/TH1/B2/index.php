<?php
include 'config.php'; 

$stmt = $conn->query("SELECT * FROM questions");
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bài thi trắc nghiệm</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bài thi trắc nghiệm</h1>
        <form method="POST" action="result.php">
            <?php foreach ($questions as $index => $question): ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <strong>Câu <?= $index + 1 ?>: <?= htmlspecialchars($question['question']) ?></strong>
                    </div>
                    <div class="card-body">
                        <?php foreach (['A', 'B', 'C', 'D'] as $option): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" 
                                       name="question<?= $question['id'] ?>" 
                                       value="<?= $option ?>" 
                                       id="question<?= $question['id'] . $option ?>">
                                <label class="form-check-label" 
                                       for="question<?= $question['id'] . $option ?>">
                                    <?= htmlspecialchars($question["option_" . strtolower($option)]) ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary mt-3">Nộp bài</button>
        </form>
    </div>
</body>
</html>
