import ReactDOM from "react-dom";
import React from "react";

export default class Footer extends React.Component{
    render() {
        return (
            <p>© 2021 JobPhoning.com, toute reproduction interdite.</p>
        );
    }
}

ReactDOM.render(<Footer />, document.getElementById('footer_home_page'));