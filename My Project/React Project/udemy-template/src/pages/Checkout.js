import React, { Component } from 'react';
import '../assets/css/checkout.css'


class Checkout extends Component {
  render() {
    return (
      <>
        <div className="row">
          <div className="col-12">
            <div className="banner py-5 px-3">
              {this.props.test}
              {this.props.mahasiswa}
              <h3>Keranjang Belanja</h3>
            </div>
          </div>
        </div>
        <section className="px-3">
          <div className="row">
            <div className="col-8">
              <div className="detail-checkout">
                <p>1 Kursus dalam Keranjang</p>
                <div className="thumb-checkout px-2 py-2 ">
                  <div className="thumb-img">
                    <img src=""/>
                  </div>
                  <div className="nama-produk d-flex justify-content-between">
                    <div>
                      <h5>2021 Complete Python Bootcamp From Zero to Hero in Python</h5>
                      <span>Oleh Jose Portilla, Head of Data Science, Pierian Data Inc.</span>
                    </div>
                    <div>
                    <span>Hapus</span><br/>
                    <span>Simpan untuk nanti</span>
                  </div>
                  <div>
                    <span>Rp. 129000</span><br/>
                  </div>
                  </div>

                </div>
                <p>Disimpan untuk nanti <br/>
                  Belum ada kursus yang Anda simpan untuk nanti.
                </p>              
              </div>
            </div>
            <div className="col-5">

            </div>
          </div>
        </section>
      </>
    );
  }
}

export default Checkout;
