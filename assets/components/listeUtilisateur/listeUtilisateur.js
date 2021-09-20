import React from 'react';
import ReactDOM from 'react-dom';
class ListeUtilisateur extends React.Component {
    render() {
        return (
            <div>
                <p>Liste utilisateurs</p>
            </div>
        )
    }
}
ReactDOM.render(<ListeUtilisateur />, document.getElementById('liste-utilisateur'));