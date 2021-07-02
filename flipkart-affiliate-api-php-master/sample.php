<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title></title>
</head>
<body>

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://affiliate-api.flipkart.net/affiliate/1.0/search.json?query=iphone+12&resultCount=5',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Fk-Affiliate-Id: closetode',
    'Fk-Affiliate-Token: 74ab18a51ba34afc8a5c71b6a18ef31f'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
     
$data = json_decode($response,true);
$dotd=$data["products"];
$num = count($dotd);

// echo $dotd[1]["productBaseInfoV1"]["title"];
for($x=0;$x<$num;$x++){
            $prodtitle[$x] = $dotd[$x]["productBaseInfoV1"]["title"];
            $prodId[$x]=$dotd[$x]["productBaseInfoV1"]["productId"];
            $prodDesc=$dotd[$x]["productBaseInfoV1"]["productDescription"];
            $prodUrl=$dotd[$x]["productBaseInfoV1"]["productUrl"];
            $prodImage=$dotd[$x]["productBaseInfoV1"]["imageUrls"]["200x200"];

            
            
        }
      
         
        // foreach ($prodtitle as $key => $value) {
        //   echo $prodDesc[$key];
          
        // }
        
?>
  <div class="card" style="width: 18rem;">
    <?php foreach ($prodtitle as $key => $value): ?>

  <img class="card-img-top" src="<?php echo $dotd[$key]["productBaseInfoV1"]["imageUrls"]["200x200"]?>" alt="Card image cap">
  
  <div class="card-body">
    <h5 class="card-title"><?php echo $prodtitle[$key];?></h5>
    <p class="card-text"><?php echo $dotd[$key]["productBaseInfoV1"]["productDescription"] ;?></p>
    <a href="<?php echo $dotd[$key]["productBaseInfoV1"]["productUrl"] ?>" class="btn btn-primary">Go somewhere</a>
    
  </div>

<?php endforeach; ?>
</div>
<?php echo $prodDesc ?>
<?php echo $response ?>
</body>
</html>

