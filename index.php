<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Biodata Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        $connect = mysqli_connect("localhost", "root", "", "mahasiswa_helen");

        $submit = "";
        $nimE = $namaE = $emailE = $telE = $alamatE = "";
        $nim = $nama = $email = $prodi = $jk = $tel = $tal = $alamat = $agama = "";
        $hobi = array();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nim = check($_POST["nim"]);
            if (strlen($nim) != 8) {
                $nimE = "<p>⚠ Panjang NIM harus 8.</p>";
            }

            $nama = check($_POST["nama"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $nama)) {
                $namaE = "<p>⚠ Nama hanya boleh terdiri dari huruf dan spasi.</p>";
            } elseif (strlen($nama) < 4) {
                $namaE = "<p>⚠ Panjang nama minimal 4.</p>";
            } elseif (strlen($nama) > 60) {
                $namaE = "<p>⚠ Panjang nama maksimal 60.</p>";
            }

            $email = $_POST["email"];
            if (strlen($email) < 10) {
                $emailE = "<p>⚠ Panjang e-mail minimal 10.</p>";
            } elseif (strlen($email) > 40) {
                $emailE = "<p>⚠ Panjang e-mail maksimal 40.</p>";
            }

            $prodi = $_POST["prodi"];

            $jk = $_POST["jk"];
        
            $tel = check($_POST["tel"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $tel)) {
                $telE = "<p>⚠ Tempat lahir hanya boleh terdiri dari huruf dan spasi.</p>";
            } elseif (strlen($tel) < 4) {
                $telE = "<p>⚠ Panjang tempat lahir minimal 4.</p>";
            } elseif (strlen($tel) > 15) {
                $telE = "<p>⚠ Panjang tempat lahir maksimal 15.</p>";
            }

            $tal = $_POST["tal"];

            $alamat = check($_POST["alamat"]);
            if (strlen($alamat) < 10) {
                $alamatE = "<p>⚠ Panjang alamat minimal 10.</p>";
            } elseif (strlen($alamat) > 30) {
                $alamatE = "<p>⚠ Panjang alamat maksimal 30.</p>";
            }

            $agama = $_POST["agama"];

            if (empty($_POST["hobi"])) {
                $hobi = array("");
            } else {
                $hobi = $_POST["hobi"];
            }
        }

        function check($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <nav>
        <a href="data.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAE50lEQVRoge2aX2xTVRzHP79zyyaxqwgoaiIvLDPEl27nrqSAgnuSiD5IRCMmmojhUaPhzwvPoCYGYkzQ6AMvkij4wiIhEVz446Tt3XgisowXTTAQMQ4Xgbb3/Hzo3Sxdu61bO4jpN2ly09/vnPP99fTezzk5V5inenp6VhtjkqraCawCOoFHgQeAONARpf4NjAO3gWvAFeCKiIyq6nAQBL/Mx4fU2yCVSi0Lw3Ar0Ac8A6yYj4EyXQPOAKc9z/s2k8ncqKfxrAvxfX8TsF1VNwNtZaHrwKCIjDjnRoFREbnqnLtVLBZvtrW1jQPk8/l4LBZLGGMWq+oTQKcxplNVu4A0pVmcUF5E+oEvc7nciYYU0t3dnTbGfAysi75yqnpaRI45584MDw9fms1AM/no7u5ebYzZICJbVPU5wESx8865ncPDw4PTdlArkE6nF+fz+YPA9ijvBnDAGHM4m83+1gDzNdXb2/ukc+4t4F1gGaDApx0dHR8MDAwUq7WpWsiaNWsSxWLxe0qzcAf4BPgwCIKx5livrmQyucTzvN3A+5T+zidjsdjWCxcu3KzMrVaIWGuPAy8A10Xk5Vwud765lqeXtXY9cIzSfdQfBMFLlGZpUlMK8X3/NVU9Aox7nmczmczIgridQalUqisMwwCIq+qrQ0ND35THTWUDVd0RXe66X4oAyGQyI6q6B0BEdlTGpxQC9ACEYXikyd7qVqFQ+Dq6tJWxaoUkmmtn7orH4xO3wkOVsWqFlALGbGuaozmqUCi8XitWsxAR2Z9KpbqaY6l+pVKpLlXdVytesxAgHobhed/3NzbBV13q7e1dG4bhGUqL0KqabkZOActV9aS1dl8ymVzSDJPTKZlMLrHW7nfO/QisUNUfauXWLCQejz8PHKRE1D2e541aa/daa1c23vLdstautNbu9TxvFNgNtInIgUQisalWmylAtNYqQBAEAuD7/jrn3EcisjZKccCAqn7ned5ANpu9RAVl5yDxff9p59wGEdkCbKBs0WiM2ZXNZn+q5m9CsZlGiJYn63zf3+Sce1tENgN9ItLnnMNa+4eIDKrqCDBqjBktFotXVfWfMAzHypfxnuc9tGjRogeBx51znUCniHSpalpVl4tMerujqv3GmK9mu4yfsZCygk4AJ9Lp9NJCofCKqvYBzwKPqeqLE3nOOYwp/Zie5022b2trm4yXS3VyMn8XkTPOudPt7e1HBwcH/5ytt7oKmVA0wOfRB9/3nwK6KW1zV0Vb3keAxZTgOvGkGQduArdE5DrRVtc5NxqLxYbnuxyqeY+EYfjwxYsX/5pP541WOp1ems/nb8DUe6RF9oVWi+wtsjdALbJPpxbZaZF9TmqR/V6oRfYW2RukFtmjTlpkp0V2YJ5kr/bXGgMSswXiQpK9DIhjQRDc9fCpNiNDwMYIiJ/N1Hkul7sMXJ4prxEqA2JQGat20HMI7nsgHqqMTykkOtLqpwTEs9H53T2VtXZ9GIZngbiIHA+C4GhlTjWOaCwW2waco3T4eOpeAxE4FXk563neG1R53E97zl4oFA6o6jv8d85+EDgcBMGvzbFeUgTdNyk7Z1fVLxKJxHsDAwO3q7WZ05sPLCwQz6nqzqGhoZ+n7WC2I1UAsb0s1BAgAsvL+qwbiHW/HVQNiPX2UUONBWK9ul+2uv8b/QslYbIzrradaAAAAABJRU5ErkJggg=="></a>
        <a href="index.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAA2klEQVRoge2WQQ7DIAwETdUXwa1qX9/06De1p0oVCTWEBBvYOVpRxLI2XiIAwD9cXPDev5xzN43DFLAw8+O3cIm/6EAEEdE9LlxTXzLzyi0LhBDeW/WVI70CIdYYRkhy2PeSGsa95D46cESi9vkudTZbiPRj7b0zX2tp37jEaTNy9OslMV9r5aLVgsM4AiHWQNayBrJWjPbmn6+1tG9cAlnLGsha1oAQazTLWmfPDhyR+DoQO1S6X5B+j6L1rMCRFNjslQwjJNlarWN4LVuOLM1PUc5T+wAA9MYHjAVESMQ8bE4AAAAASUVORK5CYII="></a>
    </nav>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="biodata">
        <h2>Formulir Mahasiswa</h2>

        <div class="fill">
            <label for="nim">NIM</label>
            <div>
                <input type="number" maxlength="8" id="nim" name="nim" value="<?php echo $nim; ?>" required>
                <?php echo $nimE; ?>
            </div>
            
            <label for="nama">Nama</label>
            <div>
                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                <?php echo $namaE; ?>
            </div>

            <label for="email">E-mail</label>
            <div>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                <?php echo $emailE; ?>
            </div>

            <label for="prodi">Program Studi</label>
            <select name="prodi" id="prodi" required>
                <option selected value="" hidden>Pilih program studi</option>
                <option value="akn" <?php if ($prodi == "akn") echo "selected"; ?>>Akuntansi</option>
                <option value="mjm" <?php if ($prodi == "mjm") echo "selected"; ?>>Manajemen</option>
                <option value="iab" <?php if ($prodi == "iab") echo "selected"; ?>>Ilmu Administrasi Bisnis</option>
                <option value="ikm" <?php if ($prodi == "ikm") echo "selected"; ?>>Ilmu Komunikasi</option>
                <option value="si" <?php if ($prodi == "si") echo "selected"; ?>>Sistem Informasi</option>
                <option value="ti" <?php if ($prodi == "ti") echo "selected"; ?>>Teknik Informatika</option>
            </select>

            <label>Jenis Kelamin</label>
            <div class="jk">
                <input type="radio" id="p" name="jk" value="p" <?php if ($jk == "p") echo "checked"; ?> required>
                <label for="p">Perempuan</label>
                <input type="radio" id="l" name="jk" value="l" <?php if ($jk == "l") echo "checked"; ?>>
                <label for="l">Laki-laki</label>
            </div>

            <label for="tel">Tempat Lahir</label>
            <div>
                <input type="text" id="tel" name="tel" value="<?php echo $tel; ?>" required>
                <?php echo $telE; ?>
            </div>
            
            <label for="tal">Tanggal Lahir</label>
            <input type="date" id="tal" name="tal" max="<?php echo date('Y-m-d', strtotime('-16 year')); ?>" value="<?php echo $tal; ?>" required>
            
            <label for="alamat">Alamat</label>
            <div>
                <textarea name="alamat" id="alamat" required><?php echo $alamat; ?></textarea>
                <?php echo $alamatE; ?>
            </div>
            
            <label for="agama">Agama</label>
            <select name="agama" id="agama" required>
                <option selected value="" hidden>Pilih agama</option>
                <option value="bdh" <?php if ($agama == "bdh") echo "selected"; ?>>Buddha</option>
                <option value="hnd" <?php if ($agama == "hnd") echo "selected"; ?>>Hindu</option>
                <option value="ism" <?php if ($agama == "ism") echo "selected"; ?>>Islam</option>
                <option value="ktk" <?php if ($agama == "ktk") echo "selected"; ?>>Kristen Katolik</option>
                <option value="khc" <?php if ($agama == "khc") echo "selected"; ?>>Konghucu</option>
                <option value="pts" <?php if ($agama == "pts") echo "selected"; ?>>Kristen Protestan</option>
                <option value="o" <?php if ($agama == "o") echo "selected"; ?>>Lainnya</option>
                <option value="n" <?php if ($agama == "n") echo "selected"; ?>>Tidak ada</option>
            </select>

            <label for="hobi">Hobi</label>
            <div class="hobi">
                <input type="checkbox" id="membaca" name="hobi[]" value="membaca" onclick="check()" <?php if (in_array("membaca", $hobi, TRUE)) {echo"checked";} ?> required>
                <label for="membaca">Membaca</label>
                <input type="checkbox" id="menonton" name="hobi[]" value="menonton" onclick="check()" <?php if (in_array("menonton", $hobi, TRUE)){echo "checked";} ?> required>
                <label for="menonton">Menonton</label>
                <input type="checkbox" id="belajar" name="hobi[]" value="belajar" onclick="check()" <?php if (in_array("belajar", $hobi, TRUE)) {echo"checked";} ?> required>
                <label for="belajar">Belajar</label>
                <input type="checkbox" id="bermaingame" name="hobi[]" value="bermaingame" onclick="check()" <?php if (in_array("bermaingame", $hobi,TRUE)) {echo "checked";} ?> required>
                <label for="bermaingame">Bermain Game</label>
                <input type="checkbox" id="travelling" name="hobi[]" value="travelling" onclick="check()" <?php if (in_array("travelling", $hobi,TRUE)) {echo "checked";} ?> required>
                <label for="travelling">Travelling</label>
                <input type="checkbox" id="lainnya" name="hobi[]" value="lainnya" onclick="check()" <?php if (in_array("lainnya", $hobi, TRUE)) {echo"checked";} ?> required>
                <label for="lainnya">Lainnya</label>
            </div>

            <script>
                const inputCheckbox = document.querySelectorAll('input[type="checkbox"]');
                
                // must check at least one checkbox
                function check() {
                    for(let i = 0; i < inputCheckbox.length; i++) {
                        if(inputCheckbox[i].checked == true) {
                            for(let j = 0; j < inputCheckbox.length; j++) {
                                inputCheckbox[j].removeAttribute("required");
                            }
                        }
                    }
                }
                check();
            </script>
        </div>

        <div class="buttons">
            <input type="button" value="Hapus Data" name="hapus" onclick="resetForm()">
            <input type="submit" value="Kirim Data" name="submit">
        </div>

        <script>
            // reset button
            function resetForm() {
                const value = document.querySelectorAll('input[type="number"], input[type="text"], input[type="email"], input[type="date"]');
                const selected = document.querySelectorAll('option');
                const checked = document.querySelectorAll('input[type="radio"], input[type="checkbox"]');
                const empty = document.querySelector('textarea');
                
                for (let i = 0; i < value.length; i++) {
                    value[i].removeAttribute("value");
                }
                for (let i = 0; i < selected.length; i++) {
                    selected[i].removeAttribute("selected");
                }
                for (let i = 0; i < checked.length; i++) {
                    checked[i].removeAttribute("checked");
                }
                empty.innerHTML = "";

                // or
                document.getElementById("biodata").reset();
            }

            const url = window.location.pathname;
            const fileName = url.substring(url.lastIndexOf('/')+1);
            if (fileName == "data.php") {
                document.querySelector("a:first-child img").style.borderBottom = "3px solid var(--theme)"
            } else if (fileName == "index.php") {
                document.querySelector("a:last-child img").style.borderBottom = "3px solid var(--theme)"
            }
        </script>

        <?php
            $hobi = "";
            if (!empty($_POST['hobi'])){
                foreach($_POST['hobi'] as $check) {
                    if ($check != $_POST['hobi'][count($_POST['hobi']) - 1]) {
                        $hobi = $hobi . $check . ", ";
                    } else {
                        $hobi = $hobi . $check;
                    }
                }
            }

            if (isset($_POST['submit'])) {
                if ($nimE == "" && $namaE == "" && $emailE == "" && $telE == "" && $alamatE == "") {
                    mysqli_query($connect, "insert into biodata set
                    NIM = '$_POST[nim]',
                    Nama = '$_POST[nama]',
                    Email = '$_POST[email]',
                    ProgramStudi = '$_POST[prodi]',
                    JenisKelamin = '$_POST[jk]',
                    TempatLahir = '$_POST[tel]',
                    TanggalLahir = '$_POST[tal]',
                    Alamat = '$_POST[alamat]',
                    Agama = '$_POST[agama]',
                    Hobi = '$hobi'");

                    $submit = "<div class='confirmation'>Data terkirim.</div>";
                    echo $submit;
                    echo "<script>resetForm()</script>";
                }
            }
        ?>
    </form>
</body>
</html>