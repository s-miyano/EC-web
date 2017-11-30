<div class="sideContent">
  <div class="cartArea">
    <div class="cartContainer">
      <a href="<?php echo base_url(); ?>products/cart"><img src="<?php echo base_url();?>images/cart.png" alt="cart">カートを見る(<?php echo $item_count; ?>)</a>
    </div>
  </div>
  <div class="searchArea">
    <?php
      echo form_open('products/search');
      $q = array('name' => 'q', 'placeholder' => '何をお探しですか？', 'class' => 'keyword', 'size' => '30');
      echo form_input($q);
      $submit = array('class' => 'searchButton', 'name' => '', 'value' => '検索');
      echo form_submit($submit);
      echo form_close();
     ?>
  </div>
  <div class="categoryContainer">
    <nav class="sideNavi">
      <ul>
        <li>
          <a href="<?php echo base_url(); ?>/products/index/1">筆記用具</a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>/products/index/2">文房具</a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>/products/index/3">ノート・手帳</a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>/products/index/4">ファイル・バインダー</a>
        </li>
      </ul>
    </nav>
  </div>
</div>
