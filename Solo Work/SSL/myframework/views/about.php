<div class="container" style="margin-top:15rem; margin-left: 2rem;">
	<div class="start-template">
		<h1>Bootstrap</h1>
		<p><a href="/about/showAddform">Add New</a></p>
	</div>
	<?
	foreach ($data as $fruit) {
		echo $fruit["name"]."<a href='/about/showEdit/".$fruit["id"]."'> EDIT</a> ";
		echo "<a href='/about/delete/".$fruit["id"]."'>Delete</a><br>";
	}
	?>
</div>