import ReactDOM from "react-dom";
import React from "react";

export default class Footer extends React.Component{
    render() {
        return (
            <p>JobTasking 2021 - tous droits réservés</p>
        );
    }
}

ReactDOM.render(<Footer />, document.getElementById('footer_home_page'));