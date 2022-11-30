const schedule = require("../controller/schedule");

const router = require("express").Router();
const verifyToken = require("../midleware/user");
router.post("/", verifyToken, schedule.addSchedule);
router.get("/", schedule.getAllschedule);
module.exports = router;
