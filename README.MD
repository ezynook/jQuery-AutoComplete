<div align="center">
    <h1>jQuery AutoComplete</h1>
</div>

## Create List in `PHP`
```php
<?php
    require_once 'config/db.php';
    $strQuery = "SELECT * FROM engineer";
    $query = mysqli_query($IT, $strQuery);
    $data = [];
    foreach ($query as $row) {
        $data[] = $row['engineer_name'];
    }
    $split = implode('","', $data);
?>
```
## HTML Input to use `AutoComplete`
```html
<input type="text" class="form-control" id="search">
```

## Script JS
```javascript
$(document).ready( () => {

    let list_Data = ["<?= $split; ?>"];

    $("#search").autocomplete({
        source: list_Data,
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
```
`Pasit Y.`