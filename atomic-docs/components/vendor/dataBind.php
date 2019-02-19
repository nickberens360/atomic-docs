<!-- components/vendor/dataBind.php -->

<form>
    <div class="form-row">
        <label class="form-label" for="title">Title</label>
        <select id="title" data-bind="title">
            <option>Select title</option>
            <option value="Mr">Mr</option>
            <option value="Mrs">Mrs</option>
            <option value="Miss">Miss</option>
            <option value="Ms">Ms</option>
            <option value="Dr">Dr</option>
            <option value="Rev">Rev</option>
        </select>
    </div>
    
    <div class="form-row">
        <label class="form-label" for="first-name">First name</label>
        <input id="first-name" type="text" name="first-name" data-bind="firstName" />
    </div>

    <div class="form-row">
        <label class="form-label" for="second-name">Second name</label>
        <input id="second-name" type="text" name="second-name" data-bind="secondName" />
    </div>

    <div class="form-row">
        <label class="form-label" for="date-of-birth">Date of birth</label>
        <input id="date-of-birth" type="date" name="date-of-birth" data-bind="dateOfBirth" />
    </div>

    <div class="form-row">
        <label class="form-label">Gender</label>
        
        <input id="gender-male" type="radio" name="gender" value="Male" data-bind="gender" />
        <label for="gender-male">Male</label>

        <input id="gender-male" type="radio" name="gender" value="Female" data-bind="gender" />
        <label for="gender-female">Female</label>
    </div>
</form>

<dl>
    <dt>Title:</dt>
    <dd data-update="title"></dd>

    <dt>First name:</dt>
    <dd data-update="firstName"></dd>

    <dt>Second name:</dt>
    <dd data-update="secondName"></dd>

    <dt>Date of birth:</dt>
    <dd data-update="dateOfBirth"></dd>

    <dt>Gender:</dt>
    <dd data-update="gender"></dd>
</dl>