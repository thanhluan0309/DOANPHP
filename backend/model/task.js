const mongoose = require('mongoose');

const Schema = mongoose.Schema;

const taskSchema = new Schema({
    taskName: {
        type: String,
        required: true,
    },
    title: {
        type: String,
    },
    description: {
        type: String,
    },
    success: {
        type: Boolean
    },
    space: {type: Schema.Types.ObjectId, ref: "Space"},
    comments: [
        {type: Schema.Types.ObjectId, ref: "Comment"}
    ]
}, {timestamps: true});

module.exports = mongoose.model('Task', taskSchema);
