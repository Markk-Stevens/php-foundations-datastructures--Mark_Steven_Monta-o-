<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Recursive Directory Display </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .library-container {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .category {
            cursor: pointer;
            padding: 0.5rem 1rem;
            margin: 0.2rem 0;
            background-color: #007bff;
            color: white;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .category:hover {
            background-color: #0056b3;
        }

        .book {
            padding: 0.3rem 1rem;
            margin-left: 2rem;
            margin-top: 0.2rem;
            border-left: 2px solid #007bff;
            color: #333;
            border-radius: 4px;
            background: #e9f0ff;
        }

        .nested {
            display: none;
            margin-left: 1rem;
        }

        .active > .nested {
            display: block;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center"> Recursive Directory Display</h2>
    <div class="library-container">

        <?php
        // Nested library array
        $library = [
            "Fiction" => [
                "Fantasy" => ["Harry Potter", "The Hobbit"],
                "Mystery" => ["Sherlock Holmes", "Gone Girl"]
            ],
            "Non-Fiction" => [
                "Science" => ["A Brief History of Time", "The Selfish Gene"],
                "Biography" => ["Steve Jobs", "Becoming"]
            ]
        ];

        // Recursive function to display library as collapsible tree
        function displayLibrary($library) {
            echo '<ul class="list-unstyled">';
            foreach ($library as $category => $contents) {
                if (is_array($contents)) {
                    echo '<li class="category">' . htmlspecialchars($category);
                    echo '<div class="nested">';
                    displayLibrary($contents);
                    echo '</div></li>';
                } else {
                    echo '<li class="book">' . htmlspecialchars($contents) . '</li>';
                }
            }
            echo '</ul>';
        }

        displayLibrary($library);
        ?>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Add collapsible functionality
    document.querySelectorAll('.category').forEach(function(category) {
        category.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent parent toggling
            this.classList.toggle('active');
        });
    });
</script>
</body>
</html>
