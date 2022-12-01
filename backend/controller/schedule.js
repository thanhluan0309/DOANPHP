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
          content: content,
          date: date,
          ispublic: ispublic,
          user: req.UserExit,
          ListUserAccess: ListUserAccess,
        });
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
  async getAllschedule(req, res) {
    try {
      const schedulePublic = await Schedule.find({ ispublic: true });

      const schedulePrivate = await Schedule.find({ ispublic: false });
      return res.status(200).json({
        success: true,
        schedulepublic: schedulePublic,
        scheduleprivate: schedulePrivate,
      });
    } catch (error) {
      console.log(error);
    }
  }
  async getOnescheduleBY_id(req, res) {
    try {
      const schedulePublic = await Schedule.findOne({ _id: req.params.id });
      return res.status(200).json({
        success: true,
        schedulepublic: schedulePublic,
      });
    } catch (error) {
      console.log(error);
    }
  }
  async DeletedBY_id(req, res) {
    try {
      await Schedule.findOneAndDelete({
        _id: req.params.id,
      });
      return res.status(200).json({
        success: true,
        message: "Hoàn tất việc xóa",
      });
    } catch (error) {
      console.log(error);
    }
  }
  async UpdateBy_id(req, res) {
    try {
      const { title, date, ispublic, content, ListUserAccess } = req.body;
      const newSchedule = {
        title: title,
        content: content,
        date: date,
        ispublic: ispublic,
        user: req.UserExit,
        ListUserAccess: ListUserAccess,
      };
      const updateSchedule = await Schedule.findOneAndUpdate(
        {
          _id: req.params.id,
        },
        newSchedule,
        { new: true }
      );
      await updateSchedule.save();
      return res.status(200).json({
        success: true,
        message: "Cập nhật thành công",
        newschedule: updateSchedule,
      });
    } catch (error) {
      console.log(error);
    }
  }
}
module.exports = new scheduleController();
