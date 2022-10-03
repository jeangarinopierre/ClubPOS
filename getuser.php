<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','Xternet19832020','album');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"album");
$sql="SELECT * from album";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>id</th>
<th>title</th>
<th>Artist</th>
<th>label</th>
<th>realsed</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['title'] . "</td>";
  echo "<td>" . $row['artist'] . "</td>";
  echo "<td>" . $row['label'] . "</td>";
  echo "<td>" . $row['released'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>