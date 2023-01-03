


<div class="modal fade" id="up_<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تازەکردنەوەی کاڵا</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
                   <div class="col-lg-12 my-2">
                      <label style="font-size:25px">ناوی کاڵا</label>
                      <input type="text" required class="form-control text-center raduis-20" name="name_kalla_update" value="<?php echo $row['nawy_kalla']?>">
                   </div>
                   <div class="col-lg-12 my-2">
                      <label style="font-size:25px">بارکۆد</label>
                      <input type="number" required class="form-control text-center raduis-20" name="barcode_update" value="<?php echo $row['Barcode']?>">
                   </div>
                   <div class="col-lg-12 my-2">
                      <label style="font-size:25px">بەروای بەسەرچوون</label>
                      <input type="date" required class="form-control text-center raduis-20" name="expire_date_update" value="<?php echo $row['expire_date']?>">
                   </div>
                   <div class="col-lg-12 my-2">
                      <label style="font-size:25px">نرخی جوملە</label>
                      <input type="number" required class="form-control text-center raduis-20" name="nrx_ko_update" value="<?php echo $row['nrx_ko']?>" >
                   </div>
                   <div class="col-lg-12 my-2">
                      <label style="font-size:25px">نرخی فرۆشتن</label>
                      <input type="number" required class="form-control text-center raduis-20" name="nrx_froshtn_update" value="<?php echo $row['nrx_froshtn']?>">
                   </div>
                   <div class="col-lg-12 my-2">
                      <label style="font-size:25px">چەند پارچەیە؟</label>
                      <input type="number" required class="form-control text-center raduis-20" name="count_update" value="<?php echo $row['count']?>">
                   </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">داخستن</button>
                <input type="text" hidden name="id_update" value="<?php echo $row['id']?>">
                <input type="submit" name="update_kala" class="btn btn-success" value="تازەکردنەوە">
                </form>
              </div>
            </div>
          </div>
        </div>