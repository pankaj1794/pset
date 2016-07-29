<h1>Registration Form</h1>
<form action="register.php" method="post">
    <fieldset>
         <legend>Personalia:</legend>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="first_name" placeholder="Firstname" type="text" required/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input autocomplete="off" autofocus class="form-control" name="last_name" placeholder="Lastname" type="text" required/><br><br>
        </div>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text" required/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="form-control" name="email" placeholder="email" type="email" required required/><br><br>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password" required/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="form-control" name="confirmation" placeholder="confirmation" type="password" required/><br><br>
            
            <input type="radio" name="gender" value="male" checked> Male &nbsp;&nbsp;&nbsp;
           <input type="radio" name="gender" value="female"> Female &nbsp;&nbsp;&nbsp;
          <input type="radio" name="gender" value="other"> Other &nbsp;&nbsp;&nbsp;

            
        </div>
		
        </fieldset>
		<fieldset>
         <legend>Personalia:</legend>
        
        <div class="form-group">
		<input class="form-control" name="ssc" placeholder="10 Marks in %" type="text" required/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input class="form-control" name="hsc" placeholder="12 Marks in %" type="text" required/>
		</div>
		
        </fieldset>
        <br>
        <br>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Register 
            </button>
        </div>
    
</form>
<div>
    or <a href="login.php">log in</a>
</div>
