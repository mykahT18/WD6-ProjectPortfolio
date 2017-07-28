var express = require('express');
var router = express.Router();
var csrf = require('csurf');
var passport = require('passport');

// Importing Model
var Cart = require('../models/cart');
var Order = require('../models/order');
var Grocery = require('../models/groceries');
// All routes should be protected
var csrfProtection = csrf();
router.use(csrfProtection);

// Get Profile page
router.get('/profile', isLoggedIn, function(req, res, next){
	
	var favorite = req.user.favorites;
	var fav = [];

	favorite.forEach(function(f){
		Grocery.findById(f, function(err, favorites){
			if(err){
				return res.redirect('/');
			}
			fav.push(favorites);
		});
	});
	Order.find({user: req.user}, function(err, orders){
		if(err){
			return res.write("Error!");
		}
		var cart;
		orders.forEach(function(order){
			cart = new Cart(order.cart);
			order.items = cart.generateArray();
		});
		// console.log(fav[0]);
		console.log(orders);
		res.render('user/profile', { orders: orders, favorites: fav });
	});
});
// Get Logout Route
router.get('/logout', function(req, res, next){
	req.logout();
	res.redirect('/');
})

router.use('/', notLoggedIn, function(req, res, next){
	next();
});
// Get signup page
router.get('/signup', function(req, res, next){
	var messages = req.flash('error');
	res.render('user/signup', { csrfToken: req.csrfToken(), messages: messages, hasErrors:messages.length > 0 });
})
// Post to signup page---- Registering a new user
router.post('/signup', passport.authenticate('local.signup', {
	failureRedirect: '/user/signup',
	failureFlash: true
}), function(req, res, next){
	if(req.session.oldUrl){
		var oldUrl = req.session.oldUrl;
		req.session.oldUrl = null;
		res.redirect(oldUrl);
	}else{
		res.redirect('/user/profile');
	}
});
// Get signin page
router.get('/signin', function(req, res, next){
	var messages = req.flash('error');
	res.render('user/signin', { csrfToken: req.csrfToken(), messages: messages, hasErrors: messages.length > 0 });
});
// Checking database if user is in database - then login
router.post('/signin', passport.authenticate('local.signin', {
	failureRedirect: '/user/signin',
	failureFlash: true
}), function(req, res, next){
	if(req.session.oldUrl){
		var oldUrl = req.session.oldUrl;
		req.session.oldUrl = null;
		res.redirect(oldUrl);
	}else{
		res.redirect('/user/profile');
	}
});

module.exports = router;

function isLoggedIn(req, res, next){
	if (req.isAuthenticated()){
		return next();
	}
	res.redirect('/');
}

function notLoggedIn(req, res, next){
	if (!req.isAuthenticated()){
		return next();
	}
	res.redirect('/');
}