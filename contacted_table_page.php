<?php 
  $strKeyword = null;
  if (isset($_POST['txt_search'])) {
    $strKeyword = $_POST['txt_search'];
  }

  ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <link rel="stylesheet" href="style.css">
	<title>Contacted Page</title>

</head>
<body>

	<div class="container">
		<div class="row h-100 justify-content-center align-items-center">
			<div class="col-10 col-md-8 col-lg-6">

				<br><h4 class="text-center mb-4">Contacted Page</h3>

				<form name="users" method="post" action="contacted_table_code.php" class="form-example" enctype="multipart/form-data">
					
            <div class="group">
                <input required="" type="text" class="input" name="user_name">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>ชื่อ - สกุล</label>
            </div><br>

                <div class="group">
                <input required="" type="text" class="input" name="user_idcard">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>เลขบัตรประจำตัว</label>
            </div><br>

            <div class="group">
                <input required="" type="text" class="input" name="user_phone">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>เบอร์โทร</label>
            </div><br>

          <div class="group">
            <input type="hidden" class="input" name="topic_contact" value="#">
          </div>

          <div class="custom-select" style="width:100%;">
              <select name="department" id="department" required>
                <option value="t0">ติดต่อแผนก</option>
                <option value="คลินิกกายภาพบำบัด">คลินิกกายภาพบำบัด</option>
                <option value="คลินิกแพทย์แผนไทย">คลินิกแพทย์แผนไทย</option>
                <option value="คลินิกผู้ป่วยทั่วไป">คลินิกผู้ป่วยทั่วไป</option>
                <option value="คลินิกพิเศษ(โรคเรื้อรัง)">คลินิกพิเศษ(โรคเรื้อรัง)</option>
                <option value="คลินิกทันตกรรม">คลินิกทันตกรรม</option>
                <option value="คลินิกสุขภาพเด็กดี">คลินิกสุขภาพเด็กดี</option>
                <option value="คลินิกวางแผนครอบครัว">คลินิกวางแผนครอบครัว </option>
              </select>
          </div><br>

          <div class="container-calendar">

			      <span>โปรดเลือกวันที่</span>
            <input type="date" name="user_date" id="user_date" required><br>
						
          </div>


          <br><button style="width:49%" class="btn-submit" type="submit">บันทึกข้อมูล</button>
          <button style="width:49%"  class="btn-reset" type="reset">ล้างข้อมูล</button>
                    
        </form><br>
 
			<form action="contacted_table_showqueue.php?user_idcard=user_idcard" method="get">

                <div class="group">
                    <input required="" type="text" class="input" name="user_idcard">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>กรอกเลขบัตรของท่านเพื่อแสดงคิว</label>
                </div><br>

                <button style="width:100%" class="btn-sreach"type="submit">แสดงบัตรคิวของท่าน</button>

		    </form>
					
			</div>
		</div>
	</div>

<script>
    
var x, i, j, l, ll, selElmnt, a, b, c;
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
document.addEventListener("click", closeAllSelect);

</script>

</body>
</html>