<h1> Hello from devcontainer-example!</h1>

<p>It's not super exciting, but this is being served from the webserver 
    container in our devcontainer.</p>

<h2>Guestbook</h2>

<table cellspacing="8">
    <tr>
        <th>Name</th>
        <th>Visited</th>
        <th>Note</th>
    <tr>

<?php
$connection = mysqli_connect($_ENV["DATABASE_HOST"], $_ENV["DATABASE_USER"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_DB"]);
$result = mysqli_query($connection, "SELECT * FROM guestbook");
while($row = mysqli_fetch_array($result)) {
    print "<tr>";
    print "<td>" . $row["visitor_name"] . "</td>";
    print "<td>" . $row["created_at"] . "</td>";
    print "<td>" . $row["note"] . "</td>";
    print "</tr>";
}
?>
</table>