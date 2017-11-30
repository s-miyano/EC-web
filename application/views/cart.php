<!--カート内に商品が入っている場合-->
<div class="mainContent">
  <?php if($cart_items != NULL): ?>
  <p><?php echo $item_count; ?>点の商品がカートに入っています。</p>
  <div class="cartContainer">
    <table>
      <tbody>
        <tr class>
          <th>商品名</th>
          <th>数量</th>
          <th>単価</th>
          <th>金額</th>
        </tr>
        <?php foreach($items as $item): ?>
        <tr>
          <td><?php echo $item->name; ?></td>
          <td>
            <?php
              $id = array('id' => $item->id);
              echo form_open('products/add/'.$item->id, '', $id);
              $qty = array('name' => 'qty', 'value' => $item->qty, 'size' => 2);
              echo form_input($qty);
              echo form_submit('changeButton', '変更');
              echo form_close();
            ?>
          </td>
          <td><?php echo number_format($item->price); ?>円</td>
          <td><?php echo number_format($item->amount); ?>円</td>
          <td>
            <?php
              $delete = array('id' => $item->id, 'qty' => 0);
              echo form_open('products/add/'.$item->id, '', $delete);
              echo form_submit('deleteButton', '削除');
              echo form_close();
             ?>
          </td>
        </tr>
        <?php endforeach; ?>
        <tr>
          <td><?php echo number_format($total);?>円</td>
          <td>
            <?php
              echo form_open('products/input');
              echo form_submit('buyButton', '購入手続きに進む');
              echo form_close();
             ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!--カートが空の場合-->
  <?php else: ?>
  <p>カートに商品が入っていません。</p>
  <?php endif; ?>

</div>

<?php $this->load->view('footer'); ?>
