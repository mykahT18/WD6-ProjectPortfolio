var express = require('express');
var router = express.Router();

// Models being imported
var Cart = require('../models/cart');
var Grocery = require('../models/groceries');
var Order = require('../models/order');


/* GET home page. */
router.get('/', function(req, res, next) {
	var successMsg = req.flash('success')[0];
  Grocery.find(function(err, docs){
		// console.log(groceries.price);
  	res.render('shop/index', { products: docs, successMsg: successMsg, noMessage: !successMsg });
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

router.get('/reduce/:id', function(req, res, next){
	var groceryId = req.params.id;
	var cart = new Cart(req.session.cart ? req.session.cart : {})

	cart.reduceByOne(groceryId);
	req.session.cart = cart;
	res.redirect('/cart');
});

router.get('/remove/:id', function(req, res, next){
	var groceryId = req.params.id;
	var cart = new Cart(req.session.cart ? req.session.cart : {})

	cart.removeItem(groceryId);
	req.session.cart = cart;
	res.redirect('/cart');
});

router.get('/addFav/:id', function(req, res, next){
	res.render('error');
});

router.get('/cart', function(req, res, next){
	if(!req.session.cart){
		return res.render('shop/cart', {products: null});
	}
	var cart = new Cart(req.session.cart);
	res.render('shop/cart', {products: cart.generateArray(), totalPrice: cart.totalPrice});
});

router.get('/checkout', isLoggedIn ,function(req, res, next){
	if(!req.session.cart){
		return res.redirect('shop/cart');
	}
	var cart = new Cart(req.session.cart);
	var errMsg = req.flash('error')[0];
	res.render('shop/checkout', {total: cart.totalPrice, errMsg: errMsg,  noErrors: !errMsg});
});

router.post('/checkout', isLoggedIn ,function(req, res, next){
	if(!req.session.cart){

		return res.render('shop/cart', {products: null});
	}
	var cart = new Cart(req.session.cart);
	var stripe = require("stripe")(

  	"sk_test_TIABTJ4ubLIU8wZq8LuOLYqr"

	);
	stripe.charges.create({
	  amount: cart.totalPrice * 100,
	  currency: "usd",
	  source: req.body.stripeToken, // obtained with Stripe.js
	  description: "My First Charge Mykah Taylor"
	}, function(err, charge) {
	  // asynchronously called
	  if(err){
	  	req.flash('error', err.message);
	  	return res.redirect('/checkout');
	  }
	  var order = new Order({
			user: req.user,
			cart: cart,
			address: req.body.address,
			name: req.body.name,
			paymentId: charge.id
	  })
	  order.save(function(err, result){
			req.flash('success', 'Successfully bought product');
	  	req.session.cart = null;
	  	res.redirect('/');
	  })
	});
})
module.exports = router;

function isLoggedIn(req, res, next){
	if (req.isAuthenticated()){
		return next();
	}
	req.session.oldUrl = req.url;
	res.redirect('/user/signin');
}
