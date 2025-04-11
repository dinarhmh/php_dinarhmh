<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "testdb";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap input form (kalau ada)
$nama = $_GET['nama'] ?? '';
$alamat = $_GET['alamat'] ?? '';
$hobi = $_GET['hobi'] ?? '';

// Query pencarian
$sql = "
    SELECT p.nama, p.alamat, h.hobi
    FROM person p
    JOIN hobi h ON p.id = h.person_id
    WHERE p.nama LIKE ? AND p.alamat LIKE ? AND h.hobi LIKE ?
";

$stmt = $conn->prepare($sql);
$param_nama = "%$nama%";
$param_alamat = "%$alamat%";
$param_hobi = "%$hobi%";
$stmt->bind_param("sss", $param_nama, $param_alamat, $param_hobi);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>SOAL 3 - Listing Person dan Hobi</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 6px;
        }
        .search-box {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Soal 3</h2>

    <table>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['alamat']) ?></td>
            <td><?= htmlspecialchars($row['hobi']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <div class="search-box">
        <h3>Search</h3>
        <form method="GET">
            Nama: <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>"><br>
            Alamat: <input type="text" name="alamat" value="<?= htmlspecialchars($alamat) ?>"><br><br><br>
            <input type="submit" value="SEARCH">
        </form>
    </div>
</body>
</html>
