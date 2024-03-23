<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
</head>

<body>
    <h1>Error Encountered</h1>
    <?php
    // Check if error message is passed in the URL
    if (isset($_GET['error']) && !empty($_GET['error'])) {
        $errorMessage = $_GET['error'];
        echo "<p>Error: $errorMessage</p>";
    } else {
        echo "<p>An unknown error occurred.</p>";
    }
    ?>
    <a href="javascript:history.back()">Go Back</a>
</body>

</html>
