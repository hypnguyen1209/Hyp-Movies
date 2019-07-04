<?php
$Reponse = json_decode(file_get_contents('updatephim.json'));
for ($i = 0; $i < 100; $i++) {
    echo '<div class="responsive">
    <div class="gallery">
      <a target="_blank" href="watch.php?id='.$Reponse[$i][0].'">
        <img src="https://image.xemphim.plus/w342'.$Reponse[$i][3].'" alt="Cinque Terre" width="600" height="400">
      </a>
      <div class="desc">'.$Reponse[$i][2].'</div>
    </div>
</div>';
}