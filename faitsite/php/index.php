<!DOCTYPE html>
	<head>


 		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
		<script type="text/javascript">
		//return true if email is in correct format return false if email is not in correct format
		function validateEmail(email) {

			var em = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return em.test(email);
		};

			//create the ajax promise for adding email to database and sending an email
			function sendEmail(){
				return $.ajax({
					url:"email.php",
					type:"POST",
					data:{
						email : $("#email").val()
					}
				}).promise();
			};

			//after the ajax completes it will change the form to a success message
			function changeForm(promise, css){
				promise.done(function(data){
					console.log(data);
					$(css).html(data);
				});

			};

			function submit(){
					if (validateEmail($("#email").val())){
					var sentEmail=sendEmail();
					changeForm(sentEmail, "#form");
					}
					else{
						$("#form").effect("shake",{times:2,distance:10},1000);
					};

			};


			$("document").ready(function(){
			//when a user clicks submit it runs the ajax promise and sends the promise to changeForm
				$("#form").keypress(function(e){
					if(e.keyCode == 13){submit();}
				});
				$("#submit").click(function(event){
					event.stopPropagation();
					submit();
				});
			});

		</script>
	</head>

	<body>
		<div id="form" style="padding-left:100px">
			<input type="text" id="email" placeholder="Enter your email"> </input>
			<button id="submit">Submit</button>
		</div>
	</body>

</html>
