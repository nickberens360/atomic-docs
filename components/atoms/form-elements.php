<!--components/atoms/form-elements.php-->

<form>
  <div class="formGroup">
    <label for="fname">First Name</label>
    <input class="formInput" name="fname" />
  </div>
  <div class="formGroup">
    <label  for="lname">Last Name</label>
    <input class="formInput" name="lname" />
  </div>
  <div class="formGroup">
    <label  for="city">Message</label>
    <textarea class="formInput" name="message"></textarea>
  </div>
  <div class="formGroup">
    <select class="selectBox">
      <option value="">SELECT GARAGE STALLS</option>
      <option value="4">Thomas Edison</option>
      <option value="1">Nikola</option>
      <option value="3">Nikola Tesla</option>
      <option value="5">Arnold Schwarzenegger</option>
    </select>
  </div>
  
  <div class="formGroup">
    <p class="formLabel">Label</p>
    <div class="formGroup-check">
      <input class="formInput-check" type="checkbox" id="check1" name="check1" />
      <label for="check1"><span></span>Check Box 1</label>
    </div>
    <div class="formGroup-check">
      <input class="formInput-check" type="checkbox" id="check2" name="check2" />
      <label for="check2"><span></span>Check Box 2</label>
    </div>
  </div>
</form>
