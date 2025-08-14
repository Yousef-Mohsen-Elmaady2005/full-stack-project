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
?>
<!-- ====================end brand========== -->


<!--  enctype="multipart/form-data عشان الصور الملفات عموما-->
<form action="function/do_add_pro.php"method="POST" enctype="multipart/form-data">
    <!-- //Name -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prodact Name</label>
    <input type="text"
    placeholder="Prodact Name"
    name="Name"
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
     class="form-control" id="exampleInputEmail1"
      aria-describedby="Prodact Name">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <!-- //count -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">count</label>
    <input type="number"
    name="count"
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
    <div id="emailHelp" class="form-text"></div>
  </div>
  <!-- /// -->
  <!-- //des -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Descrption</label>
    <textarea style="width:100%;height:100px"name="des"id=""></textarea>
  </div>
  <!-- /// -->
<!-- //Category -->
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category</label>
   <select class="form-control" name="cat"id="">
    <?php
foreach($resalt_cat as $cat){?>
    <option value="<?=$cat['id']?>"><?=$cat['name']?></option>
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
    <option value="<?=$cat['id']?>"><?=$brand['name']?></option>
    <?php
}
    ?>
</select>
  </div>
  <!-- /// -->
  <div class="text-center mt-3 mb-3">
  <button class="btn btn-success">Add New</button>
</div>
</form>
