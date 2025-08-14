

<!-- <form action="function/do_add_pro.php"method="POST" enctype="multipart/form-data">وصلنا للصفحه دي عن طريق  -->

<?php
// حطينا كود الاتصال عشان هو مش متصل بالصفحه
include "CONECT.php";
// echo"<pre>";
// print_r($_POST);
// echo"====================================<br>";
// print_r($_FILES);
$id=$_POST['id'];
$name=$_POST['Name'];
$Price=$_POST['Price'];
$count=$_POST['count'];
// $image=$_POST['image'];
$des=$_POST['des'];
$cat=$_POST['cat'];
$brand=$_POST['brand'];


// ==================================image==============================
// ==================================عشان نتأكد دي اخر با==============================
$img_name=$_FILES['image']['name'];
$img_tmp=$_FILES['image']['tmp_name'];
$img_size=$_FILES['image']['size'];
$img_error=$_FILES['image']['error'];

if($img_error==0){

    $exp=explode(".",$img_name);
    // $ext=end($exp);دي معناها تقطع اخلر كلمه في الصوره الي هو الامتداد
    $ext=end($exp);
    // دي النهايات الي هتكون في نهايه اسامي الصور
    $allow_ext=['jpg','jpeg','bmb'];
    // ==================================check==============================
    // ده الشرط بمعنى لو ان الصور الي جايه لو مش نفس نهايه الكلام الي هو الامتداد اطبع ان دي لازم تكون صوره
    if(!in_array($ext,$allow_ext)){
    
    echo "the file must Be Image";
    // ده بيوقف اي كود تحته ما هو اكتشف ان ده مش صوره
    exit();
    }
    // ==================================check size==============================
    // 1m=1000 000
    if($img_size > 3000000){
    
        echo "The Image is too large";
        // ده بيوقف اي كود تحته ما هو اكتشف ان ده مش صوره
        exit();
    
    }
    // ==================================end check name==============================
    // دي عشان بنستخدم الفانكشان بتاعت التايم الي بترجع الوقت من 1970 لحد دلوت يعني بتبعت الصوره ومعاها الساعه الي احنا فيها بالثواني عشان مفيش صور تتعارض مع بعض
    // rand دي بتدي رقم عشواأي مع الوقت والاسم عشان كده استحاله يحصل تعارض
    $new_img_name=time().rand(0,10000).$img_name;
    // echo $new_img_name;
    // $img_tmpده معناه ان مسار الصوره
    //بأمتداه الجديد image احنا عاوزين نغير مسار الصوره وندخله في فولدر ال
    rename($img_tmp,"../image/$new_img_name");

    $edet="UPDATE products SET
name='$name',price='$Price',image='$new_img_name',count='$count',des='$des',brand='$brand',cat='$cat' WHERE id='$id'";


}else{
    $edet="UPDATE products SET
name='$name',price='$Price',count='$count',des='$des',brand='$brand',cat='$cat' WHERE id='$id'";
}

// ==========================================edet=================================    
// $insert="INSERT INTO products( name, price, image, count, des, brand, cat)
//  VALUES ('$name','$Price','$new_img_name','$count','$des','$brand','$cat')";
$conn->query($edet);

header("location:../prodact.PHP");













?>