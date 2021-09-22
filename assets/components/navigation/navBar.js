import ReactDOM from "react-dom";
import React from "react";

export default class NavBar extends React.Component{


    render() {
        return (
            <nav className="navbar navbar-light bg-light justify-content-between" >
                <a className="navbar-brand" >JobTasking</a >
                <a className="nav-link" href="/admin" >
                    Admin
                </a >
            </nav >
        );
    }
}

ReactDOM.render(<NavBar />, document.getElementById('header_home_page'));