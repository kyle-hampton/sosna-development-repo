// allows the use of constant and let
'use strict';
// imports express module
const express = require('express');
// imports body parser
const bodyParser = require('body-parser');
// imports mongoose
const mongoose = require('mongoose');
// imports mongo-uri into the project
  //mongodb-uri is a way to property format our uri's
const uriUtil = require('mongodb-uri');

// assigns app to express function
const app = express();

// parses requests of content-type - application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: true }));

// parse requests of content-type - application/json
app.use(bodyParser.json());

// configuring database
// const dbConfig = require('./config/database.config.js');

mongoose.Promise = global.Promise

//connects to the mlab database -> uri link
const mongodbUri = 'mongodb://kyle:nnnkk1822@ds011785.mlab.com:11785/sosna-sample-db'

// this formats the mlab uri into something that mongodb can actually use
  // uriUtil(mongo-uri) is formating the mlab Uri
const mongooseUri = uriUtil.formatMongoose(mongodbUri);

// this is the default options that the mlab/mongoose is expecting if there arent any
const dbOptions = {};

// <--------------- Base Server functionality --------------->
const hostname = 'localhost';
const port = 3001;

// change server.listen to app.listen -> because we are using express
app.listen(port, hostname, () => {
   // this mongoose.connect is connecting to mlab and the server
  mongoose.connect(mongooseUri, dbOptions, (err) => {
    if (err){
      console.log(err);
    }
    console.log(`server is running at http://${hostname}:${port}`);
  })
});

// simple route (example of route)
// app.get('/', (req, res) =>{
//   res.json({"message" : 'welcome to the app'})
// })

// imports routes
require('./app/routes/business.routes.js')(app);

// // port number
// app.listen(3000, () => {
//   console.log("server is listening on port 3000")
// })
