<div class="mainContent">
  <p>「<?php echo form_prep($q); ?>」の検索結果</p>
  <p><?php echo $total; ?></p>

  <?php foreach($result as $row): ?>
  <div class="searchContainer">
    <div class="itemImg">
      <a href="<?php echo base_url();?>products/show/<?php echo $row->id; ?>">
        <?php if($row->img): ?>
        <img src="<?php echo base_url();?>images/<?php echo $row->img; ?>" alt="">
        <?php else: ?>
        <img src="<?php echo base_url(); ?>images/now_printing.png" alt="">
        <?php endif; ?>
      </a>
    </div>
    <div class="itemInfo">
      <a href="<?php echo base_url(); ?>products/show/.<?php echo $row->id; ?>">
        <?php echo $row->name; ?>
      </a>
      <p>価格：<?php echo number_format($row->price); ?>円</p>
      <a href="<?php echo base_url(); ?>products/show/<?php echo $row->id; ?>">詳細</a>
    </div>
  </div>
  <?php endforeach; ?>
</div>
