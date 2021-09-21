import React from 'react';


export default class ListeTache extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            urlListeTache: 'http://127.0.0.1:8000/api/taches',
            entries: []
        };
    }

    query = () => {
        fetch(this.state.urlListeTache)
            .then(response => {
                if (!response.ok) {
                    console.log(response.statusText);
                    return
                } else {
                    return response.json()
                }
            }).then(data => {
            console.log(data)
        })
    }

    componentDidMount() {
        this.query();
    }


    render() {
        return (
            <div className="row" >
                <ul >

                </ul >
            </div >
        )
    }
}
