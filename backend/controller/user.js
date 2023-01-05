const User = require("../model/user");
const jwt = require("jsonwebtoken");
const dotenv = require("dotenv");
dotenv.config();
class userController {
  async userRegister(req, res) {
    try {
      const { username, password } = req.body;
      if ((username, password)) {
        const userExist = await User.findOne({ username: username });
        if (!userExist) {
          const newuser = User({
            username: username,
            password: password,
          });
          await newuser.save();
          const accesstoken = jwt.sign(
            { userExist: newuser._id },
            process.env.Token
          );
          return res.status(200).json({
            success: true,
            newuser: newuser,
            message: "create acoout success",
            accesstoken: accesstoken,
          });
        } else {
          return res
            .status(500)
            .json({ success: false, message: "user name has been Exist" });
        }
      }
      return res
        .status(400)
        .json({ success: false, message: "User name password need required" });
    } catch (error) {
      return console.log(error);
    }
  }
  async userLogin(req, res) {
    try {
      const { username, password } = req.body;
      if ((!username, !password)) {
        return res
          .status(400)
          .json({
            success: false,
            message: "Username and Password need required",
          });
      } else {
        const userlogin = await User.findOne({
          username: username,
          password: password,
        });
        if (!userlogin) {
          return res.status(500).json({
            success: false,
            message: "Username or Password not true",
          });
        }
        const accesstoken = jwt.sign(
          { userExist: userlogin._id },
          process.env.Token
        );
        return res.status(200).json({
          success: true,
          userLogin: userlogin,
          message: "login account success",
          accesstoken: accesstoken,
        });
      }
    } catch (error) {
      console.log(error);
    }
  }
  async getAllUser(req, res) {
    try {
      const spaces = await User.find({'_id': {$ne : req.userExist}});
        return res.status(200).json({success: true, data: spaces });
    } catch (error) {
      console.log(error);
    }
  }
}
module.exports = new userController();
