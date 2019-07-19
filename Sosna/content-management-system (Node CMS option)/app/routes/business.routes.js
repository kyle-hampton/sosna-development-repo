// this is the routes file of the application
  // this directs traffic of the application
module.exports = (app) => {
  const businesses = require('../controllers/business.controller.js');

  // creates a new business
  app.post('/businesses', businesses.create);
  // retreives all businesses
  app.get('/businesses', businesses.findAll);
  // retreives a specific business with id
  app.get('/businesses/:businessId', businesses.findOne);
  //  updates a specific business with id
  app.put('/businesses/:businessId', businesses.update);
  //  deletes a specific business with id
  app.delete('/businesses/:businessId', businesses.delete);
}
