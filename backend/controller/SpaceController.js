const space = require('../model/space');

const SpaceController = {
    getAllSpace: async (req, res) => {
        try {
            const spaces = await space.find({$or: [{private: false}, {members: req.userExist}]}).populate('createdBy members tasks');
            return res.status(200).json({success: true, data: spaces });
        } catch (error) {
            console.log(error);
        }    
    },
    getOneSpace: async (req, res) => {
        try {
            const spaceID = req.params.spaceID;
            const existSpace = await space.findOne({spaceID: spaceID}).populate('createdBy members tasks');
            if (existSpace) {
                return res.status(200).json({
                    success: true,
                    space: existSpace
                })
            } else {
                return res.status(403).json({
                    success: false,
                    message: "Space not found"
                })
            }
        } catch (error) {
            console.log(error);
        }
    },
    createSpace: async (req, res) => {
        try {
            let spaceID = req.body.spaceID;
            let spaceName = req.body.spaceName;
            let title = req.body.title;
            let private = req.body.private;
            let members = req.body.members;
            let createdBy = req.userExist;
            const existSpaceID = await space.findOne({spaceID: spaceID});
            if (!existSpaceID) {
                let spaceObj = {
                    spaceID: spaceID,
                    spaceName: spaceName,
                    title: title,
                    private: private,
                    createdBy: createdBy,
                    members: members
                }
                const newSpace = await space.create(spaceObj);
                return res.status(200).json({
                    success: true,
                    space: newSpace
                })
            } else {
                return res.status(403).json({
                    success: false,
                    message: "This Space ID has already existed"
                })
            }
        } catch (error) {
            console.log(error);
        }
    },
    updateSpace: async (req, res) => {
        try {
            const spaceID = req.params.spaceID;
            const existSpace = await space.findOne({spaceID: spaceID});
            if (existSpace) {
                const checkSpaceID = await space.findOne({spaceID: req.body.spaceID});
                if (req.body.spaceID == spaceID || !checkSpaceID) {
                    const editedSpace = await space.findOneAndUpdate({spaceID: spaceID}, req.body);
                    return res.status(200).json({
                        success: true,
                        message: "Update space success"
                    })
                } else {
                    return res.status(400).json({
                        success: false,
                        message: "Space ID has been existed"
                    })
                }           
            } else {
                return res.status(403).json({
                    success: false,
                    message: "Space not found"
                })
            }
        } catch (error) {
            console.log(error);
        }
    },
    deleteSpace: async (req, res) => {
        try {
            const spaceID = req.params.spaceID;
            const existSpace = await space.findOne({spaceID: spaceID});
            if (existSpace) {
                const deletedSpace = await space.findOneAndDelete({spaceID: spaceID});
                return res.status(200).json({
                    success: true,
                    message: "Delete space success"
                })
            } else {
                return res.status(403).json({
                    success: false,
                    message: "Delete fail"
                })
            }
        } catch (error) {
            console.log(error);
        }
    }
}

module.exports = SpaceController;