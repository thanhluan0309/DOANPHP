const schedule = require("../controller/schedule");

const router = require("express").Router();
const verifyToken = require("../midleware/user");
router.post("/", verifyToken, schedule.addSchedule);
router.get("/", schedule.getAllschedule);
router.get("/:id", schedule.getOnescheduleBY_id);
router.delete("/:id", schedule.DeletedBY_id);
router.put("/:id", schedule.UpdateBy_id);

module.exports = router;
