import React from 'react';
import ReactDOM from 'react-dom';

/*import Items from './Components/Items';*/


export default class App extends React.Component {
    /*constructor() {
        super();

        this.state = {
            entries: []
        };
    }*/

    /*componentDidMount() {
        fetch('https://jsonplaceholder.typicode.com/posts/')
            .then(response => response.json())
            .then(entries => {
                this.setState({
                    entries
                });
            });
    }*/

    render() {
        return (
            <div className="row">
                <h3>React fonctionne !!</h3>
            </div>
        );
    }
}

ReactDOM.render(<App />, document.getElementById('root'));