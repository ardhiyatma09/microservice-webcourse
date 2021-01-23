const jwt = require('jsonwebtoken');
const {JWT_SECRET} = process.env;

module.exports = async (req, res, next) => {
    const token = req.headers.authorization;
    try {
        const decoded = jwt.verify(token,JWT_SECRET);

        req.user = decoded;
        return next(); 
    } catch (error) {
        return res.status(403).json({
            status: 'error',
            message: error.message
        })
    }
}
