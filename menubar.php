<a href="#menu-toggle" class="btn btn-primary btn-lg" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
<br/>

  <div class="col-sm-3">	
    <div id="wrapper">
	
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <h3 style="color:#FAFAFA;"><b>Online Job Portal</b></h3>
                </li>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="report.php">Report</a>
                </li>
                <li>
                    <a href="#">Publish a new job</a>
                </li>
                <li>
                    <a href="#">Career Resources</a>
                </li>
                <li>
                    <a href="#">Admin</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
			
        </div>
        <!-- /#sidebar-wrapper -->
		
    </div>
    <!-- /#wrapper -->
	
	
	
	<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</div>
