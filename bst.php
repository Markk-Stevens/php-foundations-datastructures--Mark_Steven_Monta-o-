<?php
// Node and BST classes
class Node {
    public $data;
    public $left;
    public $right;
    public function __construct($data) {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}

class BinarySearchTree {
    public $root;
    public function __construct() { $this->root = null; }
    public function insert($data) {
        $newNode = new Node($data);
        if ($this->root === null) $this->root = $newNode;
        else $this->insertNode($this->root, $newNode);
    }
    private function insertNode($node, $newNode) {
        if (strcasecmp($newNode->data, $node->data) < 0) {
            if ($node->left === null) $node->left = $newNode;
            else $this->insertNode($node->left, $newNode);
        } else {
            if ($node->right === null) $node->right = $newNode;
            else $this->insertNode($node->right, $newNode);
        }
    }
    public function inorderTraversal($node, &$arr) {
        if ($node !== null) {
            $this->inorderTraversal($node->left, $arr);
            $arr[] = $node->data;
            $this->inorderTraversal($node->right, $arr);
        }
    }
}

// Initialize BST and insert books
$bst = new BinarySearchTree();
$books = [
    "The Great Gatsby",
    "Moby Dick",
    "Pride and Prejudice",
    "1984",
    "To Kill a Mockingbird",
    "The Catcher in the Rye",
    "War and Peace"
];
foreach ($books as $book) $bst->insert($book);

// Get books in alphabetical order
$orderedBooks = [];
$bst->inorderTraversal($bst->root, $orderedBooks);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Binary Search Tree (BST) for Book Titles</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background: #f0f2f5;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.container {
    margin-top: 60px;
    max-width: 700px;
}
#searchInput {
    border-radius: 50px;
    padding: 15px 20px;
    font-size: 1.1rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: 0.3s;
}
#searchInput:focus {
    box-shadow: 0 6px 18px rgba(0,0,0,0.2);
    outline: none;
}
.book-card {
    transition: all 0.3s ease;
    opacity: 1;
    transform: translateY(0);
    cursor: pointer;
}
.book-card.hide {
    opacity: 0;
    transform: translateY(-10px);
    pointer-events: none;
    height: 0;
    margin: 0;
    padding: 0;
    overflow: hidden;
}
.highlight {
    background-color: #ffeeba !important;
    font-weight: bold;
    border-left: 4px solid #ffc107;
    padding-left: 6px;
}
.no-results {
    font-size: 1.2rem;
    color: #6c757d;
    margin-top: 20px;
    transition: opacity 0.3s;
}
</style>
</head>
<body>
<div class="container text-center">
    <h1 class="mb-5 fw-bold">Binary Search Tree (BST) for Book Titles</h1>

    <input type="text" id="searchInput" class="form-control mb-4" placeholder="Search for a book...">

    <div id="bookList" class="d-grid gap-3">
        <?php foreach ($orderedBooks as $book): ?>
            <div class="card p-3 book-card text-start"><?= htmlspecialchars($book) ?></div>
        <?php endforeach; ?>
    </div>

    <div id="noResults" class="no-results" style="display:none;">No books found </div>
</div>

<script>
const searchInput = document.getElementById('searchInput');
const bookList = document.getElementById('bookList');
const books = bookList.getElementsByClassName('book-card');
const noResults = document.getElementById('noResults');

searchInput.addEventListener('input', function() {
    const filter = searchInput.value.toLowerCase();
    let visibleCount = 0;

    for (let i = 0; i < books.length; i++) {
        const originalText = books[i].dataset.original || books[i].textContent;
        books[i].dataset.original = originalText;
        const lowerText = originalText.toLowerCase();

        if (lowerText.includes(filter)) {
            books[i].classList.remove('hide');
            // Highlight matched text
            if (filter !== '') {
                const regex = new RegExp(`(${filter})`, 'gi');
                books[i].innerHTML = originalText.replace(regex, '<span class="highlight">$1</span>');
            } else {
                books[i].innerHTML = originalText;
            }
            visibleCount++;
        } else {
            books[i].classList.add('hide');
            books[i].innerHTML = originalText; // reset
        }
    }

    noResults.style.display = visibleCount === 0 ? 'block' : 'none';
});
</script>
</body>
</html>
