<?php

$domain = "localhost/url/";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'shorten-url';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql2 = mysqli_query($conn, "SELECT * FROM url ORDER BY id DESC");
if (mysqli_num_rows($sql2) > 0) {;
?>
    <div class="url-area">
        <div class="title">
            <li>Shorten URL</li>
            <li>Original URL</li>
            <li>Clicks</li>
            <li>Action</li>
        </div>
        <?php
        while ($row = mysqli_fetch_assoc($sql2)) {
        ?>
            <div class="data">
                <li>
                    <a href="<?php echo $domain . $row['short_url'] ?>" target="_blank">
                        <?php
                        if ($domain . strlen($row['short_url']) > 50) {
                            echo $domain . substr($row['short_url'], 0, 50) . '...';
                        } else {
                            echo $domain . $row['short_url'];
                        }
                        ?>
                    </a>
                </li>
                <li>
                    <?php
                    if (strlen($row['original_url']) > 60) {
                        echo substr($row['original_url'], 0, 60) . '...';
                    } else {
                        echo $row['original_url'];
                    }
                    ?>
                </li>
                </li>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>
</div>