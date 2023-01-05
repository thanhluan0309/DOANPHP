const commentController = require('../controller/CommentController');
const verifyToken = require('../midleware/user');

const router = require('express').Router();

router.post('/', verifyToken, commentController.postAComment).put('/:commentID', commentController.updateAComment).delete('/:commentID', commentController.deleteAComment)

module.exports = router;
