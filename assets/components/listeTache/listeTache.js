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
            this.setState({
                entries: data['hydra:member']
            })
        })
    }

    componentDidMount() {
        this.query();
    }


    render() {
        const todoItems = this.state.entries.map((todo) =>
            <li key={todo.id}>      {todo.intitule}
            </li>
        );
        return (
            <div className="row" >
                <h3>Liste de tâche restante pour aujourd'hui:</h3>
                <ul >
                    {todoItems}
                </ul >
            </div >
        )
    }
}
