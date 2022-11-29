const express = require("express");
const app = express();
const dotenv = require("dotenv");
const mongoose = require("mongoose");
const routes = require('./router/routes');
dotenv.config();

const routerUser = require("./router/space");
const connect = async () => {
  try {
    await mongoose.connect(process.env.url);
    console.log("Database connect success");
  } catch (error) {
    console.log(error);
  }
};
app.use(express.json());
// ROUTES
app.use('/api/v1', routes);
connect();
app.listen(process.env.PORT, () => {
  console.log("Sever is running at port :", process.env.PORT);
});
