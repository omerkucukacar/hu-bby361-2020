<?php
    /* Bağlantı bilgilerinin alınması*/
    require_once("baglanti.php");

    /* Ekleme işlemi sorgusu */
    $yykn = mysqli_real_escape_string($baglanti, $_POST['yykn']);    
    $yya = mysqli_real_escape_string($baglanti, $_POST['yya']);
    $yyu = mysqli_real_escape_string($baglanti, $_POST['yyu']);
    $yye = mysqli_real_escape_string($baglanti, $_POST['yye']);
    $sorgu = "UPDATE yayinevi SET yya = '$yya', yyu = '$yyu', yye = '$yye' WHERE yykn = $yykn";

    if (mysqli_query($baglanti, $sorgu)) {
        $islemSonuc = "Kayıt Başarıyla güncellendi.";
    } else {
        $islemSonuc = "Hata: " . $sorgu . "<br>" . mysqli_error($baglanti);
    }

    $sorgu2 = mysqli_query($baglanti, "SELECT * FROM yayinevi ORDER BY yykn DESC");

    mysqli_close($baglanti);

?>
<!DOCTYPE html>
<html lang="tr"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Yayınevi Güncellendi</title>

    <!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./katalog_files/navbar-top.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php" style="color:yellow;position:relative; left:200px">Ana Sayfa </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kitap.php" style="color:yellow;position:relative; left:275px">Kitap İşlemleri</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="yazar.php" style="color:yellow;position:relative; left:350px">Yazar İşlemleri</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="yayinevi.php" style="color:yellow;position:relative; left:400px">Yayınevi İşlemleri</a>
      </li>
    </ul>
    <form class="form-inline mt-2 mt-md-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Ara" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Arama</button>
    </form>
  </div>
</nav>

<main role="main" class="container">
<!-- KODLAR -->
<h1>Yayınevi İşlem Sonucu</h1>
<p><?php echo $islemSonuc; ?></p>
<?php
echo("<table border=1 width=80%>");
    echo("<tr>");
    echo("<td><b>Yayınevi Kayıt No</b></td>");
    echo("<td><b>Yayınevi Kayıt Tarihi</b></td>");
    echo("<td><b>Yayınevi Adı</b></td>");
    echo("<td><b>Yayınevi URL</b></td>");
    echo("<td><b>Yayınevi Detay</b></td>");
    echo("<td><b>Güncelle</b></td>");
    echo("<td><b>Sil</b></td>");
    echo("</tr>");
/* Sorgu sonuçlarının yazdırılması */
while($satir = mysqli_fetch_assoc($sorgu2)){
    echo("<tr>");
    echo("<td>".$satir["yykn"]."</td>");
    echo("<td>".$satir["yykt"]."</td>");
    echo("<td>".$satir["yya"]."</td>");
    echo("<td>".$satir["yyu"]."</td>");
    echo("<td>".$satir["yye"]."</td>");
    echo("<td><a href='yayinevi_guncellenecek.php?yykn=".$satir["yykn"]."'>Güncelle</a></td>");
    echo("<td><a href='yayinevi_sil.php?ykn=".$satir["yykn"]."'>Sil</a></td>");
    echo("</tr>");
            }
echo("</table>");
?>
<!-- KODLAR -->   
</main>
<script src="jquery-3.4.1.slim.min.js"></script>
      <script src="bootstrap.bundle.min.js"></script>
<br>
<footer style="text-align:center;background-color:#212121; color: white;padding:10px"><b>Yayınevi İşlemleri</b></footer>
</body></html>