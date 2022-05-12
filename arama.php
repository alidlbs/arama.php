<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container-sm{
            padding: 5%;
        }
       
        .row{padding: 1.5%;}
    </style>
</head>
<body>
    <div class="container-sm">
        <form action="arama.php" method="post">
<div class="row">
    <div class="col-6">
         <select class="form-select" aria-label="Default select example" name="sec">
            <option selected>neye gore arama yapacaksınız</option>
            <option value="uadi">adı</option>
            <option value="utur">tur</option>
          </select>  
    </div>
    <div class="col-6">
         <div class="input-group">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="ara"/>
        <button type="submit" name="gonder" class="btn btn-outline-primary">search</button>
      </div>
    </div>
</div>
      


   
       
        <div class="col">
             <button type="reset" class="btn btn-danger">Danger</button> 
        </div> 
    
         
    </div>
    </form>
    <div class="row">
    
    <?php

$baglanti=new mysqli("localhost","root",/*sifre*/"","alisveris");
if($baglanti->connect_error)
   {
     echo "baglamadınız  çünkü : ". $baglanti->connect_error;  
   } 
   else
    
      { 
         if(isset($_POST['ara']))
            {
        $sec=$_POST["ara"];
        $turi=$_POST["sec"];
        if ($turi=="uadi") 
		{
				$sorgucuk="SELECT * FROM urun WHERE (UrunAdi='$sec')";
			}
         else if ($turi=="utur")
            {
                
                $sorgucuk="SELECT * FROM urun WHERE (UrunTuru='$sec')";
            }
            else{echo" <script>alert('bos gecme');</script>";}

        
    }
   
  
 
}
if(isset($_POST['ara']))
{

$git=mysqli_query($baglanti,$sorgucuk);
$deneme=mysqli_num_rows($git);
if ($deneme==0) echo "Herhangi bir Kayıt Bulunamadı"; 



else
{
echo $deneme." adet kayıt vardır..<br>";
echo "<table border='1' bordercolor='blue' bgcolor='#fffff' align='center'>
<tr align='center'>
<td>
   <font color='#1254F6'><b>Ürün Id</b></font>
</td>
<td>
   <font color='#1254F6'><b>Ürün Adı</b></font>
</td>
<td>
   <font color='#1254F6'><b>Ürün Fiyatı</b></font>
</td>
<td>
   <font color='#1254F6'><b>Ürün Açıklaması</b></font>
</td>
<td>
   <font color='#1254F6'><b>Ürün Adeti</b></font>
</td>
<td>
   <font color='#1254F6'><b>Ürün Türü</b></font>
</td>
</tr>";}
while($str=mysqli_fetch_array($git))
{
   echo "
<tr align='center'>
<td>
   <font color='#1254F6'><b>$str[0]</b></font>
</td>
<td>
   <font color='#1254F6'><b>$str[1]</b></font>
</td>
<td>
   <font color='#1254F6'><b>$str[2]</b></font>
</td>
<td>
   <font color='#1254F6'><b>$str[3]</b></font>
</td>
<td>
   <font color='#1254F6'><b>$str[4]</b></font>
</td>
<td>
   <font color='#1254F6'><b>$str[5]</b></font>
</td>
</tr>";
}
echo "</table>";		
}

$baglanti->close();
?>

    </div>
    <a href="mainPage.php"> geri don</a>
    </div>
   
 
  





</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>