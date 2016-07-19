<h2>My projects</h2>
<div class="row">
<?php foreach ($projects as $p):
        if (in_array($p->statusId, array(1,2,6))) {
          $color = '#43a047';
        } else if (in_array($p->statusId, array(4,10))) {
          $color = '#e53935';
        } else {
          $color = '#1e88e5';
        }
?>
  <div class="col s12 m4">
    <a href='/projects/<?php echo $p->projectCode ?>'>
      <div class="card" style="color:<?php echo $color ?>;min-height:250px">
        <div class="card-content">
          <span class="card-title"><?php echo $p->name; ?></span>
          <p><?php echo truncate_utf8($p->description, 100, TRUE, TRUE); ?></p>
          <p style='color:black'><?php echo $p->projectCode ?></p>
        </div>
      </div>
    </a>
  </div>
<?php endforeach; ?>
</div>