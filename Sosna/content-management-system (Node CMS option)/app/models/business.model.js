const mongoose = require('mongoose');

const businessSchema = mongoose.Schema({
  name: String,
  address: String

  }, {

  timestamp: true

});

module.exports = mongoose.model('business', businessSchema);
