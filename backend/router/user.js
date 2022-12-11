const express = require("express");
const verify = require("../midleware/user");
const user = require("../controller/user");
const router = express.Router();

router.post("/", user.userRegister);
router.post("/login", user.userLogin);
router.get("/", user.getAlluser);
router.post("/changepassword", user.changePassword);
module.exports = router;
