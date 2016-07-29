<form method="POST" action="document_upload.php" enctype="multipart/form-data">
<fieldset>
         <legend>Upload Results Image:</legend>
            <div class="upload">
			<fieldset>
         <legend>Upload 10th Results image:</legend>
            <input type="file" id="tenth" name="tenth"><br><br>
			</fieldset>
			<fieldset>
			 <legend>Upload 12th Results image:</legend>
					<input type="file" id="twelveth" name="twelveth"><br><br>
			</fieldset>
            <button type="submit"  >Upload</button>
            <h4 id="demo"><?=$result ?></h4>
            <br><br>
            
        </div>
         
        </fieldset>
</form>

		