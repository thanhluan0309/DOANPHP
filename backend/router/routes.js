const express = require('express');
const spaceRoute = require('./space');
const taskRoute = require('./task');
const commentRoute = require('./comment');

const app = express();

app.use('/space', spaceRoute);
app.use('/task', taskRoute);
app.use('/comment', commentRoute);

module.exports = app;