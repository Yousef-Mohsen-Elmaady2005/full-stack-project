<!-- ==================cat=============== -->
<?php
$selec_cat="SELECT * FROM cat";
$resalt_cat=$conn->query($selec_cat);
?>
<!-- ====================end cat========== -->
<!-- ==================brand=============== -->
<?php
$selec_brand="SELECT * FROM brand";
$resalt_brand=$conn->query($selec_brand);
//  ====================end brand========== 
$id_pro=$_GET['id'];
$selec_pro="SELECT * FROM products WHERE id='$id_pro'";
$resalt_pro=$conn->query($selec_pro);
$pro=$resalt_pro->fetch_assoc();
?>

<!--  enctype="multipart/form-data عشان الصور الملفات عموما-->
<form action="function/do_edet_pro.php"method="POST" enctype="multipart/form-data">
  <input type="hidden"name="id"value="<?=$pro['id']?>">
    <!-- //Name -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prodact Name</label>
    <input type="text"
    placeholder="Prodact Name"
    name="Name"
    value="<?=$pro['name']?>"
     class="form-control" id="exampleInputEmail1"
      aria-describedby="Prodact Name">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <!-- /// -->
  <!-- //Price -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Price</label>
    <input type="number"
    name="Price"
    placeholder="Price"
    value="<?=$pro['price']?>"
     class="form-control" id="exampleInputEmail1"
      aria-describedby="Prodact Name">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <!-- //count -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">count</label>
    <input type="number"
    name="count"
    value="<?=$pro['count']?>"
    placeholder="count"
     class="form-control" id="exampleInputEmail1"
      aria-describedby="Prodact Name">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <!-- /// -->
  <!-- //image -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">image</label>
    <input type="file"
    name="image"
    id="exampleInputEmail1"
      aria-describedby="Prodact Name">
    <div id="emailHelp" class="form-text">
        <br>
        <img src="image/<?=$pro['image']?>"style="height: 100px;">
    </div>
  </div>
  <!-- /// -->
  <!-- //des -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Descrption</label>
    <textarea style="width:100%;height:100px"name="des"id=""value="<?=$pro['des']?>">   <?=$pro['des']?>   </textarea>
  </div>
  <!-- /// -->
<!-- //Category -->
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category</label>
   <select class="form-control" name="cat"id="">
    <?php
foreach($resalt_cat as $cat){?>
    <option <?php

    if($cat['id']==$pro['cat']){
    echo"selected";
    }
    
    ?> value="<?=$cat['id']?>"><?=$cat['name']?></option>
    <?php
}
    ?>
</select>
  </div>
  <!-- /// -->
   <!-- //brand -->
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">brand</label>
   <select class="form-control" name="brand"id="">
    <?php
foreach($resalt_brand as $brand){?>
    <option <?php
    if($brand['id']==$pro['brand']){
      echo"selected";

    }
    
    
    ?> value="<?=$brand['id']?>"><?=$brand['name']?></option>
    <?php
}
    ?>
</select>
  </div>
  <!-- /// -->
  <div class="text-center mt-3 mb-3">
  <button class="btn btn-success">Update</button>
</div>
</form>
