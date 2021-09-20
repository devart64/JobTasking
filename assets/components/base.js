import React from 'react';
import ReactDOM from 'react-dom';

import ListeTache from './listeTache/listeTache';
class Base extends React.Component {
    render() {
        return (
            <div>
                <p>React js fonction mec !</p>
                <ListeTache />
            </div>
        )
    }
}
ReactDOM.render(<Base/>, document.getElementById('test'));