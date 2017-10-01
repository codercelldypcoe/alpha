<!DOCTYPE html>
<html>
    
<style>
.filterDiv {
  float: left;
  background-color: #2196F3;
  color: #ffffff;
  width: 100px;
  line-height: 100px;
  text-align: center;
  margin: 2px;
  display: none;
}

.show {
  display: block;
}

.container {
  margin-top: 20px;
  overflow: hidden;
}
</style>
    <head><link rel="stylesheet" href="news_scroll.css" type="text/css"></head>
<body>

<h2>Filter DIV Elements</h2>

<input type="radio" onclick="filterSelection('all')" name="category" checked>ALL<br>
<input type="radio" onclick="filterSelection('student')" name="category">ALL YEAR<br>
    <input type="radio" onclick="filterSelection('first')" name="category"> FIRST YEAR<br>
    <input type="radio" onclick="filterSelection('second')" name="category"> SECOND YEAR<br>
    <input type="radio" onclick="filterSelection('third')" name="category"> THIRD YEAR<br>
    <input type="radio" onclick="filterSelection('final')" name="category">FINAL YEAR<br>
<input type="radio" onclick="filterSelection('faculty')" name="category"> FACULTY<br>


<div class="container">
  <div class="filterDiv student first"><?php
			include('connect.php');
			$result = mysql_query("SELECT * FROM noticemsg WHERE position='first'");
					while($row = mysql_fetch_array($result))
						{
							echo '<li>'.$row['message'].'</li>';
						}
			?></div>
     <div class="filterDiv student second"><?php
			include('connect.php');
			$result = mysql_query("SELECT * FROM noticemsg WHERE position='second'");
					while($row = mysql_fetch_array($result))
						{
							echo '<li>'.$row['message'].'</li>';
						}
			?></div>
    
     <div class="filterDiv student third"><?php
			include('connect.php');
			$result = mysql_query("SELECT * FROM noticemsg WHERE position='third'");
					while($row = mysql_fetch_array($result))
						{
							echo '<li>'.$row['message'].'</li>';
						}
			?></div>
    
     <div class="filterDiv student final"><?php
			include('connect.php');
			$result = mysql_query("SELECT * FROM noticemsg WHERE position='final'");
					while($row = mysql_fetch_array($result))
						{
							echo '<li>'.$row['message'].'</li>';
						}
			?></div>
  <div class="filterDiv colors faculty"><?php
			include('connect.php');
			$result = mysql_query("SELECT * FROM noticemsg WHERE position='faculty'");
					while($row = mysql_fetch_array($result))
						{
							echo '<li>'.$row['message'].'</li>';
						}
			?></div>
  
</div>

<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}
</script>
    
    

</body>
</html>