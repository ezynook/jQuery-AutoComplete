<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/style.css">
    <link rel="stylesheet" href="vendor/jquery-ui.css">
    <title>Test</title>
</head>
<PHP>
    <?php
        require_once 'Connections/IT.php';
        $query = mysqli_query($IT, "SELECT * FROM engineer");
        $data = [];
        foreach ($query as $row) {
            $data[] = $row['engineer_name'];
        }
        $split = implode('","', $data);
    ?>
</PHP>
<body>
    <div class="container mt-5">
        <div class="form-group">
            <label for="tags">Engineer</label>
            <input type="text" class="form-control" id="search">
        </div>
    </div>
</body>

<script src="vendor/jquery.min.js"></script>
<script src="vendor/jquery-ui.min.js"></script>
<script>
    $(document).ready( () => {

        let availableTags = ["<?= $split; ?>"];

        $("#search").autocomplete({
            source: availableTags,
            minLength: 1,
            select: function (event, ui) {
                console.log(ui.item.value + " selected");
            }
        });

        $("#search").on('keypress', function (e) {
            if (e.which === 13) {
                $("#search").autocomplete("search");
            }
        });
    });
</script>
</html>