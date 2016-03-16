<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<br />
<div class="row">
    <div class="col s7" style="text-align:center">
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
    <div class="col s5">
    	<h2>Explore Services</h2>
        <h6>Find the services that best matches your research needs</h6>
        <br />
        <a class="waves-effect waves-light btn-large" href='/research-lifecycle'><i class="material-icons right">cloud</i>Explore</a>
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
<br />
<div class="row" style="margin-bottom:0px">
	<div class="col s12">
    	<div class="card">
            <div class="card-image white-text" style="max-height:60px">
                <?php //echo $fields['field_card_image']->content ?>
                <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/light-green-darken1.jpg" alt="" height="60" width="400">
                <span class="card-title" style="padding-bottom:10px">Education, Training and Events</span>
            </div>
		</div>
    </div>
</div>

<div class="row">

            
    <div class="col s12 m12 l4" >
      <div class="card hoverable">
        <div class="card-image white-text" style="max-height:10px">
            <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/light-green-darken1.jpg" alt="" height="10" width="400">
        </div>
		<div class="card-content" style="padding-top:0px; padding-bottom:0px">
          <ul class="collection" style="margin: 0px;">
          	<li class='collection-item avatar'>
                <i class='material-icons circle green'>insert_chart</i>
                <span class='title'>Python Workshops</span>
                <p>Python is cool</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="col s12 m12 l4">
      <div class="card hoverable">
        <div class="card-image white-text" style="max-height:10px">
            <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/light-green-darken1.jpg" alt="" height="10" width="400">
        </div>
        <div class="card-content" style="padding-top:0px; padding-bottom:0px">
          <ul class="collection" style="margin: 0px;">
          	<li class='collection-item avatar'>
                <i class='material-icons circle green'>insert_chart</i>
                <span class='title'>Research Bazar</span>
                <p>Resbaz was awesome</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="col s12 m12 l4" >
      <div class="card hoverable">
        <div class="card-image white-text" style="max-height:10px">
            <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/light-green-darken1.jpg" alt="" height="10" width="400">
        </div>
        <div class="card-content" style="padding-top:0px; padding-bottom:0px">
          <ul class="collection" style="margin: 0px;">
          	<li class='collection-item avatar'>
                <i class='material-icons circle green'>insert_chart</i>
                <span class='title'>Hackyhour</span>
                <p>Hackyhour is great</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    
    
    <div class="col s12 m12 l4" >
      <div class="card hoverable">
        <div class="card-image white-text" style="max-height:10px">
            <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/light-green-darken1.jpg" alt="" height="10" width="400">
        </div>
		<div class="card-content" style="padding-top:0px; padding-bottom:0px">
          <ul class="collection" style="margin: 0px;">
          	<li class='collection-item avatar'>
                <i class='material-icons circle green'>insert_chart</i>
                <span class='title'>CLEAR workshops</span>
                <p>Do check them out!</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    
    
    <div class="col s12 m12 l4" >
      <div class="card hoverable">
        <div class="card-image white-text" style="max-height:10px">
            <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/light-green-darken1.jpg" alt="" height="10" width="400">
        </div>
		<div class="card-content" style="padding-top:0px; padding-bottom:0px">
          <ul class="collection" style="margin: 0px;">
          	<li class='collection-item avatar'>
                <i class='material-icons circle green'>insert_chart</i>
                <span class='title'>Doctoral Skills</span>
                <p>Can't be missed!</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
            

</div>

<br />
<div class="row" style="margin-bottom:0px">
	<div class="col s12">
    	<div class="card">
            <div class="card-image white-text" style="max-height:60px">
                <?php //echo $fields['field_card_image']->content ?>
                <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/deep-purple-darken1.jpg" alt="" height="60px" width="400">
                <span class="card-title" style="padding-bottom:10px">Guides</span>
            </div>
    	</div>
    </div>
</div>

<div class="row">
	<?php foreach ($rows as $id => $row): ?>
     <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
        <?php print $row; ?>
     </div>
    <?php endforeach; ?>
</div>