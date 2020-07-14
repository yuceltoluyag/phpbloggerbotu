

<?php
set_time_limit(0);

    /**
     *  echo '<pre>';.
     * print_r($gug);
     * echo '</pre>';
     */
    $url = 'http://sourcedigit.com/how-to/page/6/';
    $veri = file_get_contents($url);

    //$botetiket = preg_match_all('@<span class="entry-tags">(.*?)</span>@si',$veri,$etiket);
    $linki = preg_match_all('@<div class="entry-content" itemprop="text"><a class="entry-image-link" href="(.*?)" aria-hidden="true"><img width="150" height="150" src="(.*?)" class="alignleft post-image entry-image" alt="(.*?)" itemprop="image" /></a>@si', $veri, $linkibul);

    //$bbet = strip_tags($etiket[0]);
    $gug = $linkibul[1];

    //echo "<h1>$gug</h1><hr>";
    //echo '<textarea name="icerik" id="" cols="30" rows="10">'.$icerik.'</textarea>';
        $say = count($gug);

   if ($say > 0) {
       for ($i = 0; $i < $say; $i++) {
           //Linkleri Çekiyoruz
           echo '<br>';
           $git = $gug[$i].'</br>';
           $bascik = file_get_contents($git);
           $botbaslik = preg_match_all('@<h2 class="entry-title" itemprop="headline"><a href="(.*?)">(.*?)</a></h2>@si', $veri, $baslik);
           $boticerik = preg_match_all('@<div class="entry-content" itemprop="text"><p>(.*?)</p></div>@si', $gug[0], $icerik);

           print_r($icerik);

           $baslink = $baslik[0];

           // başlık echo strip_tags($baslink).'<br>';
       }
   } else {
       echo 'içerik Bulunamadı Hacı..';
   }

?>