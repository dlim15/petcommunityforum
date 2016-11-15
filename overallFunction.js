		function openSideBar(){
			$('#closed').click( function() {
				$('#closed').hide();
				$('#encyclopedia').fadeIn();
				$('#opened').fadeIn();
				$('#ency').select2();
			});
		}
		function closeSideBar(){
			$('#opened').click( function() {
				$('#opened').hide();
				$('#encyclopedia').hide();
				$('#closed').fadeIn();
			});
		}
		function directsToEncyclopedia(){
			$('#breedSearch').click( function(){
				var url = "http://www.akc.org/dog-breeds/";
				var a = $('#ency').val();
				var breed_type = convertToURLStyle(a);
				
				url += breed_type;
				window.open(url);
			});
		}
		function convertToURLStyle(name){
			var first = name.replace(/ /g, "-");
			var second = first.replace(".", "-");
			var last = second.toLowerCase();
			
			return last;
		}
		function numberOnly(){
			$(".numberOnly").keypress(function(e){
				if(e.which != 0 && e.which != 8 && (e.which < 48 || e.which > 57))
					return false;
				
					
			});
		}
		function moneyCheck(){
			$(".moneyAmount").keypress(function(e){
				if($(".moneyAmount").val().includes(".") && e.which == 46)
					return false;
				if(e.which != 0 && e.which != 8 && e.which != 46 && (e.which < 48 || e.which > 57))
					return false;
				
			});
		}