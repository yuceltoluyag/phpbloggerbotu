<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>Yt~Blogger Botu M1</title>
  <link rel="stylesheet" href="style.css" type="text/css">

</head>
<body>
  


<?php
/**
 * echo '<pre>';
 * print_r();
 * echo '</pre>';
 */
ini_set('max_execution_time', 0);

  include 'fonksiyon.php';
//set_time_limit(60);

  for ($k = 1; $k <= 1; $k++) {
      if ($k == 1) {
          $url = 'http://gamersonlinux.com/forum/forums/guides.20/';
      } else {
          $url = "http://gamersonlinux.com/forum/forums/guides.20/page-$k";
      }

      $tmm = 'http://gamersonlinux.com/forum/';
      $site = 'http://gamersonlinux.com/forum/forums/guides.20/';

      $bag = Baglan($url);  //hedef sitemiz
preg_match_all('@<ol class="discussionListItems">(.*?)</ol>@si', $bag, $konular);  //tüm konu seçkesi
echo "<h1>$k.Sayfa</h1>";

      for ($i = 0; $i < count($konular[1]); $i++) {
          preg_match_all('@<h3 class="title">(.*?)</h3>@si', $konular[1][$i], $basliklar);  //tüm başlıklar
          //print_r($basliklar);
          preg_match_all('@<h3 class="title"><a href="(.*?)"(.*?)</h3>@si', $konular[1][$i], $linkler);

          //başlıkları temizle
          $baslik = duzenle($basliklar[0]);
          $temizbas = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', '\\2', $baslik); //temiz başlık print_r ($temizbas);
         for ($z = 0; $z <= 7; $z++) {          	// code...

        $linkbas = $tmm.'/'.$linkler[1][$z];
             //echo '<pre>';
             // print_r($linkbas);
             //echo '</pre>';

             $bag = Baglan($linkbas);

             preg_match_all('@<div class="messageContent">(.*?)</div>@si', $bag, $icerik);
             preg_match_all('@<div class="titleBar"><h1>(.*?)</h1>@si', $bag, $baslik);
             //print_r($baslik[0][0]).'<br><br>';
             // print_r($icerik[0][0]);

             $salla = $baslik[0][0];
             $sic = $icerik[0][0]; ?>


<form action="https://www.blogger.com/blog-this.do?" method="post">
    <input type="text" class="sinput" name="n" value="<?php  echo strip_tags($salla); ?>" >   
    <textarea name="b" class="defter" id="" cols="30" rows="10"><?php echo $sic; ?></textarea>  
    <input type="submit" value="Bloggere Gönder" />
 </form>


 <?php
         }
      }
  }

?>
</body>
</html>