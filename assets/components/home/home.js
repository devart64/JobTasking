import React from "react";
import imageCleaner from "../../images/workerCartoon.png";
import ReactDOM from "react-dom";

export default class Home extends React.Component{
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div id="row" className='imageHomebackground'>
                <img src={imageCleaner} alt='image home page' width='100%' height='100%'/>
                <h1 className='text-center'>Welcome to JobCleaning !</h1>
                <div className="group-button text-center mt-2">
                    <button className='btn btn-primary mt-2'>Voir les tâches restantes du jour</button>
                </div>
            </div>
        );
    }
}

ReactDOM.render(<Home />, document.getElementById('root'));