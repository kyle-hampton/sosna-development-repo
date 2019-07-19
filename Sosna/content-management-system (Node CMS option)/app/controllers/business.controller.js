// imports business model
const Business = require('../models/business.model.js');

// Create and saves a new business
exports.create = (req, res) => {
  // Validates request
  if(!req.body.address){ //this line checks to see if there is a request body
    return res.status(400).send({ //if the validation comes back falses it will send a 400 message
      message: "this business must have an address" // error message
    });
  }
  // creates new business
  const newBusiness = new Business({ // creates a new business class and assigns it to businesss
    name: req.body.name || "Untitled business",
    address: req.body.address
  });

  newBusiness.save()
  .then(data => { //passes the the data variable into the function
    res.send(data);
  }).catch(err => {
    res.status(500).send({
      message: err.message || "something went wrong while creating the business"
    });
  });
};

// Retreives and returns all businesses from the data
exports.findAll = (req, res) => {
    Business.find()
    .then(business => {
      res.send(business);
    }).catch(err => {
      res.status(500).send({
        message: err.message || "Something went wrong when retreiving the business"
      });
    });

};

// finds a specific business with :businessId
exports.findOne = (req, res) => {
  Business.findById(req.params.businessId)
  .then(business => {
    if(!business) {
        return res.status(404).send({
          message: "business not found with id " + req.params.businessId
        });
    }
    res.send(business);
  }).catch(err => {
    if(err.kind === 'ObjectsId') {
      return res.status(404).send({
        message: "business not found with id " + req.params.businessId
      });
    }
    return res.status(500).send({
      message: "Error with retrieving business with id " + req.params.businessId
    });
  });
};

// update business with corrorsponding id
exports.update = (req, res) => {
  // validates requests
  if(!req.body.address) {
    return res.status(400).send({
      message: "business adress can not be empty"
    });
  }
  // find business and update it with the request body
  Business.findByIdAndUpdate(req.params.businessId, {
    name: req.body.name || "Untitled Business",
    adress: req.body.address
  }, {name: true})
  .then(business => { // stopping point 1-28-19
    if(!business) {
      return res.status(404).send({
        message: "business not found with id " + req.params.businessId
      });
    }
    res.send(business)
  }).catch(err => {
    if(err.kind === 'ObjectId') {
      return res.status(404).send({
        message: "business not found with id " + req.params.businessId
      });
    }
    return res.status(500).send({
      message: "Error updating business with id " + req.params.businessId
    });
  });
};

//deletes business with corrisponding id
exports.delete = (req, res) => {
  Business.findByIdAndRemove(req.params.businessId)
    .then(business => {
      if(!business) {
        return res.status(404).send({
          message: "bussiness not found with id " + req.params.businessId
        });
      }
      res.send({ message: 'business deletes Successfully'})
    }).catch(err => {
      if(err.kind === 'Object.id' || err.name === 'Notfound') {
        return res.status(404).send({
          message: "business not with id " + req.params.business
        });
      }
      return res.status(500).send({
        message: "Could not delete business with id " + req.params.businessId
      });
    });
};
