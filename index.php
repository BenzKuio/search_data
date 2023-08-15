<?php
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="search_title">ค้นหาข้อมูล</div>
    <input type="text" id="search">
    <div id="search_result"></div>
    <div id="notfound">
        <p>No results found.</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#notfound').css("display", "none");
            $('#search').keyup(function() {
                var input = $(this).val();
                if (input != "") {
                    $('#search_result').css("display", "block");
                    $.ajax({
                        url: 'search_data.php',
                        method: 'post',
                        data: {
                            input: input
                        },
                        success: function(data) {
                            $('#search_result').html(data);
                        }
                    });
                } else {
                    $('#search_result').css("display", "none");
                }
            });
        });
    </script>
</body>

</html>