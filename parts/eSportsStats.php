<?php

  //SLUGS
  /*
    csgo
    dota2
    lol
    ow
    pubg
  */

  //faz o request e cria o arquivo

  if(isset($_GET["EsSlug"]))
    $slug = $_GET["EsSlug"];
  else
    $slug = "lol";

  $file = get_template_directory() . '/parts/eSportsStats/' . $slug . ".json";
  $json = null;

  //verifica se há um arquivo existente baseado no SLUG
  if(file_exists($file)){

    $lastModified = filemtime($file);

    //checa se o arquivo existente está atualizado (últimas 3 horas)
    if(($lastModified + 10800) < time()){
      //arquivo existente não está atualizado
      $json = statsRequest($slug, $file);
    }
    else{
      //arquivo existente está atualizado
      $json = file_get_contents($file);
    }

  }
  else{
	//arquivo baseado no SLUG não existe
    $json = statsRequest($slug, $file);
  }

  //objeto baseado no json obtido
  $obj = json_decode($json);
    if($slug == "pubg"){
		$prevLeague = "";

      ?>

	  <table>
        <?php
          foreach ($obj as $i => $item){

            $league = $item->league->name;

            if($league != $prevLeague){
              ?>
              <tr>
                <td class="title"><h3><?php echo $league; ?></h3></td>
              </tr>
              <?php
            }

            ?>
              <tr>
                <td class="full">
                  <img src="<?php echo $item->winner->image_url; ?>" alt="<?php if($item->winner->acronym) echo $item->winner->acronym; else echo $item->winner->name; ?>" title="<?php echo $item->winner->name; ?>">
                </td>
              </tr>
              <tr>
                <td class="date"><p><?php echo date('d/m', strtotime($item->begin_at)); ?></p></td>
              </tr>
            <?php

            $prevLeague = $league;

          }
         ?>
      </table>

      <?php
    }
    else{

      $prevLeague = "";

      ?>

	  <table>
        <?php
          foreach ($obj as $i => $item){

            $league = $item->league->name;

            if($league != $prevLeague){
              ?>
              <tr>
                <td class="title"><h3><?php echo $league; ?></h3></td>
              </tr>
              <?php
            }

            ?>
              <tr>
                <td>
                  <img src="<?php echo $item->opponents[0]->opponent->image_url; ?>" alt="<?php if($item->opponents[0]->opponent->acronym) echo $item->opponents[0]->opponent->acronym; else echo $item->opponents[0]->opponent->name; ?>" title="<?php echo $item->opponents[0]->opponent->name; ?>">
                  <span><?php echo $item->results[0]->score; ?></span>
                </td>
                <td class="x"><i class="fas fa-times"></i></td>
                <td>
                  <span><?php echo $item->results[1]->score; ?></span>
                  <img src="<?php echo $item->opponents[1]->opponent->image_url; ?>" alt="<?php if($item->opponents[1]->opponent->acronym) echo $item->opponents[1]->opponent->acronym; else echo $item->opponents[1]->opponent->name; ?>" title="<?php echo $item->opponents[1]->opponent->name; ?>">
                </td>
              </tr>
              <tr>
                <td class="date"><p><?php echo date('d/m', strtotime($item->begin_at)); ?></p></td>
              </tr>
            <?php

            $prevLeague = $league;

          }
         ?>
      </table>

      <?php
    }
  ?>
