<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <title>HPC Sphere| Job/Intern Application Portal</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.html">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="assets/css/headers/header-default.css">
    <link rel="stylesheet" href="assets/css/footers/footer-v1.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/plugins/animate.css">
    <link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
    <!--[if lt IE 9]><link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css"><![endif]-->

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="assets/css/pages/page_contact.css">

    <!-- CSS Theme -->
    <link rel="stylesheet" href="assets/css/theme-colors/default.css" id="style_color">
    <link rel="stylesheet" href="assets/css/theme-skins/dark.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="assets/css/custom.css">

     <style>

     #orangecol{
         color: orange;
     }

     label {
         color: #292960;
         font-size: 15px;
     }

     .breadcrumbs{
       background-image: url("img/jobportalbackground.png");
     }
    .row{
      padding: 0px;
    background-color: #fff;
    background-image: -webkit-linear-gradient(45deg,#efefef 25%,transparent 0%,transparent 100%,
    #efefef 75%,#efefef),-webkit-linear-gradient(45deg,#efefef 25%,transparent 100%,transparent 0%,#efefef 75%,#efefef);

     }

     .container-fluid{
       padding: 0px;
     }

     </style>

     <script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>

     <script type="text/javascript">
     $(document).ready(function(){
/*
     function checkyes() {

       var rbtnValue = null;
       var rbtnList = document.getElementsByName("choice1");

        for (var j = 0; j < rbtnList.length; j++) {
          if (rbtnList[j].checked)
           {
              rbtnValue = rbtnList[j].value;
           }
         }

          if (rbtnValue == 'yes') {

            var x= document.getElementById("txtage1").value;
            var y= document.getElementById("txtage2").value;
            var z= document.getElementById("txtage3").value;


             if (x == "")
              {
                 alert("Enter your years of experience");
                 return false;
              }

              else if (y == "")
               {
                  alert("Enter your current workplace");
                  return false;
               }
               else if (z == "")
                {
                   alert("Enter your expected salary");
                   return false;
                }

           return true;
           }

           else {
            return true;
         }
     }
*/
    $('input[name=choice1]').change(function(){

     if($(this).val()=="yes")
     {
        $("#txtage1").show();
        $("#txtage2").show();
        $("#txtage3").show();
     }
     else
     {
         $("#txtage1").hide();
         $("#txtage2").hide();
         $("#txtage3").hide();
     }
     });
  });
  </script>

</head>

<body>

  <!--
  session_start();

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      echo "Welcome to the application portal, " . $_SESSION['username'] . "!";
  } else {
      echo "Please log in first to see this page.";
  }
-->
<div class="container-fluid">
<div class="wrapper" id="effect">
   <div id="header">
     <div class="breadcrumbs">
         <div class="container col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-sm-12" id="head1">
             <h1 class="pull-left"  style="color:#F5F5DC;"  >Application Portal</h1>
             <ul class="pull-right breadcrumb">
                 <li><a href="hiring.html"  style="color:#F5F5DC;">Positions for Hiring</a></li>
                 <li class="active"  style="color:#36454F;"><strong> Application Portal </strong></li>
             </ul>
         </div>
     </div>
   </div>
 </div>
    <!--=== Breadcrumbs ===-->
    <!--/breadcrumbs--><!--=== End Breadcrumbs ===--><!--=== Form ===-->

                  <form enctype="multipart/form-data" method="post" action="applicationform.php">
                    <div class="row">
                <div class="container col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">

                <div class="form-group">
                  <br>
                  <br>
                  <label>
                      Name
                  </label>
                  <input class="form-control" value="" name="name" id="name" placeholder="Name" type="text" required>
                </div>

                 <div class="form-group">
                  <label>
                      Highest Qualification/Currently Pursuing
                  </label>
                  <input class="form-control" id="qualification" value="" name="qualification"  placeholder="Qualification" type="text" required>
                </div>
                <div class="form-group">
                  <label>
                      Email
                  </label>
                  <input class="form-control" id="email" name="email" value="" placeholder="Email" type="email" required>
                </div>
                <div class="form-group">
                  <label>
                      Mobile
                  </label>
                  <input class="form-control" id="mobile" name="mobile" value="" placeholder="Mobile" type="number" required>
                </div>
                <div class="form-group">
                    <label>
                       Applying For
                    </label>
                    <br>
                <input type="radio" name="choice" value="job" checked> Job <br>
                <input type="radio" name="choice" value="intern"> Intern <br>
                </div>
                <div class="form-group">
                    <label>
                       Past Experience
                    </label>
                    <br>
                <input type="radio" name="choice1" value="no" id="no" checked="checked"> No <br>
                <input type="radio" name="choice1" value="yes" id="yes" > Yes  &nbsp;
                <input style="display:none;" type="text" id="txtage1" name="txtage1" placeholder="Years of experience" > &nbsp;
                <input style="display:none;" type="text" id="txtage2" name="txtage2"  placeholder="Currently Working at" > &nbsp;
                <input style="display:none;" type="text" id="txtage3" name="txtage3"  placeholder="Expected Salary" >
                </div>

                <div class="form-group" id="orangecol">
                    <label>
                       Upload Resume
                    </label>
                <input id='fileid' type='file' name="fileupload" required>
               </div>
                <br>

                <div class="form-group">
                  <input  name="submit" type="submit" value="submit" class="btn btn-u" onclick="checkyes()">
                </div>
            </div>

            <div class="col-md-2 col-lg-2">
           </div>
         </div>
        </form>
    <!--=== End Form Part ===-->


  <div id="footer"></div>
</div><!--/wrapper-->
</div> <!--/container-->
<!-- JS Global Compulsory -->

</body>

</html>
