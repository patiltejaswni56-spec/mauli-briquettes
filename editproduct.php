<?php

include "db.php";

$id=$_GET['id'];

$result=mysqli_query($conn,"SELECT * FROM products WHERE id='$id'");

$row=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{

$productname=$_POST['productname'];
$rate=$_POST['rate'];
$pdesc=$_POST['pdesc'];
$quality=$_POST['quality'];

$image=$_FILES['image']['name'];

if($image!="")
{

move_uploaded_file($_FILES['image']['tmp_name'],"images/".$image);

$sql="UPDATE products SET

productname='$productname',
rate='$rate',
pdesc='$pdesc',
quality='$quality',
image='$image'

WHERE id='$id'";

}
else
{

$sql="UPDATE products SET

productname='$productname',
rate='$rate',
pdesc='$pdesc',
quality='$quality'

WHERE id='$id'";

}

mysqli_query($conn,$sql);

echo "<script>

alert('Product Updated Successfully');

window.location='viewproducts.php';

</script>";

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Product</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="buy-container">

<div class="buy-box">

<h2>Edit Product</h2>

<form method="post" enctype="multipart/form-data">

<input type="text"
name="productname"
value="<?php echo $row['productname'];?>"
required>

<br><br>

<input type="number"
name="rate"
value="<?php echo $row['rate'];?>"
required>

<br><br>

<textarea
name="pdesc"
style="width:90%;height:120px;"><?php echo $row['pdesc'];?></textarea>

<br><br>

<input type="text"
name="quality"
value="<?php echo $row['quality'];?>"
required>

<br><br>

<img src="images/<?php echo $row['image'];?>"
width="150">

<br><br>

<input type="file"
name="image">

<br><br>

<button
type="submit"
name="update">

Update Product

</button>

</form>

</div>

</div>

</body>
</html>