const express = require('express');
const spaceRoute = require('./space');

const app = express();

app.use('/space', spaceRoute);

module.exports = app;