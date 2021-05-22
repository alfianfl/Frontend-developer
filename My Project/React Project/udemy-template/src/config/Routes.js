import React from 'react'
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import Home from '../pages/Home'
import Checkout from '../pages/Checkout'
import Teaching from '../pages/Teaching'
import Navbar from '../component/Navbar'
import Footer from '../component/Footer'
import {useState} from 'react'


function Routes() {
    const [test,setTest] = useState('testbro')
    const [mahasiswa,setMahasiswa] = useState('POP')
    return (
        <div>
            <Router>
                <Navbar/>
                <Switch>
                    <Route path="/" exact component={Home}></Route>
                    <Route path="/checkout" component={() => <Checkout
                        test={test}
                        mahasiswa={mahasiswa}
                    />}></Route>
                    <Route path="/teaching" component={Teaching}></Route>
                </Switch>
                <Footer/>
            </Router>  
        </div>
    )
}

export default Routes
