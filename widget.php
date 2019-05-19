<?php include 'layouts/header.php'; ?>
<?php include 'layouts/headerStyle.php'; ?>



style{


}


<style>

/* Remove margins and padding from the list */
ul.todolist {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

/* Style the list items */
ul.todolist li {
  
  cursor: pointer;
  position: relative;
  padding: 12px 8px 12px 40px;
  background: #eee;
  font-size: 18px;
  transition: 0.2s;

  /* make the list items unselectable */
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Set all odd list items to a different color (zebra-stripes) */
ul.todolist li:nth-child(odd) {
  background: #f9f9f9;
}



/* When clicked on, add a background color and strike out text */
ul.todolist li.checked {
  background: #888;
  color: #fff;
  text-decoration: line-through;
}

/* Add a "checked" mark when clicked on */
ul.todolist li.checked::before {
  content: '';
  position: absolute;
  border-color: #fff;
  border-style: solid;
  border-width: 0 2px 2px 0;
  top: 10px;
  left: 16px;
  transform: rotate(45deg);
  height: 15px;
  width: 7px;
}

/* Style the close button */
.close {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px;
}

.close:hover {
  background-color: #f44336;
  color: white;
}

/* Style the header */
.header {
  background-color: #f44336;
  padding: 30px 40px;
  color: white;
  text-align: center;
}

/* Clear floats after the header */
.header:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the input */
input {
  margin: 0;
  border: none;
  border-radius: 0;
  width: 75%;
  padding: 10px;
  float: left;
  font-size: 16px;
}

/* Style the "Add" button */
.addBtn {
  padding: 10px;
  width: 25%;
  background: #d9d9d9;
  color: #555;
  float: left;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
  border-radius: 0;
}

.addBtn:hover {
  background-color: #bbb;
}

</style>

</header>



<body class="fixed-left">


    <!-- Begin page -->
    <div id="wrapper">

        <!-- left Nav Bar link -->
        <?php include 'layouts/navbar.php'; ?>

        <!-- Start right Content here -->
        <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <!-- Top Bar link -->
                <?php include 'layouts/topbar.php'; ?>

                <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                <div class="page-content-wrapper">

                    <div class="container-fluid">




                        <div class="row">

                            <div class="col-md-6 col-xl-4">
                                <div class="mini-stat clearfix bg-white">
                                   <div class="mapouter"><div class="gmap_canvas"><iframe width="400" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Melbourne&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe> <a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{position:relative;text-align:right;height:150px;width:100px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:300px;}</style></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="mini-stat clearfix bg-white">
                                  




                           
  <h5>To Do List</h5>
  <input type="text" id="myInput" placeholder="Title...">
  <span onclick="newElement()" class="addBtn">Add</span>

<br>
<br>
<br>
<ul id="myUL" class="todolist">
  <li class="listitem">Hit the gym</li>
  <li class="listitem">Pay bills</li>
  <li class="listitem">Meet George</li>
  <li class="listitem">Buy eggs</li>
  <li class="listitem">Read a book</li>
  <li class="listitem">Organize office</li>
</ul>



                                  



                                    <div class="clearfix"></div>
                                    <p class=" mb-0 m-t-20 text-muted">x<span class="pull-right">y</span></p>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="mini-stat clearfix bg-white">
                                    <div class="mini-stat-info">
                                        <span class="counter text-black">xxx</span>
                                        ?
                                    </div>
                                    <div class="clearfix"></div>
                                    <p class=" mb-0 m-t-20 text-muted">x<span class="pull-right">y</span></p>
                                </div>
                            </div>

                        </div>
                        <!-- end first row -->


                        







                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            <?php include 'layouts/footer.php'; ?>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    <?php include 'layouts/footerScript.php'; ?>

    <!-- Peity chart JS -->
    <script src="public/plugins/peity-chart/jquery.peity.min.js"></script>

    <!--C3 Chart-->
    <script src="public/plugins/d3/d3.min.js"></script>
    <script src="public/plugins/c3/c3.min.js"></script>

    <!-- KNOB JS -->
    <script src="public/plugins/jquery-knob/excanvas.js"></script>
    <script src="public/plugins/jquery-knob/jquery.knob.js"></script>

    <!-- Page specific js -->
    <script src="public/assets/pages/dashboard.js"></script>

    <!-- App js -->
    <script src="public/assets/js/app.js"></script>

    <script>
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByClassName("listitem");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
</script>


    </body>

</html>