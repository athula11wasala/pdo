

<html>
       <?php
       
         echo $this->data['msg'];
          ?>
    <form   method="post" action="/athula/mvc/index/index/login">
        <pre>
       
       User Name <input type="text" name="txtuser" />

      Password   <input type="text" name="txtpassword" />

                 <input type="submit" name="submit"/>
                
        
        </pre>
        
    </form>
    
</html>