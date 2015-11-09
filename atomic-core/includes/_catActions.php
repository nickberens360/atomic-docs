<h1>Cat Actions</h1>

<form class="ad_fileForm " action="/atomic-docs/atomic-core/index.php" method="post">
  <input type="text" class="form-control" name="inputName" placeholder="Create Category" required>
  <input type="hidden" name="createDir" value="createDir"/>
</form>

<form class="ad_fileForm " action="/atomic-docs/atomic-core/index.php" method="post" onsubmit="return confirm('Deleting a category deletes all files within it as well. Are you sure about this?');">
  <input type="text" class="form-control" name="inputName" placeholder="Delete Category" required>
  <input type="hidden" name="deleteDir" value="deleteDir"/>
</form>