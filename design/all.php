<?php
$select_prodact="SELECT * FROM products";
$resalt_prodact=$conn->query($select_prodact);


?>
<table class="table text-border table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th class="text-center" scope="col">Prodact Name</th>
      <th class="text-center"scope="col">Price</th>
      <th class="text-center"scope="col">Image</th>
      <th class="text-center"scope="col">Quatity</th>
      <th class="text-center"scope="col">Category</th>
      <th class="text-center"scope="col">Brand</th>
      <th class="text-center"scope="col">Control</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach($resalt_prodact as $prodact){?>
    <tr>
    <td class="text-center" scope="col"><?=$prodact['name']?></td>
    <td class="text-center"scope="col"><?=$prodact['price']?></td>
    <td class="text-center"scope="col"><img src="image/<?=$prodact['image']?>"style="height: 100px;"></td>
    <td class="text-center"scope="col"><?=$prodact['count']?></td>

                           <!-- cat -->

    <td class="text-center" scope="col"><?php $id_cat=$prodact["cat"];
    $select_cat="SELECT * FROM cat WHERE id='$id_cat'";
    $resalt_cat=$conn->query( $select_cat);
    $cat=$resalt_cat->fetch_assoc();
    echo $cat['name'];
    ?></td>

                           <!-- brand -->
                            
    <td class="text-center"scope="col"><?php $id_brand=$prodact["brand"];
    $select_brand="SELECT * FROM brand WHERE id='$id_brand'";
    $resalt_brand=$conn->query( $select_brand);
    $brand=$resalt_brand->fetch_assoc();
    echo $brand['name'];?>
    <td class="text-center"><a href="prodact.php?action=edet&id=<?=$prodact['id']?>"><button class="btn btn-primary">Update</button></a>
    <a href="function/delete_pro.php?id=<?=$prodact['id']?>"><button class="btn btn-danger text-center">Delete</button></a>
  </tr>
  
<?php   

}


?>
  
  </tbody>
</table>
<div class="text-center"><a href="prodact.php?action=add"><button class="btn btn-success">Add New</button></a></div>