<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dreamhome";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT avg(rent),type FROM propertyforrent group by type";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
		?>
        <form action="generate-report.php" method="post">
		 <table id="rent" class="table avg-rent" name="rent">
                <thead>         
                    <tr class="warning">
                        <th>AVG(rent)</th>
                        <th>TYPE</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){?>
                    <tr>
                        <td><?php echo $row['avg(rent)'] ?></td>
                        <td><?php echo $row['type'] ?></td>
                    </tr>
                    <?php } }?>
                    </tbody>
                    </table>	
    <select >
            <option selected="href='excel.php'">
            excel
             </option>
             <option onclick=" <a href='excel.php'>
                </a>">
             <a href="excel.php">
            		pdf
                </a>
             </option>
        </select>
    <input type="submit" name="pdf"/>
    <a href='excel.php'>
                excel</a>
</form>
<?php                    
mysqli_close($conn);
$conn = null;?>