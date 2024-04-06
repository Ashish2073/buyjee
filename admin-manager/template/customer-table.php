<table class="table table-bordered tableexportcsv">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email Id</th>
      <th>Phone</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Address</th>
      <th>City</th>
      <th>State</th>
      <th>Zip code</th>
      <th>Country</th>
      <th>Date / Time</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach(GetCustomerDataVal() as $valuecvnsor){
        foreach(GetLoginUserDetails($valuecvnsor['customer_ui_id']) as $valedatalogin){
          if($vendorpermisn['customer_active'] == "0"){
            echo "<tr class='blockvendor'>";
          }else{
            echo "<tr class='unblockvendor'>";
          }
      ?>
      <td><?php echo $valuecvnsor['customer_fname']; ?> <?php echo $valuecvnsor['customer_lname']; ?></td>
      <td><?php echo $valedatalogin['user_email']; ?></td>
      <td><?php echo $valuecvnsor['customer_phone']; ?></td>
      <td><?php echo $valuecvnsor['customer_age']; ?></td>
      <td><?php echo $valuecvnsor['customer_gender']; ?></td>
      <td><?php echo $valuecvnsor['customer_address']; ?></td>
      <td><?php echo $valuecvnsor['customer_city']; ?></td>
      <td><?php echo $valuecvnsor['customer_state']; ?></td>
      <td><?php echo $valuecvnsor['customer_pincode']; ?></td>
      <td><?php echo $valuecvnsor['customer_country']; ?></td>
        <td><?php echo $valuecvnsor['customer_date']; ?> / <?php echo $valuecvnsor['customer_time']; ?></td>
        <td><?php echo $valuecvnsor['customer_type']; ?></td>
      </tr>
    <?php }} ?>
  </tbody>
</table>