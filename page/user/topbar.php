<!--<%
    String firstName="",lName="";
    if ((request.getParameter("logout") == null) ? false : true) {
        session.setAttribute("LOGIN", null);
        session.invalidate();
        response.sendRedirect("index.jsp");
    }
    else{
        firstName = (String) session.getAttribute("fName");
        lName = (String) session.getAttribute("lName");
    }
%>-->

<header class="main-header"> 
    <a href="home.php" class="logo"> 
        <span class="logo-mini"><b>U</b>Portal</span> 
        <span class="logo-lg"><b>User </b>Portal</span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation"> 
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav"> 
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/img/user.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs">User Portal</span>
                    </a>
                    <ul class="dropdown-menu">

                        <li class="user-header">
                            <img src="assets/img/user.jpg" class="img-circle" alt="User Image">
                            <p>User<small>System Admin</small></p>
                        </li> 

                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li> 
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <form role="form" action="home.php" method="POST">
                                    <button type="submit" name="logout" id="logout" class="btn btn-default btn-flat">Sign out</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li> 
            </ul>
        </div>
    </nav>
    
   
    
</header>