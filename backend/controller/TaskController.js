const space = require('../model/space');
const task = require('../model/task');

const TaskController = {
    // getAllTasksBySpaceID: async (req, res) => {
    //     try {
    //         const tasks = await task.find({space: req.params.spaceID});
    //         return res.status(200).json({success: true, data: tasks });
    //     } catch (error) {
    //         console.log(error);
    //     }
    // },
    getATask: async (req, res) => {
        try {
            const tasks = await task.findById(req.params.taskID).populate('comments');
            return res.status(200).json({success: true, data: tasks });
        } catch (error) {
            console.log(error);
        }
    },
    addATask: async (req, res) => {
        try {
            const newTask = new task(req.body);
            const savedTask = await newTask.save();
            if (req.body.space) {
                await space.findById(req.body.space).updateOne({$push: {tasks: savedTask._id}});
                return res.status(200).json({
                    success: true,
                    task: savedTask,
                })
            }
        } catch (error) {
            console.log(error);
        }
    },
    updateATask: async (req, res) => {
        try {
            const taskID = req.params.taskID;
            const existedTask = await task.findById(taskID);
            if (existedTask) {
                const updatedTask = await task.findByIdAndUpdate(taskID, req.body);
                return res.status(200).json({
                    success: true,
                    message: "Update success",
                })
            }
            else {
                return res.status(403).json({
                    success: false,
                    message: "Update task fail",
                })
            }
        } catch (error) {
            console.log(error);
        }
    },
    deleteATask: async (req, res) => {
        try {
            const taskID = req.params.taskID;
            const existedTask = await task.findById(taskID);
            if (existedTask) {
                const deletedTask = await task.findByIdAndDelete(taskID);
                return res.status(200).json({
                    success: true,
                    message: "Delete success",
                })
            }
            else {
                return res.status(403).json({
                    success: false,
                    message: "Delete task fail",
                })
            }
        } catch (error) {
            console.log(error);
        }
    },
}

module.exports = TaskController;