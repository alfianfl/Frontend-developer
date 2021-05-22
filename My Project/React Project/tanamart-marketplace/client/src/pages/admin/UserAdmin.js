import React from 'react'

function UserAdmin() {
    return (
        <div id="content">
            <div className="d-flex flex-column mr-5">
                {/* <button className="btn-buat-thread" style={{ width: "300px" }}>Buat Artikel Baru</button> */}

                <div className="cart-header">
                    <div className="row d-flex">
                        <div className="col-1">No</div>
                        <div className="col-8 text-left">Nama user</div>
                        <div className="col-2">Aksi</div>
                    </div>
                </div>

                <div className="cart-body mt-2">
                    <div className="row d-flex">
                        <div className="col-1">1</div>
                        <div className="col-8 text-left">User 1</div>
                        <div className="col-2">
                            <button className="btn-hapus">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default UserAdmin
