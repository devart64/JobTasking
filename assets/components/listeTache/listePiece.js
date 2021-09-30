import React from 'react';
import Tache from "./Tache";
import ListeTache from "./listeTache";



export default class ListePiece extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            urlListePiece: 'http://127.0.0.1:8000/api/pieces',
            entries: []
        };
    }

    query = () => {
        fetch(this.state.urlListePiece)
            .then(response => {
                if (!response.ok) {
                    console.log(response.statusText);
                    return
                } else {
                    return response.json()
                }
            }).then(data => {
            this.setState({
                entries: data['hydra:member']
            })
        })
    }

    componentDidMount() {
        this.query();
    }


    render() {
        const pieces = this.state.entries.map((piece) =>
            <li key={piece.id}>
                {piece.intitule}
                <ul>
                    <ListeTache pieceID={piece.id} />
                </ul>
            </li>
        );
        return (
            <div className="row" >
                <h3>Liste de tâche restante pour aujourd'hui:</h3>
                <ul >
                    {pieces}
                </ul >
            </div >
        )
    }
}
