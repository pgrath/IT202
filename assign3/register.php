<!DOCTYPE html>

<style>
fieldset {width: 60%; margin: auto; }

label { float: left; width: 7em; background: yellow;}

/* input {color: red;} */
</style>

<html>

<script>
	function pwcheck(){
		if(document.getElementById('userPass').value != document.getElementById('chkuserPass').value){
			//possibily use alret instead, my not be needed
			document.getElementById('chkuserPass').value = "";
			document.getElementById('userPass').focus();
			document.getElementById('usrNotify').innerHTML = "Passwords do not match.";
		}
		else{
			document.getElementById('usrNotify').innerHTML = "";
		}
	}

	function See(){

	if (document.getElementById("checkbox").checked){
	document.getElementById("userPass").type = "text";
	}

	if (!document.getElementById("checkbox").checked){
	document.getElementById("userPass").type = "password";
	}
}

function checkAddress(){
	var check = true
	var pattern = /^[0-9]+[A-Za-z]+$/
	var field = document.getElementById("address").value

	if (field.search (pattern) == -1){
		alret("Incorrect address!")
		check = false
	}
	return check
}

function blocker(){
	if (document.getElementById("address").innerHTML !=""){
		return false

	}
	else{
		return true
	}

}
</script>

<form  action = "registerA3.php" onsubmit="return blocker()">

	<fieldset><legend>Register here </legend>
	<label for "user">User name </label>	<input type=text name="user" id="user" required autofocus=on><br>
	<!--these 2 fields will be checked aganist each other for a correct pass. optional show password box because why not -->
	<label for "userPass">Password </label><input type=password name="userPass" id="userPass" autocomplete=off required > <input type = checkbox id = "checkbox" onclick="See()"> Click to see password<br>
	<label for "chkuserPass">Confirm Password </label><input type=password name="chkuserPass" id="chkuserPass"	autocomplete=off required onblur="pwcheck()">
	<span id="usrNotify" style="color:red"> </span>
	<br><br><br>
	<!-- used to warn the user of an incorrect pw -->
	<span id="usrNotify"> </span>

	<label for "email">Email </label><input type=text name="email" id="email">
	<input type=checkbox name="sendEmail" id="sendEmail" > Check for mail copy
	<br><br>
	<label for "fullname">Full name </label><input type=text name="fullname" id="fullname"><br>

	<label for "cell">Cell </label><input type=text name="cell" id="cell">
	<br><br>
	<label for "major">Student Major:</label><input type=text name="major" id="major">

	<br>

	<label for "town">Town</label> <?php include ("menu.php"); ?> <br>
	<label for "address">Address </label><textarea name = "address" id = "address" rows="4" cols="5" onblur="checkAddress()"> </textarea><br>

	<label for "state">State </label><select id="states" name="states"> <br>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>
	<br>
	<label for "zipcode">Zipcode </label><input type=text name="zipcode" id="zipcode" placeholder="Enter a 5 or 9 digit zip" title="Make sure your zip is 5 or 9 digits" pattern="([0-9]{5}|[0-9]{9})"><br>


			<input type=submit>
	</fieldset>


</form>

</html>
