const jwt = require("jsonwebtoken");
require("dotenv").config();
const verifyToken = (req, res, next) => {
  const authHeader = req.header("Authorization");
  const token = authHeader && authHeader.split(" ")[1];
  if (!token) {
    return res.status(402).json({ success: false, message: "token not found" });
  }
  try {
    console.log("get token", token, process.env.Token);
    const decoded = jwt.verify(token, process.env.Token);
    console.log("id", decoded);
    req.UserExit = decoded.userExist;
    console.log("req.UserExit", req.UserExit);
    next();
  } catch (Err) {
    console.log(Err);
    return res.status(403).json({ success: false, message: "Invalid token" });
  }
};
module.exports = verifyToken;
