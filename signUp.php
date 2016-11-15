<?php
include("menu.php");
$idExist = "";

?>

<div id="register">	
	<form id="submitting" action="signUp_sql.php" method="post">
	<table>
		<tr>
			<td>
				First name :
			</td>
			<td>
				<input type="text" name="fName" required />
			</td>
			
		</tr>
		<tr>
			<td>
				Last name :
			</td>
			<td>
				<input type="text" name="lName" required />
			</td>
		</tr>
		<tr>
			<td>
				User id :
			</td>
			<td>
				<input type="text" name="userId" id="userId" required /><span id="idWarning" class="warningMessage"></span>
			</td>
		</tr>
		<tr>
			<td>
				Password :
			</td>
			<td>
				<input type="password" name="pWord" id="pWord" required />
			</td>
		</tr>
		<tr>
			<td>
				Re-enter ur Password :
			</td>
			<td>
				<input type="password" name="pWord2" id="pWord2" required /><span id="pwWarning" class="warningMessage"></span>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<input type="submit" value="Signup"/>
			</td>
		</tr>
	</table>
	</form>
	
</div>
</div>
<script type="text/javascript">

$(document).ready(function(){
	$('#submitting').on('submit', function(){
		if($('#pWord').val() != $('#pWord2').val()){
			$('#pwWarning').html("Passwords are not matched!").show();
			return false;
		}
		if(duplicateIdCheck($('#userId').val())){
			$('#idWarning').html("Existing Id").show();
			return false;
		}
		alert("Welcome to pet forum!");
		return true;
	});
	
	function duplicateIdCheck(id){
		var isTrue;
		$.ajax({
			type:"POST",
			url:"signUpProcessing.php",
			global:false,
			async:false,
			data:{
				'id':id
			},
			dataType:"json",
			success:function(data){
				isTrue = data.dup;
			}
		});
		return isTrue;
	}
});
</script>
</body>
</html>
