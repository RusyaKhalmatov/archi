<?php 
    if(!isset($_SESSION))
    {
        session_start();
    }
?>
       

 <div class="container-fluid">
        <div class="row">
            
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="container" id="navi">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#resp-menu">
                          <span class="sr-only"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                   </div>
                   
                    <div class="collapse navbar-collapse" id="resp-menu">
                       
           
                       <form class="navbar-form navbar-right" role="search" >
                       
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                       
                      </form>
                       
                        <ul class="nav navbar-nav navbar-right">
                            <li class="listNav" id="ma"><a href="#">Main</a></li>
                            <li class="listNav" id="prod"><a href="#">Trips</a></li>
                            <li class="listNav" id="adv"><a href="adv_temp.php">Advantages</a></li>
                            <li class="listNav" id="news"><a href="news_temp.php">News</a></li>
                            <li class="listNav" id="cont"><a href="contacts_temp.php">Contacts</a></li>
                    
                              <li class="dropdown"><?php if(isset($_SESSION["user_name"])){?><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                   <?php echo "Hi, ";?>
                <?= $_SESSION["user_name"];}?> 
                            <?php if(isset($_SESSION["user_name"])){?>
                            <b class="caret"></b></a>
                             <ul class="dropdown-menu">
                             <li><a href="../user_page/user_content.php">Settings</a></li>
                             <li><a href="log_out.php">Log out</a></li>
                        
                         </ul> <?php } else {?>
                                  <a href="../main_page/site_access.php">Guest</a>
                         
                         
                         
                         <?php } ?>
                         </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>