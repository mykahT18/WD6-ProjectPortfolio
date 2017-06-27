<div class="contanier" style="margin-top:15rem; margin-left: 2rem;">
	<div class="starter-template">
		<h1>Edit a fruit</h1>
		<form action="/about/edit/<?=$this->parent->urlPathParts[2]?>" method="POST">
			<input type="text" name="name" value="<?=$data[0]["name"]?>">
			<input type="submit" value="Add" class="btn btn-primary">
		</form>
	</div>
</div>