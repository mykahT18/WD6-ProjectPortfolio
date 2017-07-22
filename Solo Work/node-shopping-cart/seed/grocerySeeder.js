var Grocery = require('../models/groceries');

var mongoose = require('mongoose');
mongoose.connect('localhost:27017/shopping');

var groceries = [
	new Grocery({
		imagePath: '/images/breads.png',
		title: 'Honey Bread',
		description: 'This bread is great!!!',
		price: 5
	}),
	new Grocery({
		imagePath: '/images/milk-rusk.jpg',
		title: 'Britannia Milk Rusk ',
		description: 'A classic tea time snack made of wheat flour that is similar to a hard biscuit. They are slightly sweet and crunchy. Milk rusk has milk added to the dough to make them more creamy and flavorful. Great when dipped in hot tea',
		price: 3
	}),
	new Grocery({
		imagePath: '/images/juice.jpg',
		title: '5 DAY JUS ’TIL DINNER',
		description: 'This bundle includes 20 drinks - 4 smoothies per day for 5 days.',
		price: 20
	}),
	new Grocery({
		imagePath: '/images/chips.jpg',
		title: 'Frito-Lay VP Multipack Fiery Mix 20CT',
		description: 'Frito-Lay VP Multipack Fiery Mix 20CT Frito-Lay Fiery Mix 19.625 Ounce 20 Count Bag Pack',
		price: 6
	}),
	new Grocery({
		imagePath: '/images/slim-fast.jpeg',
		title: 'SlimFast Baked Chips Snack Mesquite BBQ',
		description: 'Clinically Proven* to Lose Weight Fast!Drink it off, blend it off, snack it offHow you lose weight and keep it off is up to you! Whatever your day throws at you and no matter how hectic life gets, the SlimFast lineup of products offers enough variety and simplicity to make losing weight easy.',
		price: 5
	}),
	new Grocery({
		imagePath: '/images/coffee.jpeg',
		title: 'Folgers Classic Roast Medium Ground Coffee',
		description: "Made from mountain-grown beans, Folgers Classic Roast Medium Ground Coffee is the world's richest and most aromatic. Folgers Classic Roast Medium Ground Coffee has been 'the best part of wakin' up for more than 150 years.",
		price: 8
	}),
];

var done = 0;
for (var i = 0; i < groceries.length; i++) {
	groceries[i].save(function (err, result) {
		done++;
		if(done === groceries.length){
			exit();
		}
	});
}

function exit(){
	mongoose.disconnect();
}





