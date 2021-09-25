// on importe la navbar
import React from "react";
import ReactDOM from "react-dom";

import imageCleaner from "../images/workerCartoon.png";

require("./navigation/navBar");
// on importe le footer
require("./footer/footer");

export default class EntryPoint extends React.Component{
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div id="row" className='imageHomebackground'>
                <img src={imageCleaner} alt='image home page' width='100%' height='100%'/>
                <h1 className='text-center'>Welcome to JobCleaning !</h1>
            </div>
        );
    }
}

ReactDOM.render(<EntryPoint />, document.getElementById('root'));