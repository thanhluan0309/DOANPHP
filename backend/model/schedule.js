const mongoose = require("mongoose");
const scheduleSchema = new mongoose.Schema({
  title: {
    type: String,
  },
  content: {
    type: String,
  },
  date : {
    type:String,
  },
  ispublic: {
    type: Boolean,
  },
  ListUserAccess: [],
  user: {
    type: mongoose.Schema.Types.ObjectId,
    ref: "users",
  },
});
module.exports = mongoose.model("schedule", scheduleSchema);
