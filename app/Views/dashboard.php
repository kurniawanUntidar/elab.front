<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard ELab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">ELab</a>
            <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </nav>
    <div class="container">
        <h3>News Feed</h3>
        <table class="table table-striped mt-3">
            <thead><tr><th>Title</th><th>Category</th><th>Author</th></tr></thead>
            <tbody>
                <?php foreach($news as $n): ?>
                <tr>
                    <td><?= esc($n['title']) ?></td>
                    <td><?= esc($n['category']) ?></td>
                    <td><?= esc($n['author']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>