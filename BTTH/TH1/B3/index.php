<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>My website</title>
</head>
<body>
    <main>
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid d-flex justify-content-start shadow-sm">
                <span class="navbar-brand mb-0 h1">TLU</span>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="main.php">Trang chủ</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <?php
        include "config.php";
    ?>
    <section>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">City</th>
                    <th scope="col">Email</th>
                    <th scope="col">Coursel</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                     foreach ($sinhvien as $row) {
                        echo "<tr>";
                        foreach ($row as $column) {
                         echo "<td>$column</td>";
                        }
                     echo "</tr>";
                        }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
    </section>

    <footer>
        <hr class="border-3">
        <div class="text-center">
            <h2 class="fw-bold">Trường Đại học Thủy Lợi</h2>
        </div>
    </footer>
    </main>
</body>
</html>