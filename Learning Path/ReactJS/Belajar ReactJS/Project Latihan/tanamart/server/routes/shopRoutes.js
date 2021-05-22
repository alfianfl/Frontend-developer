const { Router } = require('express');

const shopController = require('../controllers/shopController');
const router = Router();

router.get('/addProduct', shopController.addProduct_get);
router.post('/addProduct', shopController.addProduct_post);
router.get('/editProduct', shopController.editProduct_get);
router.post('/editProduct', shopController.editProduct_post);
router.post('/deleteProduct', shopController.deleteProduct_post);

module.exports = router;