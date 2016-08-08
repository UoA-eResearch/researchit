<?php
  $vocab = taxonomy_vocabulary_machine_name_load('categories');
  $terms = taxonomy_get_tree($vocab->vid, 0, NULL, TRUE);

  echo "<a id='category_accordion' class='anchor'></a><div class='row' style='margin-top:30px'><div class='col s3'>";
  foreach ($terms as $t) {
    $machine_name = str_replace(' &', '', $t->name);
    $machine_name = str_replace(' ', '_', $machine_name);
    $glyph = $t->field_glypthcategory['und'][0]['value'];
    echo "<div class='category_selector $machine_name' style='text-align:center;padding:15px;margin-bottom:5px;color:white;'><i class='material-icons circle' style='float:left'>$glyph</i><i class='material-icons arrow $machine_name'>play_arrow</i><p class='scale-text'>{$t->name}</p></div>";
  }
  echo "</div><div class='col s9'>";
  foreach ($rows as $id => $row) {
    print($row);
  }
  echo "</div>";