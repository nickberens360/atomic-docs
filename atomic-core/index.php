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
				<li>In the lower left hand corner, open the "Manage Categories" form. I'll call this one "modules".
					<img class="docBlock-img" src="atomic-core/img/doc1.png" />
				</li>
				<li>Click on the newly created modules link in the sidebar to go to the modules page. In the form below the modules let's create a new component called "calloutBox".
					<img class="docBlock-img" src="atomic-core/img/doc2.png" />
				</li>
				<li>So let's create the HTML for the calloutBox component. In the the project directory you'll notice a folder named "compontents". Open that and you'll find the folder modules. This is the directory that all of the HTML component files you create under the modules category. I'll open the file "calloutBox.php" and and put my HTML code there.
                    <img class="docBlock-img" src="atomic-core/img/doc3.png" />
				</li>
			</ol>
		</div>

	</div>
</div>

<?php include ("footer.php");?>