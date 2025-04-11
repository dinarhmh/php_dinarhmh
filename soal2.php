<?php
session_start();

// Step logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nama'])) {
        $_SESSION['nama'] = $_POST['nama'];
    } elseif (isset($_POST['umur'])) {
        $_SESSION['umur'] = $_POST['umur'];
    } elseif (isset($_POST['hobi'])) {
        $_SESSION['hobi'] = $_POST['hobi'];
    }
}

if (!isset($_SESSION['nama'])) {
    // Step 1
    echo "<form method='post'>
        Nama Anda: <input type='text' name='nama'>
        <br><br><input type='submit' value='SUBMIT'>
    </form>";
} elseif (!isset($_SESSION['umur'])) {
    // Step 2
    echo "<form method='post'>
        Umur Anda: <input type='text' name='umur'>
        <br><br><input type='submit' value='SUBMIT'>
    </form>";
} elseif (!isset($_SESSION['hobi'])) {
    // Step 3
    echo "<form method='post'>
        Hobi Anda: <input type='text' name='hobi'>
        <br><br><input type='submit' value='SUBMIT'>
    </form>";
} else {
    // Step 4 (Tampilan hasil)
    echo "<h3>Data Anda:</h3>";
    echo "Nama: " . $_SESSION['nama'] . "<br>";
    echo "Umur: " . $_SESSION['umur'] . "<br>";
    echo "Hobi: " . $_SESSION['hobi'] . "<br>";

    // Reset session untuk bisa diulang
    session_destroy();
    echo "<br><a href='soal2.php'>Mulai Lagi</a>";
}
?>
