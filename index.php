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
						  {"fields":"id,name,picture.type(large),cover"},
						  function(response) {
							  // Insert your code here
								console.log(response);
								var name = document.getElementById('name');
								var pro = document.getElementById('pro');
								var cover = document.getElementById('cover');
								
								name.innerHTML = response.name;
								pro.src = response.picture.data.url;
								cover.src = response.cover.source;
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
		
		<img src="" alt="Smiley face" id="cover">
		<br>
		<img src="" alt="Smiley face" id="pro">
		<br>
		<h1 id="name"></h1>
	
	</body>
</html>
