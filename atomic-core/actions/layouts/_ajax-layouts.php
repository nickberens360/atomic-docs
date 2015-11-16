<!-- <div class="ad_fileFormGroup">
    <form class="ad_fileForm " action="/atomic-docs/atomic-core/layouts.php" method="post">
      <div class="inputBtnGroup">
        <label class="ad_label">What's your component's name?</label>
        <button class="ad_btn ad_btn-pos" type="submit" >Add</button>
        <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="compName" required></div>
      </div>
      <input type="hidden" name="compDir" value="layouts"/>
      <input type="hidden" name="create" value="create"/>
    </form>
</div> -->


<form action="/atomic-docs/atomic-core/partial-mngr/create.php" method="POST">
		
		<!-- NAME -->
		<div id="name-group" class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" placeholder="Henry Pym">
			<!-- errors will go here -->
		</div>

		<!-- EMAIL -->
		<div id="email-group" class="form-group">
			<label for="email">Email</label>
			<input type="text" class="form-control" name="email" placeholder="rudd@avengers.com">
			<!-- errors will go here -->
		</div>

		<!-- SUPERHERO ALIAS -->
		<div id="superhero-group" class="form-group">
			<label for="superheroAlias">Superhero Alias</label>
			<input type="text" class="form-control" name="superheroAlias" placeholder="Ant Man">
			<!-- errors will go here -->
		</div>

		<button type="submit" class="btn btn-success">Submit <span class="fa fa-arrow-right"></span></button>

	</form>