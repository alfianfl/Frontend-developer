const Sequelize = require ('sequelize');
const connection = require('../connection');
const validator = require('validator');
const User = require('./User');
const OrderList = require('./OrderList');




const Product = connection.define('product', {
    id_barang: {
        type: Sequelize.INTEGER,
        allowNull: false,
        autoIncrement: true,
        primaryKey: true
    },
    id_toko: {
        type: Sequelize.INTEGER,
        allowNull: false
    },
    nama_barang: {
        type: Sequelize.STRING,
        allowNull: false,
        validate:{
            notEmpty:{
                args:true,
                msg:"Nama barang tidak boleh kosong!"
            },
            notNull:{
                args: true,
                msg:"Nama barang tidak boleh kosong"
            },
        }
    },
    harga_barang:{
        type: Sequelize.INTEGER,
        allowNull: false,
        validate:{
            notEmpty:{
                args:true,
                msg:"Harga barang tidak boleh kosong!"
            },
            notNull:{
                args: true,
                msg:"Harga barang tidak boleh kosong"
            },
        }
    },
    foto:{
        type: Sequelize.STRING,
        allowNull: false,
        validate:{
            notEmpty:{
                args:true,
                msg:"Harap masukkan foto barang!"
            },
            notNull:{
                args: true,
                msg:"Harap masukkan foto barang!"
            },
        }
    },
    qty:{
        type: Sequelize.INTEGER,
        allowNull: false,
        validate:{
            notEmpty:{
                args:true,
                msg:"Harap masukkan jumlah barang yang tersedia"
            },
            notNull:{
                args: true,
                msg:"Harap masukkan jumlah barang yang tersedia"
            },
        }
    },
    deskripsi:{
        type: Sequelize.STRING,
        allowNull: false,
        validate:{
            notEmpty:{
                args:true,
                msg:"Harap masukkan deskripsi barang"
            },
            notNull:{
                args: true,
                msg:"Harap masukkan deskripsi barang"
            },
        }
    }
});

// Product.associate = function(models){
//     Product.hasMany(models.OrderList, {
//         as: 'OrderList'
//     });
// };


module.exports = Product;