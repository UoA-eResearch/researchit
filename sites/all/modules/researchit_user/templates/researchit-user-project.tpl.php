<h4>Project Details</h4>

<table class="project_main">
  <tr>
    <td>Project Title:</td>
    <td><?php echo $pw->project->name ?></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td><div style="max-width:50%" class='editable' id='project_description' data-type="wysihtml5" data-pk="Project" data-name="Description" data-title="Description"><?php echo $pw->project->description ?></div></td>
  </tr>
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

<h4>Researchers on project</h4>
<table class="researchers">
  <tr>
    <th>Name</th>
    <th>Role on project</th>
  </tr>
  <?php foreach ($pw->rpLinks as $r): ?>
  <tr>
    <td><?php echo $r->researcher->fullName ?></td>
    <td><?php echo $r->researcherRoleName ?></td>
  </tr>
  <?php endforeach; ?>
</table>
