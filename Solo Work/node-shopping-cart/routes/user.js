var express = require('express');
var router = express.Router();
var csrf = require('csurf');
var passport = require('passport');

// Importing Model
var Grocery = require('../models/groceries');

// All routes should be protected
var csrfProtection = csrf();
router.use(csrfProtection);

// Get Profile page
router.get('/profile', isLoggedIn, function(req, res, next){
	res.render('user/profile');
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
	successRedirect: '/user/profile',
	failureRedirect: '/user/signup',
	failureFlash: true
}));
// Get signin page
router.get('/signin', function(req, res, next){
	var messages = req.flash('error');
	res.render('user/signin', { csrfToken: req.csrfToken(), messages: messages, hasErrors: messages.length > 0 });
});
// Checking database if user is in database - then login
router.post('/signin', passport.authenticate('local.signin', {
	successRedirect: '/user/profile',
	failureRedirect: '/user/signin',
	failureFlash: true
}));

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