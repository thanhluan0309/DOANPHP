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
            process.env.thanhcong
          );
          return res.status(200).json({
            success: true,
            newuser: newuser,
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
        return res.status(400).json({ success: false });
      } else {
        const userlogin = await User.findOne({
          username: username,
          password: password,
        });
        return res.status(200).json({ success: true, userLogin: userlogin });
      }
    } catch (error) {
      console.log(error);
    }
  }
}
module.exports = new userController();
