<div class="add-entry">
  <section class="mainContentWrap">
    <!--サイドナビ-->
    <?php echo $sidebar; ?>
    <div class="mainContent">
      <div class="addContainer">
        <?php
        echo validation_errors();
        echo form_open('blogs/add');
        $data = array('name' => 'entry_title', 'id' => 'title', 'value' => '');
        echo 'タイトル：'.form_input($data).'<br>';
        $data = array('name' => 'entry_text', 'id' => 'text', 'value' => '');
        echo '本文'.form_textarea($data).'<br>';
        $data = array('name' => 'submit', 'value' => '投稿', 'class' => 'postButton', 'onClick' => 'disp();');
        echo form_submit($data);
        echo form_close();
        ?>
      </div>
    </div>
  </section>
</div>
