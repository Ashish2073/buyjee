<table class="table table-bordered tableexportcsv">
  <thead>
    <tr>
      <th>Name</th>
      <th>Company Name</th>
      <th>Store Url</th>
      <th>Email Id</th>
      <th>Phone</th>
      <th>Commission</th>
      <th>Address</th>
      <th>City</th>
      <th>State code</th>
      <th>Zip code</th>
      <th>Country</th>
      <th>Date / Time</th>
      <th>Approved Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach(GetVenderDatavale() as $valuecvnsor){
      foreach(GetPermissionvalData($valuecvnsor['vendor_auto']) as $vendorpermisn){
        if($vendorpermisn['user_p_block'] == "1"){
          echo "<tr class='blockvendor'>";
          $arrpvdval = "Block";
        }else{
          echo "<tr class='unblockvendor'>";
          $arrpvdval = "Unblock";
        }
        /*if($vendorpermisn['user_p_email_ap'] == "1"){
          $arrpvdval = "<a href='$url/admin-manager/vendors/?block=".$valuecvnsor['vendor_auto']."&blockcation=1'><i class='fa fa-eye-slash'></i></a>";
        }else{
          $arrpvdval = "In Approved";
        }*/
    ?>
      <td><?php echo $valuecvnsor['vendor_f_name']; ?> <?php echo $valuecvnsor['vendor_l_name']; ?></td>
      <td><?php echo $valuecvnsor['vendor_company']; ?></td>
      <td><a target="_blank" href="<?php echo $url; ?>/<?php echo $valuecvnsor['vendor_uni_name']; ?>"><?php echo $url; ?>/<?php echo $valuecvnsor['vendor_uni_name']; ?></a></td>
      <td><?php echo $valuecvnsor['vendor_email']; ?></td>
      <td><?php echo $valuecvnsor['vendor_phone']; ?></td>
      <td><?php echo $valuecvnsor['vendor_commi_type']; ?> - <?php echo $valuecvnsor['vendor_commi_val']; ?></td>
      <td><?php echo $valuecvnsor['vendor_address']; ?></td>
      <td><?php echo $valuecvnsor['vendor_city']; ?></td>
      <td><?php echo $valuecvnsor['vendor_state']; ?></td>
      <td><?php echo $valuecvnsor['vendor_zipcode']; ?></td>
      <td><?php echo $valuecvnsor['vendor_country']; ?></td>
      <td><?php echo $valuecvnsor['vendor_date']; ?></br><?php echo $valuecvnsor['vendor_time']; ?></td>
      <td><?php echo $arrpvdval; ?></td>
    </tr>
  <?php }} ?>
  </tbody>
</table>