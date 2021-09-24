// on importe la navbar
import React from "react";
import ReactDOM from "react-dom";

require("./navigation/navBar");
// on importe le footer
require("./footer/footer");

export default class EntryPoint extends React.Component{
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div id="row">
                <h1>Welcome to JobTasking !</h1>
            </div>
        );
    }
}

ReactDOM.render(<EntryPoint />, document.getElementById('root'));