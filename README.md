
“Digital Library Organizer”

Data: PHP array $library stores categories and books, with subcategories as nested arrays.

Recursive Function: displayLibrary() loops through the array:

If the item is an array → it’s a category, create a <li> and call the function recursively.

If it’s a string → it’s a book, create a <li> for it.

HTML Output: Produces nested <ul> lists with .category for folders and .book for leaf items.

JavaScript: Adds click listeners on .category elements to toggle the active class, making the tree collapsible.

Result: A clickable, collapsible tree view of your book library.

<HASH>

How It Works

User types a book title in the search box.

PHP checks the hash table using the title as a key.

If the key exists → retrieves and displays details.

If not → shows an error message.

<BST>
  
Using a BST lets you store books so they can be quickly retrieved and automatically listed in alphabetical order without manually sorting an array.
