var connection = require('../connection');

const validator = require('validator');
const Product = require('../models/Product');
const e = require('express');


module.exports.addProduct_get = async function(req, res){

};

module.exports.addProduct_post = async function(req, res){
    const { id_user, nama_barang, harga_barang, foto, qty} = req.body;
    console.log(id_user, nama_barang, harga_barang, foto, qty)
    try{
        const product = await Product.create( { id_user, nama_barang, harga_barang, foto, qty} )
        res.status(201).json({barang: product.id_barang});
    }catch(err){
        if (err.name === 'SequelizeValidationError') {
            return res.status(400).json({
            success: false,
            msg: err.errors.map(e => e.message)
            });
        }
    }
};

module.exports.editProduct_get = (req, res)=>{

};

module.exports.editProduct_post = (req, res)=>{

};

module.exports.deleteProduct_post = (req, res)=>{

};