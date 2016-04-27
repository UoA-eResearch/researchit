<div class="row">

</div>

<div class="row">
  <div class="col s8">
    <h4><?php echo $pw->project->name ?></h4>
    <div class='editable' id='project_description' data-type="wysihtml5" data-pk="Project" data-name="Description" data-title="Description"><?php echo strip_tags($pw->project->description) ?></div>
  </div>
  <div class="col s4" style="padding-top: 15px">

    <div class="chip">
      <i class="material-icons">receipt</i>
      <?php echo $pw->project->projectCode ?>
    </div>

    <div class="chip">
      <i class="material-icons">track_changes</i>
      <?php echo $pw->project->statusName ?>
    </div>
    </br>

    <div class="chip">
      <i class="material-icons">query_builder</i>
      Start: <?php echo $pw->project->startDate ?>
    </div>

    <div class="chip">
      <i class="material-icons">snooze</i>
      End: <?php echo $pw->project->endDate ?>
    </div>


    <ul class="collection" style="border:0px">
      <li class="collection-header"><h5>Researchers on project</h5></li>
      <?php foreach ($pw->rpLinks as $r): ?>
      <li class="collection-item avatar">
        <i class="material-icons circle blue">perm_identity</i>
        <img src="images/yuna.jpg" alt="" class="circle">
        <span class="title"><?php echo $r->researcher->fullName ?></span>
        <p><?php echo $r->researcherRoleName ?></p>
        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
      </li>
      <?php endforeach; ?>
    </ul>

    <ul class="collection" style="border:0px">
      <li class="collection-header"><h5>Research Outputs</h5></li>
      <?php foreach ($pw->researchOutputs as $r): ?>

      <li class="collection-item avatar">
        <i class="material-icons circle green">thumb_up</i>
        <span class="title"><?php echo $r->type ?></span>
        <p><?php echo $r->description ?></p>
        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
      </li>

      <?php endforeach; ?>
    </ul>

  </div>
</div>
