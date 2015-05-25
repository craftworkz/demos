var express = require('express');
var appEnv = require('cfenv').getAppEnv();
var exphbs = require('express-handlebars');
var app = express();

app.engine('handlebars', exphbs({defaultLayout: 'main'}));
app.set('view engine', 'handlebars');

app.get('/', function(req, res) {
	
	res.render('home', {name: 'World'});
});

var server = app.listen(appEnv.port, appEnv.bind, function() {
	  console.dir( server.address());
});