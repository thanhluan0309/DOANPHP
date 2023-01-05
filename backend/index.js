const express = require("express");
const app = express();
const dotenv = require("dotenv");
const mongoose = require("mongoose");
const cores = require("cors");
const routes = require("./router/routes")
dotenv.config();
app.use(cores());
const routerUser = require("./router/user");
const routerSchedule = require("./router/schedule");

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
//ROUTES
app.use("/user", routerUser);
app.use("/api", routes);
app.use("/schedule", routerSchedule);
app.listen(process.env.PORT, () => {
  console.log("Sever is running at port :", process.env.PORT);
});