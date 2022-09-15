<?php
spl_autoload_register();
\classes\Autoload::getPost();
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script defer src="/assets/js/jquery.min.js"></script>
    <script defer src="assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<form method="post">
    <div class="form-group col-md-4">
        <label for="type">Data Type</label>
        <select id="type" class="form-control" name="type" required>
            <option value="">Choose...</option>
            <option value="addresses">Addresses</option>
            <option value="books">Books</option>
            <option value="companies">Companies</option>
            <option value="credit_cards">Credit Cards</option>
            <option value="images">Images</option>
            <option value="persons">Persons</option>
            <option value="places">Places</option>
            <option value="products">Products</option>
            <option value="texts">Texts</option>
            <option value="places">Places</option>
            <option value="users">Users</option>
            <option value="Custom">Custom</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="language">Language</label>
        <select id="language" class="form-control" name="language" required>
            <option value="">Choose...</option>
            <option value="en_US">English</option>
            <option value="de_DE">German</option>
            <option value="fr_FR">French</option>
            <option value="uk_UA">Ukraine</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>Number of Records</label>
        <input class="form-control" type="number" name="number" required/>
    </div>
    <div class="form-group col-md-4">
        <label for="format">Format</label>
        <select id="format" class="form-control" name="format" required>
            <option value="">Choose...</option>
            <option value="json">JSON</option>
            <option value="csv">CSV</option>
            <option value="txt">ARRAY</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Generate</button>
</form>
</body>
</html>
