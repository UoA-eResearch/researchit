<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<div class="row">
    <div class="col12" style="text-align:center">
    	<img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/lifecycle.jpg" alt="" usemap="#lifecyclemap" >
    	<map name="lifecyclemap">
          <area shape="rect" coords="0,0,130,130" href='#Re-use' class='modal-trigger'>
          <area shape="rect" coords="130,0,350,130" href='#Planning' class='modal-trigger'>
          <area shape="rect" coords="350,0,639,130" href='#Implementation' class='modal-trigger'>
          <area shape="rect" coords="0,130,220,269" href='#Preservation' class='modal-trigger'>
          <area shape="rect" coords="220,130,430,269" href='#Discovery-Impact' class='modal-trigger'>
          <area shape="rect" coords="430,130,639,269" href='#Publishing' class='modal-trigger'>
        </map>
    </div>
</div>

<?php
$lifecycle = taxonomy_vocabulary_machine_name_load("research_life_cycle");
$tree = taxonomy_get_tree($lifecycle->vid);
foreach ($tree as $term) {
  $tid = $term->tid;
  $name = $term->name;
  $desc = $term->description;
  $machine_name = str_replace(' &', '', $name);
  $machine_name = str_replace(' ', '-', $machine_name);
  $services = 'Services useful in this phase: <ul class="collection">';
  foreach (taxonomy_select_nodes($tid) as $i => $nid) {
    $node = node_load($nid);
    $link = l($node->title, 'node/'.$nid);
    if (!empty($node->body)) {
      $node_desc = $node->body['und'][0]['value'];
    } else {
      $node_desc = 'What should I know?';
    }
    $color = 'red';
    if ($node->type == 'guide') {
      $color = 'purple';
    }
    $services .= "<li class='collection-item avatar'>
                    <i class='material-icons circle $color'>insert_chart</i>
                    <span class='title'>$link</span>
                    <p>$node_desc</p>
                  </li>";
  }
  $services .= '</ul>';
  echo "<div id='$machine_name' class='modal'>
          <div class='modal-content'>
            <h4>$name</h4>
            <p>$desc</p>
            $services
          </div>
          <div class='modal-footer'>
            <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>OK</a>
          </div>
        </div>";
}
?>

<div class="row">
	<div class="col s12">
    	<div class="card small">
            <div class="card-image white-text" style="max-height:60px">
                <?php //echo $fields['field_card_image']->content ?>
                <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/light-green-darken1.jpg" alt="" height="80" width="400">
                <span class="card-title" style="padding-bottom:10px">Education, Training and Events</span>
            </div>
        <div class="card-content">
        
            <div class="col s4">
              <div class="card hoverable">
              	<div class="card-image white-text" style="max-height:80px">
                    <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/light-green-darken1.jpg" alt="" height="80" width="400">
                    <span class="card-title" style="padding-bottom:20px">Python Workshops</span>
                </div>
                <div class="card-content">
                  <span class="card-title">Python is cool</span>
                </div>
              </div>
            </div>
            
            <div class="col s4">
              <div class="card hoverable">
              	<div class="card-image white-text" style="max-height:80px">
                    <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/light-green-darken1.jpg" alt="" height="80" width="400">
                    <span class="card-title" style="padding-bottom:20px">Resbaz</span>
                </div>
                <div class="card-content">
                  <span class="card-title">Research Bazar was awesome!</span>
                </div>
              </div>
            </div>
            
            <div class="col s4">
              <div class="card hoverable">
              	<div class="card-image white-text" style="max-height:80px">
                    <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/light-green-darken1.jpg" alt="" height="80" width="400">
                    <span class="card-title" style="padding-bottom:20px">Hackyhour</span>
                </div>
                <div class="card-content">
                  <span class="card-title">Hackyhour is great</span>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col s12">
    	<div class="card small">
            <div class="card-image white-text" style="max-height:60px">
                <?php //echo $fields['field_card_image']->content ?>
                <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/deep-purple-darken1.jpg" alt="" height="80" width="400">
                <span class="card-title" style="padding-bottom:10px">Guides</span>
            </div>
        <div class="card-content">
            <?php foreach ($rows as $id => $row): ?>
             <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
                <?php print $row; ?>
             </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>