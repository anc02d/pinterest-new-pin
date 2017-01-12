<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Pinterest New Pin</title>
	</head>
	<body>
		<h1>Data Design Project</h1>
		<h2>Adding a New Pin on Pinterest.com</h2>
		<h3>User Persona</h3>
		<ul>
			<li>Name: Ashley Smith</li>
			<li>Age: 24</li>
			<li>Occupation: college student living off student loans and daddy's money </li>
			<li>Technology: iPhone7 and a Mac Book</li>
			<li>Needs: to find a hairstyle for tomorrow's big date </li>
			<li>Goals: impress her social group with her creativity and to build a collection of inspiration and ideas for future reference </li>
		</ul>
		<h3>Use Case</h3>
		<p>Ashley is done with class for the day and looking forward to her big date with Brad tomorrow. She wants to impress him and knows that a new hairstyle will do the trick. So, she turns to Pinterest for some inspiration.</p>
		<p>After opening the site on her iPhone app, she starts scrolling through her feed. She sees a hairstyle she likes and decides to pin it to her "Hair" board so it will be accessible tomorrow when she's getting ready.</p>
		<p>She simply taps and holds on the picture she likes, and slides her finger to the "save" icon. Then, she is prompted to edit the description, and she chooses her "Hair" board as the location of her new pin.</p>
		<p>Once she taps the board she wants, her pin feed reappears along with a message that her pin was saved. She then continues browsing for the next 6 hours instead of finishing her homework.</p>
		<h3>Interaction Flow</h3>
			<ol>
			<li class="user">User: Opens Pinterest app on phone</li>
			<li class="site">Site: Auto logs user in based on saved data and presents default pin feed screen</li>
			<li class="user">User: Scrolls down to look at feed</li>
			<li class="site">Site: Loads more pins as user scrolls down</li>
			<li class="user">User: Sees a hairstyle pin she likes and wants to save to her boards, taps and holds on picture</li>
			<li class="site">Site: Pops up 3 icons - save, like, send</li>
			<li class="user">User: Drags finger onto "save" icon</li>
			<li class="site">Site: Opens choose board screen with user's boards</li>
			<li class="user">User: Enters a description, chooses a board to save to and taps on it</li>
			<li class="site">Site: Saves to database, Goes back to pin feed and gives a pop-up "saved" message at bottom</li>
			</ol>
		<h3>Conceptual Model</h3>
		<ul>
			<li>One user can upload many pins</li>
			<li>Users can like many pins</li>
			<li>Pins can be repinned many times by multiple users</li>
		</ul>
	</body>
</html>