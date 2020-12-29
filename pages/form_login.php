<style>



.login{
  margin: 0 auto;
  width:400px;
}

.login input{

  width: 400px;
}

.login a{
  width: 400px;
  margin-left: 0px;
  margin-top:30px;
   margin-bottom: 20px;
  text-align: center;
  font-weight: bold;
  color: white;
}

#signup a{
 text-decoration: none;
  color: rgb(156, 118, 179);
}

#signup a:hover{
    color: grey;
}

</style>

<main>

<h1><center>LOGIN</center></h1>

<div class="row">
 
  <div class="col-lg-12 col-md-12 col-sm-12">
     <div class="login">
   <form action="aksi_login.php" method="post">

    



      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
        </div> 
        <input type="text" class="form-control"  placeholder="Enter Username" name="username" required>
      </div>
     
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
        </div> 
        <input type="password" class="form-control"  placeholder="Enter Password" name="password" required>
      </div>
   

      <div class="kliklogin">
         <button type="submit" class="btn-more">LOGIN</button>
      </div>
     

    
    <div id="signup">
      <p>Not Registered? <a href="form_daftar.php">Create an account</a></p>
    </div>
  </form>
</div>
</div>
</div>

</main>