<div class="row">
            <div class="col-lg-10 col-lg-offset-2" style="border:1px solid black; margin-top: 0px;">
                <?php  
        db_connect();
                   $query = mysql_query("SELECT * FROM img");
        
        while ($row=mysql_fetch_array($query))
        {?>
           <div class="col-sm-4 col-md-4">
            <div class="thumbnail">
                
                <img src="images/NewDir/<?=$row["img_name"];?>" alt="..." style="width:300px; height: 200px;">   
            </div>
            </div>
        
             
        <?php }?>
            </div>
        </div>