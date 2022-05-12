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

        
    }
   
  
 
}
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
</tr>";
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

 
   