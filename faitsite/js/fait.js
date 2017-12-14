

		  //returns a true or false value to see if an email address is valid

        function validateEmail(email) {

            var em = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return em.test(email);
        };

        function sendEmail(email) {
            return $.ajax({
                url:"php/email.php",
                type:"POST",
                data: {
                    email: email
                }
                
            }).promise();
        };

        //after the ajax completes it will change the form to a success message
        function changeForm(promise, css) {
            promise.done(function(data) {
		console.log(data);
            	//returns false if the email has already been used
            	//returns true if the email is new
            	if (!data.emailExists){
            		$(css).html("Thank you for trusting us with your Fait.").fadeIn(400);
            	}
            	if (data.emailExists){
            		$(css).html("We have seen your Fait and it is good. :)").fadeIn(400);
            	};
                
               
            });

        };
		//runs after the submit button is pushed or they press enter
        function submit(e) {
            if (validateEmail(e)){
            	$("#formToHide, #formToHide2").slideUp(200);
                var verifiedEmail = sendEmail(e);
                changeForm(verifiedEmail,"#result, #result2");
            } else {
                $("#formToHide, #formToHide2").effect("shake", {
                    times: 2,
                    distance: 20,
                    direction:"left"
                }, 500);
                
                if($("#email").val()==""){
                $("#email2").focus().select();
                }
                if($("#email2").val()==""){
                $("#email").focus().select();
                }
            };

        };

$.fn.exBounce = function(){
    var self = this;
    (function runEffect(){
        self.effect("bounce", { times:1,direction:"down" }, 1500, runEffect);
    })();
   return this;

};


		$(document).ready(function() {
			$("#fbSec").hover(function(){
				$(this).animate({'background':'blue'},1000);
			});


			 $("#result").fadeOut(0);
            $("#formToHide").keypress(function(e) {
                if (e.keyCode == 13) {
                    submit($("#email").val());
                }
            });
            
            $("#formToHide2").keypress(function(e) {
                if (e.keyCode == 13) {
                    submit($("#email2").val());
                }
            });
            $("#submit").click(function(event) {
                event.stopPropagation();
                submit($("#email").val());
            });
            $("#submit2").click(function(event) {
                event.stopPropagation();
                submit($("#email2").val());
            });


			$('#fullpage').fullpage({
				verticalCentered: false,
				anchors: ['firstPage', 'secondPage', '3rdPage', 'fourthPage', 'fifthPage', 'sixthPage', 'seventhPage'],
                sectionsColor: ['#222326', '#222326', '#222326', '#222326', '#222326', '#222326', '#6BB9C6'],

             	
				afterRender: function(){

						
					//playing the video
					$('video').get(0).play();
					
				}



			});


				$("#faittopPageArrow").exBounce();



		});
	