
<!--全商品一覧-->
<div class="home">
  <section class="mainContentWrap">
    <?php if(!$this->uri->segment(3, 0)): ?>
    <!--サイドナビ-->
    <?php echo $sidebar; ?>
    <div class="mainContent">
      <?php foreach($all_items as $item): ?>
      <div class="itemContainer">
        <div class="itemImg">
          <a href="<?php echo base_url(); ?>products/show/<?php echo $item->id; ?>"><img src="<?php echo base_url(); ?>images/<?php echo $item->img; ?>" alt="image"></a><br>
        </div>
        <div class="itemInfo">
          <a href="<?php echo base_url(); ?>products/show/<?php echo $item->id; ?>"><?php echo $item->name; ?></a><br>
          <p>価格：<?php echo $item->price; ?>円</p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </section>
</div>

<!--カテゴリ別商品一覧-->
<div class="byCategory">
  <section class="mainContentWrap">
    <?php if($this->uri->segment(3, 0)): ?>
    <!--サイドナビ-->
    <?php echo $sidebar; ?>
    <div class="mainContent">
      <?php foreach ($items_by_category as $item): ?>
      <div class="itemContainer">
        <div class="itemImg">
          <a href="<?php echo base_url(); ?>products/show/<?php echo $item->id; ?>"><img src="<?php echo base_url(); ?>images/<?php echo $item->img; ?>" alt="image"></a><br>
        </div>
        <div class="itemInfo">
          <a href="<?php echo base_url(); ?>products/show/<?php echo $item->id; ?>"><?php echo $item->name; ?></a><br>
          <p>価格：<?php echo $item->price; ?>円</p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </section>
</div>

<?php $this->load->view('footer'); ?>
