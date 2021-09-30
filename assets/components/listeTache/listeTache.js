import React from 'react';
import Tache from "./Tache";



export default class ListeTache extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            pieceID: this.props.pieceID,
            urlListeTache: 'http://jobcleaning.fr/api/pieces/',
            taches: []
        };
    }

    query = () => {
        fetch(this.state.urlListeTache+this.state.pieceID)
            .then(response => {
                if (!response.ok) {
                    console.log(response.statusText);
                    return
                } else {
                    return response.json()
                }
            }).then(data => {
                console.log(data.tache)
            this.setState({
                taches: data.tache
            })
        })
    }

    componentDidMount() {
        this.query();
    }


    render() {
        let count = 1;
        const taches = this.state.taches.map((tache) =>

            <Tache key={count++} urlTache={tache} />
        );
        return (
            <div className="row" >
                <ul >
                    {taches}
                </ul >
            </div >
        )
    }
}
