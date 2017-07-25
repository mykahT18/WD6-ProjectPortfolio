var express = require('express');
var router = express.Router();
var Grocery = require('../models/groceries');
var csrf = require('csurf');
var passport = require('passport');

var csrfProtection = csrf();
// All routes should be protected
router.use(csrfProtection);
/* GET home page. */
router.get('/', function(req, res, next) {

  Grocery.find(function(err, docs){
		// console.log(groceries.price);
  	res.render('shop/index', { products: docs });
  });	
  
});
router.get('/addCart/:id', function(req, res, next){
	res.render('error');
})
router.get('/addFav/:id', function(req, res, next){
	res.render('error');
})
router.get('/user/signup', function(req, res, next){
	res.render('user/signup', { csrfToken: req.csrfToken() });
})
router.post('/user/signup', passport.authenticate('local.signup', {
	successRedirect: '/user/profile',
	failureRedirect: '/user/signup',
	failureFlash: true
}));
router.get('/user/profile', function(req, res, next){
	res.render('user/profile');
})


module.exports = router;
