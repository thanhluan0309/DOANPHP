const Schedule = require("../model/schedule");

class scheduleController {
  async addSchedule(req, res) {
    try {
      const { title, date, ispublic, content, ListUserAccess } = req.body;
      if (!title) {
        return res
          .status(500)
          .json({ success: false, message: "Tiêu đề không được bỏ trống !!" });
      } else if (!content) {
        return res
          .status(500)
          .json({ success: false, message: "Nội dung không được bỏ trống !!" });
      } else {
        const newSchedule = Schedule({
          title: title,
          date: date,
          content: content,
          ispublic: ispublic,
          user: req.UserExit,
          ListUserAccess: ListUserAccess,
        });
        console.log("user ", req.UserExit);
        await newSchedule.save();
        return res.status(200).json({
          success: true,
          message: "Thêm lịch thành công",
          newschedule: newSchedule,
        });
      }
    } catch (error) {
      console.log(error);
    }
  }
}
module.exports = new scheduleController();
