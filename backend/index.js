const express = require("express");
const app = express();
const dotenv = require("dotenv");
const mongoose = require("mongoose");
dotenv.config();

const routerUser = require("./router/user");
const connect = async () => {
  try {
    await mongoose.connect(process.env.url);
    console.log("Database connect success");
  } catch (error) {
    console.log(error);
  }
};
app.use(express.json());
connect();
app.get("/", (req, res) => {
  res.send("hello am backend PHP");
});
app.use("/user", routerUser);
app.listen(process.env.PORT, () => {
  console.log("Sever is running at port :", process.env.PORT);
});
