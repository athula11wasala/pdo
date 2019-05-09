<html>
    <body>
        
          <form action="/mvc/index/user/editView" method="post">
     
           User name: <input type="text" name="username" value="<?php echo $this->data[0]->uname; ?>"><br><br>
           
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email:    <input type="text" name="email" value="<?php echo $this->data[0]->email; ?>"><br><br>
         
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="hidden"  name="hndid" value="<?php echo $this->data[0]->id; ?>" />
          <input type="submit" value="save" >
            
        </form>
        
    </body>
    
    
</html>