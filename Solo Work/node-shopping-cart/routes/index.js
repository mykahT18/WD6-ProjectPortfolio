var express = require('express');
var router = express.Router();
var Cart = require('../models/cart');

var Grocery = require('../models/groceries');

/* GET home page. */
router.get('/', function(req, res, next) {

  Grocery.find(function(err, docs){
		// console.log(groceries.price);
  	res.render('shop/index', { products: docs });
  });	
  
});
router.get('/addCart/:id', function(req, res, next){
	var groceryId = req.params.id;
	var cart = new Cart(req.session.cart ? req.session.cart : {})

	Grocery.findById(groceryId, function(err, product){
		if(err){
			return res.redirect('/');
		}
		cart.add(product, product.id);
		req.session.cart = cart;
		console.log(req.session.cart);
		res.redirect('/');
	});
	// res.render('shop/cart');
});
router.get('/addFav/:id', function(req, res, next){
	res.render('error');
})

module.exports = router;
