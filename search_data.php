<?php
include("connect.php");
if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $query = "SELECT * FROM exam1 WHERE first_name LIKE'%{$input}%'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) { ?>
        <table class="center">
            <tr>
                <th id="first">firstname</th>
                <th id="last">lastname</th>
                <th id="mail">email</th>
                <th id="gender">gender</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td> " . $row['first_name'] . "</td>";
                echo "<td> " . $row['last_name'] . "</td>";
                echo "<td> " . $row['email'] . "</td>";
                echo "<td> " . $row['gender'] . "</td>";
                // ... Output other fields
                echo "</tr>";
            }
            ?>
        </table>

<?php
    } else {
        echo "<div id='notfound'>No results found.</div>";
    }
}

?>