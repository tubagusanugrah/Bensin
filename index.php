<img src="logo.png" style="height: 70px; width: 70px">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<?php
class Shell {
    public $total,
    $jumlah,
    $jenis,
    $harga,
    $ppn = 0.1;

    function __construct($jumlah, $jenis)
    {
        switch ($jenis){
            case "supershell":
                $this->harga = 15420;
                break;
            case "shellvpower":
                $this->harga = 16130;
                break;
            case "shellvpowerdiesel":
                $this->harga = 18310;
                break;
            case "shellvpowernitro":
                $this->harga = 16510;
                break;
        }

        $this->total = $this->harga * $jumlah - ($this->harga * $jumlah * $this->ppn);
    }
}

class Beli extends Shell {
        public function __construct($jumlah, $jenis)
        {
        parent::__construct($jumlah, $jenis);
    }
}


if(isset($_POST['beli'])) {
    $jumlah = $_POST['inputLiter'];
    $jenis = $_POST['bensin'];
    $shell = new Beli($jumlah, $jenis);
    echo "<br>";
    echo "---------------------------------------------------------- <br>";
    echo "Total Yang Harus Anda Bayar Adalah " . "Rp." . $shell->total . "<br>Dengan Jumlah $jumlah Liter<br>Dengan Tipe Bensin $jenis <br>";
    echo "----------------------------------------------------------";
}

?>

<body style="text-align: center; background-image: url(shell.jpg); background-size: cover; font-family: 'Poppins'; ">
    <form action="" method="POST">
        <h1 style="color: red;">Masukan Jumlah Liter</h1>
        <input type="text" placeholder="Masukan Jumlah Liter" name="inputLiter" id="inputLiter" required>
        <h2 style="color: yellow;">Pilih Tipe Bahan Bakar</h2>
        <div class="btn">
            <select name="bensin" id="bensin">
                <option value="supershell">Super Shell</option>
                <option value="shellvpower">Shell V Power</option>
                <option value="shellvpowerdiesel">Shell V Power Diesel</option>
                <option value="shellvpowernitro">Shell V Power Nitro</option>
            </select>
            <button  type="submit" name="beli">Beli</button>
        </div>
    </form>
</body>