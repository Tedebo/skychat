$(document).ready(function() {
			$('#name').focus();
			$('#name').keypress(function(event) {
				var key = (event.keyCode ? event.keyCode : event.which);
				if (key == 13 ) {
					var info = $('#name').val();
					$.ajax({
						type: "post",
						url: "action.php",
						data: {name: info},
						success: function(status) {
							$('#name').val('');
                                                        $('#result').animate({ scrollTop: $('#result').prop("scrollHeight") * $('#result').prop("clientHeight") / 25 }, 1000);
						}
					});
				};
			});
			
			$('#send').click(function(){
				$('#name').focus();
				var info = $('#name').val();
					$.ajax({
						type: "post",
						url: "action.php",
						data: {name: info},
						success: function(status) {
							$('#name').val('');
                                                        $('#result').animate({ scrollTop: $('#result').prop("scrollHeight") * $('#result').prop("clientHeight") / 25 }, 1000);
						}
					});
			
			});
			

			setInterval(function(){
				$("#result").load("testchatback.php");	
				
			},1000);
			
			$('#name').autogrow({vertical: true, horizontal: false});
			

			setTimeout(function(){
                                $('#result').animate({ scrollTop: $('#result').prop("scrollHeight") * $('#result').prop("clientHeight") / 25 }, 1000);
                        },1000);

			
			
		
});