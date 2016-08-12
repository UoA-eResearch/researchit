<h2>My projects</h2>
<div class="row">
<?php foreach ($projects as $p): ?>
  <div class="col s12 m4">
    <a href='/projects/<?php echo $p->projectCode ?>'>
      <div class="card" style="color:<?php echo get_colour_for_status($p->statusName) ?>;min-height:250px">
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