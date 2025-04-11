<?php
$jml = $_GET['jml'];
echo "<table border='1'>\n";

for ($a = $jml; $a > 0; $a--) {
    $total = 0;

    // Hitung total untuk baris ini
    for ($b = $a; $b > 0; $b--) {
        $total += $b;
    }

    // Tampilkan baris total
    echo "<tr><td colspan='$jml'><b>TOTAL: $total</b></td></tr>\n";

    // Tampilkan baris angka
    echo "<tr>";
    for ($b = $a; $b > 0; $b--) {
        echo "<td>$b</td>";
    }

    // Tambahkan sel kosong jika perlu supaya baris tetap sejajar
    for ($c = 0; $c < $jml - $a; $c++) {
        echo "<td></td>";
    }

    echo "</tr>\n";
}

echo "</table>";
?>
