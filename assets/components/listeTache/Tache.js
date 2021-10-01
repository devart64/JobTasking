import React from "react";

export default class Tache extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            urlPath : 'http://127.0.0.1:8000',
            urlTache: this.props.urlTache,
            tache   : ''
        };
    }

    query = () => {
        fetch(this.state.urlPath + this.state.urlTache)
            .then(response => {
                if (!response.ok) {
                    console.log(response.statusText);
                    return
                } else {
                    return response.json()
                }
            }).then(data => {
                console.log(data);
            this.setState({
                tache: data
                }
            )
        })
    }

    componentDidMount() {
        this.query();
    }


    render() {
        const classIcon = 'mdi mdi-24px '+this.state.tache.icon;
        return (
            <li>
                <div>
                    <i className={classIcon}></i> {this.state.tache.intitule} <b>{this.state.tache.point} pts</b>
                </div>
            </li>
        )
    }
}