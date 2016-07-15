<!DOCTYPE html>
<html>
	<head>
    
	</head>
  
	<body>
  
		<script>
			window.fbAsyncInit = function() {
				FB.init({
				appId      : '662572513893170',
				xfbml      : true,
				version    : 'v2.7'
				});

				// ADD ADDITIONAL FACEBOOK CODE HERE
				function onLogin(response) {
					if (response.status == 'connected') {
						
						FB.api(
						  '/me',
						  'GET',
						  {"fields":"id,name,events{name,place,rsvp_status}"},
						  function(response) {
							  // Insert your code here
								var welcomeBlock = document.getElementById('fb-welcome');
								var welcomeBlock2 = document.getElementById('fb-welcome2');
								welcomeBlock.innerHTML = response["events"];
								welcomeBlock2.innerHTML = response.name;
						  }
						);
						
						/* FB.api('/me?fields=first_name', function(data) {
						var welcomeBlock = document.getElementById('fb-welcome');
						welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';
						}); */
					}
				}

				FB.getLoginStatus(function(response) {
					// Check login status on load, and if the user is
					// already logged in, go directly to the welcome message.
					if (response.status == 'connected') {
						onLogin(response);
					} else {
						// Otherwise, show Login dialog first.
						FB.login(function(response) {
						onLogin(response);
						}, {scope: 'user_friends, email'});
					}
				});
			};

			(function(d, s, id){
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	  
		<h1 id="fb-welcome"></h1>
		<br>
		<h1 id="fb-welcome2"></h1>
	
	</body>
</html>
