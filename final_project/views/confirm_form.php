<form action="confirm.php" method="post">
    <fieldset>
	<legand>Confirm Admission</legand> 
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="merit_no" placeholder="Merit Number" type="text"/>
            
        </div>
        
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Confirm
            </button>
        </div>
		 <h4 id="demo"><?=$result ?></h4>
    </fieldset>
</form>