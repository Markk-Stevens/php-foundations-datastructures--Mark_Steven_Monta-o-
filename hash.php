<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hash Table for Book Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .container { max-width: 700px; }
        .card { margin-top: 20px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4"> Hash Table for Book Details</h1>

    <!-- Search Form -->
    <form method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Enter book title" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Search</button>
    </form>

    <?php
    // Book hash table
    $bookInfo = [
        "Harry Potter" => ["author" => "J.K. Rowling", "year" => 1997, "genre" => "Fantasy"],
        "The Hobbit" => ["author" => "J.R.R. Tolkien", "year" => 1937, "genre" => "Fantasy"],
        "1984" => ["author" => "George Orwell", "year" => 1949, "genre" => "Dystopian"],
        "To Kill a Mockingbird" => ["author" => "Harper Lee", "year" => 1960, "genre" => "Fiction"],
        "Pride and Prejudice" => ["author" => "Jane Austen", "year" => 1813, "genre" => "Romance"]
    ];

    // Function to get book details
    function getBookInfo($title, $bookInfo) {
        if (isset($bookInfo[$title])) {
            $details = $bookInfo[$title];
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Title: ' . htmlspecialchars($title) . '</h5>';
            echo '<p class="card-text"><strong>Author:</strong> ' . $details['author'] . '</p>';
            echo '<p class="card-text"><strong>Year:</strong> ' . $details['year'] . '</p>';
            echo '<p class="card-text"><strong>Genre:</strong> ' . $details['genre'] . '</p>';
            echo '</div></div>';
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Book not found.</div>';
        }
    }

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $inputTitle = $_POST['title'];
        getBookInfo($inputTitle, $bookInfo);
    }
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
