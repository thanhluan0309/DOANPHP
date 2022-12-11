const comment = require('../model/comment');
const space = require('../model/space');

const CommentController = {
    postAComment: async (req, res) => {
        try {
            const newComment = new comment({content: req.body.content, cmtBy: req.userExist, space: req.body.space});
            const savedComment = await newComment.save();
            if (req.body.space) {
                await space.findById(req.body.space).updateOne({$push: {comments: savedComment._id}});
                return res.status(200).json({
                    success: true,
                    space: savedComment,
                })
            } else {
                return res.status(403).json({
                    success: true,
                    message: "Post comment fail"
                })
            }
        } catch (error) {
            console.log(error);
        }
    },
    updateAComment: async (req, res) => {
        try {
            const commentID = req.params.commentID;
            const existedComment = await comment.findById(commentID);
            if (existedComment) {
                const updatedTask = await comment.findByIdAndUpdate(commentID, req.body);
                return res.status(200).json({
                    success: true,
                    message: "Update comment success",
                })
            }
            else {
                return res.status(403).json({
                    success: false,
                    message: "Update comment fail",
                })
            }
        } catch (error) {
            console.log(error);
        }
    },
    deleteAComment: async (req, res) => {
        try {
            const commentID = req.params.commentID;
            const existedComment = await comment.findById(commentID);
            if (existedComment) {
                const deletedComment = await comment.findByIdAndDelete(commentID);
                return res.status(200).json({
                    success: true,
                    message: "Delete success",
                })
            }
            else {
                return res.status(403).json({
                    success: false,
                    message: "Delete comment fail",
                })
            }
        } catch (error) {
            console.log(error);
        }
    },
}

module.exports = CommentController;