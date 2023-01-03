<div class="modal fade" id="del_<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">سڕینەوەی مەندوبەکان</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="GET" enctype="multipart/form-data">
        دڵنیایت لە سڕینەوەی ئەم کاڵایە ؟
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">داخستن</button>
        <input type="text" hidden name="id_del" value="<?php echo $row['id']?>">
        <input type="submit" name="del" class="btn btn-danger" value="سڕینەوە">
        </form>
      </div>
    </div>
  </div>
</div> 