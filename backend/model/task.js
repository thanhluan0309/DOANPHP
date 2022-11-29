const mongoose = require('mongoose');

const Schema = mongoose.Schema;

const taskSchema = new Schema({
    taskName: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: false
    },
    description: {
        type: String,
    },
    space: {type: Schema.Types.ObjectId, ref: "Space"}
}, {timestamps: true});

module.exports = mongoose.model('Task', taskSchema);
