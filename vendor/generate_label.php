<?php

require_once("session.php");

require_once("functions.php");

$vendor_id = $_SESSION['vendorsessionlogin'];

?>
<?php

if(isset($_GET['cust'])){

    $customerid = $_GET['cust'];

    $prodt_id = $_GET['prod'];

}
?>
<!DOCTYPE html> 
<html> 
  
<head> 
    <title><?php echo $customerid; ?></title> 
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"> 
    </script> 
      
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"> 
    </script> 
</head> 
  
<body> 
    <center>
      
    <div id="html-content-holder" style="background-color: #F0F0F1;  
                color: #00cc65; width: 500px;padding-left: 25px;  
                padding-top: 10px; margin-bottom: 2em; overflow: auto; text-align: left;"> 
          
        <strong> 
            Label 
        </strong> 
          
        <hr/> 
          
        <h3 style="color: #3e4b51; text-align: left;"> 
            TO : 
        </h3> 
      
        <?php echo getlabaledatato($customerid,$prodt_id); ?>

        <h3 style="color: #3e4b51; text-align: left;">From :</h3>
        <?php echo getlabaledatafrom($vendor_id); ?>
    </div>
    <input id="btn-Preview-Image" type="button" value="Preview And Download" />
    <h3>Preview :</h3>
    <div id="previewImage">
    </div>

    <a id="btn-Convert-Html2Image" href="#"> 
        Download 
    </a> 
      
    <script> 
        $(document).ready(function() { 
          
            // Global variable 
            var element = $("#html-content-holder");  
          
            // Global variable 
            var getCanvas;  
  
            $("#btn-Preview-Image").on('click', function() { 
                html2canvas(element, { 
                    onrendered: function(canvas) { 
                        $("#previewImage").append(canvas); 
                        getCanvas = canvas; 
                    } 
                }); 
            }); 
  
            $("#btn-Convert-Html2Image").on('click', function () {
                var imgageData = getCanvas.toDataURL("image/png");
                // Now browser starts downloading it instead of just showing it
                var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                $("#btn-Convert-Html2Image").attr("download", "Gallerlala.png").attr("href", newData);
            });
        }); 
    </script> 
    </center> 
</body> 
  
</html>
