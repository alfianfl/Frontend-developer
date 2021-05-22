var connection = require("../connection");
const Artikel = require("../models/Artikel");

const getArtikel = async function (req, res, next) {
  try {
    const artikel = await Artikel.findAll({ raw: true });
    res.status(201).json(artikel);
    next();
  } catch (err) {
    res.status(400).json(err);
    next();
  }
};

module.exports = { getArtikel };
