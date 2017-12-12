<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Records Form</title>
</head>
<body>
<form action="print.php" method="post">
<select name="Select">
<option value="FE" selected="selected">FE</option>
<option value="SE">SE</option>
<option value="TE">TE</option>
<option value="BE">BE</option>
<option value="All">All</option>
</select><input type="submit" name="submit" value="SHOW" onclick="loadDoc()">
<div>
<script>
function loadDoc() {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ifr").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "print.php", true);
  xhttp.send();
}
</script>
<iframe id="ifr" src="print.php">
</div>
</form>
</body>
</html>