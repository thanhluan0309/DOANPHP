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
        return res.status(400).json({
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
  async getAlluser(req, res) {
    try {
      const response = await User.find();
      return res.status(200).json({ success: true, alluser: response});
    } catch (error) {
      console.log(error);
    }
  }
  async getUser(req, res) {
    try {
      const response = await User.findOne({ username: req.params.username });
      response.length != 0 ?
        res.status(200).json({ success: true, alluser: response })
        :
        res.status(404).send("Not found")
    } catch (error) {
      res.status(502).json("Bad Gateway")
    }
  }
  async changePassword(req, res) {
    try {
      const { username, password, newpassword } = req.body;
      const response = await User.findOne({ username: username });
      if (response) {
        const res_find = await User.findOne({ username: username, password: password })
        res_find?
          User.updateOne({username:res_find.username},({$set:{password:newpassword}}), function (err, resuilt) {
            if (err)
            {
              res.status(501).json({ resuilt: false, message: "Not Implemented, have an error when update query." });
            }
            else
            {
              res.status(200).json({ resuilt: false, message: "Update success" });
            }
          })
          :
          res.status(500).json({ resuilt: false, message: "Password not true" })
      }
      else {
        res.status(501).json({ resuilt: false, message: "Not Implemented" });
      }
    }
    catch (error) {
      console.log(error)
      res.status(502).json({ resuilt: false, message: "Bad Gateway" })
    }
  }
}
module.exports = new userController();
