<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
<h1>Edit Data </h1>
<form action="edit_action.php" method="POST">
    Id: <input type="number" name="id" id="id" min="0" <?php $x = $_GET["id"]; if ($x !==
        null) echo "value='$x'"; ?> ><br>
    Nama: <input type="text" name="nama" id="nama" <?php $x = $_GET["nama"]; if
    ($x !== null) echo "value='$x'"; ?>><br>
    Alamat: <input type="text" name="alamat" id="alamat" <?php $x = $_GET["alamat"]; if ($x !==
        null) echo "value='$x'"; ?>><br>
    <input type="submit" value="Kirim">
</form>
</body>
</html>