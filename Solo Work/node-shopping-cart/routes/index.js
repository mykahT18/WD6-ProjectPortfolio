var express = require('express');
var router = express.Router();

var Grocery = require('../models/groceries');

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

module.exports = router;
