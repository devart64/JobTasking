import React from 'react';


export default class ListeTache extends React.Component {

    constructor() {
        super(props);

        this.state = {
            entries: []
        };
    }

    componentDidMount() {
        fetch('http://127.0.0.1:8000/api/taches')
            .then(response => response.json())
            .then(entries => {
                this.setState({
                    entries
                });
            });
    }


    render() {
        return (
            <div className="row">
                <ul>
                { console.log(this.state.entries) }
                </ul>
            </div>
        )
    }
}
