<div class="show">
  <div class="mainContentWrap">
    <!--サイドナビ-->
    <?php echo $sidebar; ?>
    <div class="mainContent">
      <?php foreach($items as $item): ?>
      <div class="itemContainer">
        <div class="itemImg">
          <?php if($item->img): ?>
          <img src="<?php echo base_url(); ?>images/<?php echo $item->img; ?>" alt="">
          <?php else: ?>
          <img src="<?php echo base_url(); ?>images/now_printing.jpg" alt="">
          <?php endif; ?>
        </div>
        <div class="itemInfo">
          <span class="name"><?php echo $item->name; ?></span>
          <span class="price"><?php echo $item->price; ?>円</span>
          <p class="detail"><?php echo $item->detail; ?></p>
          <div class="addButton">
            <?php
              $hidden = array('id' => $item->id);
              echo form_open('products/add', '', $hidden);
              $data = array('name' => 'qty' , 'type' => 'text', 'value' => 1, 'size' => '2', 'class' => 'qty' );
              echo form_input($data);
              $submit = array('class' => 'addButton', 'name' => '', 'value' => 'カートに追加');
              echo form_submit($submit);
              echo form_close();
            ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php $this->load->view('footer'); ?>
</div>
