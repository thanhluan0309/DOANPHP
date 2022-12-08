const mongoose = require('mongoose');

const Schema = mongoose.Schema;

const spaceSchema = new Schema({
    spaceID: {
        type: String,
        required: true,
    },
    spaceName: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: false
    },
    private: {
        type: Boolean,
        required: true,
        default: 0
    },
    createdBy: {
        type: Schema.Types.ObjectId,
        ref: "Users"
    },
    tasks: [
        {
            type: Schema.Types.ObjectId,
            ref: "Task"
        }
    ],
    members: [
        {
            type: Schema.Types.ObjectId,
            ref: "Users"
        }
    ],
    comments: [
        {type: Schema.Types.ObjectId, ref: "Comment"}
    ]
}, {timestamps: true});

module.exports = mongoose.model('Space', spaceSchema);
