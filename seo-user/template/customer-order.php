<table class="table table-bordered tableexportcsv">
  <thead>
    <tr>
      <th>Date</th>
      <th>Creator's Name</th>
      <th>Transaction ID</th>
      <th>Customer's Name</th>
      <th>SKU</th>
      <th>Product Name</th>
      <th>Quantity</th>
      <th>Fillter</th>
      <th>Product Price</th>
      <th>Creator's %</th>
      <th>GLL %</th>
      <th>Shipping Fee</th>
      <th>Transaction Fee</th>
      <th>Creator's Total Income</th>
      <th>Date Payment Sent to Creator</th>
      <th>Comments</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if("all" == "all"){
      $actionvale = "1";
      $all_suctomer = "";
    }
    foreach(CustomerOderTable() as $valuecvnsor){
      if($valuecvnsor['payment_response'] == $actionvale){
        /*if($valuecvnsor['p_customer_type'] == $all_suctomer){*/
      foreach(CustomerShppingValue($valuecvnsor['customer_id'],$valuecvnsor['p_serty_id']) as $valedatalogin){
        foreach(GetCustomerDataVal($valuecvnsor['customer_id']) as $valcustomer){
          /*echo "<pre>";
          echo $valuecvnsor['tnx_id'];
          echo "</pre>";*/
          foreach(GetProductDataValTab($valuecvnsor['product_auto_id'],"0") as $getproductdaa){
            foreach(GetVenderDatavale($getproductdaa['product_vender_id']) as $vendordetials){
            if($valuecvnsor['p_payment_mod'] == "2"){
              $payment_mood = "Authorize.net";
            }elseif($valuecvnsor['p_payment_mod'] == "1"){
              $payment_mood = "PayPal";
            }elseif($valuecvnsor['p_payment_mod'] == "3"){
              $payment_mood = "Affirm";
            }
      if($valuecvnsor['p_customer_type'] == ""){
        $typuser = "Regular Customer";
      }elseif($valuecvnsor['p_customer_type'] == "Guest"){
        $typuser = "Guest Customer";
      }
      if($valedatalogin['mul_shipp_shipptrakinid'] == "0" || $valedatalogin['mul_shipp_shipptrakinid'] == ""){}else{

      $get_createfee = $valuecvnsor['p_price'];
      $customerfee = $get_createfee*87.5/100;
      $targeinfee = $get_createfee*2.5/100;
      $gllcomtion = $valuecvnsor['p_price']*12.5/100;
      $creatertotel = $customerfee-$targeinfee;

    ?>
      <td><?php echo $valuecvnsor['p_date']; ?></td>
      <td><?php echo $vendordetials['vendor_f_name']; ?> <?php echo $vendordetials['vendor_l_name']; ?></td>
      <td><?php echo $valuecvnsor['tnx_id']; ?></td>
      <td><?php echo $valcustomer['customer_fname']; ?> <?php echo $valcustomer['customer_lname']; ?></td>
      <td><?php echo $getproductdaa['product_sku']; ?></td>
      <td><?php echo $getproductdaa['product_name']; ?></td>
      <td><?php echo $valuecvnsor['p_qty']; ?></td>
      <td><?php 
        if(GetSingleVertion($valuecvnsor['p_filter_value']) == ": <br/>" || GetSingleVertion($valuecvnsor['p_filter_value']) == ""){
          echo "No fillter";
        }else{
          echo GetSingleVertion($valuecvnsor['p_filter_value']);
        } ?>
      </td>
      <td><?php echo $valuecvnsor['p_price']; ?></td>
      <td><?php echo $customerfee-$targeinfee; ?></td>
      <td><?php echo $gllcomtion; ?></td>
      <td><?php echo $valuecvnsor['p_shpping_amount']; ?></td>
      <td><?php echo $targeinfee; ?></td>
      <td><?php echo $creatertotel+$valuecvnsor['p_shpping_amount']+$targeinfee; ?></td>
      <td></td>
      <td></td>
    </tr>
  <?php }}}}}}} ?>
  </tbody>
</table>