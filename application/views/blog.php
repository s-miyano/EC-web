<div class="blog">
  <section class="mainContentWrap">

    <!--1記事以上ある場合-->
    <?php if($articles): ?>
    <?php echo $sidebar; ?> <!--サイドナビ-->
    <div class="mainContent">
      <a href="<?php echo base_url(); ?>blogs/add" class="addButton">新規記事を投稿する</a>
      <?php foreach($articles as $article): ?>
      <div class="articleContainer">
        <h2 class="title"><?php echo anchor('blogs/post/'.$article->entry_id, $article->entry_title); ?></h2>
        <p class="date"><?php echo $article->entry_date; ?></p>
        <span><?php echo $article->entry_text; ?></span>
      </div>
      <?php endforeach; ?>
    </div>

    <!--記事がない場合-->
    <?php else: ?>
    <?php echo $sidebar; ?> <!--サイドナビ-->
    <div class="mainContent">
      <a href="<?php echo base_url(); ?>blogs/add" class="addButton">新規記事を投稿する</a>
      <p>記事がありません。</p>
    </div>
    <?php endif; ?>
  </section>
</div>
