<input id="project_id" type="hidden" value="<?php echo $pw->project->id ?>"/>
<div class="row">
  <div class="col s8">
    <h4 class='editable' id='project_title' data-type='text' data-pk='Project' data-name='Name' data-title='Project name'><?php echo $pw->project->name; dpm($pw); ?></h4>
    <div class='editable' id='project_description' data-type="textarea" data-pk="Project" data-name="Description" data-title="Description"><?php echo strip_tags($pw->project->description) ?></div>

    <!-- Left Column content goes here -->

    <ul class="collection" style="border:0px">
      <li class="collection-header"><h5 style="background-color: rgb(76, 175, 80); color:white; padding:10px">Service Allocations <a href="#add_service" class="btn-floating btn-large waves-effect waves-light modal-trigger green" style="float:right; margin-top: 5px; margin-right:10px"><i class="material-icons">add</i></a></h5></li>
      <div id="add_service" class="modal">
        <div class="modal-content" style='min-height: 500px'>
          <h4>Add Service</h4>
          <form id="add_service" class="col s12" method="POST" action="add_service">
            <?php
              $services = node_load_multiple(array(), array('type' => 'service'));
              echo "<select id='service_type' name='service'><option selected disabled>Please select..</option>";
              foreach ($services as $s) {
                echo "<option value='{$s->title}'>{$s->title}</option>";
              }
              echo "</select>";
              foreach ($services as $s) {
                if (!empty($s->field_request_service_form['und'])) {
                  $desc = !empty($s->field_request_service_form_descr) ? $s->field_request_service_form_descr['und'][0]['value'] : 'Signup here:';
                  $title = $s->title;
                  $machine_name = str_replace(' ', '_', $title);
                  $form = "<div id='$machine_name' style='display:none' class='service_form'>$desc";
                  foreach ($s->field_request_service_form['und'] as $i => $field) {
                    $label = $field['value'];
                    $machine_name = str_replace(' ' , '_', $label);
                    $form .= "<div class='input-field col s12'>
                                <input placeholder='$label' id='$machine_name' type='text' name='$label' class='validate' />
                                <label class='active validate' for='$machine_name'>$label</label>
                              </div>";
                  }
                  $form .= '</div>';
                  echo $form;
                }
              }
            ?>
            <div class="col s12 right">
              <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
              </button>
            </div>
          </form>
        </div>
      </div>
      <?php foreach ($pw->services as $s):  ?>
        <li class="collection-item avatar">
          <?php
          if (($s->type) == 'VM') {
                  echo "<i class='material-icons circle blue'>view_module</i>";
          } else {
                  echo "<i class='material-icons circle blue'>view_carousel</i>";
          };
          ?>

          <span class="title"><?php echo $s->type ?></span>
          <p style="font-weight:300">
            <?php
              foreach ($s as $k => $v) {
                if ($k == 'type') continue;
                $icons = array("VM" => "receipt", "CPUs" => "memory", "RAM" => "view_week", "Disk space" => "storage");
                $icon = "info_outline";
                if (array_key_exists($k, $icons)) {
                  $icon = $icons[$k];
                }
                echo "<div class='chip'>
                        <i class='material-icons'>$icon</i>
                        $v
                      </div>";
              }
            ?>
          </p>
        </li>
      <?php endforeach; ?>
    </ul>


  </div>
  <div class="col s4 project_details" style="padding-top: 15px">

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
      Start: <a class='editable' id='start_date' data-type='text' data-inputclass='datepicker' data-pk='Project' data-name='StartDate' data-title='Start date'><?php echo $pw->project->startDate ?></a>
    </div>

    <div class="chip">
      <i class="material-icons">snooze</i>
      End: <a class='editable' id='end_date' data-type='text' data-inputclass='datepicker' data-pk='Project' data-name='EndDate' data-title='End date'><?php echo $pw->project->endDate ?></a>
    </div>


    <ul class="collection" style="border:0px">
      <li class="collection-header"><h5>Researchers on project <a class="btn-floating waves-effect waves-light green modal-trigger" href='#add_researcher' style="float:right; margin-top: -5px; margin-right:10px"><i class="material-icons">add</i></a></h5></li>
      <div id="add_researcher" class="modal">
        <div class="modal-content" style='min-height: 500px'>
          <h4>Add Collaborators</h4>
          <form id="add_collaborators" class="col s12" method="POST" action="add_collaborators">
            <div class="input-field col s12">
              <input placeholder="Collaborator" id="existing_project_add_collaborator" type="text" class="validate" autocomplete="off" />
              <label for="collaborator">Name</label>
            </div>
            <div class="col s12 right">
              <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
              </button>
            </div>
          </form>
        </div>
      </div>
      <?php foreach ($pw->rpLinks as $r): ?>
      <li class="collection-item avatar existing-collaborator">
        <?php
         if (!empty($r->researcher->pictureUrl)) {
                echo "<img src='{$r->researcher->pictureUrl}' alt='' class='circle'>";
         } else {
                echo "<i class='material-icons circle blue'>perm_identity</i>";
         }; ?>

        <span class="title"><?php echo $r->researcher->fullName ?></span>
        <p style="font-weight:300"><?php echo $r->researcherRoleName ?></p>
        <?php if ($r->researcherId != $user->data['projectdb_info']->id): ?>
          <a class="btn-floating waves-effect waves-light red remove" style="float:right;margin-top: -40px" rid="<?php echo $r->researcherId ?>"><i class="material-icons">delete</i></a>
        <?php endif; ?>
      </li>
      <?php endforeach; ?>
    </ul>

    <ul class="collection" style="border:0px">
      <li class="collection-header"><h5>Research Outputs <a href='#add_research_output' class="btn-floating waves-effect waves-light green modal-trigger" style="float:right; margin-top: -5px; margin-right:10px"><i class="material-icons">add</i></a></h5></li>
      <div id="add_research_output" class="modal">
        <div class="modal-content" style='min-height: 500px'>
          <h4>Add Research Outputs</h4>
          <form id="add_research_output" class="col s12" method="POST" action="add_research_output">
            <?php if (!empty($research_outputs)): ?>
              <h4>Which of the following are attributed to this project?</h4>
              <?php
                foreach ($research_outputs as $ro) {
                  $safe_citation = $ro['safe_citation'];
                  echo "<div class='research_outputs' class='input-field row'>
                          <input class='checkbox' type='checkbox' id='{$ro['id']}' />
                          <label for='{$ro['id']}'>$safe_citation</label>
                          <input type='hidden' name='citation[]' value='$safe_citation' />
                          <input type='hidden' name='type[]' value='{$ro['type']}' />
                        </div>";
                }
              ?>
              <h4>Or, enter something manually</h4>
            <?php endif; ?>
            <div class="custom_researchoutput row">
              <div class="input-field col s12">
                <select name='rotype'>
                  <?php foreach ($rotypes as $rt): ?>
                    <option value="<?php echo $rt->id ?>"><?php echo $rt->name ?></option>
                  <?php endforeach; ?>
                </select>
                <label>Type</label>
              </div>
              <div class="input-field col s12">
                <textarea class="research_output" name='rodesc'></textarea>
                <label for="research_output">Description/Citation</label>
              </div>
            </div>
            <div class="col s12 right">
              <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
              </button>
            </div>
          </form>
        </div>
      </div>
      <?php foreach ($pw->researchOutputs as $r): ?>

      <li class="collection-item avatar">
        <i class="material-icons circle green">thumb_up</i>
        <span class="title"><?php echo $r->type ?></span>
        <p style="font-weight:300; font-style: italic"><?php echo $r->description ?></p>
      </li>

      <?php endforeach; ?>
    </ul>

  </div>
</div>
