<div class="row">

</div>

<div class="row">
  <div class="col s8">
    <h4><?php echo $pw->project->name ?></h4>
    <div class='editable' id='project_description' data-type="wysihtml5" data-pk="Project" data-name="Description" data-title="Description"><?php echo strip_tags($pw->project->description) ?></div>
  </div>
  <div class="col s4" style="padding-top: 15px">

    <table class="project_main">
      <tr>
        <td>Code:</td>
        <td><?php echo $pw->project->projectCode ?></td>
      </tr>
      <tr>
        <td>Status:</td>
        <td><?php echo $pw->project->statusName ?></td>
      </tr>
      <tr>
        <td>First Day:</td>
        <td><?php echo $pw->project->startDate ?></td>
      </tr>
      <tr>
        <td>Last Day:</td>
        <td><?php echo $pw->project->endDate ?></td>
      </tr>
    </table>

    <ul class="collection" style="border:0px">
      <li class="collection-header"><h5>Researchers on project</h5></li>
      <?php foreach ($pw->rpLinks as $r): ?>
      <li class="collection-item avatar">
        <i class="material-icons circle">folder</i>
        <span class="title"><?php echo $r->researcher->fullName ?></span>
        <p><?php echo $r->researcherRoleName ?></p>
        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
