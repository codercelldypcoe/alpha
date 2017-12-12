<!DOCTYPE html>
<?php
$authErr = $subErr = $noticeErr = $startdateErr = $expdateErr = $yearErr = $deptErr =  "";
$auth = $sub = $notice = $startdate = $expdate = $year = $dept =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["author"])) {
    $authErr = "Author is required";
  } else {
    $auth = test_input($_POST["author"]);
  }
  if (empty($_POST["subject"])) {
    $subErr = "Subject is required";
  } else {
    $sub = test_input($_POST["subject"]);
  }
  if (empty($_POST["notice"])) {
    $noticeErr = "Notice is required";
  } else {
    $notice = test_input($_POST["notice"]);
  }
  if (empty($_POST["sdate"])) {
    $startdateErr = "Starting Date is required";
  } else {
    $startdate = test_input($_POST["sdate"]);
  }
  if (empty($_POST["edate"])) {
    $expdateErr = "Expiration date is required";
  } else {
    $expdate = test_input($_POST["edate"]);
  }
  if (empty($_POST["year"])) {
    $yearErr = "Year is required";
  } else {
    $year = test_input($_POST["year"]);
  }
  if (empty($_POST["dept"])) {
    $deptErr = "Department is required";
  } else {
    $dept = test_input($_POST["dept"]);
  }
  $dept = test_input($_POST["dept"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add Records Form
        </title>
    </head>
    <body>
        <form action="insert.php" method="POST">
            <p>
                <label for="Author">Author:</label>
                <input type="text" name="author" id="Author">* <?php echo $authErr;?>
            </p>
            <p>
                <label for="Subject">Subject:</label>
                <input type="text" name="subject" id="Subject">* <?php echo $subErr;?>
            </p>
            <p>
                <label for="Notice">Notice:</label>
                <input type="textarea" name="notice" id="Notice">* <?php echo $noticeErr;?>
            </p>
            <p>
                <label for="StartDate">Start Date:</label>
                <input type="date" name="sdate" id="StartDate">* <?php echo $startdateErr;?>
            </p>
            <p>
                <label for="ExpiryDate">Expiry Date:</label>
                <input type="date" name="edate" id="ExpiryDate">* <?php echo $expdateErr;?>
            </p>
            <p>
                <label for="Year">Year:</label>
                <select name="year" id="Year">
                    <option value="All">All</option>
                    <option value="FE">FE</option>
                    <option value="SE">SE</option>
                    <option value="TE">TE</option>
                    <option value="BE">BE</option>
                </select>* <?php echo $yearErr;?>
            </p>
            <p>
                <label for="Dept">Concerned Dept:</label>
                <select name="dept" id="Dept">
                    <option value="IT">IT</option>
                    <option value="CS">Computer Science</option>
                    <option value="E&TC">Electronics and Telecommunications</option>
                    <option value="Production">Production</option>
                    <option value="Mecahnical">Mechanical</option>
                    <option value="Instrumentation and Control">Instrumentation and Control</option>
                    <option value="Civil">Civil</option>
                </select>* <?php echo $deptErr;?>
            </p>
            <input type="submit" value="Add Records">
        </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
var data = {};
$(document).ready(function() {
  $('input[type="submit"]').on('click', function() {
      resetErrors();
      var url = 'insert.php';
      $.each($('form input, form select'), function(i, v) {
          if (v.type !== 'submit') {
              data[v.name] = v.value;
          }
      }); //end each
      $.ajax({
          dataType: 'json',
          type: 'POST',
          url: url,
          data: data,
          success: function(resp) {
              if (resp === true) {
                  	//successful validation
                      $('form').submit();
                  	return false;
              } else {
                  $.each(resp, function(i, v) {
	        console.log(i + " => " + v); // view in console for error messages
                      var msg = '<label class="error" for="'+i+'">'+v+'</label>';
                      $('input[name="' + i + '"], select[name="' + i + '"]').addClass('inputTxtError').after(msg);
                  });
                  var keys = Object.keys(resp);
                  $('input[name="'+keys[0]+'"]').focus();
              }
              return false;
          },
          error: function() {
              console.log('there was a problem checking the fields');
          }
      });
      return false;
  });
});
function resetErrors() {
    $('form input, form select').removeClass('inputTxtError');
    $('label.error').remove();
}
</script>
    </body>
</html>