<div class="post">
  <section class="mainContentWrap">
    <!--サイドナビ-->
    <?php echo $sidebar; ?>

    <div class="mainContent">
      <div class="postContainer">
        <h1><?php echo $article[0]->entry_title; ?></h1>
        <p><?php echo $article[0]->entry_date; ?></p>
        <span><?php echo $article[0]->entry_text; ?></span>
      </div>
      <div class="commentContainer">
        <?php if($comments): ?>
        <?php foreach($comments as $comment): ?>
        <p><?php echo date('Y-m-d', strtotime($comment->comment_date)); ?></p>
        <p><?php echo $comment->comment_name; ?></p>
        <span><?php echo $comment->comment_text; ?></span>
        <?php endforeach; ?>
        <?php else: ?>
        <p class="no-comment">コメント(0)</p>
        <?php endif; ?>
      </div>
      <div class="add-commentContainer">
        <?php
          echo validation_errors();
          echo form_open('blogs/post'.$article[0]->entry_id);
        ?>
        <dl class="comment_dl">
          <dt>名前</dt>
          <dd>
            <?php
              $data = array('name' => 'commentor', 'class' => 'commentor', 'value' => '');
              echo form_input($data);
            ?>
          </dd>
          <dt>E-mail</dt>
          <dd>
            <?php
            $data = array('name' => 'email', 'class' => 'email', 'value' => '');
            echo form_input($data);
            ?>
          </dd>
          <dt>本文</dt>
          <dd>
            <?php
            $data = array('name' => 'comment', 'class' => 'comment', 'rows' => 10, 'cols' => 50, 'value' => '');
            echo form_textarea($data);
            ?>
          </dd>
        </dl>
        <?php
        $data = array('name' => 'contactSubmit', 'class' => 'commentButton', 'value' => '送信');
        echo form_submit($data);
        echo form_close();
        ?>
      </div>
    </div>

  </section>

</div>
