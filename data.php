<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Biodata Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        $connect = mysqli_connect("localhost", "root", "", "mahasiswa_helen");
    ?>

    <nav>
        <a href="data.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAE50lEQVRoge2aX2xTVRzHP79zyyaxqwgoaiIvLDPEl27nrqSAgnuSiD5IRCMmmojhUaPhzwvPoCYGYkzQ6AMvkij4wiIhEVz446Tt3XgisowXTTAQMQ4Xgbb3/Hzo3Sxdu61bO4jpN2ly09/vnPP99fTezzk5V5inenp6VhtjkqraCawCOoFHgQeAONARpf4NjAO3gWvAFeCKiIyq6nAQBL/Mx4fU2yCVSi0Lw3Ar0Ac8A6yYj4EyXQPOAKc9z/s2k8ncqKfxrAvxfX8TsF1VNwNtZaHrwKCIjDjnRoFREbnqnLtVLBZvtrW1jQPk8/l4LBZLGGMWq+oTQKcxplNVu4A0pVmcUF5E+oEvc7nciYYU0t3dnTbGfAysi75yqnpaRI45584MDw9fms1AM/no7u5ebYzZICJbVPU5wESx8865ncPDw4PTdlArkE6nF+fz+YPA9ijvBnDAGHM4m83+1gDzNdXb2/ukc+4t4F1gGaDApx0dHR8MDAwUq7WpWsiaNWsSxWLxe0qzcAf4BPgwCIKx5livrmQyucTzvN3A+5T+zidjsdjWCxcu3KzMrVaIWGuPAy8A10Xk5Vwud765lqeXtXY9cIzSfdQfBMFLlGZpUlMK8X3/NVU9Aox7nmczmczIgridQalUqisMwwCIq+qrQ0ND35THTWUDVd0RXe66X4oAyGQyI6q6B0BEdlTGpxQC9ACEYXikyd7qVqFQ+Dq6tJWxaoUkmmtn7orH4xO3wkOVsWqFlALGbGuaozmqUCi8XitWsxAR2Z9KpbqaY6l+pVKpLlXdVytesxAgHobhed/3NzbBV13q7e1dG4bhGUqL0KqabkZOActV9aS1dl8ymVzSDJPTKZlMLrHW7nfO/QisUNUfauXWLCQejz8PHKRE1D2e541aa/daa1c23vLdstautNbu9TxvFNgNtInIgUQisalWmylAtNYqQBAEAuD7/jrn3EcisjZKccCAqn7ned5ANpu9RAVl5yDxff9p59wGEdkCbKBs0WiM2ZXNZn+q5m9CsZlGiJYn63zf3+Sce1tENgN9ItLnnMNa+4eIDKrqCDBqjBktFotXVfWfMAzHypfxnuc9tGjRogeBx51znUCniHSpalpVl4tMerujqv3GmK9mu4yfsZCygk4AJ9Lp9NJCofCKqvYBzwKPqeqLE3nOOYwp/Zie5022b2trm4yXS3VyMn8XkTPOudPt7e1HBwcH/5ytt7oKmVA0wOfRB9/3nwK6KW1zV0Vb3keAxZTgOvGkGQduArdE5DrRVtc5NxqLxYbnuxyqeY+EYfjwxYsX/5pP541WOp1ems/nb8DUe6RF9oVWi+wtsjdALbJPpxbZaZF9TmqR/V6oRfYW2RukFtmjTlpkp0V2YJ5kr/bXGgMSswXiQpK9DIhjQRDc9fCpNiNDwMYIiJ/N1Hkul7sMXJ4prxEqA2JQGat20HMI7nsgHqqMTykkOtLqpwTEs9H53T2VtXZ9GIZngbiIHA+C4GhlTjWOaCwW2waco3T4eOpeAxE4FXk563neG1R53E97zl4oFA6o6jv8d85+EDgcBMGvzbFeUgTdNyk7Z1fVLxKJxHsDAwO3q7WZ05sPLCwQz6nqzqGhoZ+n7WC2I1UAsb0s1BAgAsvL+qwbiHW/HVQNiPX2UUONBWK9ul+2uv8b/QslYbIzrradaAAAAABJRU5ErkJggg=="></a>
        <a href="index.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAA2klEQVRoge2WQQ7DIAwETdUXwa1qX9/06De1p0oVCTWEBBvYOVpRxLI2XiIAwD9cXPDev5xzN43DFLAw8+O3cIm/6EAEEdE9LlxTXzLzyi0LhBDeW/WVI70CIdYYRkhy2PeSGsa95D46cESi9vkudTZbiPRj7b0zX2tp37jEaTNy9OslMV9r5aLVgsM4AiHWQNayBrJWjPbmn6+1tG9cAlnLGsha1oAQazTLWmfPDhyR+DoQO1S6X5B+j6L1rMCRFNjslQwjJNlarWN4LVuOLM1PUc5T+wAA9MYHjAVESMQ8bE4AAAAASUVORK5CYII="></a>
    </nav>

    <div class="container">
        <h2>Data Mahasiswa</h2>
        <div class="filter">
            <p>Tanggal Lahir</p>
            <div class="from">
                <label for="tal">Dari</label>
                <input type="date" id="tal" name="tal" max="<?php echo date('Y-m-d', strtotime('-16 year')); ?>" value="<?php echo $tal; ?>" required>
            </div>
            <div class="to">
                <label for="tal">Sampai</label>
                <input type="date" id="tal" name="tal" max="<?php echo date('Y-m-d', strtotime('-16 year')); ?>" value="<?php echo $tal; ?>" required>
            </div>
            <input type="button" value="Filter" name="filter">
        </div>
        <div class="table">
            <?php
                $query = "SELECT * FROM biodata";
                $result = $connect -> query($query);
                if ($result->num_rows > 0) {
                    echo "<table>
                    <tbody>
                    <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>E-Mail</th>
                    <th>Program Studi</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Agama</th>
                    <th>Hobi</th>
                    </tr>";
                    $number = 1;
                    while($row = $result -> fetch_assoc()) {
                        echo "<tr>";

                        echo "<td>" . $number . "</td>";

                        echo "<td>" . $row["Nim"] . "</td>";

                        echo "<td>" . $row["Nama"] . "</td>";

                        echo "<td>" . $row["Email"] . "</td>";

                        $row["ProgramStudi"];
                        if ($row["ProgramStudi"] == "akn") {
                            $row["ProgramStudi"] = "Akuntansi";
                        } else if ($row["ProgramStudi"] == "mjm") {
                            $row["ProgramStudi"] = "Manajemen";
                        } else if ($row["ProgramStudi"] == "iab") {
                            $row["ProgramStudi"] = "Ilmu Administrasi Bisnis";
                        } else if ($row["ProgramStudi"] == "ikm") {
                            $row["ProgramStudi"] = "Ilmu Komunikasi";
                        } else if ($row["ProgramStudi"] == "si") {
                            $row["ProgramStudi"] = "Sistem Informasi";
                        } else if ($row["ProgramStudi"] == "ti") {
                            $row["ProgramStudi"] = "Teknik Informatika";
                        }
                        echo "<td>" . $row["ProgramStudi"] . "</td>";

                        if ($row["JenisKelamin"] == "p") {
                            $row["JenisKelamin"] = "Perempuan";
                        } else if ($row["JenisKelamin"] == "l") {
                            $row["JenisKelamin"] = "Laki-Laki";
                        }
                        echo "<td>" . $row["JenisKelamin"] . "</td>";

                        $bln = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                        $bulan;
                        for ($i = 0; $i < count($bln); $i++) {
                            if ((int) substr($row["TanggalLahir"], 5, -3) == $i + 1) {
                                $bulan = $bln[$i];
                            }
                        }
                        $tal = substr($row["TanggalLahir"], -2) . " " . $bulan . " "  . substr($row["TanggalLahir"], 0, -6);
                        $ttl = $row["TempatLahir"] . ", " . $tal;
                        echo "<td>" . $ttl . "</td>";

                        echo "<td>" . $row["Alamat"] . "</td>";

                        if ($row["Agama"] == "bdh") {
                            $row["Agama"] = "Buddha";
                        } else if ($row["Agama"] == "hnd") {
                            $row["Agama"] = "Hindu";
                        } else if ($row["Agama"] == "ism") {
                            $row["Agama"] = "Islam";
                        } else if ($row["Agama"] == "ktk") {
                            $row["Agama"] = "Kristen Katolik";
                        } else if ($row["Agama"] == "khc") {
                            $row["Agama"] = "Konghucu";
                        } else if ($row["Agama"] == "pts") {
                            $row["Agama"] = "Kristen Protestan";
                        } else if ($row["Agama"] == "o") {
                            $row["Agama"] = "Lainnya";
                        } else if ($row["Agama"] == "n") {
                            $row["Agama"] = "Tidak Ada";
                        }
                        echo "<td>" . $row["Agama"] . "</td>";

                        $row["Hobi"] = str_replace("membaca", "Membaca", $row["Hobi"]);
                        $row["Hobi"] = str_replace("menonton", "Menonton", $row["Hobi"]);
                        $row["Hobi"] = str_replace("belajar", "Belajar", $row["Hobi"]);
                        $row["Hobi"] = str_replace("bermaingame", "Bermain Game", $row["Hobi"]);
                        $row["Hobi"] = str_replace("travelling", "Travelling", $row["Hobi"]);
                        $row["Hobi"] = str_replace("lainnya", "Lainnya", $row["Hobi"]);
                        echo "<td>" . $row["Hobi"] . "</td>";

                        echo "</tr>";

                        $number += 1;
                    }
                    echo "</tbody>
                    </table>";
                } else {
                    echo "<div class='data'>0 results</div>";
                }
            ?>
        </div>
    </div>

    <script>
        const url = window.location.pathname;
        const fileName = url.substring(url.lastIndexOf('/')+1);
        if (fileName == "data.php") {
            document.querySelector("a:first-child img").style.borderBottom = "3px solid var(--theme)"
        } else if (fileName == "index.php") {
            document.querySelector("a:last-child img").style.borderBottom = "3px solid var(--theme)"
        }
    </script>
</body>
</html>