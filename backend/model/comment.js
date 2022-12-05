const mongoose = require('mongoose');

const Schema = mongoose.Schema;

const commentSchema = new Schema({
    content: {
        type: String,
        required: true,
    },
    cmtBy: {
        type: Schema.Types.ObjectId,
        ref: "Users"
    },
    task: {
        type: Schema.Types.ObjectId,
        ref: "Task"
    }
}, {timestamps: true});

module.exports = mongoose.model('Comment', commentSchema);
