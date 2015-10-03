<?php include ("head.php");?>
<body class="atoms">


<div class="grid-row atoms-container">
	<?php include ("sidebar.php");?>
	
	
	<div class="atoms-main">
		<div class="docBlock">
			<h1 class="docBlock-heading">Welcome!</h1>
			<p>Place the atomic-docs folder in the directory of your local dev enviornment.<p> 
			
			<ol class="docBlock-ul">
				<li>Set up your CSS preprocessor of choice.</li>
				<li>In the lower left hand corner, open the "Manage Categories" form. I'll call this one "molecules".
					<img class="docBlock-img" src="atomic-core/img/doc1.png" />
				</li>
				<li>Click on the newly created molecules link in the sidebar to go to the molecules page. In the form below the molecules let's create a new component called "calloutBox".
					<img class="docBlock-img" src="atomic-core/img/doc2.png" />
				</li>
				<li>So I'll create the HTML for the calloutBox component next. In the the project directory you'll notice a folder named "compontents". Open that and you'll find the folder molecules. This is the directory that all of the HTML component files you create under the molecules category. I'll open the file "calloutBox.php" and and put my HTML code there.
                    <img class="docBlock-img" src="atomic-core/img/doc3.png" />
				</li>
				<li>Back in our projects directory open up the SCSS folder. You will see the folder molecules and within molecules is the file the newly created _calloutBox.scss. This is where we'll put our styles for the calloutBox component.
                   <img class="docBlock-img" src="atomic-core/img/doc4.png" />
				</li>
				<li>Now back to our project in the browser. Click on the molecules link in the sidebar and you'll see our newly created component.
                    <img class="docBlock-img docBlock-img__big" src="atomic-core/img/doc5.png" />
				</li>
				<li>And that's about it!</li>
			</ol>
		</div>

	</div>
</div>

<?php include ("footer.php");?>